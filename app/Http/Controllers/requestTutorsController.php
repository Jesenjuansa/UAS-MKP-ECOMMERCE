<?php

namespace App\Http\Controllers;

use App\Models\LessonRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RequestTutorsController extends Controller
{
    // Tampilkan semua request untuk tutor yang sedang login
    public function index()
    {
        $requests = LessonRequest::where('tutor_id', Auth::id())->get();

        return view('tutors.request', compact('requests'));
    }

    // Tutor menerima request (ACCEPT)
    public function accept(Request $request)
    {
        $requestData = LessonRequest::findOrFail($request->request_id);
        $requestData->status = 'ONGOING';
        $requestData->save();

        return back();
    }

    // Tutor menolak request
    public function reject(Request $request)
    {
        $requestData = LessonRequest::findOrFail($request->request_id);
        $requestData->status = 'REJECTED';
        $requestData->save();

        return back();
    }

    // Tutor menekan MARK DONE
    public function markDone(Request $request)
    {
        $requestData = LessonRequest::findOrFail($request->request_id);
        $requestData->status = 'DONE';
        $requestData->save();

        return back();
    }
}
