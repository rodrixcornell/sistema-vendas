<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreVendaPost extends FormRequest
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
            'forma_pagamento' => 'required',
            'observacao' => 'required',
            'desconto' => 'required',
            'acrescimo' => 'required',
            'total' => 'required',
            // 'cliente_id' => 'required',
        ];
    }
}
