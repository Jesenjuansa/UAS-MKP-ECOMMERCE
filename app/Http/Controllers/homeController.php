<?php

namespace App\Http\Controllers;

use App\Models\TutorClass;
use Illuminate\Support\Facades\Auth;

class homeController extends Controller
{
    public function index()
    {
        // Tutor yang sedang login
        $tutor = Auth::user();

        // Ambil semua kelas milik tutor
        $classes = TutorClass::with('tutor')
                    ->where('tutor_id', $tutor->id)
                    ->get();

        return view('tutors.dashboard', compact('tutor', 'classes'));
    }
}
