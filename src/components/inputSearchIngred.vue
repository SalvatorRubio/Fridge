<template>
    <div 
    :class="{
        'rounded-b-none': search != '',
        'border-red-400': checkProducts,
        'border-opacity-100': checkProducts
    }"
    
    class="w-full flex items-center px-4  bg-white rounded-3xl h-12 border border-black border-opacity-25 shadow-lg">
        <img src="../assets/search.png" :style="{
            height: `20px`,
            width: `20px`,
        }" alt="">
        <input type="text" 
        v-model="search" 
        class="border-none  w-full mr-3 py-1 px-2 leading-tight focus:outline-none focus:ring-0 focus:border-white"
        :placeholder="!checkProducts ? 'Введите ингредиент' : 'Данный ингредиент отсутствует'" 
        >
        <button 
        @click="saveProdBtn()"
        class="bg-yellow-500 w-28 h-6 rounded-3xl ">Добавить</button>
        
    </div>
    <div 
    v-if="search != ''"
    class="flex justify-evenly flex-wrap bg-white h-20 py-1.5 border border-black border-opacity-25 rounded-b-3xl"
    >
        <h1 
        @click="saveItemFromData(item.product_name)"
        v-for="(item, name, index) in filterProducts.slice(0, 8)" :key="index" 
        class="border border-black border-opacity-25 rounded-3xl bg-yellow-500 px-3 h-6 cursor-pointer">{{item.product_name}}</h1>
    </div>
</template>

<script>
import { mapState } from 'vuex';
export default {
    data() { 
        return {

            search: '',
            checkProducts: false
        }
    },

    methods: {

        saveProdBtn() {
            if(this.search != '') {
                this.$store.state.filteredProducts.push(this.search)
                this.search = ''
            }
        },

        saveItemFromData(el) {
            this.$store.state.filteredProducts.push(el) 
            this.search = ''
        },
        
    },
    computed: {
        filterProducts() {
            return this.$store.getters.filterProducts(this.search)
        },
        ...mapState(['items']),
        
    },
    created() {
        this.$store.dispatch('loadItems')
    }
    
}
</script>