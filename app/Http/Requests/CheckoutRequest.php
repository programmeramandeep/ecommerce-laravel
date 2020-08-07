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
            'billing_firstname' => 'required|string|max:100',
            'billing_lastname' => 'required|string|max:100',
            'billing_email' => 'required|email:rfc,spoof,filter|max:100|exists:users,email',
            'billing_address_line1' => 'required|string|max:255',
            'billing_address_line2' => 'string|nullable|max:255',
            'billing_city' => 'required|string|max:100',
            'billing_province' => 'required|string|max:100',
            'billing_postalcode' => 'required|string|max:15',
            'billing_country' => 'required|string|max:100',
            'billing_phone' => 'required|phone:IN',
            'billing_order_notes' => 'nullable|string|max:255'
        ];
    }
}
