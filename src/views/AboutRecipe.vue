<template>
    <div class="bg-black font-sans">
        <div class="vsm:px-0.5 intro mx-auto flex flex-col justify-center items-center "
        :style="{
            maxWidth: `1600px`,
            width: `100%`,
            height: `1322px`
        }"
        >
            <div class="sm:flex-col vsm:justify-evenly vsm:mb-11 mx-auto max-w-4xl w-full flex sm:items-end sm:mb-2.5">
            <log-btn class="px-6 bg-gray-100 sm:mb-3.5">Войти</log-btn>
            <log-btn class="px-4 bg-gray-300">Добавить рецепт</log-btn>
            </div>
            <div
            :style="{
            height: `1106px`
            }"
            class="mx-auto w-full mt-0 max-w-4xl relative bg-white mb-20 inset-0 shadow-2xl rounded-3xl">
                <img class="absolute -top-8 left-1/2 transform -translate-x-1/2" src="../assets/fridge.png" alt="">
                <nav-recipe></nav-recipe>
            </div>
        </div>
    </div>
</template>

<script>
import logBtn from '../components/logBtn.vue'
import navRecipe from '../components/NavRecipe.vue'

export default {
  name: 'App',
  components: {
    logBtn,
    navRecipe
  },
  
}
</script>

<style>
.intro {
  background: url('../assets/intro.png') no-repeat center;
  background-size: cover;
}
</style>