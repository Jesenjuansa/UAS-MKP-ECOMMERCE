<?php

namespace App\Http\Controllers;

use App\Models\LessonRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class scheduleController extends Controller
{
    public function index()
    {
        $upcoming = LessonRequest::where('tutor_id', Auth::id())
            ->where('status', 'DEAL')
            ->get();

        $ongoing = LessonRequest::where('tutor_id', Auth::id())
            ->where('status', 'ONGOING')
            ->get();

        $done = LessonRequest::where('tutor_id', Auth::id())
            ->where('status', 'DONE')
            ->get();

        return view('tutors.schedule', compact('upcoming', 'ongoing', 'done'));
    }

    public function startClass(Request $request)
    {
        $req = LessonRequest::findOrFail($request->request_id);
        $req->status = 'ONGOING';
        $req->save();

        return back();
    }

    public function completeClass(Request $request)
    {
        $req = LessonRequest::findOrFail($request->request_id);
        $req->status = 'DONE';
        $req->save();

        return back();
    }
}
