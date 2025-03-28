<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\GuestBookController;
use App\Http\Controllers\InterestsController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/interests', [InterestsController::class, 'index']);

Route::get('/studies', function () {
    return view('studies');
});

Route::get('/gallery', [GalleryController::class, 'index']);

Route::get('/contact', [ContactController::class, 'index']);

Route::post('/contact', [ContactController::class, 'store']);

Route::get('/guestbook', [GuestBookController::class, 'index']);

Route::get('/guestbook/reviews', [GuestBookController::class, 'getReviews']);

Route::post('/guestbook/reviews', [GuestBookController::class, 'addReview']);

Route::get('/test', [TestController::class, 'index']);

Route::post('/test', [TestController::class, 'store']);
