<template>
    <div class="flex flex-col ">
        <h1 class="text-lg">Ингредиенты вашего блюда:</h1>
        <div class="flex flex-wrap  justify-center mt-4">
            
            
            <div 
            v-for="(item,i) in $store.state.recIngred"
            :key="i"
            class="flex items-center mr-0.5 w-52 my-2 mx-6">
            <input class="mr-3 bg-transparent text-black" type="checkbox" checked disabled>
            {{JSON.parse(item).product_name}}({{JSON.parse(item).amount}} {{JSON.parse(item).measurment}} {{JSON.parse(item).comment}})
            
            
            
            </div>
        </div>
        <div class="border-b border-black my-6"></div>
    </div>
</template>

<script>

export default {

    data() {
        return {
            
        }
    }
    
}
</script>