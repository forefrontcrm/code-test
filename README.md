# Code Test - Contact Wallet

Build a basic web app that keeps track of contacts. 

## Installation
* Clone down the repo
* run ``` composer install ```
* run ``` cp .env.example .env ```
* run ``` php artisan key:generate ```
* run ``` npm install ```
* run ``` npm run dev``` to serve the app local
* setup database with name 'codetest'

### Contact Data Structure

- First Name (string, required)
- Last Name (string, required)
- Age (number, optional)
- Type (enum:Buyer or Seller, optional) (Buyer => 1, Seller => 2)
- Secret (uuid, required, only for backend)

## Backend Requirements

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

## Frontend Requirements

- Create a one-page web app to display, add, and remove contacts
- Don't care about it being pretty, focus on the functionality
- Must create the following
  - Input Component
  - Select Component
  - Modal
  - Table
- Use the mock api to interact with
