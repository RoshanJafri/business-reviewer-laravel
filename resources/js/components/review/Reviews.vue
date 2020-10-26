<template>
    <ul class="mt-5">
        <div v-if="reviews.length">
            <Review
                v-for="review in reviews"
                :key="review.id"
                :review="review"
            />
        </div>
        <p v-else class="text-gray-600">No reviews yet...</p>
    </ul>
</template>

<script>
import Review from "./Review";

export default {
    components: {
        Review
    },
    data() {
        return {
            loading: true,
            reviews: []
        };
    },
    mounted() {
        axios(`/businesses/${this.getLocationUrl("business")}/review`)
            .then(res => {
                this.reviews = res.data;
                this.loading = false;
            })
            .catch(err => {
                this.loading = false;
                this.error = "Coult not fetch reviews, please try refreshing!";
            });
    }
};
</script>

<style></style>
