<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use \App\Models\RealEstate;
use Illuminate\Http\Response;

class RealEstateControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    
    

    /** @test  */
    public function everyone_can_browse_realestate_index()
    {
        /*
        RealEstate::factory(5)->create();
        $response = $this->get('/api/realestate');

        $response->assertStatus(200);
        */

        $this->json('get', 'api/realestate')
         ->assertStatus(Response::HTTP_OK);
    }

    /** @test  */
    public function everyone_can_browse_realestate_index_specific_columns()
    {
        /*
        RealEstate::factory(5)->create();
        $response = $this->get('/api/realestate');

        $response->assertStatus(200);
        */

        $this->json('get', 'api/realestate')
         ->assertStatus(Response::HTTP_OK)
         ->assertJsonStructure(
             [            
                'data' => [
                    'realestates' => [
                        '*' => [
                            'id',
                            'name',
                            'real_state_type',
                            'city',
                            'country'
                       ]
                    ]                    
                ],
             ]
         );
    }


    /** @test  */
    /*
    public function everyone_can_create_realestate_store()
    {
        //$response = $this->get('/api/realestate');
        $realestate_data = [
            'name' => 'MX',
            'real_state_type' => 'MX',
            'street' => 'MX',
            'external_number' => 'MX',
            'internal_number' => 'MX',
            'neighborhood' => 'MX',
            'city' => 'MX',
            'country' => 'MX',
            'rooms' => 10,
            'bathrooms' => 12,
            'comments' => 'MX',
        ];

        $this->json('POST', 'api/realestate', $realestate_data, ['Accept' => 'application/json'])
            ->assertStatus(201)
            ->assertJson([
                "realestate" => [
                    'name' => 'MX',
                    'real_state_type' => 'MX',
                    'street' => 'MX',
                    'external_number' => 'MX',
                    'internal_number' => 'MX',
                    'neighborhood' => 'MX',
                    'city' => 'MX',
                    'country' => 'MX',
                    'rooms' => 10,
                    'bathrooms' => 12,
                    'comments' => 'MX',
                ],
                "message" => "Created successfully"
            ]);
    }
    */
}
