<?php

namespace App\Http\Requests;

use App\Rules\MatchOldPassword;
use Illuminate\Foundation\Http\FormRequest;

class PasswordChangeRequest extends FormRequest
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
            'current-password' => ['required', new MatchOldPassword],
            'new-password' => 'required|min:8|max:50|regex:/[a-z]/|regex:/[A-Z]/|regex:/[0-9]/|regex:/[@$!%*#?&]/|different:current-password',
            'confirm-password' => 'required|max:50|same:new-password',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'new-password.regex' => 'Password must contain at least one number, one special character and both uppercase and lowercase letters.',
        ];
    }
}
