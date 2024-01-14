<script setup>
import { onMounted } from "vue";
import FrontendLayout from "@/Layouts/FrontendLayout.vue";
import { Head, Link } from "@inertiajs/vue3";
onMounted(() => {

});
</script>
<template>
    <Head title="Home Page" />

    <FrontendLayout>
        <template #main>
                <h4>Home Page</h4>
        </template>
    </FrontendLayout>
</template>
