<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TutorRequest;

class LessonRequestController extends Controller
{
    public function index()
    {
        // ambil semua request untuk monitoring admin
        $requests = TutorRequest::with(['student', 'tutor'])
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.request', compact('requests'));
    }

    // optional: kalau admin mau hapus request (opsional)
    public function destroy($id)
    {
        TutorRequest::findOrFail($id)->delete();

        return back()->with('success', 'Lesson request deleted successfully');
    }
}
