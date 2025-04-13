<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestResults extends Model
{
    protected $fillable = ['name', 'group', 'age', 'answer1', 'answer2', 'answer3', 'answer1IsCorrect', 'answer2IsCorrect', 'answer3IsCorrect'];

    /** @use HasFactory<\Database\Factories\TestResultsFactory> */
    use HasFactory;
}
