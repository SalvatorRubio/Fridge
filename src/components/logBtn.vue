<template>
    <button type="button" class=" py-1 shadow  rounded-3xl font-bold  sm:mr-10">
        <slot></slot>
    </button>
</template>

<script>

export default {
    data() {
        return {
            filter: ''
        }
    }
}
</script>
