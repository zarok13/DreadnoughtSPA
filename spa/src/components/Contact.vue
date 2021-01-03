<template>
    <div>
        <Header />

        <!-- MAIN -->
        <main role="main">
            <!-- Content -->
            <article>
                <header class="section background-primary text-center">
                    <h1
                        class="text-white margin-bottom-0 text-size-50 text-thin text-line-height-1"
                    >
                        Contact US
                    </h1>
                </header>
                <div class="section background-white">
                    <div class="line">
                        <div class="margin">
                            <!-- Company Information -->
                            <div class="s-12 m-12 l-6">
                                <h2
                                    class="text-uppercase text-strong margin-bottom-30"
                                >
                                    Company Information
                                </h2>
                                <div class="float-left">
                                    <i
                                        class="icon-placepin background-primary icon-circle-small text-size-20"
                                    ></i>
                                </div>
                                <div class="margin-left-80 margin-bottom">
                                    <h4 class="text-strong margin-bottom-0">
                                        {{ this.getConfigs.translate.address }}
                                    </h4>
                                    <p>
                                        {{ this.getConfigs.params.address }}
                                        <span style="opacity: 0"><br />d</span>
                                    </p>
                                </div>
                                <div class="float-left">
                                    <i
                                        class="icon-paperplane_ico background-primary icon-circle-small text-size-20"
                                    ></i>
                                </div>
                                <div class="margin-left-80 margin-bottom">
                                    <h4 class="text-strong margin-bottom-0">
                                        {{ this.getConfigs.translate.email }}
                                    </h4>
                                    <p>
                                        {{ this.getConfigs.params.email }}
                                        <span style="opacity: 0"><br />d</span>
                                    </p>
                                </div>
                                <div class="float-left">
                                    <i
                                        class="icon-smartphone background-primary icon-circle-small text-size-20"
                                    ></i>
                                </div>
                                <div class="margin-left-80">
                                    <h4 class="text-strong margin-bottom-0">
                                        {{ this.getConfigs.translate.phone }}
                                    </h4>
                                    <p>
                                        {{ this.getConfigs.params.phone }}
                                    </p>
                                </div>
                            </div>
                            <!-- Contact Form -->
                            <div class="s-12 m-12 l-6">
                                <h2
                                    class="text-uppercase text-strong margin-bottom-30"
                                >
                                    Contact Us
                                </h2>
                                <h6
                                    v-if="configs.contact.errors.length"
                                    style="color: #4287f5"
                                >
                                    Please correct the following error(s):
                                </h6>
                                <ul>
                                    <li
                                        style="color: red"
                                        v-for="(error, index) in configs.contact
                                            .errors"
                                        :key="index"
                                    >
                                        {{ error }}
                                    </li>
                                </ul>
                                <div class="lds-ring" v-if="getLoader">
                                    <h2 style="color: yellow">Sending...</h2>
                                </div>
                                <form class="customform" @submit.prevent="sendMessage()">
                                    <div class="line">
                                        <div class="margin">
                                            <div class="s-12 m-12 l-6">
                                                <input
                                                    name="email"
                                                    v-model="
                                                        configs.contact.email
                                                    "
                                                    class="required email border-radius"
                                                    placeholder="Your e-mail"
                                                    title="Your e-mail"
                                                    type="text"
                                                />
                                            </div>
                                            <div class="s-12 m-12 l-6">
                                                <input
                                                    name="name"
                                                    v-model="
                                                        configs.contact.name
                                                    "
                                                    class="name border-radius"
                                                    placeholder="Your name"
                                                    title="Your name"
                                                    type="text"
                                                />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="s-12">
                                        <input
                                            name="subject"
                                            v-model="configs.contact.subject"
                                            class="subject border-radius"
                                            placeholder="Subject"
                                            title="Subject"
                                            type="text"
                                        />
                                    </div>
                                    <div class="s-12">
                                        <textarea
                                            name="text"
                                            v-model="configs.contact.text"
                                            class="required message border-radius"
                                            placeholder="Your message"
                                            rows="3"
                                        ></textarea>
                                    </div>
                                    <div class="s-12 m-12 l-4" v-if="!sended">
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
                </div>
            </article>
            <!-- MAP -->
            <div id="map">
                <MglMap
                    :accessToken="configs.accessToken"
                    :mapStyle.sync="configs.mapStyle"
                    @load="onMapLoaded"
                    :attributionControl="false"
                    :scrollZoom="false"
                >
                    <MglMarker
                        v-for="(item, index) in this.getMapbox.markers"
                        :key="index"
                        :coordinates="[item.lng, item.lat]"
                        color="green"
                    >
                    </MglMarker>
                    <MglNavigationControl position="top-right" />
                </MglMap>
            </div>
        </main>
        <Footer />
    </div>
</template>
<script>
import { mapGetters } from "vuex";
import { MglMap, MglMarker, MglNavigationControl } from "vue-mapbox";
import Header from "@/components/blocks/Header";
import Footer from "@/components/blocks/Footer";
import {
    GET_MAPBOX_DATA,
} from "@/store/modules/dreadnought.store";
import messageFormMixin from "../assets/js/messageFormMixin"

export default {
    name: "contact",
    mixins: [messageFormMixin],
    components: {
        Header,
        Footer,
        MglMap,
        MglMarker,
        MglNavigationControl
    },
    data() {
        return {
            type: 'contact'
        };
    },
    computed: {
        ...mapGetters({
            getConfigs: "getConfigs",
            getMapbox: "getMapbox",
            getLoader: "getLoader"
        })
    },
    mounted() {
        this.$store.dispatch(GET_MAPBOX_DATA);
    },
    methods: {
        onMapLoaded(event) {
            const asyncActions = event.component.actions;
            asyncActions.flyTo({
                center: [
                    this.getMapbox.mapCoordinates.lng,
                    this.getMapbox.mapCoordinates.lat
                ],
                zoom: this.getMapbox.mapCoordinates.zoom,
                speed: 1
            });
        }
    }
};
</script>
<style scoped>
#map {
    width: 100%;
    height: 300px;
}

.disabled {
    background-color: gray;
    cursor: context-menu;
}
</style>