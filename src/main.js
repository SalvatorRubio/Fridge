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
        limits: [],
        recipes: []
    },
    getters: {
        // This getter is doing live data search
        filterProducts: state => input => {
            return state.items.filter(item => item.includes(input))
        },
        
    },
    mutations: {
        SET_Item(state, items) {
            state.items = items.split(',')
        },
        SET_limit(state, items) {
            state.limits = items.split(',').slice(0, -1)
        },
        deleteItem(state, el){
            state.filteredProducts = state.filteredProducts.filter(item => item != el)
        },
        ShowRecipes(state, el) {
            state.recipes = el.split(',').slice(0, -1)
        }
    },
    actions: {
        loadProducts ({ commit }) {
            axios.get('http://localhost/api.php')
            .then(response => response.data)
            .then(items => {
                commit('SET_Item', items)
            })
            .catch(function (error) {
                console.log(error);
            });
        },
        loadRestrictions ({ commit }) {
            axios.get('http://localhost/limits.php')
            .then(response =>  response.data)
            .then(items => {
                commit('SET_limit', items)
            })
            .catch(function (error) {
                console.log(error);
            });
        },
        loadRecipes ({ commit }) {
            axios.post('http://localhost/check.php',{
                data: {
                    rec: null,
                    lim: null,
                    time: null
                }
            })
            .then(response =>  response.data)
            .then(items => {
                commit('ShowRecipes', items)
            })
            .catch(error => {
                console.log(error.response)
            });
        }
    }

});

createApp(App).use(store).use(router).use(VueLazyLoad).mount('#app')
