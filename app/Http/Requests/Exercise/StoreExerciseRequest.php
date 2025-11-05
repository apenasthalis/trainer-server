<?php

namespace App\Http\Requests\Exercise;

use Illuminate\Foundation\Http\FormRequest;

class StoreExerciseRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required',
            'category' => 'required',
            'muscle_group' => 'required',
            'ds_exercise' => 'required',
            ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'O campo "Nome" é obrigatório.',
            'category.required' => 'O campo "Categoria" é obrigatório.',
            'muscle_group.required' => 'O campo "Grupo Muscular" é obrigatório.',
            'ds_exercise.required' => 'O campo "Descrição" é obrigatório.',
        ];
    }
}