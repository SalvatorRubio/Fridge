<template>
  <div class="flex flex-col justify-between w-full px-12">
    <h1 class="text-2xl pl-4 font-medium">
      Найдено для вас {{ recipes.length }}
      <span v-if="recipes == 1">рецепт!</span>
      <span v-else-if="recipes > 1 && recipes < 5">рецепта!</span>
      <span v-else>рецептов!</span>
    </h1>
    <div v-if="recipes.length" class="flex flex-wrap justify-between mt-2">
      <router-link
        v-for="(value, index) in arrDataRecipes"
        :key="index"
        @click="loadInfoAboutRecipe(value)"
        :to="{
          name: 'About',
          params: { recipe: value.name.replace(/ /g, '-') },
        }"
        name="btn"
        class="w-96 h-40 border border-gray-400 rounded-3xl cursor-pointer hover:shadow transition-colors flex  items-center m-2"
      >
        <img
          class="w-36 h-24 border border-black rounded-2xl mx-2"
          v-lazy="value.image"
          alt=""
        />

        <div class="flex flex-col items-center h-32 justify-evenly">
          <h1 class="text-base font-bold leading-5 text-center">
            {{ value.name }}
          </h1>
          <div class="flex items-center my-1">
            <img class="w-4 h-4 mr-1" src="../assets/recipe/clock.png" alt="" />
            <h1 class="text-center">{{ value.cooking_time }} мин.</h1>
          </div>
          <div class="flex flex-col text-center" v-if="value.matchs">
            <h1 class="text-center">Совпадения по ингредиентам:</h1>
            <div>
              <h1 class="text-center">
                {{ value.matchs }} из {{ value.count_prod }}
              </h1>
            </div>
          </div>
          <div v-else>
            <h1 class="text-center">Отстутствуют введенные ингредиенты</h1>
          </div>
        </div>
      </router-link>
    </div>
    <div class="w-full text-center opacity-60 mt-40" v-else>
      Нет подходящих блюд
    </div>
  </div>
</template>

<script>
import { mapState, mapActions } from "vuex";
export default {
  data() {
    return {
      page: 1,
      countRecipe: 0,
      arrRecipes: [],
    };
  },
  methods: {
    ...mapActions(["loadIngredsRec", "loadImageRec"]),
    loadInfoAboutRecipe(item) {
      localStorage.setItem("recipe", JSON.stringify(item));
      this.$store.dispatch("loadIngredsRec", item.name);
      this.$store.dispatch("loadImageRec", item.name);
      this.$store.dispatch("loadStepsRec", item.name);
    },
  },
  computed: {
    arrDataRecipes() {
      return this.recipes.slice(this.startIndex, this.endIndex);
    },

    startIndex() {
      return (this.page - 1) * 6;
    },

    endIndex() {
      return this.page * 6;
    },
    ...mapState(["recipes"]),
  },
};
</script>
