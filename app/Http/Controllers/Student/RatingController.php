<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RatingController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'class_id' => 'required|exists:tutor_classes,id',
            'tutor_id' => 'required|exists:users,id',
            'rating'   => 'required|integer|min:1|max:5',
            'review'   => 'nullable|string|max:1000',
        ]);

        // cegah rating ganda
        $exists = Rating::where('student_id', Auth::id())
            ->where('class_id', $request->class_id)
            ->exists();

        if ($exists) {
            return back()->with('error', 'Kamu sudah memberi rating.');
        }

        Rating::create([
            'student_id' => Auth::id(),
            'tutor_id'   => $request->tutor_id,
            'class_id'   => $request->class_id,
            'rating'     => $request->rating,
            'review'     => $request->review,
        ]);

        return back()->with('success', 'Rating berhasil dikirim ⭐');
    }
}
