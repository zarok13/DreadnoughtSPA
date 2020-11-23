<template>
  <div id="app">
    <router-view :key="$route.fullPath"/>
  </div>
</template>

<script>
// import {GET_CONFIGS} from "@/store/modules/dreadnought.store";

let jQuery = require("jquery");
window.jQuery = jQuery;
window.$ = jQuery;
require("./assets/js/responsee");
require("./assets/owl-carousel/owl.carousel");
export default {
  name: "App",
  // async beforeCreate() {
    // await this.$store.dispatch(GET_CONFIGS)
  // },
};
</script>

<style>
@import "http://fonts.googleapis.com/css?family=Open+Sans:400,300,700,800&subset=latin,latin-ext";
@import "./assets/css/components.css";
@import "./assets/css/icons.css";
@import "./assets/css/responsee.css";
@import "./assets/owl-carousel/owl.carousel.css";
@import "./assets/owl-carousel/owl.theme.css";
@import "./assets/css/template-style.css";
</style>
