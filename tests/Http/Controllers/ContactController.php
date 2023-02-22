<?php

namespace Tests\Http\Controllers;

use App\Contact;
use Illuminate\Support\Str;

class ContactController extends \Tests\TestCase
{
    /**
     * @test
     */
    public function createContact()
    {
        $request = [
            'first_name' => 'Willy',
            'last_name' => 'Wonka',
            'age' => 36,
            'type' => 2, // 1: Seller, 2: Buyer
        ];

        $response = $this->postJson("/api/contacts", $request);
        $response->assertStatus(201);

        /** @var Contact $contact */
        $contact = Contact::query()->orderBy('id', 'desc')->first();
        $this->assertDatabaseHas('contacts', [
            'id' => $contact->id,
            'first_name' => 'Willy',
            'last_name' => 'Wonka',
            'age' => 36,
            'type' => 2, // 1: Seller, 2: Buyer
        ]);

        $response->assertExactJson([
            'data' => [
                'id' => $contact->id,
                'first_name' => 'Willy',
                'last_name' => 'Wonka',
                'age' => 36,
                'type' => 2, // 1: Seller, 2: Buyer
            ]
        ]);
    }

    /**
     * @test
     */
    public function updateContact()
    {
        $request = [

        ];

        $response = $this->postJson("/api/contacts", $request);
        $response->assertOk();
    }

    /**
     * @test
     */
    public function getAContact()
    {
        $request = [

        ];

        $response = $this->postJson("/api/contacts", $request);
        $response->assertOk();
    }

    /**
     * @test
     */
    public function deleteContact()
    {
        $request = [

        ];

        $response = $this->postJson("/api/contacts", $request);
        $response->assertOk();
    }

    /**
     * @test
     */
    public function getFilteredContactList()
    {
        /**
         * Filter By Age: by greater then, less then, between, or all ages
         * Filter By Type: is, is not, or all
         *          Note:  We may add more types in the future.
         */
        $request = [

        ];

        $response = $this->postJson("/api/contacts", $request);
        $response->assertOk();
    }
}

