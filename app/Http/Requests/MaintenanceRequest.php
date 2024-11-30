<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MaintenanceRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|min:2|max:20',
            'days_remaining' => 'required||numeric|min:1|max:9000'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Informe o nome da manutenção',
            'name.min' => 'Nome da manutenção é muito pequeno',
            'name.max' => 'Nome da manutenção é muito grande',

            'days_remaining.required' => 'Informe o tempo de manutenção',
            'days_remaining.numeric' => 'Erro no valor de dias',
            'days_remaining.min' => 'Tempo em dias inválido',
        ];
    }
}
