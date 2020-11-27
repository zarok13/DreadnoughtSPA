<template>
  <div>
    <Header/>
    <!-- MAIN -->
    <main role="main">
      <!-- <carousel>

        <img src="https://placeimg.com/200/200/any?1">

        <img src="https://placeimg.com/200/200/any?2">

        <img src="https://placeimg.com/200/200/any?3">

        <img src="https://placeimg.com/200/200/any?4">

      </carousel> -->
      <!-- Main Carousel -->
      <section class="section background-dark">
        <div class="line">
          <div class="carousel-fade-transition owl-carousel carousel-main carousel-nav-white carousel-wide-arrows"
           v-if="this.getHome.sliders != undefined">
            <carousel>
              <div
                  class="item"
                  v-for="(item, index) in this.getHome.sliders"
                  v-bind:key="index"
              >
                <div class="s-12 center"> 
                  <img
                      v-bind:src="
                    apiUrl.substring(0, apiUrl.length - 3) +
                    'storage/' +
                    item.src
                  "
                  />
                  <div class="carousel-content">
                    <div class="padding-2x">
                      <div class="s-12 m-12 l-8">
                        <p
                            class="text-white text-s-size-20 text-m-size-40 text-l-size-60 margin-bottom-40 text-thin text-line-height-1"
                        >
                          {{ item.title }}
                        </p>
                        <p class="text-white text-size-16 margin-bottom-40">
                          {{ item.sub_title }}
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </carousel>
          </div>
        </div>
      </section>

      <!-- Section 1 -->
      <section class="section background-white">
        <div class="line">
          <div class="margin" v-html="this.home.intro.i1"></div>
        </div>
      </section>

      <!-- Section 2 -->
      <section class="section background-primary text-center">
        <div class="line">
          <div class="s-12 m-10 l-8 center" v-html="this.home.intro.i2"></div>
        </div>
      </section>

      <!-- Section 3 -->
      <section class="section background-white">
        <div class="full-width text-center" v-html="this.home.intro.i3"></div>
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
          <div class="carousel-default owl-carousel carousel-wide-arrows">
            <div
                class="item"
                v-for="(item, index) in this.home.blogs"
                v-bind:key="index"
            >
              <div class="margin">
                <div class="s-12 m-12 l-6">
                  <div class="image-border-radius margin-m-bottom">
                    <div class="margin">
                      <div class="s-12 m-12 l-4 margin-m-bottom">
                        <a class="image-hover-zoom" href="/">
                          <img
                              v-bind:src="
                              apiUrl.substring(0, apiUrl.length - 3) +
                              'storage/' +
                              item[0].image
                            "
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
                              v-bind:src="
                              apiUrl.substring(0, apiUrl.length - 3) +
                              'storage/' +
                              item[1].image
                            "
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
            </div>
          </div>
        </div>
      </section>
    </main>

    <Footer/>
  </div>
</template>

<script>
import {mapGetters} from "vuex";
import {BASE_URL, GET_HOME} from "../store/modules/dreadnought.store";
import {home} from "../_data_models/home_model";
import carousel from 'vue-owl-carousel'
import Header from "../components/blocks/Header";
import Footer from "../components/blocks/Footer";
// import {
//   initSliderCarousel,
//   initBlogCarousel,
// } from "../assets/js/init_carousel";

export default {
  name: "home",
  components: {
    Header,
    Footer,
    carousel
  },
  data() {
    return {
      apiUrl: BASE_URL,
      home: home,
    };
  },
  computed: {
    ...mapGetters({getHome: "getHome"}),
  },
  async mounted() {
    await this.$store.dispatch(GET_HOME);
    this.initData();
    // initSliderCarousel();
    // initBlogCarousel();
  },
  methods: {
    initData() {
      this.home = this.getHome;
    },
  },
};
</script>

<style scoped>
</style>