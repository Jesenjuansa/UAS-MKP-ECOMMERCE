<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    // =========================
    // HALAMAN REGISTER
    // =========================

    public function showStudentForm()
    {
        return view('auth.register');
    }

    public function showTutorForm()
    {
        return view('auth.tutorRegister');
    }


    // =========================
    // PROSES REGISTER (SEMUA ROLE DISATUKAN)
    // =========================

    public function register(Request $request)
    {
        // Validasi umum
        $rules = [
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'role' => 'required|in:student,tutor',
            'password' => 'required|min:6|confirmed',
        ];

        // Validasi tambahan jika tutor
        if ($request->role === 'tutor') {
            $rules = array_merge($rules, [
                'phone_number' => 'required',
                'teaching_subject' => 'required',
                'class_type' => 'required',
                'rate_per_session' => 'required|integer',
                'pas_foto' => 'required|image|mimes:jpg,png,jpeg|max:2048',
            ]);
        }

        $request->validate($rules);

        // Jika tutor → upload foto
        $pasFotoPath = null;
        if ($request->role === 'tutor' && $request->hasFile('pas_foto')) {
            $pasFotoPath = $request->file('pas_foto')->store('pas_foto', 'public');
        }

        // Buat user baru
        $user = User::create([
            'full_name' => $request->full_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),

            'role' => $request->role,

            // Field tutor (nullable)
            'phone_number'     => $request->phone_number ?? null,
            'pas_foto'         => $pasFotoPath,
            'teaching_subject' => $request->teaching_subject ?? null,
            'class_type'       => $request->class_type ?? null,
            'rate_per_session' => $request->rate_per_session ?? null,
        ]);
        // Auto login setelah register
        Auth::login($user);

        // Redirect berdasarkan role
        // Redirect berdasarkan role
        return $user->role === 'tutor'
            ? redirect()->route('tutors.home')
            : redirect()->route('student.home');
    }
}
