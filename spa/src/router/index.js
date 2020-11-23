import Vue from 'vue'
import Router from 'vue-router'
let about = import('@/components/About');
Vue.use(Router)
const router = new Router({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'home',
            component: () =>  import('@/components/Home')
        },
        {
            path: '/products',
            name: 'products',
            component: () => import('@/components/Product')
        },
        {
            path: '/gallery',
            name: 'gallery',
            component: () => import('@/components/Gallery')
        },
        {
            path: '/contacts',
            name: 'contact',
            component: () => import('@/components/Contact')
        },
        {
            path: '/about_us',
            name: 'about',
            component: () => about
        },
        {
            path: '/info',
            name: 'info',
            component: () => about
        },
    ]
})

export default router;
