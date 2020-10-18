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
              <h4 class="text-uppercase text-strong">
                {{ this.configs.translate.footer_our_philosophy }}
              </h4>
              <p class="text-size-20">
                <em> "{{ this.configs.params.footer_quote }}" </em>
              </p>
              <p></p>
              <div class="line">
                <h4 class="text-uppercase text-strong margin-top-30">
                  {{ this.configs.translate.about_our_company }}
                </h4>
                <div class="margin">
                  <div class="s-12 m-12 l-4 margin-m-bottom">
                    <a class="image-hover-zoom" href="javascript:void(0)">
                      <img
                        v-bind:src="
                          this.configs.storageURL +
                          this.configs.params.footer_image
                        "
                        alt
                      />
                    </a>
                  </div>
                  <div class="s-12 m-12 l-8 margin-m-bottom">
                    <p>{{ this.configs.params.footer_desc }}</p>
                    <router-link
                      class="text-more-info text-primary-hover"
                      to="/contacts"
                      >Read more</router-link
                    >
                  </div>
                </div>
              </div>
            </div>

            <!-- Collumn 2 -->
            <div class="s-12 m-12 l-4 margin-m-bottom-2x">
              <h4 class="text-uppercase text-strong">
                {{ this.configs.translate.contact_us }}
              </h4>
              <div class="line">
                <div class="s-1 m-1 l-1 text-center">
                  <i class="icon-placepin text-primary text-size-12"></i>
                </div>
                <div class="s-11 m-11 l-11 margin-bottom-10">
                  <p>
                    <b>{{ this.configs.translate.address }}:</b>
                    {{ this.configs.params.addressValue }}
                  </p>
                </div>
              </div>
              <div class="line">
                <div class="s-1 m-1 l-1 text-center">
                  <i class="icon-mail text-primary text-size-12"></i>
                </div>
                <div class="s-11 m-11 l-11 margin-bottom-10">
                  <p>
                    <a
                      :href="'mailto:' + this.configs.params.emailValue"
                      class="text-primary-hover"
                    >
                      <b>{{ this.configs.translate.email }}:</b> {{ this.configs.params.emailValue }}
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
                    <b>{{ this.configs.translate.phone }}:</b> {{ this.configs.params.phoneValue }}
                  </p>
                </div>
              </div>
              <div class="line">
                <div class="s-1 m-1 l-1 text-center">
                  <i class="icon-twitter text-primary text-size-12"></i>
                </div>
                <div class="s-11 m-11 l-11 margin-bottom-10">
                  <p>
                    <a
                      :href="this.configs.params.twitterUrl"
                      target="_blank"
                      class="text-primary-hover"
                    >
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
                    <a
                      :href="this.configs.params.facebookUrl"
                      target="_blank"
                      class="text-primary-hover"
                    >
                      <b>Facebook</b>
                    </a>
                  </p>
                </div>
              </div>
            </div>

            <!-- Collumn 3 -->
            <div class="s-12 m-12 l-4">
              <h4 class="text-uppercase text-strong">Leave a Message</h4>
              <h6 v-if="errors.length" style="color: #4287f5">
                Please correct the following error(s):
              </h6>
              <ul>
                <li
                  style="color: red"
                  v-for="(error, index) in errors"
                  :key="index"
                >
                  {{ error }}
                </li>
              </ul>
              <div class="lds-ring" v-if="getLoader">
                <h2 style="color: yellow">Sending...</h2>
              </div>
              <form class="customform text-white">
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
                        v-model="name"
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
                    name="text"
                    v-model="text"
                    class="required message border-radius"
                    placeholder="Your message"
                    rows="3"
                  ></textarea>
                </div>
                <div class="s-12">
                  <button
                    :class="
                      !getLoader
                        ? 'submit-form button background-primary border-radius text-white'
                        : 'submit-form button disabled border-radius text-white'
                    "
                    :disabled="getLoader"
                    @click.prevent="sendMessage()"
                  >
                    Submit Button
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </section>
      <hr
        class="break margin-top-bottom-0"
        style="border-color: rgba(0, 38, 51, 0.8)"
      />

      <!-- Bottom Footer -->
      <section class="padding background-dark">
        <div class="line">
          <div class="s-12 l-6">
            <p class="text-size-12">
              Copyright 2019, Vision Design - graphic zoo
            </p>
            <p class="text-size-12">
              All images have been purchased from Bigstock. Do not use the
              images in your website.
            </p>
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
import { mapGetters } from "vuex";
import {
  API_URL,
  GET_CONFIGS,
  SEND_MAIL,
  SET_LOADER,
} from "../../store/modules/dreadnought.store";
import { configs } from "../../_data_models/configs_model";

export default {
  name: "footer_block",
  data() {
    return {
      apiUrl: API_URL,
      configs: configs,
      errors: [],
      loading: false,
    };
  },
  computed: {
    ...mapGetters({ getConfigs: "getConfigs" }),
    getLoader: function () {
      return this.$store.getters.getLoader;
    },
  },
  async mounted() {
    await this.$store.dispatch(GET_CONFIGS);
    await this.initData();
    console.log(this.configs);
  },
  methods: {
    async initData() {
      this.configs = this.getConfigs.configs;
    },
    sendMessage() {
      if (!this.validateForm().length) {
        var formData = { email: this.email, name: this.name, text: this.text };
        this.send(formData);
      }
    },
    validateForm() {
      this.errors = [];
      if (!this.email) {
        this.errors.push("Email required.");
      } else if (!this.validEmail(this.email)) {
        this.errors.push("Valid email required.");
      }

      if (!this.text) {
        this.errors.push("Message required.");
      }
      return this.errors;
    },
    validEmail: function (email) {
      var re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
      return re.test(email);
    },
    async send(formData) {
      const dataForm = new FormData();
      dataForm.append("email", formData.email);
      dataForm.append("name", formData.name);
      dataForm.append("text", formData.text);
      this.$store.commit(SET_LOADER, true);
      await this.$store.dispatch(SEND_MAIL, dataForm);
      this.$store.commit(SET_LOADER, false);
    },
  },
};
</script>
<style scoped>
.disabled {
  background-color: gray;
  cursor: context-menu;
}
</style>
