import Vue from 'vue'
import Router from 'vue-router'
import Home from '../components/Home'


Vue.use(Router)
const router = new Router({
    mode: 'hash',
    routes: [
        {
            path: '/',
            name: 'home',
            component: Home
        }
    ]
})


// function initCarousel() {
//   setTimeout(function () {
//   }, 2000);
// }
// router.beforeEach((to, from, next) => {
//   if (to.name === 'home'){
//     alert('fsdf');
//     next()
//     initCarousel();
//   }
//   else{
//     next()
//   }
// })

export default router;
