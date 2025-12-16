<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\TutorRequest;
use App\Models\StudentPayment;

class ProfileStudentController extends Controller
{
    public function index()
    {
        $student = Auth::user();

        // ===== LEARNING SUMMARY =====
        $totalRequested = TutorRequest::where('student_id', $student->id)->count();

        $ongoingLessons = TutorRequest::where('student_id', $student->id)
            ->where('status', 'ONGOING')
            ->count();

        $completedLessons = TutorRequest::where('student_id', $student->id)
            ->where('status', 'DONE')
            ->count();

        $totalTutors = TutorRequest::where('student_id', $student->id)
            ->distinct('tutor_id')
            ->count('tutor_id');

        // ===== PAYMENT SUMMARY =====
        $totalPaid = StudentPayment::where('student_id', $student->id)
            ->where('status', 'approved')
            ->sum('amount');

        $pendingPayments = StudentPayment::where('student_id', $student->id)
            ->where('status', 'pending')
            ->count();

        return view('student.profile', compact(
            'student',
            'totalRequested',
            'ongoingLessons',
            'completedLessons',
            'totalTutors',
            'totalPaid',
            'pendingPayments'
        ));
    }
}
