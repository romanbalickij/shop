<?php

namespace App\Http\Requests\Checkout;

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

           'first_name' => 'required',
           'last_name'  => 'required',
           'address'    => 'required',
           'city'       => 'required',
           'phone'      => 'required|integer',
           'email'      => 'required|email'

        ];
    }

    public function messages()
    {
        return [
            'first_name.required' => 'You need to provide your names!',
            'last_name.required' => 'Please enter a last name!',
            'address.required  ' => 'Please enter  your  address!',
            'city.required'      => 'Please enter your  city!',
            'phone.required'     => 'Please enter you  phone!',
            'email.required|email' => 'You need to provide your names!',
        ];

    }

}
