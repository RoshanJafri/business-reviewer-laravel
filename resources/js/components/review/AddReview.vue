<template>
<div class="mt-5" id="add-review">
    <div class="py-4" v-if="user">
        <div class=" mt-2 flex">
            <UserCard :author="user" />
            <div class="w-full flex-1">
                <form @submit.prevent="submitReview" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <input type="file" name="image" accept="image/*" @change="uploadImage">
                    </div>

                    <div class="mb-3">
                        <select name="rating" class="block border-2 border-gray-200 rounded" v-model="rating">
                            <option :value="n" v-for="n in 5" :key="n">{{n}}</option>
                        </select>
                    </div>
                    <textarea name="body" id="" rows="5" v-model="body"
                        class="block w-full border-2 border-gray-300 rounded"></textarea>

                        <img :src="imageUrl" alt="" v-if="image" class="mt-4 rounded w-32">
           
                    <p class="text-sm text-red-400" v-if="error">{{error}}</p>
             
                    <button type="submit" class="bg-red-500 button text-white ml-auto mt-3">Submit Review</button>
                </form>
            </div>


        </div>
    </div>
    <p class="py-3" v-else>Sign in To Review This Business...</p>
</div>
</template>

<script>
import UserCard from './UserCard';
export default {
  props: {
    urlPath: {
      type: String,
      required: true
    },
  },
  data() {
    return {
      body: '',
      rating: 1,
      error: '',
      image: null, 
    }
  },
  components: {
    UserCard
  },
  computed: {
    user() {
     return currentUser;
    },
    imageUrl() {
      return URL.createObjectURL(this.image);
    }
  },
  methods: {
    submitReview() {
      if (!this.body) {
        return this.error = 'Please provide text when reviewing!';
      }
      axios.post(this.urlPath, {body, rating, image });
    },
    uploadImage(e) {
      this.imageUploaded = true;
      this.image = e.target.files[0];
    }
  }
}
</script>

<style>

</style>