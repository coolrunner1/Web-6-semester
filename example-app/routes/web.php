<?php

use App\Http\Controllers\BlogController;
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

Route::get('/guestbook/reviews/download', [GuestBookController::class, 'downloadReviewsFile']);

Route::get('/guestbook/reviews/upload', [GuestBookController::class, 'index']);

Route::post('/guestbook/reviews/upload', [GuestBookController::class, 'uploadReviewFromFile']);

Route::post('/guestbook/reviews', [GuestBookController::class, 'addReview']);

Route::get('/test', [TestController::class, 'index']);

Route::post('/test', [TestController::class, 'store']);

Route::get('/blog', [BlogController::class, 'index']);

Route::get('/blog/edit', [BlogController::class, 'blogEditIndex']);

Route::get('/blog/add', [BlogController::class, 'blogEditIndex']);

Route::post('/blog/add', [BlogController::class, 'addBlogPost']);

Route::get('/blog/upload', [BlogController::class, 'blogEditIndex']);

Route::post('/blog/upload', [BlogController::class, 'addBlogPostsFromFile']);

Route::get('/blog/download', [BlogController::class, 'downloadBlogPostsFile']);

Route::get("/login", function () {
    return view("login");
});

Route::get("/registration", function () {
    return view("registration");
});
