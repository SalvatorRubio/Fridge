import { createRouter, createWebHistory } from "vue-router";
import Home from '../views/HomePage.vue'
import AboutRecipe from '../views/AboutRecipe.vue'
import RecipeCreation from '../views/RecipeCreation.vue'

const routes = [
    {
        path: '/',
        name: 'Home',
        component: Home
    },
    {
        path: '/about',
        name: 'About',
        component: AboutRecipe
    },
    {
        path: '/create-recipe',
        name: 'RecipeCreation',
        component: RecipeCreation
    }
]

const router = createRouter({
    history: createWebHistory(),
    routes
})

export default router