<template>
    <div class="flex flex-col items-center">
        <h1>Список ингредиентов</h1>
        <div class="flex flex-wrap w-52 h-36 items-center justify-center">
            <h1 
            class="text-xs opacity-40"
            v-if="!ingredArr.length"
            >Ингредиенты отсутствуют</h1>
            <h1 
            v-for="item in ingredArr"
            :key="item"
            class="bg-yellow-500 w-24 h-5 border border-black border-opacity-30 font-light text-xs flex justify-center relative rounded-3xl m-1"
            v-else
            >
            <img src="../assets/cancel.png" 
            @click="deleteItem(item)"
            class="absolute top-1/2 left-2 transform -translate-y-1/2 cursor-pointer" alt="">
            {{item}}
            </h1>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            ingredArr: []
        }
    },

    methods: {
        deleteItem(el) {
            this.ingredArr = this.ingredArr.filter(item => item != el)
        }
    }
}
</script>