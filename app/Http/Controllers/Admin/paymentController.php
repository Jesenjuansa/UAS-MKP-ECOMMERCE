<?php

namespace App\Http\Controllers\Admin;

use App\Models\TutorPayout;
use App\Models\TutorRequest;
use App\Models\StudentPayment;
use App\Http\Controllers\Controller;

class PaymentController extends Controller
{
    public function index()
{
    $payments = StudentPayment::with(['student', 'tutor', 'lessonRequest'])->get();

    $payouts = TutorPayout::with('tutor')->get();

    return view('admin.payment', compact('payments', 'payouts'));
}


public function approve($id)
{
    $payment = StudentPayment::with('lessonRequest')->findOrFail($id);

    if ($payment->status !== 'pending') {
        return back()->with('error', 'Payment already processed.');
    }

    $adminFee = $payment->amount * 0.15;
    $tutorNet = $payment->amount - $adminFee;

    // update payment
    $payment->update([
        'status' => 'approved'
    ]);

    // buat payout tutor
    TutorPayout::create([
        'tutor_id' => $payment->tutor_id,
        'amount'   => $tutorNet,
        'status'   => 'pending'
    ]);

    // lesson jadi ongoing
    if ($payment->lessonRequest) {
        $payment->lessonRequest->update([
            'status' => 'ONGOING'
        ]);
    }

    return back()->with('success', 'Payment approved & tutor payout created.');
}



   public function reject($id)
{
    $payment = StudentPayment::findOrFail($id);

    if ($payment->status !== 'pending') {
        return back()->with('error', 'Payment already processed.');
    }

    $payment->update([
        'status' => 'rejected'
    ]);

    return back()->with('success', 'Payment rejected.');
}

}
