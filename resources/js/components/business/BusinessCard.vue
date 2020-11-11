<template>
    <div>
        <hr>
        <a :href="'businesses/'+ business.path ">
            <div class="business-cards">
                <div class="image-container">
                    <img :src="imageUrl">
                </div>
                <div class="right-side ml-3 ">
                    <h2 class="font-bold text-xl">{{ business.name }}</h2>
                    <BusinessCategories v-for="category in business.categories" :category="category" :key="category.id"></BusinessCategories>
                    <!--<x-star-rating :rating="business.average_review"   :small="true" />  -->
                    <p>{{business.description }}</p>
                </div>
            </div>
            
        </a>
    </div>
</template>
<style>

</style>
<script>
import BusinessCategories from "./BusinessCategories";

export default({
    props:['business'],
    components:{
        BusinessCategories,
    },
    computed:{
        imageUrl(){
            return window.location.origin+'/storage/'+this.business.front_image;
        }
    }
})
</script>