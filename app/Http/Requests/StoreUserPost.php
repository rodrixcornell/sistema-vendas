<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserPost extends FormRequest
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
            'name' => 'required|max:100',
            // 'telefone' => 'required|max:20',
            // 'cpf' => 'digits:11|nullable',
            'email' => 'required|max:100|email|unique:users,email',
            'password' => 'required|min:8',
        ];
    }
}
