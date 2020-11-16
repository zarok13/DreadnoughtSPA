import Vue from 'vue'
import App from './App.vue'
import router from './router'
import store from './store'

import Axios from 'axios';
import About from "./components/About";
import Product from "./components/Product";
import Contact from "./components/Contact";
import Gallery from "./components/Gallery";
import { PageTypes } from "./_data_models/page_types";
import { BASE_URL, GET_API_ROUTES, GET_CONFIGS } from './store/modules/dreadnought.store'
import {mapGetters} from "vuex";

Vue.config.productionTip = false
Vue.prototype.$renderRoutes = [];
Vue.prototype.$configs = [];


new Vue({
    render: h => h(App),
    router,
    store,
    methods: {
        async getDynamicRoutes() {

            // if (localStorage[GET_API_ROUTES] && localStorage[GET_API_ROUTES] !== 'undefined') {
            //   let parsedData = JSON.parse(localStorage[GET_API_ROUTES]);
            //   this.processData(parsedData);
            //   console.log('routes parsed from local storage');
            // } else {
            await Axios.get(BASE_URL + '/configs')
                .then(data => {
                    this.processData(data.data.menu);
                    this.$renderRoutes.push(data.data.menu);
                    this.$configs.push(data.data);
                    // localStorage.setItem(GET_API_ROUTES, JSON.stringify(data));
                })
                .catch(error => {
                    console.log(error);
                })
            // }
        },
        processData(nodes) {
            nodes.forEach(item => {
                let currentComponent = About;
console.log(item.page_template)
                if (item.page_template === PageTypes.products) {
                    currentComponent = Product;
                }
                if (item.page_type === PageTypes.contact) {
                    currentComponent = Contact;
                }
                if (item.page_type === PageTypes.gallery) {
                    currentComponent = Gallery;
                }

                if (item && item.slug !== null) {
                    let newRoute = {
                        path: `/${item.slug}`,
                        name: `${item.title}`,
                        component: currentComponent,
                    };
                    this.$router.addRoutes([newRoute])
                }

                if (item.children.length > 0) {
                    this.processData(item.children);
                }
            })
        },
    },
    computed: {
        ...mapGetters({ getConfigs: "getConfigs" }),
    },
    async mounted() {
        await this.$store.dispatch(GET_CONFIGS);
        await this.getDynamicRoutes()
        await this.$store.dispatch(GET_API_ROUTES, this.$renderRoutes)
    }
}).$mount('#app')
