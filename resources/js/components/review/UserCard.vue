<template>
    <div class="flex items-start user-card">

        <img v-if="author.avatar" width="60"  class="rounded reviewer-avatar" :src="avatarUrl" :alt="`${author.name} ${author.surname}`" >

        <img v-else
            :src="`https://ui-avatars.com/api/?name=${author.name}&color=7F9CF5&background=EBF4FF`"
            class="rounded"
            :alt="author.name"
        />



        <div class="ml-2 flex flex-1 justify-between items-center lg:block mb-5 lg:mb-0">
            <div>
                <h5>
                <strong>{{ author.name }}</strong>
            </h5>
            <p class="mb-1">{{ author.country }}, {{ author.city }}</p>
            </div>

           <div>
                <p class="text-xs flex items-center ">
                <img
                    :src="getAsset('images', 'thumbs-up.svg')"
                    alt="review icon"
                    class="mr-1"
                />{{ author.review_count }} Reviews
            </p>

        
            <p class=" text-xs flex items-center">
                <img
                    :src="getAsset('images', 'review-icon.svg')"
                    alt="review icon"
                    class="mr-1"
                />{{ author.average_rating }}
                Avg. Rating
            </p>
           </div>

        </div>
    </div>
</template>

<script>
export default {
    props: {
        author: {
            type: Object,
            required: true
        },
    },
    computed: {
            avatarUrl() {
                return `${window.location.origin}/storage/${this.author.avatar.image_path}`;
            }
        }
};
</script>

<style scoped>
.user-card {
    width: 100%;
}
.reviewer-avatar {
    height: 60px;
    width: 60px;
    object-fit: cover;
}

@media only screen and (min-width: 1024px) {
    .user-card {
    width: 35%;
}
}
</style>
