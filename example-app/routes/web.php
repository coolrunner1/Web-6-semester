<?php

use App\Http\Controllers\GalleryController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/interests', function () {
    return view('interests');
});

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


