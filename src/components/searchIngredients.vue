<template>
    <div class="flex flex-col justify-center items-center mt-16 lg:mx-10 vsm:mx-5">
        <div class="bg-gray-200 rounded-t-3xl">
            <h1 class="sm:text-2xl p-4 font-medium">Поиск по ингредиентам</h1>
        </div>
        <div class="flex flex-col bg-gray-200 w-full vsm:h-full xl:h-80 rounded-3xl rounded-br-none xl:px-14 xl:py-12">
            <input-search-ingred></input-search-ingred>
            <div class="w-full flex justify-between sm:mt-10">
                
                <list-ingred></list-ingred>
                <cooking-time></cooking-time>
                <complexity-food></complexity-food>
            </div>
        </div>
    </div>
</template>

<script>
import listIngred from './listIngred.vue'
import inputSearchIngred from './inputSearchIngred.vue'
import cookingTime from './cookingTime.vue'
import complexityFood from './complexityFood.vue'

export default {
    components: {
        listIngred,
        inputSearchIngred,
        cookingTime,
        complexityFood
    },
    
}
</script>
