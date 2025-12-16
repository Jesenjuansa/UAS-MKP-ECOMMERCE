<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class userController extends Controller
{
    public function index()
{
    $students = User::where('role', 'student')
    ->withCount([
        'studentRequests as total_booking' => function ($q) {
            $q->whereIn('status', [
                'DEAL',
                'WAITING_PAYMENT',
                'ONGOING',
                'DONE'
            ]);
        }
    ])
    ->get();

    $tutors = User::where('role', 'tutor')
    ->withCount([
        'tutorRequests as total_lessons' => function ($q) {
            $q->whereIn('status', [
                'DEAL',
                'WAITING_PAYMENT',
                'ONGOING',
                'DONE'
            ]);
        }
    ])
    ->get();

    return view('admin.user', compact('students', 'tutors'));
}



     public function students()
    {
        $students = User::where('role', 'student')
            ->withCount('lessonsAsStudent') // total bookings
            ->get();

        return view('admin.students', compact('students'));
    }

    public function suspendStudent($id)
{
    User::where('id', $id)->update([
        'status' => 'suspended'
    ]);

    return back()->with('success', 'Student suspended.');
}

public function activateStudent($id)
{
    $user = User::findOrFail($id);
    $user->status = 'active';
    $user->save();

    return back()->with('success', 'Student activated.');
}




public function suspendTutor($id)
{
    User::where('id', $id)->update([
        'status' => 'suspended'
    ]);

    return back()->with('success', 'Tutor suspended.');
}

public function activateTutor($id)
{
    $user = User::findOrFail($id);
    $user->status = 'active';
    $user->save();

    return back()->with('success', 'Tutor activated.');
}

}

