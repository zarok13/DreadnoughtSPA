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
            <div class="item" v-for="(item, index) in getSlider.data" v-bind:key="index">
              <div class="s-12 center">
                <img v-bind:src="$parent.getApiUrl + 'storage/' + item.src " alt />
                <div class="carousel-content">
                  <div class="padding-2x">
                    <div class="s-12 m-12 l-8">
                      <p
                        class="text-white text-s-size-20 text-m-size-40 text-l-size-60 margin-bottom-40 text-thin text-line-height-1"
                      >{{ item.title }}</p>
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
          <div class="margin">
            <div class="s-12 m-12 l-4 margin-m-bottom">
              <img class="margin-bottom" src="img/img-01.jpg" alt />
              <h2 class="text-thin">Clean Design</h2>
              <p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat.</p>
              <a class="text-more-info text-primary-hover" href="/">Read more</a>
            </div>
            <div class="s-12 m-12 l-4 margin-m-bottom">
              <img class="margin-bottom" src="img/img-02.jpg" alt />
              <h2 class="text-thin">Valid code</h2>
              <p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat.</p>
              <a class="text-more-info text-primary-hover" href="/">Read more</a>
            </div>
            <div class="s-12 m-12 l-4 margin-m-bottom">
              <img class="margin-bottom" src="img/img-03.jpg" alt />
              <h2 class="text-thin">Totally free</h2>
              <p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat.</p>
              <a class="text-more-info text-primary-hover" href="/">Read more</a>
            </div>
          </div>
        </div>
      </section>

      <!-- Section 2 -->
      <section class="section background-primary text-center">
        <div class="line">
          <div class="s-12 m-10 l-8 center">
            <h2 class="headline text-thin text-s-size-30">We are Web Design Heroes</h2>
            <p class="text-size-20">
              Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie
              consequat,
              vel illum dolore eu feugiat nulla facilisis
            </p>
          </div>
        </div>
      </section>

      <!-- Section 3 -->
      <section class="section background-white">
        <div class="full-width text-center">
          <img
            class="center margin-bottom-30"
            style="margin-top: -210px;"
            src="../assets/img/bio.png"
            alt
          />
          <div class="line">
            <h2 class="headline text-thin text-s-size-30">
              Fully
              <span class="text-primary">Responsive</span> HTML5
              Template
            </h2>
            <p class="text-size-20 text-s-size-16 text-thin">
              Duis autem vel eum iriure dolor in hendrerit in vulputate
              velit
              esse molestie consequat, vel illum dolore eu feugiat nulla facilisis. Duis autem vel eum iriure dolor in
              hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis
            </p>
            <i class="icon-more_node_links icon2x text-primary margin-top-bottom-10"></i>
            <p
              class="text-size-20 text-s-size-16 text-thin text-primary"
            >Try resize your browser window</p>
          </div>
        </div>
      </section>
      <hr class="break margin-top-bottom-0" />

      <!-- Section 4 -->
      <section class="section background-white">
        <div class="line">
          <h2 class="text-thin headline text-center text-s-size-30 margin-bottom-50">
            From Our
            <span class="text-primary">Blog</span>
          </h2>
          <div class="carousel-default owl-carousel carousel-wide-arrows">
            <div class="item">
              <div class="margin">
                <div class="s-12 m-12 l-6">
                  <div class="image-border-radius margin-m-bottom">
                    <div class="margin">
                      <div class="s-12 m-12 l-4 margin-m-bottom">
                        <a class="image-hover-zoom" href="/">
                          <img src="img/blog-05.jpg" alt />
                        </a>
                      </div>
                      <div class="s-12 m-12 l-8 margin-m-bottom">
                        <h3>
                          <a
                            class="text-dark text-primary-hover"
                            href="/"
                          >Lorem Ipsum Dolor sit Amet</a>
                        </h3>
                        <p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat.</p>
                        <a class="text-more-info text-primary-hover" href="/">Read more</a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="s-12 m-12 l-6">
                  <div class="image-border-radius">
                    <div class="margin">
                      <div class="s-12 m-12 l-4 margin-m-bottom">
                        <a class="image-hover-zoom" href="/">
                          <img src="img/blog-03.jpg" alt />
                        </a>
                      </div>
                      <div class="s-12 m-12 l-8">
                        <h3>
                          <a
                            class="text-dark text-primary-hover"
                            href="/"
                          >Lorem Ipsum Dolor sit Amet</a>
                        </h3>
                        <p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat.</p>
                        <a class="text-more-info text-primary-hover" href="/">Read more</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="margin">
                <div class="s-12 m-12 l-6">
                  <div class="image-border-radius margin-m-bottom">
                    <div class="margin">
                      <div class="s-12 m-12 l-4 margin-m-bottom">
                        <a class="image-hover-zoom" href="/">
                          <img src="img/blog-04.jpg" alt />
                        </a>
                      </div>
                      <div class="s-12 m-12 l-8 margin-m-bottom">
                        <h3>
                          <a
                            class="text-dark text-primary-hover"
                            href="/"
                          >Lorem Ipsum Dolor sit Amet</a>
                        </h3>
                        <p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat.</p>
                        <a class="text-more-info text-primary-hover" href="/">Read more</a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="s-12 m-12 l-6">
                  <div class="image-border-radius">
                    <div class="margin">
                      <div class="s-12 m-12 l-4 margin-m-bottom">
                        <a class="image-hover-zoom" href="/">
                          <img src="img/blog-02.jpg" alt />
                        </a>
                      </div>
                      <div class="s-12 m-12 l-8">
                        <h3>
                          <a
                            class="text-dark text-primary-hover"
                            href="/"
                          >Lorem Ipsum Dolor sit Amet</a>
                        </h3>
                        <p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat.</p>
                        <a class="text-more-info text-primary-hover" href="/">Read more</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="margin">
                <div class="s-12 m-12 l-6">
                  <div class="image-border-radius margin-m-bottom">
                    <div class="margin">
                      <div class="s-12 m-12 l-4 margin-m-bottom">
                        <a class="image-hover-zoom" href="/">
                          <img src="img/blog-01.jpg" alt />
                        </a>
                      </div>
                      <div class="s-12 m-12 l-8 margin-m-bottom">
                        <h3>
                          <a
                            class="text-dark text-primary-hover"
                            href="/"
                          >Lorem Ipsum Dolor sit Amet</a>
                        </h3>
                        <p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat.</p>
                        <a class="text-more-info text-primary-hover" href="/">Read more</a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="s-12 m-12 l-6">
                  <div class="image-border-radius">
                    <div class="margin">
                      <div class="s-12 m-12 l-4 margin-m-bottom">
                        <a class="image-hover-zoom" href="/">
                          <img src="img/blog-06.jpg" alt />
                        </a>
                      </div>
                      <div class="s-12 m-12 l-8">
                        <h3>
                          <a
                            class="text-dark text-primary-hover"
                            href="/"
                          >Lorem Ipsum Dolor sit Amet</a>
                        </h3>
                        <p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat.</p>
                        <a class="text-more-info text-primary-hover" href="/">Read more</a>
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
import { owlCarousel } from "../assets/js/template-scripts";
import { GET_SLIDER } from '../store/modules/dreadnought.store';
export default {
  name: "home",
  components: {
    Header,
    Footer
  },
  computed: {
    getSlider: function() {
      return this.$store.getters.getSlider;
    },
  },
  created(){
    this.$store.dispatch(GET_SLIDER);
  },
  mounted() {},
  updated() {
    this.initSlider();
  },
  methods: {
    initSlider(){
        owlCarousel();
    }
  }
};

</script>


<style scoped>
</style>