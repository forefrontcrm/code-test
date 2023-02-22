<template>
    <select
        v-bind:value="value"
        v-on:input="handleChange($event)"
        class="select"
    >
        <option
            v-for="option in options"
            :key="option.value"
            :value="option.value"
        >{{ option.label}}</option>
    </select>
</template>

<script>
export default {
    name: "BaseSelect",
    props: ['value', 'options'],
    methods: {
        handleChange(event) {
            this.$emit('input', event.target.value)
        }
    },
}
</script>

<style lang="scss" scoped>
.select {
    width: 100%;
    padding: 4px 6px;
}
</style>
