<template>
    <div>
        <slot name="premium_features"></slot>
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
                                    :href="'mailto:' + this.getConfigs.params.email"
                                    class="text-orange-hover"
                                >{{ this.getConfigs.params.email}}</a>
                            </p>
                        </div>
                    </div>
                    <div class="s-12 m-6 l-6">
                        <div class="right">
                            <ul class="top-bar-social right">
                                <li>
                                    <a :href="this.getConfigs.params.facebook_url">
                                        <i class="icon-facebook_circle text-orange-hover"></i>
                                    </a>
                                </li>
                                <li>
                                    <a :href="this.getConfigs.params.twitter_url">
                                        <i class="icon-twitter_circle text-orange-hover"></i>
                                    </a>
                                </li>
                                <li>
                                    <a :href="this.getConfigs.params.instagram_url">
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
                            <img src="@/assets/img/logo-free.png" alt/>
                        </router-link>
                    </div>
                    <div class="top-nav s-12 l-10">
                        <p class="nav-text"></p>
                        <TreeMenu :nodes="this.getConfigs.menu" is-first></TreeMenu>
                    </div>
                </div>
            </nav>
        </header>
    </div>
</template>
<script>
import TreeMenu from './TreeMenu.vue';
import {mapGetters} from "vuex";

export default {
    name: "header_block",
    components: {
        TreeMenu
    },
    computed: {
        ...mapGetters({getConfigs: "getConfigs"}),
    },
};

</script>
<style scoped>
</style>