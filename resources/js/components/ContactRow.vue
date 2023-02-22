<template>
    <tr class="table--row">
        <td class="table--cell">{{ contact.first_name }}</td>
        <td class="table--cell">{{ contact.last_name }}</td>
        <td class="table--cell">{{ type }}</td>
        <td class="table--cell">{{ age }}</td>
        <td class="table--cell table--actions">
            <button @click="deleteContact(contact.id)">Delete</button>
            <button @click="openUpdateModal(contact)">Update</button>

            <!-- Update Contact Modal -->
            <base-modal
                v-if="showUpdateModal"
                heading="Update Contact"
                @close="closeUpdateModal"
            >
                <contact-form
                    :contact="contact"
                    @updated="closeUpdateModal"
                />
            </base-modal>
        </td>
    </tr>
</template>

<script>
import BaseModal from "./BaseModal.vue";
import ContactForm from "./ContactForm.vue";

export default {
    name: "ContactRow",
    components: {ContactForm, BaseModal},
    props: {
        contact: {
            type: Object,
            required: true,
        },
    },
    data() {
        return {
            showUpdateModal: false
        }
    },
    computed: {
        type() {
            const type = parseInt(this.contact.type)
            if(type === 1) return 'Buyer'
            if(type === 2) return 'Seller'
        },
        age() {
            return this.contact.age ? this.contact.age : '-'
        }
    },
    methods: {
        openUpdateModal() {
            this.showUpdateModal = true
        },
        closeUpdateModal() {
            this.showUpdateModal = false
        },
        deleteContact(id) {
            this.$store.dispatch('deleteContact', id)
        },
    },
}
</script>

<style lang="scss" scoped>
.table {
    &--row {
        &:hover {
            background-color: #ddd;
        }
    }

    &--actions {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
}
</style>
