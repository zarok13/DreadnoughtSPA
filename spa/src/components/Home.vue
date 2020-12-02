<template>
    <div>
        <Header/>
        <!-- MAIN -->
        <main role="main">
            <!-- Main Carousel -->
            <section class="slider-section background-dark">
                <div class="line">
                    <Slider class="carousel"
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

                            <img v-bind:src="configs.storageUrl + item.src"
                            />
                            <div class="carousel-content">
                                <p
                                    class="text-white text-s-size-20 text-m-size-40 text-l-size-60 margin-bottom-40 text-thin text-line-height-1"
                                >
                                    {{ item.title }}
                                </p>
                                <p class="text-white text-size-16 margin-bottom-40">
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
                    <div class="margin" v-html="this.getHome.intro.i1"></div>
                </div>
            </section>

            <!-- Section 2 -->
            <section class="section background-primary text-center">
                <div class="line">
                    <div class="s-12 m-10 l-8 center" v-html="this.getHome.intro.i2"></div>
                </div>
            </section>

            <!-- Section 3 -->
            <section class="section background-white">
                <div class="full-width text-center" v-html="this.getHome.intro.i3"></div>
            </section>
            <hr class="break margin-top-bottom-0"/>

            <!-- Section 4 -->
            <section class="section background-white">
                <div class="line">
                    <h2
                        class="text-thin headline text-center text-s-size-30 margin-bottom-50"
                    >
                        From Our
                        <span class="text-primary">Blog</span>
                    </h2>
                    <Slider class="carousel-default owl-carousel carousel-wide-arrows"
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
                                    <div class="image-border-radius margin-m-bottom">
                                        <div class="margin">
                                            <div class="s-12 m-12 l-4 margin-m-bottom">
                                                <a class="image-hover-zoom" href="/">
                                                    <img
                                                        v-bind:src="configs.storageUrl + item[0].image"
                                                        alt
                                                    />
                                                </a>
                                            </div>
                                            <div class="s-12 m-12 l-8 margin-m-bottom">
                                                <h3>
                                                    <a class="text-dark text-primary-hover" href="/">{{
                                                            item[0].title
                                                        }}</a>
                                                </h3>
                                                <p v-html="item[0].text"></p>
                                                <a class="text-more-info text-primary-hover" href="/"
                                                >Read more</a
                                                >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="s-12 m-12 l-6">
                                    <div class="image-border-radius">
                                        <div class="margin">
                                            <div class="s-12 m-12 l-4 margin-m-bottom">
                                                <a class="image-hover-zoom" href="/">
                                                    <img
                                                        v-bind:src="configs.storageUrl + item[1].image"
                                                        alt
                                                    />
                                                </a>
                                            </div>
                                            <div class="s-12 m-12 l-8">
                                                <h3>
                                                    <a class="text-dark text-primary-hover" href="/">{{
                                                            item[1].title
                                                        }}</a>
                                                </h3>
                                                <p v-html="item[1].text"></p>
                                                <a class="text-more-info text-primary-hover" href="/"
                                                >Read more</a
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

        <Footer/>
    </div>
</template>

<script>
import {mapGetters} from "vuex";
import {GET_HOME} from "@/store/modules/dreadnought.store";
import {Slider, SliderItem} from "vue-easy-slider";
import Header from "../components/blocks/Header";
import Footer from "../components/blocks/Footer";

export default {
    name: "home",
    components: {
        Header,
        Footer,
        Slider,
        SliderItem,
    },
    data() {
        return {
            configs: this.$configs
        };
    },
    computed: {
        ...mapGetters({getHome: "getHome"}),
    },
    mounted() {
        this.$store.dispatch(GET_HOME);
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