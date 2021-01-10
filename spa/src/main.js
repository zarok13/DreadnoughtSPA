import Vue from 'vue'
import App from './App.vue'
import router from './router'
import store from './store'
import development from "@/helpers/configs.json";

Vue.config.productionTip = false;
Vue.prototype.$configs = development;

new Vue({
    render: h => h(App),
    store,
    router,
}).$mount('#app')
