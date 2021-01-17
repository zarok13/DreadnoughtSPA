import constants from "@/helpers/constants"
import Cookies from "js-cookie";
import { mapMutations } from "vuex";
import { RepositoryFactory } from '@/api/RepositoryFactory'
const ContactsRepository = RepositoryFactory.get("contacts");


export default {
    data() {
        return {
            sended: false,
            type: '',
            footer: {
                email: "",
                name: "",
                text: "",
                errors: []
            },
            contact: {
                email: "",
                name: "",
                text: "",
                subject: "",
                errors: []
            },
        };
    },
    mounted() {
        this.sended = this.type ? Cookies.get(this.type + 'Message') : false;
    },

    methods: {
        ...mapMutations({ setLoader: constants.SET_LOADER }),
        sendMessage() {
            if (!this.validateForm().length) {
                this.send();
            }
        },
        validateForm() {
            this[this.type].errors = [];
            if (!this[this.type].email) {
                this[this.type].errors.push("Email required.");
            } else if (!this.validEmail(this[this.type].email)) {
                this[this.type].errors.push("Valid email required.");
            }

            if (!this[this.type].text) {
                this[this.type].errors.push("Message required.");
            }
            return this[this.type].errors;
        },
        validEmail: function (email) {
            let re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return re.test(email);
        },
        async send() {
            if (this.type !== '') {
                const dataForm = new FormData();
                dataForm.append("email", this[this.type].email);
                dataForm.append("name", this[this.type].name);
                dataForm.append("text", this[this.type].text);
                dataForm.append("subject", this[this.type].subject);

                this.setLoader(true);
                await ContactsRepository[constants.SEND_CONTACT_MAIL](this.type, dataForm)
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