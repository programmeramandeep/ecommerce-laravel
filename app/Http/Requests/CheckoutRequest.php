<?php

namespace App\Http\Requests;

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
            'firstname' => 'required|string|max:100',
            'lastname' => 'required|string|max:100',
            'your-email' => 'required|email:rfc,spoof,filter|max:100|exists:users,email',
            'address-line1' => 'required|string|max:255',
            'address-line2' => 'string|nullable|max:255',
            'city' => 'required|string|max:100',
            'province' => 'required|string|max:100',
            'country' => 'required|string|max:100',
            'postalcode' => 'required|string|max:15',
            'phone' => 'required|phone:IN|exists:users,phone',
            'new-shipping-address' => 'nullable|bool',
            'new-firstname' => 'exclude_unless:new-shipping-address,true|required|string|max:100',
            'new-lastname' => 'exclude_unless:new-shipping-address,true|required|string|max:100',
            'new-email' => 'exclude_unless:new-shipping-address,true|required|email:rfc,spoof,filter|max:100|unique:users,email',
            'new-address-line1' => 'exclude_unless:new-shipping-address,true|required|string|max:255',
            'new-address-line2' => 'exclude_unless:new-shipping-address,true|string|nullable|max:255',
            'new-city' => 'exclude_unless:new-shipping-address,true|required|string|max:100',
            'new-province' => 'exclude_unless:new-shipping-address,true|required|string|max:100',
            'new-country' => 'exclude_unless:new-shipping-address,true|required|string|max:100',
            'new-postalcode' => 'exclude_unless:new-shipping-address,true|required|string|max:15',
            'new-phone' => 'exclude_unless:new-shipping-address,true|required|phone:IN|unique:users,phone',
            'checkout-message' => 'nullable|string|max:255'
        ];
    }
}
