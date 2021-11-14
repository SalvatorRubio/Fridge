<template>
    <div class="flex flex-col ">
        <h1 class="text-lg">Ингредиенты вашего блюда:</h1>
        <div class="flex flex-wrap items-center justify-between mt-4">
            <div 
            v-for="item in ingredients"
            :key="item"
            class="flex items-center mr-0.5 w-52 my-2">
            <input class="mr-3 bg-transparent text-black" type="checkbox" checked disabled>
            {{item.name}} - {{item.number}}
            </div>
        </div>
        <div class="border-b border-black my-6"></div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            ingredients: [
                {
                    name: 'Яйцо куриное',
                    number: '1шт.'
                },
                {
                    name: 'Cыр тёртый',
                    number: '100гр'
                },
                {
                    name: 'Горошек',
                    number: '300гр.'
                },
                {
                    name: 'Колбаса варёная',
                    number: '100гр.'
                },
                {
                    name: 'Майонез',
                    number: '200 гр.'
                },
                {
                    name: 'Морковь',
                    number: '250гр.'
                },
                

            ]
        }
    }
}
</script>