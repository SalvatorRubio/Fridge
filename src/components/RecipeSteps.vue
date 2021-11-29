<template>
    <div class="flex flex-col ">
        <div v-if="recImg.length" class=" flex items-center flex-col">
            <img class="rounded-2xl w-80" v-lazy="JSON.parse(recImg[0]).image" alt="">
            <h1 class="font-bold my-3 text-lg">Пошаговое приготовление блюда</h1>
        </div>
        
        <div 
        class="flex flex-col  my-1 pb-2"
        v-for="(step, i) in recSteps"
        :key="i"
        >
            <h1 class="font-medium text-center">{{i + 1}} Шаг</h1>
            <div v-if="recSteps.length" class="flex items-center">
                <img :src="JSON.parse(step).rec_step_image" class="w-48 rounded-2xl border border-black" alt="">
                <h2 class="ml-4 font-light">{{JSON.parse(step).description}}</h2>
            </div>
        </div>
    </div>
</template>

<script>
import { mapState } from 'vuex'
export default {
    data() {
        return {
            
        }
    },
    methods: {
    },
    computed: {
        ...mapState(['recImg', 'recSteps'])
    }
}

</script>