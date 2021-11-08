<template>
    <div class="flex flex-col items-center">
        <img src="../assets/dish.png" alt="">
        <h1 class="font-bold my-3 text-lg">Пошаговое приготовление блюда</h1>
        <div 
        class="flex flex-col items-center my-1 pb-2"
        v-for="step in steps"
        :key="step"
        >
            <h1 class="font-medium">{{step.numStep}}</h1>
            <div class="flex items-center">
                <img :src="step.img" class="w-48" alt="">
                <h2 class="ml-4 font-light">{{step.description}}</h2>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            steps: [
                {
                    numStep: 'Шаг 1',
                    img: require('../assets/dish.png'),
                    description: 'Картофель и морковь вымойте щеткой и отварите в подсоленной воде до готовности. Яйца отварите отдельно, не допуская переваривания желтка. Очистите и нарежьте кубиками со стороной 5 мм. Такими же кубиками нарежьте ветчину.'
                },
                {
                    numStep: 'Шаг 2',
                    img: require('../assets/dish.png'),
                    description: 'Смешайте все ингредиенты в салатнике, добавьте мелко нарезанный зеленый лук и укроп. Приправьте черным перцем, заправьте майонезом и поставьте в холодильник.'
                },
                {
                    numStep: 'Шаг 3',
                    img: require('../assets/dish.png'),
                    description: 'Если соленые огурцы с крупными семенами - удалите их. Затем нарежьте кубиками такого же размера. Сложите в отдельный контейнер. Слейте жидкость с горошка, горошек переложите в отдельный контейнер.'
                },
                {
                    numStep: 'Шаг 4',
                    img: require('../assets/dish.png'),
                    description: 'Перед подачей на стол добавьте в салат соленые огурцы и зеленый горошек. Еще раз перемешайте салат, попробуйте и при необходимости добавьте соль и черный перец'
                }
            ]
        }
    }
}
</script>