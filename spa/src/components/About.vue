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
          >{{this.content.title}}</h1>
        </header>
        <div class="section background-white">
          <div class="line" v-html="this.content.text">
           </div>
        </div>
      </article>
    </main>
    <Footer />
  </div>
</template>
<script>
import Header from "../components/blocks/Header";
import Footer from "../components/blocks/Footer";
import { GET_STATIC_CONTENT } from "../store/modules/dreadnought.store";
export default {
  name: "about",
  components: {
    Header,
    Footer
  },
  data() {
    return {
      title: "About",
      content: {}
    };
  },
  computed:{
    getStaticContent: function() {
      return this.$store.getters.getStaticContent;
    },
    currentRouteName() {
        return this.$route.path;
    }
  },
  async mounted() {
    await this.$store.dispatch(GET_STATIC_CONTENT, this.currentRouteName.replace(/\//g, ""));
    this.content = this.getStaticContent.data;
  }
};
</script>
<style scoped>
</style>