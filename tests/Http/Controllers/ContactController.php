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
    public function getFilteredContactList()
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
}

