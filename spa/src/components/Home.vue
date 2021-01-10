<template>
    <div>
        <Header>
            <!-- PREMIUM FEATURES BUTTON -->
            <router-link
                slot="premium_features"
                :to="{ path: this.getConfigs.params.premium_features }"
                target="_blank"
                class="hide-s"
                style="position:fixed;top:120px;right:-14px;z-index:10;"
            >
                <img src="@/assets/img/premium-features.png" alt />
            </router-link>
        </Header>
        <!-- MAIN -->
        <main role="main">
            <!-- Main Carousel -->
            <section class="slider-section background-dark">
                <div class="line">
                    <Slider
                        class="carousel"
                        animation="fade"
                        :duration="3000"
                        :speed="1500"
                        :controlBtn="false"
                    >
                        <SliderItem
                            class="slider-item"
                            v-for="(item, index) in this.getHome.sliders"
                            v-bind:key="index"
                        >
                            <img v-bind:src="configs.storageUrl + item.src" />
                            <div class="carousel-content">
                                <p
                                    class="text-white text-s-size-20 text-m-size-40 text-l-size-60 margin-bottom-40 text-thin text-line-height-1"
                                >
                                    {{ item.title }}
                                </p>
                                <p
                                    class="text-white text-size-16 margin-bottom-40"
                                >
                                    {{ item.sub_title }}
                                </p>
                            </div>
                        </SliderItem>
                    </Slider>
                </div>
            </section>

            <!-- Section 1 -->
            <section class="section background-white">
                <div class="line">
                    <div class="margin">
                        <div
                            class="s-12 m-12 l-4 margin-m-bottom"
                            v-for="(item, index) in this.getHome.banners"
                            :key="index"
                        >
                            <img
                                class="margin-bottom"
                                :src="configs.storageUrl + item.image"
                                alt=""
                            />
                            <h2 class="text-thin">{{ item.title }}</h2>
                            <p>{{ item.desc }}</p>
                            <a
                                class="text-more-info text-primary-hover"
                                :href="item.url"
                                >Read more</a
                            >
                        </div>
                    </div>
                </div>
            </section>

            <!-- Section 2 -->
            <section class="section background-primary text-center">
                <div class="line">
                    <div
                        class="s-12 m-10 l-8 center"
                        v-html="this.getHome.intro.i2"
                    ></div>
                </div>
            </section>

            <!-- Section 3 -->
            <section class="section background-white">
                <div
                    class="full-width text-center"
                    v-html="this.getHome.intro.i3"
                ></div>
            </section>
            <hr class="break margin-top-bottom-0" />

            <!-- Section 4 -->
            <section class="section background-white">
                <div class="line">
                    <h2
                        class="text-thin headline text-center text-s-size-30 margin-bottom-50"
                    >
                        From Our
                        <span class="text-primary">Blog</span>
                    </h2>
                    <Slider
                        class="carousel-default owl-carousel carousel-wide-arrows"
                        :duration="3000"
                        :speed="1500"
                        height="180px"
                        :indicators="false"
                    >
                        <SliderItem
                            class="item"
                            v-for="(item, index) in this.getHome.blogs"
                            v-bind:key="index"
                        >
                            <div class="margin">
                                <div class="s-12 m-12 l-6">
                                    <div
                                        class="image-border-radius margin-m-bottom"
                                    >
                                        <div class="margin">
                                            <div
                                                class="s-12 m-12 l-4 margin-m-bottom"
                                            >
                                                <router-link
                                                    class="image-hover-zoom"
                                                    :to="
                                                        $route.path +
                                                            'blog/' +
                                                            item[0].slug
                                                    "
                                                >
                                                    <img
                                                        v-bind:src="
                                                            configs.storageUrl +
                                                                item[0].image
                                                        "
                                                        alt
                                                    />
                                                </router-link>
                                            </div>
                                            <div
                                                class="s-12 m-12 l-8 margin-m-bottom"
                                            >
                                                <h3>
                                                    <router-link
                                                        class="text-dark text-primary-hover"
                                                        :to="
                                                            $route.path +
                                                                'blog/' +
                                                                item[0].slug
                                                        "
                                                        >{{
                                                            item[0].title
                                                        }}</router-link
                                                    >
                                                </h3>
                                                <p v-html="item[0].text"></p>
                                                <router-link
                                                    class="text-more-info text-primary-hover"
                                                    :to="
                                                        $route.path +
                                                            'blog/' +
                                                            item[0].slug
                                                    "
                                                    >Read more</router-link
                                                >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="s-12 m-12 l-6">
                                    <div class="image-border-radius">
                                        <div class="margin">
                                            <div
                                                class="s-12 m-12 l-4 margin-m-bottom"
                                            >
                                                <router-link
                                                    class="image-hover-zoom"
                                                    :to="
                                                        $route.path +
                                                            'blog/' +
                                                            item[1].slug
                                                    "
                                                >
                                                    <img
                                                        v-bind:src="
                                                            configs.storageUrl +
                                                                item[1].image
                                                        "
                                                        alt
                                                    />
                                                </router-link>
                                            </div>
                                            <div class="s-12 m-12 l-8">
                                                <h3>
                                                    <router-link
                                                        class="text-dark text-primary-hover"
                                                        :to="
                                                            $route.path +
                                                                'blog/' +
                                                                item[1].slug
                                                        "
                                                        >{{
                                                            item[1].title
                                                        }}</router-link
                                                    >
                                                </h3>
                                                <p v-html="item[1].text"></p>
                                                <router-link
                                                    class="text-more-info text-primary-hover"
                                                    :to="
                                                        $route.path +
                                                            'blog/' +
                                                            item[1].slug
                                                    "
                                                    >Read more</router-link
                                                >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </SliderItem>
                    </Slider>
                </div>
            </section>
        </main>

        <Footer />
    </div>
</template>

<script>
import { mapGetters, mapActions } from "vuex";
import vuex_constants from "@/helpers/constants"
import { Slider, SliderItem } from "vue-easy-slider";
import Header from "../components/blocks/Header";
import Footer from "../components/blocks/Footer";

export default {
    name: "home",
    components: {
        Header,
        Footer,
        Slider,
        SliderItem
    },
    data() {
        return {
            configs: this.$configs
        };
    },
    computed: {
        ...mapGetters({ getHome: "getHome", getConfigs: "getConfigs" })
    },
    mounted() {
        this.initHome();
    },
    methods: {
        ...mapActions({ initHome: vuex_constants.GET_HOME })
    }
};
</script>

<style scoped>
.carousel-content {
    position: absolute;
    bottom: 8px;
    left: 16px;
}

.slider-section {
    padding-top: 3rem;
    padding-bottom: 2rem;
}
</style>