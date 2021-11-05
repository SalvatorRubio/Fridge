import { createApp } from 'vue'
import App from './App'
import './tailwind.css'
import { createStore } from 'vuex'
import axios from 'axios'


const store = createStore({
	state: {
        items: [],
        filteredProducts: []
    },
    getters: {
        // This getter is doing live data search
        filterProducts: state => input => {
            return state.items.filter(item => item.product_name.includes(input))
        },
        
    },
    mutations: {
        SET_Item (state, items) {
            state.items = items
        },
        deleteItem(state, el){
            this.state.filteredProducts = state.filteredProducts.filter(item => item != el)
        }
    },
    actions: {
        loadItems ({ commit }) {
            axios.get('http://localhost/api.php')
            .then(response => response.data)
            .then(items => {
                commit('SET_Item', items)
            })
            .catch(function (error) {
                console.log(error);
            });
        }
    }

});

createApp(App).use(store).mount('#app')
