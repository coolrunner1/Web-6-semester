<?php

namespace App\Http\Controllers;

use App\Models\Visit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class HistoryController extends Controller
{
    public function index() {
        if (!Auth::check()) {
            return redirect('/login');
        }

        if (!Auth::user()->hasRole(1)) {
            return redirect('/');
        }

        $visits = Visit::orderBy('visited_at', 'desc')->paginate(10);

        return view('admin.history', compact('visits'));
    }
}
