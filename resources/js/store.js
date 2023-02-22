import Vue from 'vue';
import Vuex from 'vuex';
import {contactsApi} from "./api/contacts.api";

Vue.use(Vuex)

const state = {
    contacts: []
}

const getters = {}

const mutations = {
    setContacts(state, contacts) {
        state.contacts = contacts
    },
    addContact(state, contact) {
        // TODO Add the contact to state.contacts
    },
    updateContact(state, newContact) {
        // TODO Update the contact in state.contacts
    },
    removeContact(state, contactId) {
        // TODO Remove the contact from state.contacts
    },
}

const actions = {
    getContacts({commit}) {
        return contactsApi.get().then(response => {
            commit('setContacts', response)
        })
    },
    createContact({commit}, contact) {
        return contactsApi.post(contact).then(response => {
            commit('addContact', response)
        })
    },
    updateContact({commit}, contact) {
        return contactsApi.put(contact).then(response => {
            commit('updateContact', response)
        })
    },
    deleteContact({commit}, contactId) {
        return contactsApi.destroy(contactId).then(() => {
            commit('removeContact', contactId)
        })
    }
}

export default new Vuex.Store({
    state,
    mutations,
    actions,
    getters,
})
