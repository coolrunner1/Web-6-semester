<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\GuestBookController;
use App\Http\Controllers\HistoryController;
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

Route::post('/guestbook/reviews', [GuestBookController::class, 'store']);

Route::get('/admin/guestbook', [GuestBookController::class, 'index']);

Route::get('/admin/guestbook/reviews/download', [GuestBookController::class, 'downloadReviewsFile']);

Route::get('/admin/guestbook/reviews/upload', [GuestBookController::class, 'index']);

Route::post('/admin/guestbook/reviews/upload', [GuestBookController::class, 'uploadReviewFromFile']);

Route::get('/test', [TestController::class, 'index']);

Route::post('/test', [TestController::class, 'store']);

Route::get('/blog', [BlogController::class, 'index']);

Route::get('/admin/blog', [BlogController::class, 'blogEditIndex']);

Route::get('/admin/blog/add', [BlogController::class, 'blogEditIndex']);

Route::post('/admin/blog/add', [BlogController::class, 'store']);

Route::get('/admin/blog/upload', [BlogController::class, 'blogEditIndex']);

Route::post('/admin/blog/upload', [BlogController::class, 'addBlogPostsFromFile']);

Route::get('/admin/blog/download', [BlogController::class, 'downloadBlogPostsFile']);

Route::get("/login", [AuthController::class, "showLogin"]);

Route::post("/login", [AuthController::class, "login"]);

Route::get("/register", [AuthController::class, 'showRegister']);

Route::post("/register", [AuthController::class, 'register']);

Route::get("/logout", [AuthController::class, "logout"]);

Route::get("/admin", [AdminController::class, 'index']);

Route::get("/admin/history", [HistoryController::class, 'index']);
