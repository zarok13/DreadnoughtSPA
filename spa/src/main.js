import Vue from 'vue'
import App from './App.vue'
import router from './router'
import store from './store'
import development from "@/helpers/configs.json";
// import api from '@/api'
import Contacts from '@/api/contacts';

const repositories = {
    contacts: Contacts,
  };
  
  // inject("api", repositories);


Vue.config.productionTip = false;
Vue.prototype.$configs = development;
Vue.prototype.$api = repositories;
// console.log(this.$configs);
new Vue({
    render: h => h(App),
    store,
    router,
    // api,
}).$mount('#app')
