<template>
    <div class="stars-container flex my-3" :title="rating">
        <img
            :src="getAsset('images', 'star-full.svg')"
            class="rating-stars"
            :class="small ? 'stars-small' : ''"
            alt="Full star rating"
            v-for="n in fullStars"
            :key="n"
        />

        <img
            v-for="n in emptyStars"
            :key="n + 5"
            :src="getAsset('images', 'star-empty.svg')"
            alt="Empty star rating"
            class="rating-stars"
            :class="small ? 'stars-small' : ''"
        />

        <span class="ml-1" :class="small ? 'text-sm' : 'text-md'">
            {{ parseDate }}
        </span>
    </div>
</template>

<script>
export default {
    data() {
        return {
            fullStars: 0,
            emptyStars: 0
        };
    },
    props: {
        rating: {
            type: Number,
            required: true
        },
        createdAt: {
            type: String,
            required: false
        },
        small: {
            type: Boolean,
            required: false
        }
    },
    mounted() {
        this.fullStars = this.rating;
        this.emptyStars = 5 - this.rating;
    },
    computed: {
        parseDate() {
            return new Date(this.createdAt).toLocaleString();
        }
    }
};
</script>

<style></style>
