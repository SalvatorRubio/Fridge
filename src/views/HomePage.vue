<template>
  <div class="bg-black font-sans">
    <div
      class="vsm:px-0.5 intro mx-auto flex flex-col justify-center items-center "
      :style="{
        maxWidth: `1600px`,
        width: `100%`,
        height: `1322px`,
      }"
    >
      <div
        :style="{
          height: `1106px`,
        }"
        class="mx-auto w-full mt-0 max-w-4xl relative bg-white mb-20 inset-0 shadow-2xl rounded-3xl"
      >
        <img
          class="absolute -top-8 left-1/2 transform -translate-x-1/2"
          src="../assets/fridge.png"
          alt=""
        />
        <criteria-recipe></criteria-recipe>
        <div class="w-full px-10 flex justify-end">
          <div
            class="w-60 h-16 flex justify-center items-center bg-gray-200 rounded-b-3xl "
          >
            <div
              name="btn"
              @click="loadRecipes()"
              class="relative flex justify-center items-center bg-yellow-500 w-52 h-12 rounded-lg cursor-pointer"
            >
              <img
                class="absolute left-4 top-1/2 transform -translate-y-1/2"
                src="../assets/search.png"
                alt=""
              />
              <h1
                class="font-bold uppercase pl-4 text-white text-lg"
                value="search"
              >
                Найти рецепт
              </h1>
            </div>
          </div>
        </div>
        <arr-recipes></arr-recipes>
      </div>
    </div>
  </div>
</template>

<script>
import CriteriaRecipe from "../components/CriteriaRecipe.vue";
import arrRecipes from "../components/arrRecipes.vue";
import { mapActions } from "vuex";

export default {
  name: "App",
  components: {
    CriteriaRecipe,
    arrRecipes,
  },
  computed: {},
  methods: {
    ...mapActions(["loadRecipes"]),
  },
};
</script>

<style>
.intro {
  background: url("../assets/intro.png") no-repeat center;
  background-size: cover;
}
</style>
