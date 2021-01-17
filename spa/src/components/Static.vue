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
                        {{ this.getStaticContent.title }}
                    </h1>
                </header>
                <div class="section background-white">
                    <div class="line" v-html="this.getStaticContent.text"></div>
                </div>
            </article>
        </main>
        <Footer />
    </div>
</template>
<script>
import { mapGetters, mapActions, mapMutations } from "vuex";
import Header from "@/components/blocks/Header";
import Footer from "@/components/blocks/Footer";
import constants from "@/helpers/constants";

export default {
    name: "about",
    components: {
        Header,
        Footer
    },
    computed: {
        ...mapGetters({ getStaticContent: "getStaticContent" }),

        currentRouteName() {
            return this.$route.path.replace(/^\/|\/$/g, "");
        }
    },
    mounted() {
        this.setStatic([]);
        this.initStatic(this.currentRouteName);
    },
    methods: {
        ...mapActions({initStatic: constants.GET_STATIC_CONTENT}),
        ...mapMutations({setStatic: constants.SET_STATIC_CONTENT})
    }
};
</script>
<style scoped>
</style>