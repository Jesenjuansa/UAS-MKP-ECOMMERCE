@extends('components.layoutUser')


@section('content')
<link rel="stylesheet" href="{{ asset('cssUser/navbar.css') }}">
<link rel="stylesheet" href="{{ asset('cssUser/tutor-profile.css') }}">
<main class="tutor-profile-container">

    <!-- ==================================================
         LEFT FORM — EDIT PUBLIC PROFILE
         (Semua data di sini akan muncul di tutor-detail.html)
    ====================================================== -->
    <form action="/tutor/update-profile" method="POST" enctype="multipart/form-data" class="tp-left">

      <h2>Edit Profile</h2>

      <!-- DESCRIPTION -->
      <label for="desc">Description</label>
      <textarea id="desc" name="description" rows="4"></textarea>

      <!-- LANG & EXP -->
      <div class="tp-row">
        <div class="tp-card">
          <h3>Languages</h3>
          <input type="text" name="languages" placeholder="e.g. English, Indonesian">
        </div>

        <div class="tp-card">
          <h3>Experience</h3>
          <input type="text" name="experience" placeholder="e.g. 3 years teaching">
        </div>
      </div>

      <!-- PRICING -->
      <div class="tp-card-full">
        <h3>Pricing</h3>
        <textarea name="pricing" rows="3" placeholder="e.g. Rp100.000 / session"></textarea>
      </div>

      <!-- SCHEDULE -->
      <div class="tp-card-full">
        <h3>Schedule / Availability</h3>
        <textarea name="availability" rows="3" placeholder="e.g. Mon–Fri, 4PM–8PM"></textarea>
      </div>

      <!-- SUBJECTS -->
      <div class="tp-card-full">
        <h3>Teaching Focus</h3>
        <input type="text" name="subjects" placeholder="e.g. Math, Physics">
      </div>

      <button type="submit" class="tp-save-btn">Save Profile</button>
    </form>




    <!-- ==================================================
         RIGHT FORM — PHOTO + PAYMENT INFO
         (Payment info TIDAK muncul di tutor-detail)
    ====================================================== -->
    <aside class="tp-right">
      <form action="/tutor/update-payment" method="POST" enctype="multipart/form-data">

        <!-- PHOTO + BASIC IDENTIY -->
        <div class="tp-profile-card">
          <img src="/images/w1.jpg" alt="Tutor Photo">
          <input type="file" name="photo">

          <h2>
            <input type="text" name="name" placeholder="Tutor Name">
          </h2>

          <p>
            <input type="text" name="title" placeholder="Tutor Title">
          </p>

          <p class="tp-edu">
            <input type="text" name="education" placeholder="Education">
          </p>

          <div class="tp-rating">⭐ 4.9 <span>(58 students)</span></div>
        </div>


        <!-- PAYMENT INFO (khusus tutor-profile) -->
        <div class="tp-payment-card">
          <h3>Payment Information</h3>

          <label>Bank Name</label>
          <input type="text" name="bank_name" placeholder="BCA / BNI / BRI">

          <label>Account Number</label>
          <input type="text" name="account_number" placeholder="Enter account number">

          <label>Account Holder Name</label>
          <input type="text" name="account_holder" placeholder="Name as registered in bank">

          <label>E-wallet (Optional)</label>
          <input type="text" name="ewallet" placeholder="Dana / OVO / Gopay">

          <button type="submit" class="tp-save-payment-btn">
            Save Payment Info
          </button>
        </div>

      </form>
    </aside>

  </main>
@endsection
