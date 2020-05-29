<template>
  <div>
    <!-- FOOTER -->
    <footer>
      <!-- Social -->
      <div class="background-primary padding text-center">
        <a href="https://facebook.com" target="_blank">
          <i class="icon-facebook_circle icon2x text-white"></i>
        </a>
        <a href="https://twitter.com" target="_blank">
          <i class="icon-twitter_circle icon2x text-white"></i>
        </a>
        <a href="https://instagram.com" target="_blank">
          <i class="icon-instagram_circle icon2x text-white"></i>
        </a>
      </div>

      <!-- Main Footer -->
      <section class="section background-dark">
        <div class="line">
          <div class="margin">
            <!-- Collumn 1 -->
            <div class="s-12 m-12 l-4 margin-m-bottom-2x">
              <h4 class="text-uppercase text-strong">{{getFooter.data.title1}}</h4>
              <p class="text-size-20">
                <em>
                  "{{getFooter.data.quote}}"
                </em>
              </p>
              <p></p>
              <div class="line">
                <h4 class="text-uppercase text-strong margin-top-30">{{getFooter.data.title2}}</h4>
                <div class="margin">
                  <div class="s-12 m-12 l-4 margin-m-bottom">
                    <a class="image-hover-zoom" href="javascript:void(0)">
                      <img v-bind:src="getFooter.data.image" alt />
                    </a>
                  </div>
                  <div class="s-12 m-12 l-8 margin-m-bottom">
                    <p>{{getFooter.data.desc}}</p>
                    <router-link class="text-more-info text-primary-hover" to="/contacts">Read more</router-link>
                  </div>
                </div>
              </div>
            </div>

            <!-- Collumn 2 -->
            <div class="s-12 m-12 l-4 margin-m-bottom-2x">
              <h4 class="text-uppercase text-strong">{{getFooter.data.contactUs}}</h4>
              <div class="line">
                <div class="s-1 m-1 l-1 text-center">
                  <i class="icon-placepin text-primary text-size-12"></i>
                </div>
                <div class="s-11 m-11 l-11 margin-bottom-10">
                  <p>
                    <b>{{getFooter.data.address}}:</b> {{getFooter.data.addressValue}}
                  </p>
                </div>
              </div>
              <div class="line">
                <div class="s-1 m-1 l-1 text-center">
                  <i class="icon-mail text-primary text-size-12"></i>
                </div>
                <div class="s-11 m-11 l-11 margin-bottom-10">
                  <p>
                    <a :href="'mailto:'+getFooter.data.emailValue" class="text-primary-hover">
                      <b>{{getFooter.data.email}}:</b> {{getFooter.data.emailValue}}
                    </a>
                  </p>
                </div>
              </div>
              <div class="line">
                <div class="s-1 m-1 l-1 text-center">
                  <i class="icon-smartphone text-primary text-size-12"></i>
                </div>
                <div class="s-11 m-11 l-11 margin-bottom-10">
                  <p>
                    <b>{{getFooter.data.phone}}:</b> {{getFooter.data.phoneValue}}
                  </p>
                </div>
              </div>
              <div class="line">
                <div class="s-1 m-1 l-1 text-center">
                  <i class="icon-twitter text-primary text-size-12"></i>
                </div>
                <div class="s-11 m-11 l-11 margin-bottom-10">
                  <p>
                    <a :href="getFooter.data.twitterUrl" target="_blank" class="text-primary-hover">
                      <b>Twitter</b>
                    </a>
                  </p>
                </div>
              </div>
              <div class="line">
                <div class="s-1 m-1 l-1 text-center">
                  <i class="icon-facebook text-primary text-size-12"></i>
                </div>
                <div class="s-11 m-11 l-11">
                  <p>
                    <a :href="getFooter.data.facebookUrl" target="_blank" class="text-primary-hover">
                      <b>Facebook</b>
                    </a>
                  </p>
                </div>
              </div>
            </div>

            <!-- Collumn 3 -->
            <div class="s-12 m-12 l-4">
              <h4 class="text-uppercase text-strong">Leave a Message</h4>
              <form class="customform text-white">
                <div class="line">
                  <div class="margin">
                    <div class="s-12 m-12 l-6">
                      <input
                        name="email"
                        class="required email border-radius"
                        placeholder="Your e-mail"
                        title="Your e-mail"
                        type="text"
                      />
                    </div>
                    <div class="s-12 m-12 l-6">
                      <input
                        name="name"
                        class="name border-radius"
                        placeholder="Your name"
                        title="Your name"
                        type="text"
                      />
                    </div>
                  </div>
                </div>
                <div class="s-12">
                  <textarea
                    name="message"
                    class="required message border-radius"
                    placeholder="Your message"
                    rows="3"
                  ></textarea>
                </div>
                <div class="s-12">
                  <button
                    class="submit-form button background-primary border-radius text-white"
                    type="submit"
                  >Submit Button</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </section>
      <hr class="break margin-top-bottom-0" style="border-color: rgba(0, 38, 51, 0.80);" />

      <!-- Bottom Footer -->
      <section class="padding background-dark">
        <div class="line">
          <div class="s-12 l-6">
            <p class="text-size-12">Copyright 2019, Vision Design - graphic zoo</p>
            <p
              class="text-size-12"
            >All images have been purchased from Bigstock. Do not use the images in your website.</p>
          </div>
          <div class="s-12 l-6">
            <a
              class="right text-size-12"
              href="http://www.myresponsee.com"
              title="Responsee - lightweight responsive framework"
            >
              Design and coding
              <br />by Responsee Team
            </a>
          </div>
        </div>
      </section>
    </footer>
  </div>
</template>
<script>
import { API_URL, GET_FOOTER } from "../../store/modules/dreadnought.store";

export default {
  name: "footer_block",
  data() {
    return {
      apiUrl: API_URL
    }
  },
  computed: {
    getFooter: function() {
      return this.$store.getters.getFooter;
    },
  },
  mounted() {
    this.$store.dispatch(GET_FOOTER);
  },
  //   data() {
  //     return {
  //       title: "Gallery"
  //     };
  //   }
};
</script>
<style scoped>
</style>
