<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'username' => 'bail|required|min:3',
            'password' => 'bail|required|min:3'
        ];
    }

    public function messages()
    {
        return[
            'username.required' => 'Ten dang nhap khong duoc bo trong',
            'username.min' => 'Ten dang nhap qua ngan',
            'password.required' => 'Mat khau khong duoc bo trong',
            'password.min' => 'Mat khau qua ngan',
        ];
    }
}
