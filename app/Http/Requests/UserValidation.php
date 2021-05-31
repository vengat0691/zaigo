<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserValidation extends FormRequest
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
            'type' => 'required|string',
            'name' => 'required|string|max:35',
            'email' => 'required|string|email|max:75|unique:users',
            'address' => 'required|string|max:450',
            'zip_code' => 'required|string|max:6',
            'mobile' => 'required|string|max:10',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:100240',
        ];
    }

    public function messages()
    {

        return [

            'type.required' => 'Please select a type!',
            'name.required' => 'Please enter a name!',
            'email.required' => 'Please enter a email!',
            'address.required' => 'Please enter a address!',
            'zip_code.required' => 'Please enter a zip_code!',
            'mobile.required' => 'Please enter a mobile!',

        ];
    }
}
