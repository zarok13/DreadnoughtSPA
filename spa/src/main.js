import Vue from 'vue'
import App from './App.vue'
import router from './router'
import store from './store'
import Axios from 'axios';
import About from "./components/About";
import Product from "./components/Product";
import Contact from "./components/Contact";
import Gallery from "./components/Gallery";
import {PageTypes} from "./_data_models/page_types";
import {API_URL, GET_API_ROUTES} from './store/modules/dreadnought.store'

Vue.config.productionTip = false
Vue.prototype.$renderRoutes = [];


new Vue({
    render: h => h(App),
    router,
    store,
    methods: {
        getDynamicRoutes() {
            // if (localStorage[GET_API_ROUTES] && localStorage[GET_API_ROUTES] !== 'undefined') {
            //   let parsedData = JSON.parse(localStorage[GET_API_ROUTES]);
            //   this.processData(parsedData);
            //   console.log('routes parsed from local storage');
            // } else {
            Axios.get(API_URL + '/menu')
                .then(data => {
                    this.$renderRoutes.push(data.data);
                    // console.log(this.$renderRoutes);
                    this.processData(data);
                    // console.log(this.$renderRoutes);
                    // this.$renderRoutes.push({
                    //                     name: `gdfg`,
                    //                     path: `gdfgfggfd`
                    //                 });
                    // let originalData = data.data;
                    // this.processData(data.data, originalData, 0);
                    localStorage.setItem(GET_API_ROUTES, JSON.stringify(data));
                })
                .catch(error => {
                    console.log(error);
                })
            // }
        },
        processData(data) {
            data.data.forEach(this.createAndAppendRoute)
        },
        createAndAppendRoute(item) {


            let currentComponent = About;

            if (item.page_template === PageTypes.products) {
                currentComponent = Product;
            }
            if (item.page_type === PageTypes.contact) {
                currentComponent = Contact;
            }
            if (item.page_type === PageTypes.gallery) {
                currentComponent = Gallery;
            }
            if (item.slug !== null) {
                let newRoute = {
                    path: `/${item.slug}`,
                    name: `${item.title}`,
                    component: currentComponent,
                };
                this.$router.addRoutes([newRoute])
            }
        }
    },
    created() {
        this.getDynamicRoutes()
        console.log(this.$renderRoutes);
    },
    mounted() {

        this.$store.dispatch(GET_API_ROUTES, this.$renderRoutes)
    }
}).$mount('#app')
