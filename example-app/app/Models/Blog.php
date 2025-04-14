<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = ['author', 'topic', 'image', 'body'];

    /** @use HasFactory<\Database\Factories\BlogFactory> */
    use HasFactory;
}
