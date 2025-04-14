<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('test_results', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->string('group');
            $table->integer('age');
            $table->string('answer1');
            $table->string('answer2');
            $table->string('answer3');
            $table->boolean('answer1IsCorrect');
            $table->boolean('answer2IsCorrect');
            $table->boolean('answer3IsCorrect');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('test_results');
    }
};
