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

   public function markPaid($id)
{
    $payout = TutorPayout::findOrFail($id);

    $payout->update([
        'status' => 'paid',
        'paid_at' => now(),
    ]);

    return back()->with('success', 'Tutor berhasil dibayar');
}



}
