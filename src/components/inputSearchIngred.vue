<template>
    <div class="w-full flex items-center px-4  bg-white rounded-3xl h-10 border border-black border-opacity-25 shadow-lg">
        <img src="../assets/search.png" :style="{
            height: `20px`,
            width: `20px`
        }" alt="">
        <input type="text" class="border-none  w-full mr-3 py-1 px-2 leading-tight focus:outline-none focus:ring-0 focus:border-white" placeholder="Введите ингредиент">
    </div>
</template>

<script>
export default {
    
}
</script>