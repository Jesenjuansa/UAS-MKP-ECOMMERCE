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
       /*  $credentials = $request->validate([
            'login' => 'required',
            'password' => 'required'
        ]);

        // Tentukan apakah yang diinput email atau username (full_name)
        $loginField = filter_var($request->login, FILTER_VALIDATE_EMAIL)
            ? 'email'
            : 'full_name';

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Redirect berdasarkan role
            if (Auth::user()->role === 'admin') {
                return redirect()->route('admin.dashboard')->with('success', 'Berhasil login sebagai Admin.');
            } elseif (Auth::user()->role === 'tutor') {
                return redirect()->route('tutor.home')->with('success', 'Berhasil login sebagai Tutor.');
            } elseif (Auth::user()->role === 'student') {
                return redirect()->route('student.home')->with('success', 'Berhasil login sebagai Student.');
            } else {
                return redirect()->route('dashboard')->with('success', 'Berhasil login sebagai guest.');
            }
        } */

              // Validasi input
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ], [
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'password.required' => 'Password wajib diisi.',
        ]);

        // Coba login
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Redirect berdasarkan role
            if (Auth::user()->role === 'admin') {
                return redirect()->route('admin.dashboard')->with('success', 'Berhasil login sebagai Admin.');
            } elseif (Auth::user()->role === 'tutor') {
                return redirect()->route('tutors.home')->with('success', 'Berhasil login sebagai Tutor.');
            } elseif (Auth::user()->role === 'student') {
                return redirect()->route('student.home')->with('success', 'Berhasil login sebagai Student.');
            } else {
                return redirect()->route('dashboard')->with('success', 'Berhasil login sebagai guest.');
            }
        }

        // Jika gagal
        return back()->withErrors([
            'email' => 'Incorrect email/username or password.',
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
