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
                    </div>
                </div>
            </nav>
        </header>
    </div>
</template>
<script>
    export default {
        name: "header_block",
        computed: {
            getApiRoutes: function () {
                return this.$store.getters.getApiRoutes;
            }
        }
    };
</script>
<style scoped>
</style>