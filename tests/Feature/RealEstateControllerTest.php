<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use \App\Models\RealEstate;
use Illuminate\Http\Response;

class RealEstateControllerTest extends TestCase
{
    //use RefreshDatabase;
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
        $realestate_data = RealEstate::factory()->create()->toArray();    

        $this->json('post', 'api/realestate', $realestate_data,['Accept' => 'application/json'])
         ->assertStatus(Response::HTTP_OK);         

        $this->assertDatabaseHas('real_estates', $realestate_data);
    }

    /** @test  */    
    public function everyone_can_edit_realestate_update()
    {
        $realestate = RealEstate::factory()->create();

        $realestate_data_modified = [
            'name' => 'Name testing updated',
            'real_state_type' => 'land',
            'street' => 'Street name and testing updated',
            'external_number' => '123-123-6',
            'internal_number' => '123-123-6',
            'neighborhood' => 'neighborhood test updated',
            'city' => 'La Paz updated',
            'country' => 'US',
            'rooms' => 20,
            'bathrooms' => 30,
            'comments' => 'Comment testing updated',
        ];


        $this->json('patch', "api/realestate/$realestate->id", $realestate_data_modified,['Accept' => 'application/json'])
         ->assertStatus(Response::HTTP_OK)
         ->assertJson(
            [
                'data' => $realestate_data_modified
            ]
        );         

        $this->assertDatabaseHas('real_estates', $realestate_data_modified);
    }

    /** @test  */    
    public function everyone_can_show_realestate()
    {
        
        $realestate = RealEstate::factory()->create();  

        $this->json('get', "api/realestate/$realestate->id",['Accept' => 'application/json'])
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
    }

    /** @test  */    
    public function everyone_can_delete_realestate()
    {
        $realestate = RealEstate::factory()->create();  

        $this->json('delete', "api/realestate/$realestate->id",['Accept' => 'application/json'])
            ->assertStatus(Response::HTTP_OK);
        $this->assertSoftDeleted('real_estates',['id'=> $realestate->id]);  
    }
    
}
