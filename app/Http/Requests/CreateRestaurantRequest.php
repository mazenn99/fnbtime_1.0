<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateRestaurantRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'           => 'required|string',
            'country'        => 'required|numeric',
            'city'           => 'required|numeric',
            'type_food'      => 'required',
            'phone'          => 'required|numeric',
            'description'    => 'required|string',
            'menu'           => 'required|mimes:jpg,jpeg,png,pdf',
            'location'       => 'required|url',
            'manager_number' => 'nullable|numeric|min:8' , 
            'manager_email'  => 'nullable|email|max:100'
        ];
    }
}
