<template>
    <div class="flex flex-col mt-10 ml-10">
        <div class="flex items-center">
            <h1>Главная</h1>
            <div class="rounded-full w-3 h-3 bg-gray-300 mx-1"></div>
            <h1 class="text-green-600 border-b border-black">{{nameRecipe}}</h1>
        </div>
        <div class="flex items-center justify-center w-44 h-9 bg-gray-100 mt-4 cursor-pointer border border-gray-500 border-opacity-50 rounded-3xl">
            <img class="mr-2 w-2.5 " src="../assets/aboutRecipe/triangle.png" alt="">
            <h1 class="text-sm">Назад к рецептам</h1>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            nameRecipe: 'Оливье - “Столичный”'
        }
    }
}
</script>