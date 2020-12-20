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
                        Free Responsive Template
                    </h1>
                </header>
                <div class="section background-white">
                    <div class="line">
                        <div class="margin text-center">
                            <div
                                v-for="(item, index) in this.getProducts"
                                :key="index"
                                class="s-12 m-12 l-4 margin-bottom"
                            >
                                <div
                                    class="padding-2x block-bordered border-radius"
                                >
                                    <i
                                        :class="
                                            'fas ' +
                                                item.icon +
                                                ' icon2x text-primary margin-bottom-30'
                                        "
                                    ></i>
                                    <h2 class="text-thin">{{ item.title }}</h2>
                                    <p class="margin-bottom-30">
                                        {{ item.desc }}
                                    </p>
                                    <router-link
                                        class="button border-radius background-primary text-size-12 text-white text-strong"
                                        :to="$route.path + '/' + item.slug"
                                        >GET MORE INFO</router-link
                                    >
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </article>
        </main>

        <Footer />
    </div>
</template>
<script>
import { mapGetters } from "vuex";
import { GET_PRODUCTS } from "@/store/modules/dreadnought.store";
import Header from "@/components/blocks/Header";
import Footer from "@/components/blocks/Footer";

export default {
    name: "products",
    data() {
        return {
            configs: this.$configs
        };
    },
    components: {
        Header,
        Footer
    },
    computed: {
        ...mapGetters({ getProducts: "getProducts" })
    },
    mounted() {
        this.$store.dispatch(GET_PRODUCTS);
    }
};
</script>
<style scoped>
</style>