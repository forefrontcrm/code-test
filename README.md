# Code Test - Contact Wallet

Build a basic web app that keeps track of contacts.

## Installation

* Clone down the repo
* run ``` composer install ```
* run ``` cp .env.example .env ```
* run ``` php artisan key:generate ```
* run ``` npm install ```
* run ``` npm run dev``` to serve the app local
* setup database with name 'codetest' (for backend tasks only)

### Contact Data Structure

- First Name (string, required)
- Last Name (string, required)
- Age (number, optional)
- Type (enum:Buyer or Seller) (Buyer => 1, Seller => 2)
- Secret (uuid, required, only for backend)

## Backend Tasks

- Use Test Driven Development
- Create a Contact CRUD API with filtering on the read endpoint
- Must create the following
    - Model
    - Controller
    - Tests
    - Form Requests
    - Resources
- Update api routes to make endpoints public, no auth required for this
- run ```php artisan make:model``` to make a Contact Model, and generate all the code it will for you.
- complete the tests cases

## Frontend Tasks

- Create a one-page web app to display, add, and remove contacts
- Don't care about it being too pretty, focus on the functionality
- Start by completing the TODOs in store.js
- Utilize store actions in components to interact with store and the mock api that's already set up
- The 'page' should be built in App.vue (Vue Router is not installed)
    - List the contacts in a table with First Name, Last Name, Type, Age, and Actions columns
    - Have a create button above the table that opens a modal with form to create a new Contact
    - Have an update button in actions column that opens a modal with form to update existing Contact
    - Have a delete button in actions column that removes the Contact
- Required components to build
    - BaseInput
    - BaseSelect
    - BaseModal
- Notes: 
  - The app is built in Vue2 using options API
  - The store is Vuex3
  - css/style.css sets box-sizing and gives buttons a pointer
  - Use SCSS for in component styling language
  - You shouldn't touch anything in js/api directory
