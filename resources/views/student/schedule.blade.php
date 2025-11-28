@extends('components.layoutUser')


@section('content')
<link rel="stylesheet" href="{{ asset('cssUser/navbar.css') }}">
<link rel="stylesheet" href="{{ asset('cssUser/siswa-schedule.css') }}">

 <!-- ===== MAIN CONTENT ===== -->
 <main class="schedule-page">

  <section class="title-section">
   <h1>My Schedule</h1>
   <p>Your upcoming Qur'an learning sessions.</p>
  </section>

  <!-- ======================= SCHEDULE LIST ======================= -->
  <section class="schedule-list">

   <!-- UPCOMING -->
   <div class="schedule-card">
    <div class="card-header">
     <span class="status-badge upcoming">Upcoming</span>
    </div>

    <div class="card-body">
     <p><i class="fa-solid fa-calendar-alt"></i> 12 Nov 2025, 09:00 AM</p>
     <p><i class="fa-solid fa-user"></i> Tutor: Ust. Ahmad</p>
     <p><i class="fa-solid fa-book"></i> Tajwid Basics</p>
     <p><i class="fa-solid fa-laptop"></i> Online</p>
     <p><i class="fa-solid fa-clock"></i> 1 hour session</p>
    </div>
   </div>

   <!-- ONGOING -->
   <div class="schedule-card ongoing">
    <div class="card-header">
     <span class="status-badge ongoing">Ongoing</span>
    </div>

    <div class="card-body">
     <p><i class="fa-solid fa-calendar-alt"></i> 10 Nov 2025, 07:30 PM</p>
     <p><i class="fa-solid fa-user"></i> Tutor: Aisyah Rahman</p>
     <p><i class="fa-solid fa-book"></i> Qur'an Recitation</p>
     <p><i class="fa-solid fa-location-dot"></i> In-person, Jakarta Selatan</p>
     <p><i class="fa-solid fa-clock"></i> 1 hour session</p>
    </div>
   </div>

  </section>

 </main>

@endsection
