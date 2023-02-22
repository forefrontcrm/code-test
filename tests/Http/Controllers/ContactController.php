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
     * @dataProvider filteredRequestDataProvider
     */
    public function getFilteredContactList($request, $expectedResults)
    {
        $contact = new Contact([
            'first_name' => 'Willy',
            'last_name' => 'Wonka',
            'age' => 36,
            'type' => 2, // 1: Seller, 2: Buyer
        ]);
        $contact->secret = Str::uuid();
        $contact->save();

        $response = $this->getJson("/api/contacts?" . http_build_query($request));
        $response->assertOk();
        $response->assertJsonCount($expectedResults, 'data');
    }

    private function filteredRequestDataProvider(): array
    {

        /**
         *      Filter By Age: by greater then, less then, between, or all ages
         *      Filter By Type: is, is not, or all
         *              Note:  We may add more types in the future.
         *
         *  'age_filter': '>', '<', 'between', 'all'
         *  'type_filter': '=', '!=', 'all'
         */
        return [
            [['age_filter' => '<', 'age_value' => 30,             'type_filter' => 'all', 'type_value' => null], 0],
            [['age_filter' => '=', 'age_value' => 36,             'type_filter' => 'all', 'type_value' => null], 1],
            [['age_filter' => '>', 'age_value' => 30,             'type_filter' => 'all', 'type_value' => null], 1],
            [['age_filter' => 'between', 'age_value' => [30, 60], 'type_filter' => 'all', 'type_value' => null], 1],
            [['age_filter' => 'between', 'age_value' => [50, 60], 'type_filter' => 'all', 'type_value' => null], 0],
            [['age_filter' => 'all', 'age_value' => null,         'type_filter' => 'all', 'type_value' => null], 1],


            [['age_filter' => 'all', 'age_value' => null, 'type_filter' => '=',   'type_value' => 2],    1],
            [['age_filter' => 'all', 'age_value' => null, 'type_filter' => '!=',  'type_value' => 2],    0],
            [['age_filter' => 'all', 'age_value' => null, 'type_filter' => 'all', 'type_value' => null], 1],
        ];
    }
}

