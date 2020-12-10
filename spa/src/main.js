import Vue from 'vue'
import App from './App.vue'
import router from './router'
import store from './store'
import { configs } from "@/helpers/configs";

Vue.config.productionTip = false;
Vue.prototype.$configs = configs;

new Vue({
    render: h => h(App),
    store,
    router,
}).$mount('#app')
