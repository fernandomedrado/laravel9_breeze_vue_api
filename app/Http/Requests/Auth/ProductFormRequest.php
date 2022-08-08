<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductFormRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'id' => [],
            'name' => ['required', 'string'],
            'description' => ['required', 'string'],
            'amount' => ['required', 'string'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nome do produto obrigatório',
            'description.required' => 'Descrição obrigatório',
            'amount.required' => 'Valor obrigatório',
        ];
    }

}