<?php

use App\Http\Controllers\GalleryController;
use App\Http\Controllers\InterestsController;
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

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/test', function () {
    return view('test');
});


