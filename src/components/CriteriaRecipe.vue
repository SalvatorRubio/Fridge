<template>
    <div class="flex flex-col justify-center items-center mt-16 lg:mx-10 vsm:mx-5">
        <div class="bg-gray-200 rounded-t-3xl">
            <h1 class="sm:text-2xl p-4 font-medium">Поиск по ингредиентам</h1>
        </div>
        <div class="flex flex-col bg-gray-200 w-full vsm:h-full xl:h-90 rounded-3xl rounded-br-none xl:px-14 xl:pt-12">
            <input-search-ingred></input-search-ingred>
            <div class="w-full flex justify-between sm:mt-10">
                
                <list-ingred></list-ingred>
                <cooking-time></cooking-time>
                <restrictions-food></restrictions-food>
            </div>
        </div>
    </div>
</template>

<script>
import ListIngred from './listIngred.vue'
import InputSearchIngred from './inputSearchIngred.vue'
import CookingTime from './cookingTime.vue'
import RestrictionsFood from './restrictionsFood.vue'

export default {
    components: {
        ListIngred,
        InputSearchIngred,
        CookingTime,
        RestrictionsFood
    },
    data() {
        return {
        }
    }
}
</script>
