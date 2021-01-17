import Vue from 'vue';
import App from './App.vue';
import router from './router';
import store from './store';
import production from "@/helpers/production/env";
import development from "@/helpers/development/env";


Vue.config.productionTip = false;
if (process.env.NODE_ENV === "production") {
    Vue.prototype.$env = Object.freeze(production);
} else {
    Vue.prototype.$env = Object.freeze(development);
}

new Vue({
    render: h => h(App),
    store,
    router
}).$mount('#app')
