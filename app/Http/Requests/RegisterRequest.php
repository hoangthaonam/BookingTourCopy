<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'username' => 'bail|required|min:3|unique:users',
            'email' => 'bail|required|min:3|email|unique:users',
            'password' => 'bail|required|min:3|same:re_password',
            're_password' => 'bail|required|min:3|same:password',
            'name' => 'bail|required|min:3',
            'address' => 'bail|required|min:3',
            'phone' => 'bail|required|min:3',
        ];
    }
}
