<template>
    <div class="flex flex-col justify-between w-full px-12">
        <h1 class="text-2xl pl-4 font-medium">Найдено для вас {{recipes.length}} 
            <span v-if="recipes == 1">рецепт!</span>
            <span v-else-if="recipes > 1 && recipes < 5">рецепта!</span>
            <span v-else>рецептов!</span></h1>
        <div v-if="recipes.length" class="flex flex-wrap justify-between mt-2">
            <div 
            v-for="item in recipes"
            :key="item.id"
            class="w-96 h-40 border border-gray-400 rounded-3xl cursor-pointer hover:shadow transition-colors flex justify-evenly items-center m-2">
                <div  class="flex flex-col justify-between">
                    <!-- <h1>{{item}}</h1> -->
                       <img class="w-20 h-20 mr-1" v-lazy="item" alt="">
                    
                </div> 
            </div>
        </div>
        <div class="w-full text-center opacity-60 mt-40" v-else>Нет подходящих блюд</div>
    </div>
</template>

<script>
import { mapState } from 'vuex';

export default {
    data() {
        return {
            page: 1,
            countRecipe: 0,
            arrRecipes: []
        }
    },

    computed: {
        arrDataRecipes() {
            return this.arrRecipes.slice(this.startIndex, this.endIndex)
        },

        startIndex() {
            return (this.page - 1) * 6
        },
        
        endIndex() {
            return this.page * 6
        },
        ...mapState(['recipes'])
    }
}
//                 <img :src="item.img" alt="">

// <div class="flex items-center my-1">
//                         <h1>{{item.time}}</h1>
//                     </div>
//                     <div class="flex items-center my-1">
//                         <div class="w-5 h-5 rounded-full bg-green-500 mr-1"></div>
//                         <h1>{{item.complexity}}</h1>
//                     </div>
//                     <div class="flex items-center my-1">
//                         <img class="w-5 h-5 mr-1" src="../assets/recipe/ingred.png" alt="">
//                         <h1>{{item.countIngred}} ингридиентов</h1>
//                     </div>
</script>