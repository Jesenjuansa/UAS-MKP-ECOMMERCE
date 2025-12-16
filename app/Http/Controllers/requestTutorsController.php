<?php

namespace App\Http\Controllers;

use App\Models\TutorRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class requestTutorsController extends Controller
{
    /**
     * ===============================
     * LIST REQUEST UNTUK TUTOR
     * ===============================
     */
    public function index()
    {
        $requests = TutorRequest::where('tutor_id', Auth::id())
            ->where(function ($query) {
                $query
                    ->where('status', '!=', 'REJECTED')
                    ->orWhere(function ($q) {
                        $q->where('status', 'REJECTED')
                          ->where('updated_at', '>=', Carbon::now()->subHours(24));
                    });
            })
            ->orderByRaw("
                CASE status
                    WHEN 'DEAL' THEN 1
                    WHEN 'ONGOING' THEN 2
                    WHEN 'DONE' THEN 3
                    WHEN 'REJECTED' THEN 4
                    ELSE 5
                END
            ")
            ->orderBy('created_at', 'desc')
            ->get();

        return view('tutors.request', compact('requests'));
    }

    /**
     * ===============================
     * ACCEPT REQUEST
     * ===============================
     */
    public function accept(Request $request)
    {
        TutorRequest::where('id', $request->request_id)
            ->where('tutor_id', Auth::id())
            ->update(['status' => 'WAITING_PAYMENT']);

        return back()->with('success', 'Request berhasil diterima');
    }
    /**
     * ===============================
     * REJECT REQUEST
     * ===============================
     */
    public function reject(Request $request)
    {
        TutorRequest::where('id', $request->request_id)
            ->where('tutor_id', Auth::id())
            ->update(['status' => 'REJECTED']);

        return back()->with('success', 'Request ditolak');
    }

    /**
     * ===============================
     * MARK AS DONE
     * ===============================
     */
    public function markDone(Request $request)
    {
        TutorRequest::where('id', $request->request_id)
            ->where('tutor_id', Auth::id())
            ->update(['status' => 'DONE']);

        return back()->with('success', 'Lesson selesai');
    }
}
