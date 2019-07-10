<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'first_name' =>'required',
            'last_name'  =>'required',
            'address'    =>'required',
            'state'      =>'required',
        ];
    }

    public function messages(){
        return [
            'first_name.required' => 'Enter a first name.',
            'last_name.required'  => 'Enter a last name.',
            'address.required'    => 'Enter an address .',
            'state.required'      => 'Enter a country.',
        ];
    }
}
