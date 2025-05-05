<?php

namespace App\Http\Controllers;

use App\Models\Visit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index() {
        if (!Auth::check()) {
            return redirect('/login');
        }

        if (!Auth::user()->hasRole(1)) {
            return redirect('/');
        }

        return view('admin.home');
    }
}

