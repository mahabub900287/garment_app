<script>
import { onMounted } from "vue";
import FrontendHeader from "@/Layouts/Frontend/Header.vue";
import FrontendFooter from "@/Layouts/Frontend/Footer.vue";
import "https://code.jquery.com/jquery-3.7.0.min.js";
import "https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js";
import "https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js";
import "https://unpkg.com/metismenu@3.0.7/dist/metisMenu.min.js";
import "/public/assets/front/js/main.js";
import "/public/assets/front/js/custom.js";

export default {
    components: { FrontendHeader, FrontendFooter },
    mounted() {},
};
</script>
<style>
@import "https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css";
@import "https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css";
@import "https://cdn.jsdelivr.net/npm/metismenu/dist/metisMenu.min.css";
@import "/public/assets/front/vendors/vendor-min.css";
@import "/public/assets/front/css/style.css";
@import "/public/assets/front/css/custom.css";
</style>
<template>
    <FrontendHeader />
    <slot name="main"></slot>
    <FrontendFooter />
</template>
