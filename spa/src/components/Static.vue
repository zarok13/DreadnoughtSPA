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
import {mapGetters} from 'vuex';
import Header from "@/components/blocks/Header";
import Footer from "@/components/blocks/Footer";
import {GET_STATIC_CONTENT, SET_STATIC_CONTENT} from "@/store/modules/dreadnought.store";

export default {
    name: "about",
    components: {
        Header,
        Footer
    },
    computed: {
        ...mapGetters({getStaticContent: 'getStaticContent'}),
        currentRouteName() {
            return this.$route.path.replace(/^\/|\/$/g, '');
        }
    },
   
   
    mounted() {
        this.$store.commit(SET_STATIC_CONTENT, []);
        this.$store.dispatch(GET_STATIC_CONTENT, this.currentRouteName);        
    }
};
</script>
<style scoped>
</style>