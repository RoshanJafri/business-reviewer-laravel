<template>
    <div class="guest-photos">
        <!-- <a href="#" class="button all-photos">View All</a> -->
        <Swiper :images="images" />
        <!-- <p>No user provided images yet.</p> -->
    </div>
</template>

<script>
import Swiper from "./Swiper";

export default {
    props: {
        images: {
            type: Array,
            required: true
        }
    },
    components: {
        Swiper
    }
};
</script>

<style scoped lang="scss"></style>
