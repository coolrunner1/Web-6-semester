<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['blog_id', 'author', 'body'];

    /** @use HasFactory<\Database\Factories\CommentFactory> */
    use HasFactory;

    public function blog() {
        return $this->belongsTo(Blog::class);
    }
}
