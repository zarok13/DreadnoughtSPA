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
              <h4 class="text-uppercase text-strong">{{footerData.title1}}</h4>
              <p class="text-size-20">
                <em>
                  "{{footerData.quote}}"
                </em>
              </p>
              <p></p>
              <div class="line">
                <h4 class="text-uppercase text-strong margin-top-30">{{footerData.title2}}</h4>
                <div class="margin">
                  <div class="s-12 m-12 l-4 margin-m-bottom">
                    <a class="image-hover-zoom" href="javascript:void(0)">
                      <img v-bind:src="footerData.image" alt />
                    </a>
                  </div>
                  <div class="s-12 m-12 l-8 margin-m-bottom">
                    <p>{{footerData.desc}}</p>
                    <router-link class="text-more-info text-primary-hover" to="/contacts">Read more</router-link>
                  </div>
                </div>
              </div>
            </div>

            <!-- Collumn 2 -->
            <div class="s-12 m-12 l-4 margin-m-bottom-2x">
              <h4 class="text-uppercase text-strong">{{footerData.contactUs}}</h4>
              <div class="line">
                <div class="s-1 m-1 l-1 text-center">
                  <i class="icon-placepin text-primary text-size-12"></i>
                </div>
                <div class="s-11 m-11 l-11 margin-bottom-10">
                  <p>
                    <b>{{footerData.address}}:</b> {{footerData.addressValue}}
                  </p>
                </div>
              </div>
              <div class="line">
                <div class="s-1 m-1 l-1 text-center">
                  <i class="icon-mail text-primary text-size-12"></i>
                </div>
                <div class="s-11 m-11 l-11 margin-bottom-10">
                  <p>
                    <a :href="'mailto:'+footerData.emailValue" class="text-primary-hover">
                      <b>{{footerData.email}}:</b> {{footerData.emailValue}}
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
                    <b>{{footerData.phone}}:</b> {{footerData.phoneValue}}
                  </p>
                </div>
              </div>
              <div class="line">
                <div class="s-1 m-1 l-1 text-center">
                  <i class="icon-twitter text-primary text-size-12"></i>
                </div>
                <div class="s-11 m-11 l-11 margin-bottom-10">
                  <p>
                    <a :href="footerData.twitterUrl" target="_blank" class="text-primary-hover">
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
                    <a :href="footerData.facebookUrl" target="_blank" class="text-primary-hover">
                      <b>Facebook</b>
                    </a>
                  </p>
                </div>
              </div>
            </div>

            <!-- Collumn 3 -->
            <div class="s-12 m-12 l-4">
              <h4 class="text-uppercase text-strong">Leave a Message</h4>
              <h6 v-if="errors.length" style="color:#4287f5">Please correct the following error(s):</h6>
              <ul>
                <li style="color:red" v-for="(error, index) in errors" :key="index">{{ error }}</li>
              </ul>
              <form 
                id="app"
                class="customform text-white"
                @submit="validateForm"
                :action="apiUrl + '/footer'"
                method="POST"
              >
                <div class="line">
                  <div class="margin">
                    <div class="s-12 m-12 l-6">
                      <input
                        name="email"
                        v-model="email"
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
                    v-model="message"
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
import { API_URL, GET_FOOTER, SEND_MAIL } from "../../store/modules/dreadnought.store";
import { footerData } from "../../_data_models/footer_model";

export default {
  name: "footer_block",
  data() {
    return {
      apiUrl: API_URL,
      footerData: footerData,
      errors: [],
      email: null,
      message: null,
    }
  },
  computed: {
    getFooter: function() {
      return this.$store.getters.getFooter;
    },
  },
  async mounted() {
    await this.$store.dispatch(GET_FOOTER);
    this.initData();
  },
  methods: {
    validateForm(e) {
      e.preventDefault();
      this.errors = [];

      if (!this.email) {
        this.errors.push('Email required.');
      } else if (!this.validEmail(this.email)) {
        this.errors.push('Valid email required.');
      }

      if (!this.message) {
        this.errors.push('Message required.');
      }


      if (!this.errors.length) {
        this.sendMail();
      }

      
    },
    validEmail: function (email) {
      var re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
      return re.test(email);
    },
    sendMail() {
      this.$store.dispatch(SEND_MAIL);
    },
    initData() {
      footerData.title1 = this.getFooter.data.title1;
      footerData.title2 = this.getFooter.data.title2;
      footerData.quote = this.getFooter.data.quote;
      footerData.image = this.getFooter.data.image;
      footerData.desc = this.getFooter.data.desc;
      footerData.contactUs = this.getFooter.data.contactUs;
      footerData.address = this.getFooter.data.address;
      footerData.addressValue = this.getFooter.data.addressValue;
      footerData.email = this.getFooter.data.email;
      footerData.emailValue = this.getFooter.data.emailValue;
      footerData.phone = this.getFooter.data.phone;
      footerData.phoneValue = this.getFooter.data.phoneValue;
      footerData.twitterUrl = this.getFooter.data.twitterUrl;
      footerData.facebookUrl = this.getFooter.data.facebookUrl;
    }
  }
};
</script>
<style scoped>
</style>
