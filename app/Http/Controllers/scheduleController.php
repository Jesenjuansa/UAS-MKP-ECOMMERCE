<?php

namespace App\Http\Controllers;

use App\Models\TutorRequest;
use Illuminate\Support\Facades\Auth;

class ScheduleController extends Controller
{
    public function index()
    {
        $schedules = TutorRequest::where('tutor_id', Auth::id())
            ->where('status', 'ONGOING')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('tutors.schedule', compact('schedules'));
    }
}
