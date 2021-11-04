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
        @click="addProdBtn"
        class="bg-yellow-500 w-28 h-6 rounded-3xl ">Добавить</button>
        
    </div>
    <div 
    v-if="search != ''"
    class="flex justify-evenly bg-white py-1.5 border border-black border-opacity-25 rounded-b-3xl"
    >
        <h1 
        @click="saveItemFromData(item.product_name)"
        v-for="(item, name, index) in filterProducts.slice(0,4)" :key="index" 
        class="border border-black border-opacity-25 rounded-3xl bg-yellow-500 px-3 h-6 cursor-pointer">{{item.product_name}}</h1>
    </div>
</template>

<script>
import axios from 'axios'
export default {
    data() {
        return {
            arrProds: [],
            saveArrIngred: [],

            search: '',
            checkProducts: false
        }
    },
    emits:['saveProductForEmit'],

    methods: {
        searchInData() {
            axios.get('http://localhost/api.php')
            .then(response => {
                this.arrProds = response.data
            })
            .catch(function (error) {
                console.log(error);
            });
        },

        addProdBtn() {
            this.saveArrIngred.push(this.search)
            this.search = ''
        },

        saveItemFromData(el) {
            this.saveArrIngred.push(el) 
            this.search = ''
        },

        saveProductForEmit() {
            this.$emit('saveProductForEmit', this.saveArrIngred)
        },
        
    },
    computed: {
        filterProducts() {
            return this.arrProds.filter(item => item.product_name.includes(this.search))
        }
    },
    watch: {
        saveArrIngred: {
            handler() {
                this.saveProductForEmit()
            },
            deep: true 
        },
        search() {
            this.filterProducts    
        }
    },
    created() {
        this.searchInData()
    }
    
}
</script>