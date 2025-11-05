<?php

use App\Http\Controllers\ExerciseController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WorkoutController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/user', [UserController::class, 'index']);
Route::post('/user', [UserController::class, 'store']);

Route::get('/exercise', [ExerciseController::class, 'index']);
Route::post('/exercise', [ExerciseController::class, 'store']);

Route::get('/workout', [WorkoutController::class, 'index']);
Route::post('/workout', [WorkoutController::class, 'store']);
