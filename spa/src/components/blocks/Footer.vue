<template>
    <div>
        <!-- FOOTER -->
        <footer>
            <!-- Social -->
            <div class="background-primary padding text-center">
                <a
                    v-bind:href="this.getConfigs.params.facebook_url"
                    target="_blank"
                >
                    <i class="icon-facebook_circle icon2x text-white"></i>
                </a>
                <a
                    v-bind:href="this.getConfigs.params.twitter_url"
                    target="_blank"
                >
                    <i class="icon-twitter_circle icon2x text-white"></i>
                </a>
                <a
                    v-bind:href="this.getConfigs.params.instagram_url"
                    target="_blank"
                >
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
                                {{
                                    this.getConfigs.translate
                                        .footer_our_philosophy
                                }}
                            </h4>
                            <p class="text-size-20">
                                <em>
                                    "{{ this.getConfigs.params.footer_quote }}"
                                </em>
                            </p>
                            <p></p>
                            <div class="line">
                                <h4
                                    class="text-uppercase text-strong margin-top-30"
                                >
                                    {{
                                        this.getConfigs.translate
                                            .about_our_company
                                    }}
                                </h4>
                                <div class="margin">
                                    <div class="s-12 m-12 l-4 margin-m-bottom">
                                        <a
                                            class="image-hover-zoom"
                                            href="javascript:void(0)"
                                        >
                                            <img
                                                v-if="
                                                    this.getConfigs.params
                                                        .footer_image
                                                "
                                                v-bind:src="
                                                    configs.storageUrl +
                                                        this.getConfigs.params
                                                            .footer_image
                                                "
                                            />
                                        </a>
                                    </div>
                                    <div class="s-12 m-12 l-8 margin-m-bottom">
                                        <p>
                                            {{
                                                this.getConfigs.params
                                                    .footer_desc
                                            }}
                                        </p>
                                        <router-link
                                            class="text-more-info text-primary-hover"
                                            to="/contacts"
                                            >Read more
                                        </router-link>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Collumn 2 -->
                        <div class="s-12 m-12 l-4 margin-m-bottom-2x">
                            <h4 class="text-uppercase text-strong">
                                {{ this.getConfigs.translate.contact_us }}
                            </h4>
                            <div class="line">
                                <div class="s-1 m-1 l-1 text-center">
                                    <i
                                        class="icon-placepin text-primary text-size-12"
                                    ></i>
                                </div>
                                <div class="s-11 m-11 l-11 margin-bottom-10">
                                    <p>
                                        <b
                                            >{{
                                                this.getConfigs.translate
                                                    .address
                                            }}:</b
                                        >
                                        {{ this.getConfigs.params.address }}
                                    </p>
                                </div>
                            </div>
                            <div class="line">
                                <div class="s-1 m-1 l-1 text-center">
                                    <i
                                        class="icon-mail text-primary text-size-12"
                                    ></i>
                                </div>
                                <div class="s-11 m-11 l-11 margin-bottom-10">
                                    <p>
                                        <a
                                            :href="
                                                'mailto:' +
                                                    this.getConfigs.params.email
                                            "
                                            class="text-primary-hover"
                                        >
                                            <b
                                                >{{
                                                    this.getConfigs.translate
                                                        .email
                                                }}:</b
                                            >
                                            {{ this.getConfigs.params.email }}
                                        </a>
                                    </p>
                                </div>
                            </div>
                            <div class="line">
                                <div class="s-1 m-1 l-1 text-center">
                                    <i
                                        class="icon-smartphone text-primary text-size-12"
                                    ></i>
                                </div>
                                <div class="s-11 m-11 l-11 margin-bottom-10">
                                    <p>
                                        <b
                                            >{{
                                                this.getConfigs.translate.phone
                                            }}:</b
                                        >
                                        {{ this.getConfigs.params.phone }}
                                    </p>
                                </div>
                            </div>
                            <div class="line">
                                <div class="s-1 m-1 l-1 text-center">
                                    <i
                                        class="icon-twitter text-primary text-size-12"
                                    ></i>
                                </div>
                                <div class="s-11 m-11 l-11 margin-bottom-10">
                                    <p>
                                        <a
                                            :href="
                                                this.getConfigs.params
                                                    .twitter_url
                                            "
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
                                    <i
                                        class="icon-facebook text-primary text-size-12"
                                    ></i>
                                </div>
                                <div class="s-11 m-11 l-11">
                                    <p>
                                        <a
                                            :href="
                                                this.getConfigs.params
                                                    .facebook_url
                                            "
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
                            <h4 class="text-uppercase text-strong">
                                Leave a Message
                            </h4>
                            <h6
                                v-if="configs.footer.errors.length"
                                style="color: #4287f5"
                            >
                                Please correct the following error(s):
                            </h6>
                            <ul>
                                <li
                                    style="color: red"
                                    v-for="(error, index) in configs.footer
                                        .errors"
                                    :key="index"
                                >
                                    {{ error }}
                                </li>
                            </ul>
                            <div class="lds-ring" v-if="this.getLoader">
                                <h2 style="color: yellow">Sending...</h2>
                            </div>
                            <form
                                @submit.prevent="sendMessage()"
                                class="customform text-white"
                            >
                                <div class="line">
                                    <div class="margin">
                                        <div class="s-12 m-12 l-6">
                                            <input
                                                name="email"
                                                v-model="configs.footer.email"
                                                class="required email border-radius"
                                                placeholder="Your e-mail"
                                                title="Your e-mail"
                                                type="text"
                                            />
                                        </div>
                                        <div class="s-12 m-12 l-6">
                                            <input
                                                name="name"
                                                v-model="configs.footer.name"
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
                                        v-model="configs.footer.text"
                                        class="required message border-radius"
                                        placeholder="Your message"
                                        rows="6"
                                        style="resize: none;"
                                    ></textarea>
                                </div>
                                <div class="s-12" v-if="!sended">
                                    <button
                                        type="submit"
                                        :class="
                                            !this.getLoader
                                                ? 'submit-form button background-primary border-radius text-white'
                                                : 'submit-form button disabled border-radius text-white'
                                        "
                                        :disabled="this.getLoader"
                                    >
                                        Send Message
                                    </button>
                                </div>
                                <div class="s-12" v-else>
                                    <button
                                        class="submit-form button disabled border-radius text-white"
                                        disabled
                                    >
                                        Message sent!
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
                            All images have been purchased from Bigstock. Do not
                            use the images in your website.
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
import messageFormMixin from "../../assets/js/messageFormMixin"
import { mapGetters } from "vuex";
export default {
    name: "footer_block",
    mixins: [messageFormMixin],
    data() {
        return {
            type: "footer"
        };
    },
    computed: {
        ...mapGetters({ getConfigs: "getConfigs", getLoader: "getLoader" })
    },
};
</script>
<style scoped>
.disabled {
    background-color: gray;
    cursor: context-menu;
}
</style>
