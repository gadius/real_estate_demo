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
        $this->json('get', 'api/realestate')
         ->assertStatus(Response::HTTP_OK);
    }

    /** @test  */
    public function everyone_can_browse_realestate_index_specific_columns()
    {
        RealEstate::factory(5)->create();

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
    public function everyone_can_create_realestate_store()
    {
        $realestate_data = [
            'name' => 'Name testing',
            'real_state_type' => 'house',
            'street' => 'Street name and testing',
            'external_number' => '123-123',
            'internal_number' => '123-123',
            'neighborhood' => 'neighborhood test',
            'city' => 'La Paz',
            'country' => 'MX',
            'rooms' => 10,
            'bathrooms' => 12,
            'comments' => 'Comment testing',
        ];



        $this->json('post', 'api/realestate', $realestate_data,['Accept' => 'application/json'])
         ->assertStatus(Response::HTTP_OK)
         ->assertJsonStructure(
            [
                'data' => [
                    'id',
                    'name',
                    'real_state_type',
                    'street',
                    'external_number',
                    'internal_number',
                    'neighborhood',
                    'city',
                    'country',
                    'rooms',
                    'bathrooms',
                    'comments',
                    'created_at',
                    'updated_at',
                    'deleted_at',
                ]
            ]
        );
         

        $this->assertDatabaseHas('real_estates', $realestate_data);
    }
    
}
