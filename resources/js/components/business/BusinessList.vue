<template>
<div>
    <div>
        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="search-input" v-model="search_input" type="text" placeholder="Type here to search for a business..." @keyup="keyPressed(search_input)">
    </div>
    <br>
    <div style="position:relative;min-height:100px">
        <div v-bind:class="[{loading: listLoading}]"></div>
        <BusinessCard v-for="business in businesses" :key="business.id" :business="business"></BusinessCard>
    </div>
</div>
</template>
<style >
.loading{
    position: absolute;
    top:0;
    left: 0;
    z-index: 9;
    width: 100%;
    height:100%;
    display: block;
    background: black;
    opacity: .2;
    background: black url("https://upload.wikimedia.org/wikipedia/commons/b/b9/Youtube_loading_symbol_1_(wobbly).gif") center center no-repeat;
    background-size:40px 40px;
}
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
            search_input:'',
            listLoading:false,
        }
    },
    created(){
        this.fetchAll();
    },
    methods:{
        fetchAll(search_input){
            this.listLoading = true;
            axios.get(window.location.href,{
                headers:{
                    Accepts:'application/json',
                },
                params:{
                    search:search_input,
                }
            }).then(res=>{
                this.listLoading = false;
                this.businesses = res.data;
            }).catch(error=>{
                this.listLoading = false;
                console.log(error);
            })
        },
        keyPressed(search_input){
            if(search_input.length>3 || search_input.length == 0){
                this.fetchAll(search_input);
            }
        }
    }
}
</script>