import {http} from './http'
import {Contact, ContactList} from './contacts.mock'

export const contactsApi = {
    get() {
        return http.get('v1/contacts', ContactList)
    },
    post(id, payload) {
        return http.post('v1/contacts/' + id, payload, Contact)
    },
    put(id, payload) {
        return http.put('v1/contacts/' + id, payload, Contact)
    },
    destroy(id) {
        return http.destroy('v1/contacts/' + id, 'Contact Destroyed')
    }
}
