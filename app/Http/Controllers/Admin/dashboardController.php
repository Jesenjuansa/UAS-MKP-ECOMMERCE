<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\LessonRequest;
use App\Models\StudentPayment;
use App\Models\TutorPayout;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class dashboardController extends Controller
{
    public function index()
    {
        // ============================
        // 1. TOTAL USERS
        // ============================
        $totalStudents = User::where('role', 'student')->count();
        $totalTutors   = User::where('role', 'tutor')->count();

        // ============================
        // 2. PENDING VERIFICATIONS (Tutor)
        // ============================
        $pendingVerifications = User::where('role', 'tutor')
            ->where('verified', false)
            ->count();

        // ============================
        // 3. PENDING PAYMENT PROOFS
        // ============================
        $pendingPaymentProofs = StudentPayment::where('status', 'pending')->count();

        // ============================
        // 4. COMPLETED LESSONS
        // ============================
        $completedLessons = LessonRequest::where('status', 'done')->count();

        // ============================
        // 5. TOTAL PAYMENTS RECEIVED (This Month)
        // ============================
        $totalPaymentsMonth = StudentPayment::where('status', 'approved')
            ->whereMonth('created_at', Carbon::now()->month)
            ->sum('amount');

        // ============================
        // 6. TOTAL TUTOR PAYOUTS (This Month)
        // ============================
        $totalPayoutsMonth = TutorPayout::where('status', 'paid')
            ->whereMonth('created_at', Carbon::now()->month)
            ->sum('amount');

        // KIRIM DATA KE VIEW
        return view('admin.dashboard', compact(
            'totalStudents',
            'totalTutors',
            'pendingVerifications',
            'pendingPaymentProofs',
            'completedLessons',
            'totalPaymentsMonth',
            'totalPayoutsMonth'
        ));
    }
}
