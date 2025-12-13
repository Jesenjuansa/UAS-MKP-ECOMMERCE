<?php

namespace App\Http\Controllers\Student;

use App\Models\TutorClass;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class homeStudentController extends Controller
{
    /**
     * ================================
     * 1. HOME STUDENT (MENAMPILKAN SEMUA CLASSES)
     * ================================
     */
    public function index()
    {
        // Ambil semua kelas bersama data tutor
        $classes = TutorClass::with('tutor')->get();

        return view('student.dashboard', compact('classes'));
    }


    /**
     * ================================
     * 2. HALAMAN DETAIL CLASS (LEARN NOW)
     * ================================
     */
    public function showClassDetail($id)
    {
        // Ambil kelas berdasarkan ID + relasi tutor
        $class = TutorClass::with('tutor')->findOrFail($id);

        // Data tutor pemilik kelas
        $tutor = $class->tutor;

        // Rating masih dummy (nanti bisa diganti dengan tabel rating)
        $rating = 4.8;

        return view('student.tutorDetail', compact('class', 'tutor', 'rating'));
    }
}
