<template>
  <div v-if="reviews.length">
    <h3 class="font-bold text-2xl mt-6 mb-4">Showcased Reviews</h3>
      <div v-if="reviews.length">
        <ul class="list showcased">
      <ShowcasedReview v-for="review in reviews" :review="review" :key="review.id" />
        </ul>
      </div>
  </div>
</template>

<script>
import ShowcasedReview from './review/ShowcasedReview.vue';
export default {
  components: {
    ShowcasedReview
  },
  props: {
    businessSlug:  {
      type: String,
      required: true,
    }
  },
  data() {
    return {
      reviews: []
    }
  }, 
  mounted() {
    axios.get(`/businesses/${this.businessSlug}/review/showcased`).then(res => {
      console.log(res.data.showcasedReviews);
      this.reviews = res.data.showcasedReviews;
    })
  }
}
</script>

<style>
  .showcased li {
    border: solid 1px goldenrod;
    padding: 30px;
  }
</style>