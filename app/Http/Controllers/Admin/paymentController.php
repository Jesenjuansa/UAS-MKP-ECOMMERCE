<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StudentPayment;
use App\Models\TutorPayout;

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
        $payment = StudentPayment::findOrFail($id);

        $payment->status = 'approved';
        $payment->save();

        // Buat payout untuk tutor
        TutorPayout::create([
            'tutor_id' => $payment->tutor_id,
            'amount' => $payment->amount * 0.8, // misal 80% untuk tutor
            'bank_name' => $payment->tutor->bank_name,
            'bank_account' => $payment->tutor->bank_account,
            'account_holder' => $payment->tutor->account_holder,
        ]);

        return back()->with('success', 'Payment approved successfully!');
    }

    public function reject($id)
    {
        $payment = StudentPayment::findOrFail($id);
        $payment->status = 'rejected';
        $payment->save();

        return back()->with('error', 'Payment rejected.');
    }
}
