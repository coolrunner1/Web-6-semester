<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index() {
        $photos = Photo::PHOTOS;
        return view('gallery', compact('photos'));
    }
}
