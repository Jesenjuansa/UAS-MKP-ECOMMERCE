<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // =========================
    // HALAMAN LOGIN
    // =========================

    public function showLoginForm()
    {
        return view('auth.login');
    }


    // =========================
    // PROSES LOGIN
    // =========================

    public function login(Request $request)
    {
        $request->validate([
            'login' => 'required',
            'password' => 'required'
        ]);

        // Tentukan apakah yang diinput email atau username (full_name)
        $loginField = filter_var($request->login, FILTER_VALIDATE_EMAIL)
            ? 'email'
            : 'full_name';

        // Coba login
        if (Auth::attempt([$loginField => $request->login, 'password' => $request->password])) {
            $request->session()->regenerate();

            // Redirect sesuai role
            return Auth::user()->role === 'tutor'
                ? redirect()->route('tutors.home')
                : redirect()->route('student.home');
        }

        // Jika gagal
        return back()->withErrors([
            'login' => 'Incorrect email/username or password.',
        ]);
    }


    // =========================
    // LOGOUT
    // =========================

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
