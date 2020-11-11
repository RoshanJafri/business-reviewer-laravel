<template>
<div>
    <BusinessCard v-for="business in businesses" :key="business.id" :business="business"></BusinessCard>
</div>
</template>
<style>
</style>
<script>
import BusinessCard from "./BusinessCard";
export default{
    components:{
        BusinessCard,
    },
    data(){
        return{
            businesses:[],
        }
    },
    created(){
        this.fetchAll();
    },
    methods:{
        fetchAll(){
            axios.get('',{
                headers:{
                    Accepts:'application/json',
                }
            }).then(res=>{
                this.businesses = res.data;
            }).catch(error=>{
                console.log(error);
            })
        },
    }
}
</script>