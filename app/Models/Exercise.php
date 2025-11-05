<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    protected $table = 'exercise';
    protected $fillable = [
        'name',
        'category',
        'muscle_group',
        'ds_exercise',
    ];

    public static function gettAllExercise()
    {
        return Exercise::All();
    }
}
