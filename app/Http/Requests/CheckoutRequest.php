<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class CheckoutRequest extends FormRequest
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
            'first_name' => 'required|min:3',
            'last_name'  => 'required|min:3',
            'country'    => 'required',
            'address'    => 'required',
            'postcode'   => 'required',
            'city'       => 'required',
            'province'   => 'required',
            'phone'      => 'required',
            'email'      =>'required|email'
        ];
    }

    public function failedValidation(Validator $validator) {
        return json_encode(['validation' => 'error', 'errors' => $validator->errors()]);
    }
}
