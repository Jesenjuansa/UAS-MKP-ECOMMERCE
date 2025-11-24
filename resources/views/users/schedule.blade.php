@extends('components.layoutUser')


@section('content')
<link rel="stylesheet" href="{{ asset('cssUser/navbar.css') }}">
<link rel="stylesheet" href="{{ asset('cssUser/tutor-schedule.css') }}">

 <main class="schedule-page">

  <section class="title-section">
   <h1>Teaching Schedule</h1>
   <p>Your sessions scheduled with students.</p>
  </section>

  <section class="schedule-list">

   <!-- ================= UPCOMING ================= -->
   <form action="/schedule/start" method="POST" class="schedule-card">
    <input type="hidden" name="schedule_id" value="1">

    <div class="card-header">
     <span class="status-badge upcoming">Upcoming</span>
    </div>

    <div class="card-body">
     <p><i class="fa-solid fa-calendar-alt"></i> 14 Nov 2025, 04:00 PM</p>
     <p><i class="fa-solid fa-user"></i> Student: Farhan</p>
     <p><i class="fa-solid fa-book"></i> Topic: Iqra’ Level 3</p>
     <p><i class="fa-solid fa-laptop"></i> Online</p>
     <p><i class="fa-solid fa-clock"></i> Duration: 1 hour</p>
    </div>

    <div class="card-actions">
     <button type="submit" class="start-btn">Start Class</button>
    </div>
   </form>


   <!-- ================= ONGOING ================= -->
   <form action="/schedule/done" method="POST" class="schedule-card ongoing">
    <!-- ID jadwal untuk backend -->
    <input type="hidden" name="schedule_id" value="2">

    <div class="card-header">
     <span class="status-badge ongoing">Ongoing</span>
    </div>

    <div class="card-body">
     <p><i class="fa-solid fa-calendar-alt"></i> 13 Nov 2025, 07:00 PM</p>
     <p><i class="fa-solid fa-user"></i> Student: Aulia</p>
     <p><i class="fa-solid fa-book"></i> Topic: Tajwid — Makharijul Huruf</p>
     <p><i class="fa-solid fa-location-dot"></i> In-person, Bekasi</p>
     <p><i class="fa-solid fa-clock"></i> Duration: 1 hour</p>
    </div>

    <div class="card-actions">
     <button type="submit" class="done-btn">Mark as Done</button>
    </div>
   </form>


  </section>

 </main>

@endsection
