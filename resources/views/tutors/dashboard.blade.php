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

  <!-- ===== MENU CONTAINER SECTION ===== -->
  <section class="menu-section">
    <div class="menu-container">

      <!-- LEFT COLUMN -->
      <div class="menu-column">

        <h2>Our Learning Programs</h2>

        <div class="menu-item"> Iqra & Basic Qur’an Reading </div>
        <div class="menu-item"> Tajweed & Tilawah </div>
        <div class="menu-item"> Tahfidz / Qur’an Memorization </div>
        <div class="menu-item"> Tahsin Qur’an Recitation </div>
        <div class="menu-item"> Daily Du’a & Worship </div>
      </div>

      <!-- RIGHT COLUMN -->
      <div class="menu-column">
        <h2>Why Choose Us</h2>
        <div class="menu-item"><span class="icon">✓</span> Learning made enjoyable and interactive</div>
        <div class="menu-item"><span class="icon">✓</span> Study anytime, anywhere</div>
        <div class="menu-item"><span class="icon">✓</span> Experienced and certified educators</div>
        <div class="menu-item"><span class="icon">✓</span> Personalized Learning Plans</div>
        <div class="menu-item"><span class="icon">✓</span> Safe & Comfortable Environment</div>
      </div>

    </div>
  </section>


  <!-- ===== 4 EASY STEPS SECTION ===== -->
  <section class="steps">
    <div class="h2">
      HOW IT WORKS
    </div>

    <div class="catalog-container">
      <!-- Card 1 -->
      <div class="card">
        <div class="img-circle">1</div>
        <h3>Create an Account</h3>
        <p>Sign up to book your chosen tutor and start your learning journey.</p>
        <p class="btn-detail"></p>
        <div class="underline"></div>
      </div>

      <!-- Card 2 -->
      <div class="card">
        <div class="img-circle">2</div>
        <h3>Choose a Tutor</h3>
        <p>Browse through profiles and select the one that fits your goals.</p>
        <p class="btn-detail"></p>
        <div class="underline"></div>
      </div>

      <!-- Card 3 -->
      <div class="card">
        <div class="img-circle">3</div>
        <h3>Consult & Schedule</h3>
        <p>Chat with your tutor to discuss fees and set a suitable schedule.</p>
        <p class="btn-detail"></p>
        <div class="underline"></div>
      </div>

      <!-- Card 4 -->
      <div class="card">
        <div class="img-circle">4</div>
        <h3>Start Learning</h3>
        <p>Begin your personalized Qur’an learning experience anytime, anywhere.</p>
        <p class="btn-detail"></p>
        <div class="underline"></div>
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
          <a href="tutor-register.html" class="btn">Join as a Tutor</a>
        </div>
      </div>
    </div>
  </section>

@endsection
