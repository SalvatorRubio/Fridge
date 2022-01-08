<template>
  <div class="flex flex-col ">
    <h1 class="text-lg">Ингредиенты вашего блюда:</h1>
    <div class="flex flex-wrap justify-evenly mt-4">
      <div
        v-for="(item, i) in $store.state.recIngred"
        :key="i"
        class="flex p-2 items-center border rounded-lg border-gray-400  w-56 m-1"
      >
        <input
          class="text-black"
          type="checkbox"
          :checked="
            $store.getters.checkOnPresence(item.product_name.toLowerCase())
          "
          disabled
        />
        <p class="text-center w-full">
          {{ item.product_name }}<br />({{ item.amount }}
          {{ item.measurment }}
          {{ item.comment }})
        </p>
      </div>
    </div>
    <div class="border border-black my-6"></div>
  </div>
</template>
