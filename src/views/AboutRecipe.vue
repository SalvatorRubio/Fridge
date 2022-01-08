<template>
  <div class="bg-black font-sans ">
    <div
      class="vsm:px-0.5 intro mx-auto flex flex-col justify-center items-center "
      :style="{
        maxWidth: `1600px`,
        width: `100%`,
      }"
    >
      <div
        class="mx-auto w-full  max-w-4xl relative bg-white my-20 inset-0 shadow-2xl rounded-3xl"
      >
        <img
          class="absolute -top-8 left-1/2 transform -translate-x-1/2"
          src="../assets/fridge.png"
          alt=""
        />
        <nav-recipe></nav-recipe>
        <recipe-info></recipe-info>
      </div>
    </div>
  </div>
</template>

<script>
import navRecipe from "../components/NavRecipe.vue";
import RecipeInfo from "../components/RecipeInfo.vue";

export default {
  components: {
    navRecipe,
    RecipeInfo,
  },
};
</script>

<style>
.intro {
  background: url("../assets/intro.png") no-repeat center;
  background-size: cover;
}
</style>
