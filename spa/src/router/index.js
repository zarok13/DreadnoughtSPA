import Vue from 'vue'
import Router from 'vue-router'
import Home from '@/components/Home'
import Product from '@/components/Product'
import About from '@/components/About'
import Gallery from '@/components/Gallery'
import Contact from '@/components/Contact'

// import VuexTest from '@/components/VuexTest'

Vue.use(Router)
export default new Router({
  routes: [
    {
      path: '/',
      name: 'home',
      component: Home
    },
    {
      path: '/products',
      name: 'products',
      component: Product
    },
    {
      path: '/about',
      name: 'about',
      component: About
    },
    {
      path: '/gallery',
      name: 'gallery',
      component: Gallery
    },
    {
      path: '/contact',
      name: 'contact',
      component: Contact
    }
    // {
    //   path: '/vuex',
    //   name: 'vuex',
    //   component: VuexTest
    // }
  ]
})