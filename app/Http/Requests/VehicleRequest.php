<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VehicleRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'min:2|max:80|required',
            'brand' => 'min:2|max:80|required',
            'version' => 'min:1|max:80|required'
        ];
    }

    public function messages()
    {
        return [
            'name.min' => 'O nome do modelo é pequeno demais',
            'name.max' => 'O nome do modelo é muito grande',
            'name.required' => 'Informe o modelo',

            'brand.min' => 'A marca possui o nome muito pequeno',
            'brand.max' => 'A marca possui o nome muito grande',
            'brand.required' => 'Informe a marca',

            'version.min' => 'A versão possui pouco texto',
            'version.max' => 'A versão possui muito texto',
            'version.required' => 'Informe a versão',
        ];
    }
}
