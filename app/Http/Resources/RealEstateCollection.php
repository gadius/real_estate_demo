<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class RealEstateCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'realestates' => $this->collection->map(function($elem){
                return [
                    'id' => $elem->id,
                    'name' => $elem->name,
                    'real_state_type' => $elem->real_state_type,
                    'city' => $elem->city,
                    'country' => $elem->country,
                ];
            })            
        ];
    }
}
