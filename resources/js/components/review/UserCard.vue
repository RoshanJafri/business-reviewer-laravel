<template>
    <div class="flex items-start" style="width: 35% !important;">
        <img
            :src="`https://www.gravatar.com/avatar/{{ ${author.email} }}?s=60`"
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
        }
    }
};
</script>

<style></style>
