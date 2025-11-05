<?php

namespace App\Http\Requests\Workout;

use Illuminate\Foundation\Http\FormRequest;

class StoreWorkoutResquest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required',
            'ts_workout' => 'required',
            'observation' => 'required',
            'id_exercise' => 'required',
            ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'O campo "Nome" é obrigatório.',
            'ts_workout.required' => 'O campo "Tempo" é obrigatório.',
            'observation.required' => 'O campo "Observação" é obrigatório.',
            'id_exercise.required' => 'O campo "Exercício" é obrigatório.',
        ];
    }
}