<?php

namespace App\Http\Controllers;

use App\Http\Requests\Exercise\StoreExerciseRequest;
use App\Models\Exercise;
use Illuminate\Support\Facades\DB;

class ExerciseController extends Controller
{
    public function index()
    {
        return Exercise::gettAllExercise();
    }

    public function store(StoreExerciseRequest $request)
    {
        $validated = $request->validated();
        DB::beginTransaction();
        try {
            $exercise = Exercise::create($validated);
            DB::commit();
            return response()->json([
                'message' => 'Exercício criado com sucesso.',
                'data' => $exercise['id'],
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => 'Erro ao criar Exercício: ', 'details:' => $e->getMessage()], 500);
        }
    }
}
