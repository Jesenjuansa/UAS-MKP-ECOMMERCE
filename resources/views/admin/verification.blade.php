@extends('components.layoutAdmin')


@section('content')
<link rel="stylesheet" href="{{ asset('cssAdmin/sidebar.css') }}">
<link rel="stylesheet" href="{{ asset('cssAdmin/tutorVerification.css') }}">
        
        <h1>Tutor Verification</h1>
    <p class="sub">Verify new tutors before they can accept student requests</p>

    <div class="card-table">
      <table>
        <thead>
          <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Subjects</th>
            <th>Status</th>
            <th>Actions</th>
          </tr>
        </thead>

        <tbody>
          <!-- ROW 1 -->
          <tr>
            <td>Ustadz Ahmad</td>
            <td>ahmad@example.com</td>
            <td>0812-3456-7890</td>
            <td>Mengaji Dasar, Tahsin</td>

            <td>
              <div class="status-box">
                <input type="radio" id="st1-p" name="stat1" checked>
                <label class="pending-label" for="st1-p">Pending</label>

                <input type="radio" id="st1-v" name="stat1">
                <label class="verified-label" for="st1-v">Verified</label>

                <input type="radio" id="st1-r" name="stat1">
                <label class="rejected-label" for="st1-r">Rejected</label>
              </div>
            </td>

            <td class="actions">
              <label class="btn-view" for="modal-ahmad">View Detail</label>
              <label class="btn-verify" for="st1-v">Verify</label>
              <label class="btn-reject" for="st1-r">Reject</label>
            </td>
          </tr>
        </tbody>
      </table>
    </div>

    <input type="checkbox" id="modal-ahmad" class="modal-toggle">
  <div class="modal">
    <label for="modal-ahmad" class="modal-overlay"></label>

    <div class="modal-box">
      <h3>Tutor Detail</h3>

      <div class="detail-item"><label>Name</label>
        <div class="detail-box">Ustadz Ahmad</div>
      </div>
      <div class="detail-item"><label>Email</label>
        <div class="detail-box">ahmad@example.com</div>
      </div>
      <div class="detail-item"><label>Phone</label>
        <div class="detail-box">0812-3456-7890</div>
      </div>
      <div class="detail-item"><label>Short Bio</label>
        <div class="detail-box">Graduate of Islamic Studies with 6+ years teaching Qur'an recitation.</div>
      </div>
      <div class="detail-item"><label>Description</label>
        <div class="detail-box">Experienced in Tajwid and basic Arabic, teaches calmly and clearly.</div>
      </div>
      <div class="detail-item"><label>Schedule</label>
        <div class="detail-box">Mon–Fri (8:00–11:00, 19:00–21:00)</div>
      </div>
      <div class="detail-item"><label>Pricing</label>
        <div class="detail-box">Rp 50.000 / session</div>
      </div>
      <div class="detail-item"><label>Experience</label>
        <div class="detail-box">6 years teaching Quran recitation, 2 years Tahsin mentoring.</div>
      </div>

      <div class="detail-item">
        <label>Documents</label>
        <label for="doc-modal" class="detail-box doc-link" style="padding:12px; display:inline-block; width:auto;">
          <img src="/image.png" alt="Document"
            style="width:120px; border-radius:8px; cursor:pointer; display:block; margin:auto;">
        </label>
      </div>

      <!-- DOCUMENT MODAL -->
      <input type="checkbox" id="doc-modal" class="modal-toggle">
      <div class="modal">
        <label for="doc-modal" class="modal-overlay"></label>
        <div class="modal-box doc-preview-box">
          <h3>Uploaded Document</h3>
          <img src="/image.png" alt="Document Preview" class="doc-img">
          <label for="doc-modal" class="close-btn">Close</label>
        </div>
      </div>

      <div class="detail-item">
        <label>Payment Information</label>
        <table class="payment-table">
          <tr>
            <th>Bank Name</th>
            <td>BSI</td>
          </tr>
          <tr>
            <th>Account Number</th>
            <td>9876543210</td>
          </tr>
          <tr>
            <th>Account Holder Name</th>
            <td>Ustadz Ahmad</td>
          </tr>
          <tr>
            <th>E-wallet (Optional)</th>
            <td>OVO — 081234567890</td>
          </tr>
        </table>
      </div>

      <label for="modal-ahmad" class="close-btn">Close</label>
    </div>
  </div>

@endsection
