@extends('components.layoutUser')


@section('content')
<link rel="stylesheet" href="{{ asset('cssUser/sidebar.css') }}">
<link rel="stylesheet" href="{{ asset('cssUser/dashboard.css') }}">


  <!-- ===== HERO SECTION ===== -->
  <section class="hero">
    <img src="{{ asset('images/cr.jpg') }}" alt="Hero Background" class="hero-bg" />
    <div class="hero-content">
      <h1>Find Your Ideal Qur’an Tutor for a Personalized Learning Journey</h1>
      <p>Learn anytime, anywhere with trusted and qualified tutors.</p>
      <a href="tutors.html" class="btn">Reserve Now</a>
    </div>
  </section>

  <!-- ===== STATISTICS SECTION ===== -->
  <section class="statistics">
    <div class="stats-container">
      <div class="stat-item">
        <h2>500+</h2>
        <p>Tutors</p>
      </div>
      <div class="divider"></div>
      <div class="stat-item">
        <h2>2.000+</h2>
        <p>Learning Sessions</p>
      </div>
      <div class="divider"></div>
      <div class="stat-item">
        <h2>5</h2>
        <p>Learning Programs</p>
      </div>
    </div>
  </section>





  <!-- ===== TEACHER ===== -->
  <section class="tutor">
    <div class="section-header">BECOME PART OF <span> PrivEdu </span></div>
    <div class="wrapper">
      <div class="content-wrapper">
        <img src="../images/teach.jpg" class="hero-img">
        <div class="card1">
          <h1>READY TO SHARE <span>your</span><br>Qur’an Knowledge <span>with </span>Others?</h1>
          <p>
            Let’s create something powerful together. Join our mission to spread the beauty of Qur’an learning. As a
            PrivEdu tutor, you’ll inspire students, share your passion, and make a meaningful impact.
          </p>
          <a href="{{ route('auth.register.tutor') }}" class="btn">Join as a Tutor</a>
        </div>
      </div>
    </div>
  </section>

@endsection
