<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProductRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'uuid' => ['exists:products,uuid'],
            'name' => ['required'],
            'quantity' => ['required'],
        ];
    }

    public function attributes()
    {
        return [
            'uuid' => 'Sku',
            'name' => 'Nome',
            'quantity' => 'Quantidade',
        ];
    }

    public function messages()
    {
        $msg = 'O campo :attribute é obrigatório.';

        return [
            'uuid.exists' => 'Produto não encontrado',
            'name.required' => $msg,
            'quantity.unique' => $msg,
        ];
    }
}
