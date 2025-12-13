@extends('components.layoutUser')


@section('content')
<link rel="stylesheet" href="{{ asset('cssUser/sidebar.css') }}">
<link rel="stylesheet" href="{{ asset('cssUser/dashboard.css') }}">

<style>
    .program-title {
        text-align: center;
        margin-top: 40px;
        font-size: 32px;
        font-weight: 700;
        color: #222;
    }

    .program-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
        gap: 30px;
        max-width: 1200px;
        margin: auto;
        padding: 40px 20px;
    }

    .program-card {
        background: #fff;
        border-radius: 16px;
        padding-bottom: 20px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.08);
        transition: 0.2s;
        text-align: center;
    }

    .program-card:hover {
        transform: translateY(-5px);
    }

    .program-card img {
        width: 100%;
        height: 180px;
        object-fit: cover;
        border-radius: 16px 16px 0 0;
    }

    .program-card h3 {
        margin-top: 15px;
        font-size: 20px;
        font-weight: 600;
    }

    .program-card p {
        font-size: 14px;
        color: #555;
        padding: 0 15px;
    }

    .tutor-info {
        margin-top: 8px;
        font-size: 13px;
        color: #777;
    }

    .learn-btn {
        margin-top: 12px;
        padding: 10px 22px;
        background: #000;
        color: #fff;
        border-radius: 8px;
        display: inline-block;
        font-size: 14px;
        text-decoration: none;
    }

    .learn-btn:hover {
        background: #222;
    }
</style>
  <!-- ===== HERO SECTION ===== -->
  <section class="hero">
    <img src="images/images/home.jpg" alt="Hero Background" class="hero-bg" />
    <div class="hero-content">
      <h1>Find Your Ideal Tutor for a Personalized Learning Journey</h1>
      <p>Learn anytime, anywhere with trusted and qualified tutors.</p>
      <a href="#card" class="btn">Reserve Now</a>
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
        <h2>4.000+</h2>
        <p>Learning Sessions</p>
      </div>
      <div class="divider"></div>
      <div class="stat-item">
        <h2>12</h2>
        <p>Learning Programs</p>
      </div>
    </div>
  </section>

<h1 class="program-title"  id="card">Our Learning Programs</h1>

<div class="program-grid">

    @foreach($classes as $class)
    <div class="program-card">

        <!-- Tutor Photo -->
      <img src="{{ $class->photo
 ? asset('uploads/classes/'.$class->photo)
 : asset('images/default-class.jpg') }}"
 style="width:140px; height:140px; object-fit:cover; border-radius:10px;">
        <h3>{{ $class->title }}</h3>

        <p>{{ Str::limit($class->description, 80) }}</p>

        <p class="tutor-info">By: <strong>{{ $class->tutor->full_name }}</strong></p>

        <a href="{{ route('student.class.detail', $class->id) }}" class="learn-btn">
            Learn Now
        </a>
    </div>
    @endforeach

</div>


  <!-- ===== TEACHER ===== -->
  <section class="tutor">
    <div class="section-header">BECOME PART OF <span> PrivEdu </span></div>
    <div class="wrapper">
      <div class="content-wrapper">
        <img src="images/images/home2.jpg" class="hero-img">
        <div class="card1">
          <h1>READY TO SHARE <span>your</span><br>Knowledge <span>with </span>Others?</h1>
          <p>
            Let’s create something powerful together. Join our mission to make learning accessible for everyone.
            As a PrivEdu tutor, you’ll inspire students, share your expertise, and make a meaningful impact.
          </p>
          <a href="/client/tutor-register.html" class="btn">Join as a Tutor</a>
        </div>
      </div>
    </div>
  </section>
@endsection
