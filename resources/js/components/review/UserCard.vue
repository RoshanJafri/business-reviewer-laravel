<template>
    <div class="flex items-start" style="width: 35% !important;">

        <img v-if="author.avatar" width="60"  class="rounded" :src="avatarUrl" :alt="`${author.name} ${author.surname}`" :title="`${author.name} ${author.surname}`">

        <img v-else
            :src="`https://ui-avatars.com/api/?name=${author.name}&color=7F9CF5&background=EBF4FF`"
            width="60"
            class="rounded"
            :alt="author.name"
        />



        <div class="ml-2">
            <h5>
                <strong>{{ author.name }}</strong>
            </h5>
            <p class="mb-1">{{ author.country }}, {{ author.city }}</p>
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

<style></style>
