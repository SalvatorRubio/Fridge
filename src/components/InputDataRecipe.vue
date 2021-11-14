<template>
    <div class="flex flex-col justify-center items-center mt-3 lg:mx-10 vsm:mx-5">
        <div class="bg-gray-200 rounded-t-3xl shadow-2xl border border-b-0 border-gray-400 flex flex-col items-center pb-5">
            <h1 class="text-2xl py-4 px-14 font-medium">Название вашего блюда</h1>
            <input class="border border-black border-opacity-60 w-96 rounded-lg pl-5 shadow-lg mx-5" placeholder="Введите название блюда" type="text">
        </div>
        
        <div class="flex bg-gray-200 w-full border border-gray-400 shadow mb-10 vsm:h-full xl:h-90 rounded-3xl xl:px-14 xl:pt-5">
            <div class="w-full flex justify-between flex-col">
                <creation-of-characteristics></creation-of-characteristics>
                
            </div>
        </div>
        
    </div>
</template>

<script>
import CreationOfCharacteristics from '../components/CreationOfCharacteristics.vue'
export default {
    components: {
        CreationOfCharacteristics
    }
}
</script>