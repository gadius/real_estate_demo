<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Response;



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
        $internal_number_regex = '/^[a-zA-Z0-9-]+$/';
        $iso3166_keys = collect(array_keys(config('iso3166.codes')))->implode(',');

        $rules = [
            'name' => 'required|max:128',
            'real_state_type' => "required|in:house,department,land,commercial_ground",
            'street' => 'required|max:128',
            'external_number' => 'required|max:12|regex:/^[a-zA-Z0-9-]+$/',
            'internal_number' => "regex:$internal_number_regex",
            'neighborhood' => 'required|max:128',
            'city' => "required|max:64",
            'country' => "required|in:$iso3166_keys",
            'rooms' => 'required|integer|between:-9999999999,9999999999',   
            'bathrooms' => 'required|numeric|between:-999999.99,999999.99|not_in:0',
            'comments' => 'max:128',
        ];

        if($this->real_state_type == 'land' || $this->real_state_type == 'commercial_ground')
            $rules['bathrooms'] = 'required|numeric|between:-999999.99,999999.99';
        if($this->real_state_type == 'department' || $this->real_state_type == 'commercial_ground')
            $rules['internal_number'] = "required|regex:$internal_number_regex";

        return $rules;
    }
    

    /*  
        This code retrieves the failed validation as JSON instead redirecting back to view
    */
    public function failedValidation(Validator $validator)
    {
        $errors = $validator->errors();

        throw new HttpResponseException(response()->json([
            'errors' => $errors
        ], Response::HTTP_UNPROCESSABLE_ENTITY));
    }
}
