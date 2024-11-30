<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'email' => 'required|min:5|max:80',
            'password' => 'required|min:5|max:18'
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'O email é inválido',
            'email.min' => 'O email é inválido',
            'email.max' => 'O email é inválido',

            'password.required' => 'Preencha o campo senha',
            'password.min' => 'A senha deve conter mais de 4 caracteres e menos de 18',
            'password.max' => 'A senha deve conter mais de 4 caracteres e menos de 18',
        ];
    }
}
