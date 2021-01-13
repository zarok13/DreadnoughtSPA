import vuex_constants from "@/helpers/constants"
import Cookies from "js-cookie";
import { mapMutations } from "vuex";
import { RepositoryFactory } from '@/api/RepositoryFactory'
const ContactsRepository = RepositoryFactory.get("contacts");


export default {
    data() {
        return {
            configs: this.$configs,
            sended: false,
            type: '',
        };
    },
    mounted() {
        this.sended = this.type ? Cookies.get(this.type + 'Message') : false;
    },

    methods: {
        ...mapMutations({ setLoader: vuex_constants.SET_LOADER }),
        sendMessage() {
            if (!this.validateForm().length) {
                this.send();
            }
        },
        validateForm() {
            this.configs[this.type].errors = [];
            if (!this.configs[this.type].email) {
                this.configs[this.type].errors.push("Email required.");
            } else if (!this.validEmail(this.configs[this.type].email)) {
                this.configs[this.type].errors.push("Valid email required.");
            }

            if (!this.configs[this.type].text) {
                this.configs[this.type].errors.push("Message required.");
            }
            return this.configs[this.type].errors;
        },
        validEmail: function (email) {
            let re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return re.test(email);
        },
        async send() {
            if (this.type !== '') {
                const dataForm = new FormData();
                dataForm.append("email", this.configs[this.type].email);
                dataForm.append("name", this.configs[this.type].name);
                dataForm.append("text", this.configs[this.type].text);
                dataForm.append("subject", this.configs[this.type].subject);

                this.setLoader(true);
                await ContactsRepository[vuex_constants.SEND_CONTACT_MAIL](this.type, dataForm)
                    .then(() => {
                        Cookies.set(this.type + 'Message', true, { expires: 7 });
                        this.sended = Cookies.get(this.type + 'Message');
                    })
                    .catch(error => {
                        console.log(error);
                    })
                this.setLoader(false);
            }

        },

    }
}