@extends('components.layoutAdmin')



@section('content')
<link rel="stylesheet" href="{{ asset('cssAdmin/sidebar.css') }}">
<link rel="stylesheet" href="{{ asset('cssAdmin/payment.css') }}">


    <h1>Payment Management</h1>

    <!-- STUDENT PAYMENTS -->
   <h2>Student Payments</h2>

<div class="card">
    <table class="table">
        <tr>
            <th>ID</th>
            <th>Student</th>
            <th>Tutor</th>
            <th>Lesson</th>
            <th>Amount</th>
            <th>Proof</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>

        @foreach($payments as $pay)
        <tr>
            <td>#P{{ $pay->id }}</td>

            <td>{{ $pay->student->full_name }}</td>
            <td>{{ $pay->tutor->full_name }}</td>

            <td>{{ $pay->lessonRequest->subject ?? '-' }}</td>

            <td>Rp{{ number_format($pay->amount, 0, ',', '.') }}</td>

            <td>
                @if($pay->proof)
                <a href="#proof{{ $pay->id }}">
                    <img src="{{ asset('storage/' . $pay->proof) }}" width="40" style="border-radius:6px">
                </a>
                @else
                -
                @endif
            </td>

            <td>
                <span class="badge {{ $pay->status }}">
                    {{ strtoupper($pay->status) }}
                </span>
            </td>

            <td>
                @if($pay->status === 'pending')
                <a href="#approve{{ $pay->id }}" class="btn btn-approve">Approve</a>
                <a href="#reject{{ $pay->id }}" class="btn btn-reject">Reject</a>
                @else
                -
                @endif
            </td>
        </tr>

        <!-- ============================= -->
        <!-- MODAL VIEW PAYMENT PROOF -->
        <!-- ============================= -->
        @if($pay->proof)
        <div id="proof{{ $pay->id }}" class="modal">
            <div class="modal-content">
                <h3>Payment Proof</h3>
                <img src="{{ asset('storage/' . $pay->proof) }}" width="100%" style="border-radius:10px">
                <a href="#" class="close-modal">Close</a>
            </div>
        </div>
        @endif


        <!-- ============================= -->
        <!-- MODAL APPROVE -->
        <!-- ============================= -->
        <div id="approve{{ $pay->id }}" class="modal">
            <div class="modal-content">
                <h3>Confirm Approval</h3>
                <p>Approve payment #P{{ $pay->id }}?</p>

                <form action="{{ route('admin.payments.approve', $pay->id) }}" method="POST">
                    @csrf
                    <button class="btn btn-approve">Confirm</button>
                </form>

                <a href="#" class="close-modal">Cancel</a>
            </div>
        </div>


        <!-- ============================= -->
        <!-- MODAL REJECT -->
        <!-- ============================= -->
        <div id="reject{{ $pay->id }}" class="modal">
            <div class="modal-content">
                <h3>Reject Payment</h3>
                <p>Provide reason (optional):</p>

                <textarea style="width:100%; height:70px; border-radius:6px; padding:8px;"></textarea>
                <br><br>

                <form action="{{ route('admin.payments.reject', $pay->id) }}" method="POST">
                    @csrf
                    <button class="btn btn-reject">Confirm Reject</button>
                </form>

                <a href="#" class="close-modal">Cancel</a>
            </div>
        </div>

        @endforeach
    </table>
</div>


    <!-- TUTOR PAYOUTS -->
    <h2>Tutor Payouts</h2>

<div class="card">
    <table class="table">
        <tr>
            <th>Tutor</th>
            <th>Total Earnings</th>
            <th>Bank Info</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>

        @foreach($payouts as $payout)
        <tr>
            <td>{{ $payout->tutor->full_name }}</td>

            <td>Rp{{ number_format($payout->amount, 0, ',', '.') }}</td>

            <td>
                {{ $payout->bank_name }}
                - {{ $payout->bank_account }}
                <br>a/n: {{ $payout->account_holder }}
            </td>

            <td>
                <span class="badge {{ $payout->status }}">{{ strtoupper($payout->status) }}</span>
            </td>

            <td>
                @if($payout->status === 'pending')
                <a href="#paid{{ $payout->id }}" class="btn btn-approve">Mark as Paid</a>
                <a href="#upload{{ $payout->id }}" class="btn btn-upload">Upload Proof</a>
                @else
                <a href="#adminproof{{ $payout->id }}" class="btn btn-view">View Proof</a>
                @endif
            </td>
        </tr>

        <!-- ============================= -->
        <!-- MODAL CONFIRM PAID -->
        <!-- ============================= -->
        <div id="paid{{ $payout->id }}" class="modal">
            <div class="modal-content">
                <h3>Confirm Payment</h3>
                <p>Confirm payout to tutor {{ $payout->tutor->full_name }}?</p>

                <form action="{{ route('admin.payouts.markPaid', $payout->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <button class="btn btn-approve">Confirm</button>
                </form>

                <a href="#" class="close-modal">Cancel</a>
            </div>
        </div>

        <!-- ============================= -->
        <!-- MODAL UPLOAD PROOF -->
        <!-- ============================= -->
        <div id="upload{{ $payout->id }}" class="modal">
            <div class="modal-content">
                <h3>Upload Transfer Proof</h3>

                <form action="{{ route('admin.payouts.markPaid', $payout->id) }}"
                      method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="admin_proof" required>

                    <br><br>
                    <button class="btn btn-upload">Upload</button>
                </form>

                <a href="#" class="close-modal">Cancel</a>
            </div>
        </div>

        <!-- ============================= -->
        <!-- MODAL VIEW ADMIN PROOF -->
        <!-- ============================= -->
        @if($payout->admin_proof)
        <div id="adminproof{{ $payout->id }}" class="modal">
            <div class="modal-content">
                <h3>Payout Proof</h3>
                <img src="{{ asset('storage/' . $payout->admin_proof) }}" width="100%">
                <a href="#" class="close-modal">Close</a>
            </div>
        </div>
        @endif

        @endforeach
    </table>
</div>


@endsection
