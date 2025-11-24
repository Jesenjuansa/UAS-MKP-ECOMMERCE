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
          <th>Payment ID</th>
          <th>Student</th>
          <th>Tutor</th>
          <th>Lesson</th>
          <th>Amount</th>
          <th>Proof</th>
          <th>Status</th>
          <th>Actions</th>
        </tr>
        <tr>
          <td>#P001</td>
          <td>Aisha</td>
          <td>Ust. Ahmad</td>
          <td>Tahsin</td>
          <td>Rp150.000</td>
          <td><a href="#proof1"><img src="../image.png" width="40" style="border-radius:6px"></a></td>
          <td><span class="badge pending">Pending</span></td>
          <td>
            <a href="#approve1" class="btn btn-approve">Approve</a>
            <a href="#reject1" class="btn btn-reject">Reject</a>
          </td>
        </tr>
      </table>
    </div>

    <!-- MODALS -->
    <div id="proof1" class="modal">
      <div class="modal-content">
        <h3>Payment Proof</h3>
        <img src="/image.png" alt="">
        <a href="#" class="close-modal">Close</a>
      </div>
    </div>

    <div id="approve1" class="modal">
      <div class="modal-content">
        <h3>Confirm Approval</h3>
        <p>Approve payment #P001?</p>
        <a href="#" class="btn btn-approve">Confirm</a>
        <a href="#" class="close-modal">Cancel</a>
      </div>
    </div>

    <div id="reject1" class="modal">
      <div class="modal-content">
        <h3>Reject Payment</h3>
        <p>Provide reason (optional):</p>
        <textarea style="width:100%; height:70px; border-radius:6px; padding:8px;"></textarea>
        <br><br>
        <a href="#" class="btn btn-reject">Confirm Reject</a>
        <a href="#" class="close-modal">Cancel</a>
      </div>
    </div>

    <!-- TUTOR PAYOUTS -->
    <h2>Tutor Payouts</h2>
    <div class="card">
      <table class="table">
        <tr>
          <th>Tutor</th>
          <th>Lesson</th>
          <th>Earnings</th>
          <th>Bank Info</th>
          <th>Status</th>
          <th>Actions</th>
        </tr>
        <tr>
          <td>Ust. Ahmad</td>
          <td>Tahsin</td>
          <td>Rp120.000</td>
          <td>BCA - 12345678</td>
          <td><span class="badge pending">Pending</span></td>
          <td>
            <a href="#paid1" class="btn btn-approve">Mark as Paid</a>
            <a href="#upload1" class="btn btn-upload">Upload Proof</a>
          </td>
        </tr>
      </table>
    </div>

    <div id="paid1" class="modal">
      <div class="modal-content">
        <h3>Confirm Payment</h3>
        <p>Confirm payout to tutor?</p>
        <a href="#" class="btn btn-approve">Confirm</a>
        <a href="#" class="close-modal">Cancel</a>
      </div>
    </div>

    <div id="upload1" class="modal">
      <div class="modal-content">
        <h3>Upload Transfer Proof</h3>
        <input type="file" />
        <br><br>
        <a href="#" class="btn btn-upload">Upload</a>
        <a href="#" class="close-modal">Cancel</a>
      </div>
    </div>

@endsection
