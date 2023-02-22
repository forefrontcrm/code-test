import {http} from './http'
import {Contacts} from './contacts.mock'

export const contactsApi = {
    get() {
        return http.get('v1/contacts', Contacts)
    },
    post(contact) {
        return http.post('v1/contacts/', contact, contact)
    },
    put(contact) {
        return http.put('v1/contacts/' + contact.id, contact, contact)
    },
    destroy(contactId) {
        return http.destroy('v1/contacts/' + contactId, 'Contact Destroyed')
    }
}
