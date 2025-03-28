<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = ['name', 'email', 'body'];

    /** @use HasFactory<\Database\Factories\ReviewFactory> */
    use HasFactory;
}
