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
        if (Auth::check()  && !$this->success) {
            return redirect("/");
        }
        $success = $this->success;
        return view('registration', compact('success'));
    }

    public function showLogin() {
        if (Auth::check()) {
            return redirect("/");
        }
        return view('login');
    }

    public function register(Request $request) {
        $validated = $request->validate([
            'name' => ['required',
                function ($attribute, $value, $fail) {
                    if (substr_count($value, ' ') !== 2) {
                        $fail("$value не является ФИО!");
                    }
                }],
            'login' => 'required|string|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create($validated);

        Auth::login($user);

        $this->success = true;

        return $this->showRegister();
    }

    public function login(Request $request) {
        $login = $request->input('login');
        $field = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'login';

        $validated = $request->validate([
            'login' => 'required|string',
            'password' => 'required|string|min:8',
        ]);

        if (Auth::attempt([
            $field => $login,
            'password' => $validated['password']
        ])) {
            $request->session()->regenerate();

            if (Auth::user()->hasRole(1)) {
                return redirect("/admin");
            }

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
