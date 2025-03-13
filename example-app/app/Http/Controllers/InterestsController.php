<?php

namespace App\Http\Controllers;

use App\Models\Interests;
use Illuminate\Http\Request;

class InterestsController extends Controller
{
    public function index() {
        $interests = Interests::INTERESTS;
        $titles = array_map(function($interest) {
            return $interest['title'];
        }, $interests);
        return view('interests', compact('interests', 'titles'));
    }
}
