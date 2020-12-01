<template>
  <div>
    <Header/>

    <!-- MAIN -->
    <main role="main">
      <!-- Content -->
      <article>
        <header class="section background-primary text-center">
          <h1 class="text-white margin-bottom-0 text-size-50 text-thin text-line-height-1">Gallery</h1>
        </header>
        <div class="section background-white">
          <div class="line">
            <div class="margin">
              <div
                  v-for="(item, index) in this.getGallery.photos" :key="index" class="s-12 m-6 l-3">
                <div class="image-with-hover-overlay image-hover-zoom margin-bottom">
                  <div class="image-hover-overlay background-primary">
                    <div class="image-hover-overlay-content text-center padding-2x">
                      <p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie.</p>
                    </div>
                  </div>
                  <img
                      v-bind:src="configs.storageUrl + item.src"
                       title="Portfolio Image 1"/>
                </div>
              </div>
            </div>
          </div>
        </div>
      </article>
    </main>

    <Footer/>
  </div>
</template>
<script>
import {mapGetters} from 'vuex';
import Header from "@/components/blocks/Header";
import Footer from "@/components/blocks/Footer";
import {GET_GALLERY} from "@/store/modules/dreadnought.store";
import {configs} from "@/_data_models/configs_model";

export default {
  name: "gallery",
  data() {
    return {
      configs: configs,
    };
  },
  components: {
    Header,
    Footer
  },
  computed: {
    ...mapGetters({getGallery: "getGallery"})
  },
  mounted() {
    this.$store.dispatch(GET_GALLERY);
  }
};
</script>
<style scoped>
</style>