<template>
    <li class="mb-2 rounded">
        <div class="lg:flex w-full">
            <UserCard :author="reviewData.author" />
            <div class="flex-1 items-between">
                <div class="flex justify-between">
                    <StarRating
                        :rating="reviewData.rating"
                        :createdAt="reviewData.created_at"
                        :small="true"
                    />
                </div>
                <p>{{ reviewData.body }}</p>
                </div>
            </div>
    </li>
</template>

<script>
import StarRating from "../StarRating.vue";
import UserCard from "./UserCard.vue";

export default {
    components: {
        StarRating,
        UserCard,
    },
    data() {
        return {
            reviewData: this.review,
            isShowcased: this.review.showcased,
            showImage: false,
            replyInput: ''
        }
    },
    props: {
        review: {
            type: Object,
            required: true
        },
        currentUserIsOwner: {
            type: Boolean,
            required: true
        }
    },
    methods: {
        addShowcase() {
            axios.post(`/reviews/${this.reviewData.id}/showcase`).then(() => {
                this.refreshCurrentReview();
                this.isShowcased = true;
            });
        },
        removeShowcase() {
             axios.post(`/reviews/${this.reviewData.id}/showcase/remove`).then(() => {
                 this.refreshCurrentReview();
                 this.isShowcased = false;
             });
        }
    },
};
</script>

<style></style>
