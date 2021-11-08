import { createRouter, createWebHistory } from "vue-router";
import Home from '../views/HomePage.vue'
import AboutRecipe from '../views/AboutRecipe.vue'

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
    }
]

const router = createRouter({
    history: createWebHistory(),
    routes
})

export default router