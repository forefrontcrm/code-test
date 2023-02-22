<template>
    <input
        v-bind:value="value"
        v-on:input="handleChange($event)"
        class="input"
    >
</template>

<script>
export default {
    name: "BaseInput",
    props: ['value'],
    methods: {
        handleChange(event) {
            this.$emit('input', event.target.value)
        }
    },
}
</script>

<style lang="scss" scoped>
.input {
    width: 100%;
    padding: 4px 6px;
}
</style>
