<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class VerificationController extends Controller
{
    // Menampilkan tutor yang pending
    public function index()
    {
        $pendingTutors = User::where('role', 'tutor')
            ->where('verified', false)
            ->get();

        return view('admin.verification', compact('pendingTutors'));
    }

    // Admin menyetujui tutor
    public function verify($id)
    {
        User::where('id', $id)->update([
            'verified' => true
        ]);

        return back()->with('success', 'Tutor has been verified.');
    }

    // Admin menolak tutor
    public function reject($id)
    {
        User::where('id', $id)->update([
            'verified' => false
        ]);

        return back()->with('error', 'Tutor has been rejected.');
    }
}
