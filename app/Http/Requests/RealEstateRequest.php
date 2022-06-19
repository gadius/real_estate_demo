<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class RealEstateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    /*
    public function authorize()
    {
        return true;
    }
    */

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    
    public function rules()
    {   
        /*
        'porcentaje_descuento' => 'required|numeric|between:0,99',
        'regla_sugerir_precio_venta' => 'sometimes|max:10',
        */

        $internal_number_regex = '/^[a-zA-Z0-9-]+$/';

        $rules = [
            'name' => 'required|max:128',
            'real_state_type' => "required|in:house,department,land,commercial_ground",
            'street' => 'required|max:128',
            'external_number' => 'required|max:12|regex:/^[a-zA-Z0-9-]+$/',
            'internal_number' => 'regex'.$internal_number_regex,
            'neighborhood' => 'required',
            'city' => 'required',
            'country' => 'required',
            'rooms' => 'required',   
            'bathrooms' => 'required',            
            'comments' => 'max:128',
        ];

        if($this->real_state_type == 'land' || $this->real_state_type == 'commercial_ground')
            $rules['bathrooms'] = 'required|min:0';
        if($this->real_state_type == 'department' || $this->real_state_type == 'commercial_ground')
            $rules['internal_number'] = 'required:regex'.$internal_number_regex;

        return $rules;
    }
    

    /*  
        This code 
    */
    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success'   => false,
            'message'   => 'Validation errors',
            'data'      => $validator->errors()
        ]));
    }
}
