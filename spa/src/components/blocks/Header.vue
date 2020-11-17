<template>
  <div>
    <!-- PREMIUM FEATURES BUTTON -->
    <a
        target="_blank"
        class="hide-s"
        href="../template/prospera-premium-responsive-business-template/"
        style="position:fixed;top:120px;right:-14px;z-index:10;"
    >
      <img src="img/premium-features.png" alt/>
    </a>
    <!-- HEADER -->
    <header role="banner">
      <!-- Top Bar -->
      <div class="top-bar background-white">
        <div class="line">
          <div class="s-12 m-6 l-6">
            <div class="top-bar-contact">
              <p class="text-size-12">
                Contact Us: 0800 200 200 |
                <a
                    class="text-orange-hover"
                    href="mailto:contact@sampledomain.com"
                >contact@sampledomain.com</a>
              </p>
            </div>
          </div>
          <div class="s-12 m-6 l-6">
            <div class="right">
              <ul class="top-bar-social right">
                <li>
                  <a href="https://facebook.com">
                    <i class="icon-facebook_circle text-orange-hover"></i>
                  </a>
                </li>
                <li>
                  <a href="https://twitter.com">
                    <i class="icon-twitter_circle text-orange-hover"></i>
                  </a>
                </li>
                <li>
                  <a href="https://instagram.com">
                    <i class="icon-instagram_circle text-orange-hover"></i>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>

      <!-- Top Navigation -->
      <nav class="background-white background-primary-hightlight">
        <div class="line">
          <div class="s-12 l-2">
            <router-link class="logo" to="/">
              <img src="../../assets/img/logo-free.png" alt/>
            </router-link>
          </div>
          <div class="top-nav s-12 l-10">
            <p class="nav-text"></p>
            <tree-menu :nodes="this.getApiRoutes[0]" is-first></tree-menu>
          </div>
        </div>
      </nav>
    </header>
  </div>
</template>
<script>
import TreeMenu from './TreeMenu.vue';

export default {
  name: "header_block",
  components: {
    TreeMenu
  },
  computed: {
    getApiRoutes: function () {
      return this.$store.getters.getApiRoutes;
    }
  },
  mounted() {
    // console.log(this.$renderRoutes);
    // console.log(this.getApiRoutes);
  }
};
</script>
<style scoped>
</style>