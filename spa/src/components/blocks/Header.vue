<template>
    <div>
        <!-- PREMIUM FEATURES BUTTON -->
        <a
                target="_blank"
                class="hide-s"
                href="../template/prospera-premium-responsive-business-template/"
                style="position:fixed;top:120px;right:-14px;z-index:10;"
        >
            <img src="img/premium-features.png" alt/>
        </a>
        <!-- HEADER -->
        <header role="banner">
            <!-- Top Bar -->
            <div class="top-bar background-white">
                <div class="line">
                    <div class="s-12 m-6 l-6">
                        <div class="top-bar-contact">
                            <p class="text-size-12">
                                Contact Us: 0800 200 200 |
                                <a
                                        class="text-orange-hover"
                                        href="mailto:contact@sampledomain.com"
                                >contact@sampledomain.com</a>
                            </p>
                        </div>
                    </div>
                    <div class="s-12 m-6 l-6">
                        <div class="right">
                            <ul class="top-bar-social right">
                                <li>
                                    <a href="https://facebook.com">
                                        <i class="icon-facebook_circle text-orange-hover"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://twitter.com">
                                        <i class="icon-twitter_circle text-orange-hover"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://instagram.com">
                                        <i class="icon-instagram_circle text-orange-hover"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Top Navigation -->
            <nav class="background-white background-primary-hightlight">
                <div class="line">
                    <div class="s-12 l-2">
                        <router-link class="logo" to="/">
                            <img src="../../assets/img/logo-free.png" alt/>
                        </router-link>
                    </div>
                    <div class="top-nav s-12 l-10">
                        <p class="nav-text"></p>
                         <ul class="right chevron">
<!--                            <li>-->
<!--                                <router-link class="nav-link" to="/">Home</router-link>-->
<!--                            </li>-->
                            <tree-menu title="Home" :nodes="this.renderRoutes[0]" :depth="0" slug="/"></tree-menu>
                            <!-- <li v-for="(item, index) in getApiRoutes[0]" v-bind:key="index"> -->
                                <!-- {{item}} -->
                                <!-- <router-link v-if="item.slug !== '/null'" class="nav-link" :to="item.slug">{{ item.title }}</router-link> -->
<!--                                <a v-else href="javascript:void(0)">{{ item.title }}</a>-->
<!--                                {{item.title}}-->
<!--                                <ul v-if="item.sub_menu">-->
<!--                                    {{item}}-->
<!--                                    <li>-->
<!--                                        <router-link v-if="item.sub_menu.slug !== '/null'" class="nav-link" :to="item.sub_menu.slug">{{ item.sub_menu.title }}</router-link>-->
<!--                                    </li>-->
<!--                                </ul>-->
                            <!-- </li> -->
                        </ul>
                       <!--  <ul class="right chevron">
                            <li>
                                <router-link class="nav-link" to="/">Home</router-link>
                            </li>
                            <li v-for="(item, index) in getApiRoutes" v-bind:key="index" stagger="5000">
                                <router-link v-if="item.path !== '/null'" class="nav-link" :to="item.path">{{ item.name }}</router-link>
                                <a v-else href="javascript:void(0)">{{ item.name }}</a>
                                <ul v-if="item.children">
                                    <li>
                                        <router-link v-if="item.children.path !== '/null'" class="nav-link" :to="item.children.path">{{ item.children.name }}</router-link>
                                    </li>
                                </ul>
                            </li>
                        </ul> -->
                        <!-- {{this.renderRoutes}} -->
                        
                    </div>
                </div>
            </nav>
        </header>
    </div>
</template>
<script>
    import TreeMenu from './TreeMenu.vue';


    import router from '../../router'
    import Axios from 'axios';
    import About from "../About";
    import Product from "../Product";
    import Contact from "../Contact";
    import Gallery from "../Gallery";
    import {PageTypes} from "../../_data_models/page_types";
    import {API_URL, GET_API_ROUTES} from '../../store/modules/dreadnought.store'
    export default {
        name: "header_block",
        components: {
            TreeMenu
        },
        computed: {
            getApiRoutes: function () {
                return this.$store.getters.getApiRoutes;
            }
        },
        data() {
            return {
                renderRoutes:[],
            }
        },
        async mounted(){
            await this.getDynamicRoutes();
            this.$store.dispatch(GET_API_ROUTES, this.renderRoutes);
        },
         methods: {
            async getDynamicRoutes() {
                // if (localStorage[GET_API_ROUTES] && localStorage[GET_API_ROUTES] !== 'undefined') {
                //   let parsedData = JSON.parse(localStorage[GET_API_ROUTES]);
                //   this.processData(parsedData);
                //   console.log('routes parsed from local storage');
                // } else {
                await Axios.get(API_URL + '/menu')
                    .then(data => {
                        this.renderRoutes.push(data.data);
                        // console.log(this.$renderRoutes);
                        this.processData(data);
                        // console.log(this.$renderRoutes);
                        // this.$renderRoutes.push({
                        //                     name: `gdfg`,
                        //                     path: `gdfgfggfd`
                        //                 });
                        // let originalData = data.data;
                        // this.processData(data.data, originalData, 0);
                        // localStorage.setItem(GET_API_ROUTES, JSON.stringify(data));
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
                    router.addRoutes([newRoute])
                }
            }
        }
    };
</script>
<style scoped>
</style>