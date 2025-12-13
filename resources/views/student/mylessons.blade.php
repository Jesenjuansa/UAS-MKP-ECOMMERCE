@extends('components.layoutUser')


@section('content')
<link rel="stylesheet" href="{{ asset('cssUser/navbar.css') }}">
<link rel="stylesheet" href="{{ asset('cssUser/siswa-mylessons.css') }}">

 <!-- ===== MAIN ===== -->
 <main class="lessons-container">
  <h1 class="page-title">My Lessons</h1>

  <div class="lessons-grid">

   <!-- ===== PAID (PAYMENT VERIFICATION) ===== -->
   <div class="lesson-card paid">
    <div class="lesson-info">
     <h3>Tutor: Nurul Huda</h3>

     <p><strong>Subject:</strong> Memorization (Hifz)</p>
     <p><strong>Schedule:</strong> Every Sat - 8 PM</p>
     <p><strong>Duration:</strong> 60 mins</p>
     <p><strong>Total Price:</strong> Rp75.000</p>
     <p><strong>Status:</strong>
      <span class="badge paid-badge">PAYMENT VERIFICATION</span>
     </p>
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
     <p><strong>Total Price:</strong> Rp75.000</p>
     <p><strong>Status:</strong>
      <span class="badge ongoing-badge">ONGOING</span>
     </p>
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

     <p><strong>Status:</strong>
      <span class="badge done-badge">DONE</span>
     </p>
    </div>

    <div class="lesson-action">
     <a href="#reviewModal" class="review-btn">Leave Review</a>
    </div>
   </div>

  </div>


 </main>

 <!-- ===== REVIEW MODAL (NO JS) ===== -->
 <div id="reviewModal" class="modal">
  <div class="modal-content">
   <a href="#" class="close-modal">&times;</a>

   <h2>Leave a Review</h2>

   <form>
    <div class="rating">
     <input type="radio" id="star5" name="rating" value="5">
     <label for="star5">★</label>

     <input type="radio" id="star4" name="rating" value="4">
     <label for="star4">★</label>

     <input type="radio" id="star3" name="rating" value="3">
     <label for="star3">★</label>

     <input type="radio" id="star2" name="rating" value="2">
     <label for="star2">★</label>

     <input type="radio" id="star1" name="rating" value="1">
     <label for="star1">★</label>
    </div>

    <!-- ==== TEXTAREA KOMENTAR BARU ==== -->
    <textarea class="review-text" placeholder="Write your comment here..."></textarea>

    <button class="submit-review">Submit Review</button>
   </form>

  </div>
 </div>

@endsection
