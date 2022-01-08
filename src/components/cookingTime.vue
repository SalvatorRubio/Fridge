<template>
  <div class="flex flex-col items-center">
    <h1>Время готовки</h1>
    <div class="flex w-64 h-36 mt-5 justify-center">
      <div
        v-for="item in infoAboutBnts"
        :key="item.id"
        @click="changeTime(item)"
        :class="{
          'border-black': elTime === item,
        }"
        class="relative flex flex-col items-center justify-evenly w-20 h-24 border rounded-xl mx-2 cursor-pointer transition-all duration-75"
      >
        <img :src="item.imgName" alt="" />
        <div class="flex flex-col items-center ">
          <h1 class="text-xs font-bold">{{ item.textBefore }}</h1>
          <h1 class="font-bold">{{ item.textNum }}</h1>
          <h1 class="text-xs font-bold">{{ item.textTime }}</h1>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      infoAboutBnts: [
        {
          imgName: require("../assets/cookingTime/20minutes.png"),
          textBefore: "до",
          textNum: "20",
          textTime: "минут",
          id: "1",
          dataToAxios: "< 20",
        },
        {
          imgName: require("../assets/cookingTime/30minutes.png"),
          textBefore: "до",
          textNum: "30",
          textTime: "минут",
          id: "2",
          dataToAxios: "< 30",
        },
        {
          imgName: require("../assets/cookingTime/1hour.png"),
          textBefore: "до",
          textNum: "60",
          textTime: "минут",
          id: "3",
          dataToAxios: "< 60",
        },
        {
          imgName: require("../assets/cookingTime/1hour.png"),
          textBefore: "более",
          textNum: "1",
          textTime: "часа",
          id: "4",
          dataToAxios: "> 60",
        },
      ],
      elTime: null,
    };
  },
  methods: {
    changeTime(el) {
      this.elTime = el;
      this.$store.state.selectedTime = el.dataToAxios;
    },
  },
};
</script>
