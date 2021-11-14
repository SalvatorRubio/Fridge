<template>
    <div class="flex flex-col items-center">
        <h1 class="text-2xl">Характеристики вашего блюда</h1>
        <div class="flex mt-5">
            <cooking-time class="px-7"></cooking-time>
            <restrictions-food class="px-7"></restrictions-food>
        </div>
        <div>
            
        </div>
    </div>
</template>

<script>
import cookingTime from '../components/cookingTime.vue'
import restrictionsFood from '../components/restrictionsFood.vue'
export default {
    components: {
        cookingTime,
        restrictionsFood
    }
}
</script>