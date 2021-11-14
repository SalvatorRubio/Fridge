<template>
    <div class="flex flex-col items-center">
        <h1>Ограничения</h1>
        <div class="flex w-64 h-36 flex-wrap">
            <div 
            class="flex items-center w-28 ml-2"
            v-for="(item, i) in limits" :key="i"
            >
                <input  class="bg-transparent text-black" type="checkbox" name="" id="">
                <h1 class="text-base pl-1">{{item}}</h1>
            </div>
        <h1 v-for="(item, index) in d" :key="index">{{item}}</h1>
            
        </div>
    </div>

</template>

<script>
import { mapState } from 'vuex';

export default {
    data() {
        return {
            d: []
        }
    },
    methods: {
    
    },
    computed: {
        
        ...mapState(['limits'])
    },
    created() {
        this.$store.dispatch('loadRestrictions')
    }
    
}
</script>