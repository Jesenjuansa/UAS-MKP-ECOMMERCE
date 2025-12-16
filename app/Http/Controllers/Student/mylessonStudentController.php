<?php

namespace App\Http\Controllers\Student;

use App\Models\TutorRequest;
use App\Models\StudentPayment;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class mylessonStudentController extends Controller
{
    public function index()
    {
        $lessons = TutorRequest::with(['tutor'])
            ->where('student_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->get();

        return view('student.mylessons', compact('lessons'));
    }
public function storePayment(Request $request)
{
    $request->validate([
        'lesson_request_id' => 'required|exists:tutor_requests,id',
        'tutor_id'          => 'required|exists:users,id',
        'proof'             => 'required|image|max:2048',
    ]);

    $lesson = TutorRequest::where('id', $request->lesson_request_id)
        ->where('student_id', Auth::id())
        ->firstOrFail();

    // simpan bukti transfer
    $path = $request->file('proof')->store('payments', 'public');

    StudentPayment::create([
        'student_id'        => Auth::id(),
        'tutor_id'          => $request->tutor_id,
        'lesson_request_id' => $lesson->id,
        'amount'            => $lesson->price,
        'proof'             => $path,
        'status'            => 'pending', // 🔥 NUNGGU ADMIN
    ]);

    // ❗ JANGAN ubah tutor_requests.status di sini

    return back()->with(
        'success',
        'Bukti pembayaran berhasil dikirim. Menunggu verifikasi admin.'
    );
}
}
