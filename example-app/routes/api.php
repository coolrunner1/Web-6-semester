<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post("/check-login", [AuthController::class, 'checkLoginAvailability']);
Route::get("/blog/{id}/comments", [CommentController::class, 'getCommentsByBlogPostId']);
