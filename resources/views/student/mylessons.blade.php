@extends('components.layoutUser')


@section('content')
<link rel="stylesheet" href="{{ asset('cssUser/navbar.css') }}">
<link rel="stylesheet" href="{{ asset('cssUser/siswa-mylessons.css') }}">

<!-- ===== MAIN ===== -->
 <main class="lessons-container">
  <h1 class="page-title">My Lessons</h1>

  <div class="lessons-grid">

   <!-- ===== DISCUSS ===== -->
   <div class="lesson-card discuss">
    <div class="lesson-info">
     <h3>Tutor: Ahmad Yusuf</h3>

     <p><strong>Subject:</strong> Tajwid Basics</p>
     <p><strong>Schedule:</strong> Waiting for tutor</p>
     <p><strong>Duration:</strong> 60 mins</p>

     <p class="status-row">
      <strong>Status:</strong>
      <span class="badge discuss-badge">DISCUSS</span>

      <a href="chat.html" class="chat-link">
       <i class="fa-solid fa-comment"></i> Chat
      </a>
     </p>
    </div>

    <div class="lesson-action">
     <button class="disabled-btn">Waiting for tutor to respond</button>
    </div>
   </div>

   <!-- ===== DEAL ===== -->
   <div class="lesson-card deal">
    <div class="lesson-info">
     <h3>Tutor: Aisyah Rahman</h3>

     <p><strong>Subject:</strong> Qur’an Recitation</p>
     <p><strong>Schedule:</strong> Wednesday - 7 PM</p>
     <p><strong>Duration:</strong> 90 mins</p>
     <p><strong>Total Price:</strong> Rp120.000</p>

     <p><strong>Status:</strong> <span class="badge deal-badge">DEAL</span></p>
    </div>

    <div class="lesson-action">
     <form action="/lessons/5/payment" method="POST">
      <button type="submit" class="pay-btn">Pay Now</button>
     </form>
    </div>
   </div>

   <!-- ===== PAID ===== -->
   <div class="lesson-card paid">
    <div class="lesson-info">
     <h3>Tutor: Nurul Huda</h3>

     <p><strong>Subject:</strong> Memorization (Hifz)</p>
     <p><strong>Schedule:</strong> Every Sat - 8 PM</p>
     <p><strong>Duration:</strong> 60 mins</p>

     <p><strong>Status:</strong> <span class="badge paid-badge">PAYMENT VERIFICATION</span></p>
    </div>

    <div class="lesson-action">
     <button class="disabled-btn">Waiting Verification</button>
    </div>
   </div>

   <!-- ===== ONGOING ===== -->
   <div class="lesson-card ongoing">
    <div class="lesson-info">
     <h3>Tutor: Ust. Farhan</h3>

     <p><strong>Subject:</strong> Tajwid Advanced</p>
     <p><strong>Schedule:</strong> Every Fri - 9 PM</p>
     <p><strong>Duration:</strong> 60 mins</p>

     <p><strong>Status:</strong> <span class="badge ongoing-badge">ONGOING</span></p>
    </div>

    <div class="lesson-action">
     <button class="disabled-btn">Lesson in Progress</button>
    </div>
   </div>

   <!-- ===== DONE ===== -->
   <div class="lesson-card done">
    <div class="lesson-info">
     <h3>Tutor: Sarah A.</h3>

     <p><strong>Subject:</strong> Qur’an Recitation</p>
     <p><strong>Schedule:</strong> Wednesday - 8 PM</p>
     <p><strong>Duration:</strong> 60 mins</p>
     <p><strong>Total Price:</strong> Rp75.000</p>

     <p><strong>Status:</strong> <span class="badge done-badge">DONE</span></p>
    </div>

    <div class="lesson-action">
     <a href="#reviewModal" class="review-btn">Leave Review</a>

    </div>
   </div>
  </div>

 </main>

@endsection
