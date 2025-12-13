<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TutorPayout;
use Illuminate\Http\Request;

class TutorPayoutController extends Controller
{
    public function index()
    {
        $payouts = TutorPayout::with('tutor')->latest()->get();
        return view('admin.payment', compact('payouts'));
    }

    public function markPaid(Request $request, $id)
    {
        $payout = TutorPayout::findOrFail($id);

        if ($request->hasFile('admin_proof')) {
            $payout->admin_proof = $request->file('admin_proof')->store('payouts', 'public');
        }

        $payout->status = 'paid';
        $payout->save();

        return back()->with('success', 'Tutor payout marked as paid.');
    }
}
