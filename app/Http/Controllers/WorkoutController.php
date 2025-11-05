<?php

namespace App\Http\Controllers;

use App\Http\Requests\Workout\StoreWorkoutResquest;
use App\Models\Workout;
use Illuminate\Support\Facades\DB;

class WorkoutController extends Controller
{
    public function index()
    {
        return Workout::getAllWorkouts();
    }

    public function store(StoreWorkoutResquest $request)
    {
        $validated = $request->validated();
        DB::beginTransaction();
        try {
            $exercise = Workout::create($validated);
            DB::commit();
            return response()->json([
                'message' => 'Treino criado com sucesso.',
                'data' => $exercise['id'],
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => 'Erro ao criar Treino', 'details:' => $e->getMessage()], 500);
        }
    }
}
