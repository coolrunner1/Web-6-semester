<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    private bool $success;

    public function __construct() {
        $this->success = false;
    }

    public function showRegister() {
        $success = $this->success;
        return view('registration', compact('success'));
    }

    public function showLogin() {
        $success = false;
        return view('login', compact('success'));
    }

    public function register(Request $request) {
        $validated = $request->validate([
            'name' => ['required',
                function ($attribute, $value, $fail) {
                    if (substr_count($value, ' ') !== 2) {
                        $fail("$value не является ФИО!");
                    }
                }],
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create($validated);

        Auth::login($user);

        $this->success = true;

        return redirect("/register");
    }

    public function login(Request $request) {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:8',
        ]);

        if (Auth::attempt($validated)) {
            $request->session()->regenerate();

            return redirect('/');
        }

        throw ValidationException::withMessages([
            'credentials' => 'Был введён неверный пароль, либо на введённый почтовый адрес не зарегистрирован аккаунт.',
        ]);

    }

    public function logout(Request $request) {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect("/");
    }
}
