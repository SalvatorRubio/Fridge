<template>
    <div class="flex flex-col items-center">
        <h1>Сложность блюда</h1>
        <div class="flex w-64 h-36 justify-center items-center">
            <div 
            v-for="item in infoAboutComplexity"
            :key="item.id"
            @click="changeComplexity(item)"
            :class="{
                'border-black': elComplexity === item
            }"
            class="relative flex flex-col items-center justify-between w-16 h-24 border rounded-xl mx-2 cursor-pointer transition-all duration-75">
                <img 
                :src="item.imgName"
                class="mt-9"
                alt="">
                <h1>{{item.text}}</h1>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            infoAboutComplexity:[
                {
                    'imgName': require('../assets/complexityFood/easy.png'),
                    'text': 'Легкое'
                },
                {
                    'imgName': require('../assets/complexityFood/hard.png'),
                    'text': 'Сложное'
                },
                {
                    'imgName': require('../assets/complexityFood/master.png'),
                    'text': 'Мастер'
                },
            ],
            elComplexity: null
        }
    },
    methods: {
        changeComplexity(item) {
            this.elComplexity = item
        }
    }
    
}
</script>