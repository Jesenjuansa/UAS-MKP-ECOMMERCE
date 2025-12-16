<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\TutorRequest;
use Illuminate\Support\Facades\Auth;

class ScheduleStudentController extends Controller
{
    public function index()
    {
        $schedules = TutorRequest::with('tutor')
            ->where('student_id', Auth::id())
            ->where('status', 'ONGOING')
            ->orderBy('schedule')
            ->get();

        return view('student.schedule', compact('schedules'));
    }
}
