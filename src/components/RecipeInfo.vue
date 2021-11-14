<template>
     <div class="flex flex-col justify-center items-center mt-3 lg:mx-10 vsm:mx-5">
        <div class="bg-gray-200 rounded-t-3xl shadow-2xl border border-b-0 border-gray-400 flex flex-col items-center">
            <h1 class="text-2xl py-4 px-14 font-medium">{{nameRecipe}}</h1>
            <div class="flex bg-gray-200 items-center">
                <div class="flex items-center mx-2">
                    <div class="rounded-full w-4 h-4 bg-gray-300 mx-1"></div>
                    <h1>20 мин.</h1>
                </div>
                <div class="flex items-center mx-2">
                    <div class="rounded-full w-4 h-4 bg-gray-300 mx-1"></div>
                    <h1>Лёгкое</h1>
                </div>
                <div class="flex items-center mx-2">
                    <div class="rounded-full w-4 h-4 bg-gray-300 mx-1"></div>
                    <h1>5 ингр.</h1>
                </div>
            </div>
        </div>
        
        <div class="flex bg-gray-200 w-full border border-gray-400 shadow mb-10 vsm:h-full xl:h-90 rounded-3xl xl:px-14 xl:pt-5">
            <div class="w-full flex justify-between flex-col">
                
                <recipe-ingredients></recipe-ingredients>
                <recipe-steps></recipe-steps>
            </div>
        </div>
        
    </div>
</template>

<script>
import RecipeIngredients from '../components/RecipeIngredients.vue'
import RecipeSteps from '../components/RecipeSteps.vue'
export default {
    components: {
        RecipeIngredients,
        RecipeSteps
    },
    data() {
        return {
            nameRecipe: 'Оливье - “Столичный”'
        }
    }
}
</script>