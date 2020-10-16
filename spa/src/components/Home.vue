<template>
  <div>
    <Header />
    <!-- MAIN -->
    <main role="main">
      <!-- Main Carousel -->
      <section class="section background-dark">
        <div class="line">
          <div
            class="carousel-fade-transition owl-carousel carousel-main carousel-nav-white carousel-wide-arrows"
          >
            <div
              class="item"
              v-for="(item, index) in this.home.sliders"
              v-bind:key="index"
            >
              <div class="s-12 center">
                <img
                  v-bind:src="
                    apiUrl.substring(0, apiUrl.length - 3) +
                    'storage/' +
                    item.src
                  "
                  alt
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
          <div class="carousel-default owl-carousel carousel-wide-arrows">
            <div
              class="item"
              v-for="(item, index) in blogPart1"
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
                              item.image
                            "
                            alt
                          />
                        </a>
                      </div>
                      <div class="s-12 m-12 l-8 margin-m-bottom">
                        <h3>
                          <a class="text-dark text-primary-hover" href="/">{{
                            item.title
                          }}</a>
                        </h3>
                        <p v-html="item.text"></p>
                        <a class="text-more-info text-primary-hover" href="/"
                          >Read more</a
                        >
                      </div>
                    </div>
                  </div>
                </div>
                <div
                  class="s-12 m-12 l-6"
                  v-if="containsKey(blogPart2, parseInt(index) + 1)"
                >
                  <div class="image-border-radius">
                    <div class="margin">
                      <div class="s-12 m-12 l-4 margin-m-bottom">
                        <a class="image-hover-zoom" href="/">
                          <img
                            v-bind:src="
                              apiUrl.substring(0, apiUrl.length - 3) +
                              'storage/' +
                              blogPart2[parseInt(index) + 1].image
                            "
                            alt
                          />
                        </a>
                      </div>
                      <div class="s-12 m-12 l-8">
                        <h3>
                          <a class="text-dark text-primary-hover" href="/">{{
                            blogPart2[parseInt(index) + 1].title
                          }}</a>
                        </h3>
                        <p v-html="blogPart2[parseInt(index) + 1].text"></p>
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

    <Footer />
  </div>
</template>

<script>
import Header from "../components/blocks/Header";
import Footer from "../components/blocks/Footer";
import {
  initSliderCarousel,
  initBlogCarousel,
} from "../assets/js/init_carousel";
import {
  API_URL,
  GET_HOME,
  BLOG_LIST,
} from "../store/modules/dreadnought.store";
import { mapGetters } from "vuex";
import { home } from "../_data_models/home_model";

export default {
  name: "home",
  components: {
    Header,
    Footer,
  },
  data() {
    return {
      apiUrl: API_URL,
      home: home,
    };
  },
  computed: {
    ...mapGetters({ getHome: "getHome" }),
    blogPart1: function () {
      return this.$store.getters.blogPart1;
    },
    blogPart2: function () {
      return this.$store.getters.blogPart2;
    },
  },
  async mounted() {
   
    await this.$store.dispatch(GET_HOME);
    
    console.log(this.home);
    initSliderCarousel();
    this.home = this.getHome.home;
    await this.$store.dispatch(BLOG_LIST);
    initBlogCarousel();
   
    // this.home.i1 = this.home.intro.i1;
    // this.home.i2 = this.home.intro.i2;
    // this.home.i3 = this.home.intro.i3;
  },
  methods: {
    containsKey(obj, key) {
      return typeof obj[key] !== "undefined";
    },
  },
};
</script>

<style scoped>
</style>