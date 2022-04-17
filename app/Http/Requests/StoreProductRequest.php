<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => ['required'],
            'quantity' => ['required'],
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Nome',
            'quantity' => 'Quantidade',
        ];
    }

    public function messages()
    {
        $msg = 'O campo :attribute é obrigatório.';

        return [
            'name.required' => $msg,
            'quantity.unique' => $msg,
        ];
    }
}
