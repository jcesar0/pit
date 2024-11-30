<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|min:3|max:80',
            'email' => 'required|min:5|max:80|unique:users',
            'password' => 'required|min:5|max:18'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'O campo nome é obrigatório',
            'name.min' => 'O nome informado é muito grande',
            'name.max' => 'O nome é muito pequeno',

            'email.required' => 'O email é inválido',
            'email.min' => 'O email é inválido',
            'email.max' => 'O email é inválido',
            'email.unique' => 'Este email já está cadastrado',

            'password.required' => 'Preencha o campo senha',
            'password.min' => 'A senha deve conter mais de 4 caracteres e menos de 18',
            'password.max' => 'A senha deve conter mais de 4 caracteres e menos de 18',
        ];
    }
}
