<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/api', function () {
    print "ai caralho";
});
 
Route::get('/user', [UserController::class, 'index']);