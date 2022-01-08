import { createApp } from 'vue'
import App from './App'
import './tailwind.css'
import { createStore } from 'vuex'
import axios from 'axios'
import router from './router/index.js'
import VueLazyLoad from 'vue3-lazyload'


const store = createStore({
	state: {
      items: [],
      filteredProducts: [],
      selectedTime: '',
      selectedLimits: [],
      limits: [],
      recipes: [],
      recIngred: [],
      recImg: [],
      recSteps: [],
      localStorageRecipe: [] 
  },
    getters: {
      filterProducts: state => input => {
          return state.items.filter(item => item.includes(input))
      },
      checkOnPresence: state => item => {
        return state.filteredProducts.includes(item)
      }
    },
    mutations: {
      SET_Item(state, items) {
          state.items = items.split('$')
      },
      SET_limit(state, items) {
          state.limits = items.split(',')
      },
      deleteItem(state, el){
          state.filteredProducts = state.filteredProducts.filter(item => item != el)
      },
      ShowRecipes(state, el) {
          state.recipes = el
      },
      aboutRecipe(state, el) {
          state.recIngred = el
      },
      aboutRecipeImage(state, el) {
        state.recImg = el
      },
      aboutRecipeSteps(state, el) {
          state.recSteps = el
      }
    },
    actions: {
      loadProducts ({ commit }) {
          axios.get('http://localhost/api.php')
          .then(response => response.data)
          .then(items => {
              commit('SET_Item', items)
          })
          .catch(error => {
              console.log(error);
          });
      },
      loadRestrictions ({ commit }) {
          axios.get('http://localhost/limits.php')
          .then(response =>  response.data)
          .then(items => {
              commit('SET_limit', items)
          })
          .catch(error => {
              console.log(error);
          });
      },
      loadRecipes ({ commit }) {
          axios.post('http://localhost/loadRecipes.php',{
              data: {
                  rec: this.state.filteredProducts,
                  lim: this.state.selectedLimits,
                  time: this.state.selectedTime
              }
          })
              .then(response => 
                response.data)
          .then(items => {
              commit('ShowRecipes', items)
          }) 
          .catch(error => {
              console.log(error.response)
          });
      },
      loadIngredsRec ({ commit }, recipe) {
          axios.post('http://localhost/recipeIngreds.php',{
              data: {
                  name: recipe
              }
          })
              .then(response => response.data)
          .then(items => {
              commit('aboutRecipe', items)
          })
          .catch(error => {
              console.log(error.response)
          });
      },
      loadImageRec ({ commit }, recipe) {
          axios.post('http://localhost/recImage.php',{
              data: {
                  name: recipe
              }
          })
              .then(response => response.data)
          .then(items => {
              commit('aboutRecipeImage', items)
          })
          .catch(error => {
              console.log(error.response)
          });
      },
      loadStepsRec ({ commit }, recipe) {
          axios.post('http://localhost/recSteps.php',{
              data: {
                  name: recipe
              }
          })
              .then(response => response.data)
          .then(items => {
              commit('aboutRecipeSteps', items)
          })
          .catch(error => {
              console.log(error.response)
          });
      },
    }

});

createApp(App).use(store).use(router).use(VueLazyLoad).mount('#app')
