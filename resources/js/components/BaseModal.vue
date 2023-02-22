<template>
    <div class="modal--overlay">
        <div class="modal">
            <header class="modal--header">
                <h2>{{ heading }}</h2>

                <div
                    class="modal--close"
                    @click="closeModal"
                >X</div>
            </header>

            <div class="modal--body">
                <slot></slot>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "BaseModal",
    props: {
        heading: {
            type: String,
            required: true,
        },
    },
    methods: {
        closeModal() {
            this.$emit('close')
        }
    },
}
</script>

<style lang="scss" scoped>

.modal {
    position: absolute;
    top: 50%;
    left: 50%;
    width: 400px;
    transform: translate(-50%, -50%);
    background-color: white;

    &--overlay {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: rgba(0,0,0,0.4);
    }

    &--header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin: 0;
        padding: 0 20px 6px;
    }

    &--close {
        padding: 0 10px;
        cursor: pointer;

        &:hover {
            color: darkorange;
        }
    }

    &--body {
        padding: 0 20px 20px;
    }
}
</style>
