<template>
    <form>
        <div class="form--field">
            <label class="form--label">First Name</label>
            <base-input v-model="contactForm.first_name"/>
            <p
                v-if="showFirstNameError"
                class="form--error"
            >First Name Required</p>
        </div>

        <div class="form--field">
            <label class="form--label">Last Name</label>
            <base-input v-model="contactForm.last_name"/>
            <p
                v-if="showLastNameError"
                class="form--error"
            >Last Name Required</p>
        </div>

        <div class="form--field">
            <label class="form--label">Type</label>
            <base-select
                v-model="contactForm.type"
                :options="typeOptions"
            />
        </div>

        <div class="form--field">
            <label class="form--label">Age <span>(optional)</span></label>
            <base-input v-model="contactForm.age"/>
        </div>

        <div class="form--field">
            <button
                v-if="contact"
                @click="updateContact"
                type="button"
            >Update
            </button>
            <button
                v-else
                @click="createContact"
                type="button"
            >Create
            </button>
        </div>
    </form>
</template>

<script>
import BaseInput from "./BaseInput.vue";
import BaseSelect from "./BaseSelect.vue";

export default {
    name: "ContactForm",
    components: {
        BaseInput,
        BaseSelect,
    },
    props: {
        contact: {
            type: Object,
            required: false,
        },
    },
    data() {
        return {
            showFirstNameError: false,
            showLastNameError: false,
            typeOptions: [
                {
                    value: 1,
                    label: 'Buyer'
                },
                {
                    value: 2,
                    label: 'Seller'
                },
            ],
            contactForm: {},
        }
    },
    mounted() {
        if (this.contact) {
            this.contactForm = {...this.contact}
        } else {
            this.contactForm = {
                first_name: '',
                last_name: '',
                type: 1,
                age: '',
            }
        }
    },
    destroyed() {
        this.contactForm = {}
    },
    methods: {
        createContact() {
            if (this.contactForm.first_name && this.contactForm.last_name) {
                this.$store.dispatch('createContact', this.contactForm).then(() => {
                    this.$emit('created')
                })
            } else {
                if(!this.contactForm.first_name) this.showFirstNameError = true
                if(!this.contactForm.last_name) this.showLastNameError = true
            }
        },
        updateContact() {
            this.$store.dispatch('updateContact', this.contactForm).then(() => {
                this.$emit('updated')
            })
        },
    },
}
</script>

<style lang="scss" scoped>
.form {
    &--field {
        margin-bottom: 20px;
    }

    &--label {
        margin-bottom: 4px;
    }

    &--error {
        margin: 4px 0 20px;
        color: red;
        font-size: 0.75rem;
    }
}
</style>
