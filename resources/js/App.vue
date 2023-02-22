<template>
    <div class="container">
        <header class="header">
            <h1>Contact Wallet</h1>

            <button @click="openCreateModal">Add Contact</button>
        </header>

        <template v-if="!loading">
            <table class="table">
                <tr>
                    <th class="table--head">First Name</th>
                    <th class="table--head">Last Name</th>
                    <th class="table--head">Type</th>
                    <th class="table--head">Age</th>
                    <th class="table--head"></th>
                </tr>

                <contact-row
                    v-for="contact in contacts"
                    :key="contact.id"
                    :contact="contact"
                />
            </table>
        </template>

        <base-modal
            v-if="showCreateModal"
            heading="Create Contact"
            @close="closeCreateModal"
        >
            <contact-form @created="closeCreateModal"/>
        </base-modal>
    </div>
</template>

<script>
import BaseModal from "./components/BaseModal.vue";
import ContactForm from "./components/ContactForm.vue";
import ContactRow from "./components/ContactRow.vue";

export default {
    name: 'App',
    components: {
        ContactRow,
        ContactForm,
        BaseModal,
    },
    data() {
        return {
            loading: true,
            showCreateModal: false,
        }
    },
    mounted() {
        this.$store.dispatch('getContacts').then(() => {
            this.loading = false
        })
    },
    computed: {
        contacts() {
            return this.$store.state.contacts
        }
    },
    methods: {
        openCreateModal() {
            this.showCreateModal = true
        },
        closeCreateModal() {
            this.showCreateModal = false
        },
    },
}
</script>

<style lang="scss">
.container {
    width: 90%;
    max-width: 800px;
    margin: 0 auto;
}

.header {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.table {
    width: 100%;
    border: 1px solid #ccc;
    border-collapse: collapse;

    &--head,
    &--cell {
        padding: 4px 6px;
        border: 1px solid #ccc;
    }
}
</style>
