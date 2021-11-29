<template>
    <div class="flex flex-col justify-between w-full px-12">
        <h1 class="text-2xl pl-4 font-medium">Найдено для вас {{recipes.length}} 
            <span v-if="recipes == 1">рецепт!</span>
            <span v-else-if="recipes > 1 && recipes < 5">рецепта!</span>
            <span v-else>рецептов!</span></h1>
        <div v-if="recipes.length" class="flex flex-wrap justify-between mt-2">
            <router-link 
                v-for="(value, index) in arrDataRecipes"
                :key="index"
                :to="{name: 'About', params: {recipe: JSON.parse(value).name.replace(/ /g,'-')}}"
                @click="f(value)"
                name="btn"
                class="w-96 h-40 border border-gray-400 rounded-3xl cursor-pointer hover:shadow transition-colors flex  items-center m-2">
                
                <img class="w-36 h-24 border border-black rounded-2xl mx-2" v-lazy="JSON.parse(value).image" alt="">
            
                <div class="flex flex-col h-32 justify-evenly">
                    <h1 class="text-sm">{{JSON.parse(value).name}}</h1>
                    <div class="flex items-center my-1">
                        <img class="w-4 h-4 mr-1" src="../assets/recipe/clock.png" alt="">
                        <h1>{{JSON.parse(value).time}} мин.</h1>
                    </div>
                    <div 
                    class="flex flex-col"
                    v-if="JSON.parse(value).matchs">
                        <h1>Совпадения по ингредиентам:</h1>
                        <div>
                            <h1>{{JSON.parse(value).matchs}} из {{arrDataRecipes.length}}</h1>
                        </div>
                    </div>
                    <div v-else>
                        <h1>Отстутствуют введенные ингредиенты</h1>
                    </div>
                </div> 
            </router-link>
        </div>
        <div class="w-full text-center opacity-60 mt-40" v-else>Нет подходящих блюд</div>
    </div>
</template>

<script>
import { mapState, mapActions, mapGetters } from 'vuex';
export default {
    data() {
        return {
            page: 1,
            countRecipe: 0,
            arrRecipes: [],
        }
    },
    methods: {
        ...mapActions(['loadIngredsRec', 'loadImageRec']),
        f(item) {
            localStorage.setItem('recipe', item);
            
            this.$store.dispatch('loadIngredsRec', JSON.parse(item).name)
            this.$store.dispatch('loadImageRec', JSON.parse(item).name)
            this.$store.dispatch('loadStepsRec', JSON.parse(item).name)
            // console.log( JSON.parse(localStorage.test).name)
                    // <span class="text-xs">{{JSON.parse(value).description.substring(0, 80)}}...</span>

        }
    },
    computed: {
        arrDataRecipes() {
            return this.recipes.slice(this.startIndex, this.endIndex)
        },
        
        startIndex() {
            return (this.page - 1) * 6
        },
        
        endIndex() {
            return this.page * 6
        },
        ...mapState(['recipes', 'rightImageRec']),
        ...mapGetters(['recipe'])
    },
}
</script>