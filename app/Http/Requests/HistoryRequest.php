<?php

namespace App\Http\Requests;

use App\Enum\ActionType;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class HistoryRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'product_id' => ['required'],
            'sku' => ['exists:products,uuid', 'required'],
            'quantity' => ['required'],
            'action_type' => ['required', Rule::in([ActionType::INITIAL, ActionType::ADDED, ActionType::REMOVED])],
        ];
    }

    public function attributes()
    {
        return [
            'sku' => 'Produto',
            'quantity' => 'Quantidade',
            'action_type' => 'Tipo da ação',
        ];
    }

    public function messages()
    {
        $msg = 'O campo :attribute é obrigatório.';

        return [
            'sku.exists' => 'Produto não encontrado.',
            'quantity.unique' => $msg,
            'action_type.required' => $msg,
        ];
    }
}
