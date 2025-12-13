<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LessonRequest;

class LessonRequestController extends Controller
{
    public function index()
    {
        $requests = LessonRequest::with(['student', 'tutor'])->get();

        return view('admin.request', compact('requests'));
    }

    public function destroy($id)
    {
        LessonRequest::findOrFail($id)->delete();

        return back()->with('success', 'Lesson request deleted successfully');
    }
}
