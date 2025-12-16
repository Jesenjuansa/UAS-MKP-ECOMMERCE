<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Rating;
use App\Models\TutorPayout;
use App\Models\TutorRequest;
use Illuminate\Http\Request;
use App\Models\StudentPayment;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class profileController extends Controller
{
   public function index()
{
    $tutor = Auth::user();

    /**
     * ===============================
     * TOTAL EARNINGS (85%)
     * HANYA YANG SUDAH MARK AS PAID
     * ===============================
     */
    $totalEarnings = TutorPayout::where('tutor_id', $tutor->id)
        ->where('status', 'paid')
        ->sum('amount');

    /**
     * ===============================
     * TOTAL STUDENTS
     * DARI PAYMENT YANG SUDAH APPROVED
     * ===============================
     */
    $totalStudents = StudentPayment::where('tutor_id', $tutor->id)
        ->where('status', 'approved')
        ->distinct('student_id')
        ->count('student_id');

    /**
     * ===============================
     * RATING
     * ===============================
     */
    $avgRating = round(
        Rating::where('tutor_id', $tutor->id)->avg('rating') ?? 0,
        1
    );

    $ratingCount = Rating::where('tutor_id', $tutor->id)->count();

    return view('tutors.profile', compact(
        'tutor',
        'totalEarnings',
        'totalStudents',
        'avgRating',
        'ratingCount'
    ));
}

    public function update(Request $request)
    {
        $request->validate([
            'full_name'        => 'required|string|max:255',
            'phone_number'     => 'nullable|string|max:20',
            'teaching_subject' => 'nullable|string|max:255',
            'class_type'       => 'nullable|string|max:255',
            'pas_foto'         => 'nullable|image|mimes:jpg,png,jpeg|max:3048',
        ]);

        /** @var User|null $tutor */
        $tutor = Auth::user();

        if (! $tutor instanceof User) {
            return back()->withErrors(['user' => 'Authenticated user not found.']);
        }

        /* ===== UPLOAD FOTO ===== */
        if ($request->hasFile('pas_foto')) {
            $photo    = $request->file('pas_foto');
            $fileName = time() . '_' . $photo->getClientOriginalName();
            $photo->move(public_path('uploads/tutors'), $fileName);

            $tutor->pas_foto = $fileName;
        }

        /* ===== UPDATE DATA ===== */
        $tutor->full_name        = $request->full_name;
        $tutor->phone_number     = $request->phone_number;
        $tutor->teaching_subject = $request->teaching_subject;
        $tutor->class_type       = $request->class_type;

        $tutor->save();

        return back()->with('success', 'Profile updated successfully!');
    }
}
