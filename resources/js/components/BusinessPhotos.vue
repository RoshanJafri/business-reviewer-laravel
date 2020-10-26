<template>
    <div class="guest-photos">
        <Swiper :images="images" />
        <p v-if="!images.length">No user provided images yet.</p>
        <a :href="url" class="button all-photos">View All</a>
    </div>
</template>

<script>
import Swiper from "./Swiper";

export default {
    props: {
        images: {
            type: Array,
            required: true
        },
        url: {
            type: String,
            required: true
        }
    },
    components: {
        Swiper
    }
};
</script>

<style scoped lang="scss"></style>
