<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Workout extends Model
{
    protected $table = 'workout';
    protected $fillable = [
        'name',
        'ts_workout',
        'observation',
        'id_exercise',
    ];

    public static function getAllWorkouts()
    {
        return self::all();
    }
}
