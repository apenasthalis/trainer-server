<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'O campo "Nome" é obrigatório.',
            'email.required' => 'O campo "Email" é obrigatório.',
            'password.required' => 'O campo "Senha" é obrigatório.',
        ];
    }
}