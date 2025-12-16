<?php

namespace App\Http\Controllers\Student;

use App\Models\Rating;
use App\Models\TutorClass;
use App\Models\TutorRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class homeStudentController extends Controller
{
    /**
     * ================================
     * 1. HOME STUDENT
     * ================================
     */
    public function index()
    {
        $classes = TutorClass::with('tutor')->get();
        return view('student.dashboard', compact('classes'));
    }

    /**
     * ================================
     * 2. DETAIL CLASS
     * ================================
     */
    public function showClassDetail($id)
{
    $class = TutorClass::with('tutor')->findOrFail($id);
    $tutor = $class->tutor;

    // ⭐ ambil rating tutor
    $averageRating = round(
        Rating::where('tutor_id', $tutor->id)->avg('rating') ?? 0,
        1
    );

    $totalRaters = Rating::where('tutor_id', $tutor->id)->count();

    // 🔥 AMBIL PESAN REVIEW + STUDENT
    $reviews = Rating::with('student')
        ->where('tutor_id', $tutor->id)
        ->whereNotNull('review')
        ->latest()
        ->get();

    return view('student.tutorDetail', compact(
        'class',
        'tutor',
        'averageRating',
        'totalRaters',
        'reviews'
    ));
}



    /**
     * ================================
     * 3. STUDENT REQUEST CLASS
     * ================================
     */
    public function sendRequest(Request $request)
    {
        $studentId = Auth::id();

        // ❗ BATAS REQUEST PER HARI
        $todayCount = TutorRequest::where('student_id', $studentId)
            ->whereDate('created_at', now())
            ->count();

        if ($todayCount >= 3) {
            return back()->with(
                'error',
                'Kamu sudah mencapai batas request hari ini. Silakan coba lagi besok.'
            );
        }

        $class = TutorClass::with('tutor')->findOrFail($request->class_id);

        // ❗ CEK REQUEST GANDA UNTUK KELAS YANG SAMA
        $exists = TutorRequest::where('student_id', $studentId)
            ->where('tutor_id', $class->tutor->id)
            ->where('subject', $class->title)
            ->whereIn('status', ['DEAL', 'ONGOING'])
            ->exists();

        if ($exists) {
            return back()->with(
                'error',
                'Kamu sudah mengajukan request untuk kelas ini.'
            );
        }

        TutorRequest::create([
    'class_id'     => $class->id, // 🔥 WAJIB
    'tutor_id'     => $class->tutor->id,
    'student_id'   => Auth::id(),
    'student_name' => Auth::user()->name ?? Auth::user()->email,
    'subject'      => $class->title,
    'schedule'     => $class->day,
    'duration'     => $class->duration,
    'price'        => $class->price,
    'status'       => 'DEAL',
]);


        return back()->with('success', 'Kelas berhasil direquest 🎉');
    }
}
