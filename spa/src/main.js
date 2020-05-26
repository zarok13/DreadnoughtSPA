import Vue from 'vue'
import App from './App.vue'
import router from './router'
import store from './store'
import Axios from 'axios';
import About from "./components/About";
import Product from "./components/Product";
import Contact from "./components/Contact";
import Gallery from "./components/Gallery";
import { API_URL, GET_API_ROUTES } from './store/modules/dreadnought.store'

Vue.config.productionTip = false
Vue.prototype.$renderRoutes = [];

new Vue({
  render: h => h(App),
  router,
  store,
  methods: {
    getDynamicRoutes() {
      if (localStorage[GET_API_ROUTES] && localStorage[GET_API_ROUTES] !== 'undefined') {
        let parsedData = JSON.parse(localStorage[GET_API_ROUTES]);
        this.processData(parsedData);
        console.log('routes parsed from local storage');
      } else {
        Axios.get(API_URL + '/menu')
          .then(data => {
            this.processData(data);
            localStorage.setItem(GET_API_ROUTES, JSON.stringify(data));
          })
          .catch(error => {
            console.log(error);
          })
      }
    },
    processData(data) {
      data.data.data.forEach(this.createAndAppendRoute)
    },
    createAndAppendRoute(item) {
      let currentComponent = About;
      if (item.page_template === 'products') {
        currentComponent = Product;
      }
      if (item.page_type === 'contact') {
        currentComponent = Contact;
      }
      if (item.page_type === 'gallery') {
        currentComponent = Gallery;
      }
      let newRoute = {
        path: `/${item.slug}`,
        name: `${item.title}`,
        component: currentComponent,
      }
      this.$router.addRoutes([newRoute])

      this.$renderRoutes.push({
        name: `${item.title}`,
        path: `/${item.slug}`
      })
    }
  },
  created() {
    this.getDynamicRoutes()
  },
  mounted() {
    this.$store.dispatch(GET_API_ROUTES, this.$renderRoutes)
  }
}).$mount('#app')
