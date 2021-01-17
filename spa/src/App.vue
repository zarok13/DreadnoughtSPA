<template>
    <div id="app">
        <router-view :key="$route.fullPath" />
    </div>
</template>

<script>
import { mapActions } from "vuex";
import constants from "@/helpers/constants";

export default {
    name: "App",
    created() {
        this.initConfigs();
    },
    methods: {
        ...mapActions({ initConfigs: constants.GET_CONFIGS })
    }
};
</script>

<style>
@import "https://fonts.googleapis.com/css?family=Open+Sans:400,300,700,800&subset=latin,latin-ext";
@import "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css";
@import "./assets/css/components.css";
@import "./assets/css/icons.css";
@import "./assets/css/responsee.css";
@import "./assets/css/template-style.css";
</style>
