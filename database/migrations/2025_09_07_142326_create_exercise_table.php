<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('exercise', function (Blueprint $table) {
            $table->increments('id');
            $table->text('name');
            $table->integer('category');
            $table->text('muscle_group');
            $table->text('ds_exercise');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('exercise');
    }
};
