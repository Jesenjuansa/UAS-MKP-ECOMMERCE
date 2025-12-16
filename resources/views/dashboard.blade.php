@extends('components.layoutUser')


@section('content')
<link rel="stylesheet" href="{{ asset('cssUser/sidebar.css') }}">
<link rel="stylesheet" href="{{ asset('cssUser/dashboard.css') }}">
<style>
    .product-section {
    text-align: center;
    padding: 80px 0;
    background: #f9f9f9;
}

.product-title {
    font-size: 32px;
    font-weight: 600;
    margin-bottom: 40px;
    color: #333;
    font-family: "Playfair Display", serif;
}

.product-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
    gap: 30px;
    width: 80%;
    margin: auto;
}

.product-card {
    background: white;
    border-radius: 12px;
    padding: 18px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    transition: 0.3s;
}

.product-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.15);
}

.product-card img {
    width: 100%;
    height: 180px;
    object-fit: cover;
    border-radius: 10px;
}

.product-card h3 {
    margin: 15px 0 10px;
    font-size: 20px;
    font-family: "Playfair Display", serif;
}

.product-card p {
    font-size: 15px;
    color: #555;
    margin-bottom: 20px;
}

.product-btn {
    background: #000;
    color: white;
    border: none;
    padding: 10px 18px;
    border-radius: 6px;
    cursor: pointer;
    transition: 0.3s;
}

.product-btn:hover {
    background: #444;
}

</style>
  <!-- ===== HERO SECTION ===== -->
  <section class="hero">
    <img src="images/images/home.jpg" alt="Hero Background" class="hero-bg" />
    <div class="hero-content">
      <h1>Find Your Ideal Tutor for a Personalized Learning Journey</h1>
      <p>Learn anytime, anywhere with trusted and qualified tutors.</p>
       <a class="btn" href="{{ route('auth.login') }}" onclick="alert('⚠️ Silahkan login terlebih dahulu!'); return false;">Reserve Now</a>
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

<section class="product-section">
    <h2 class="product-title">Our Learning Programs</h2>

    <div class="product-grid">
        <!-- Product 3 -->
        <div class="product-card">
            <img src="../images/je.jpg" alt="Programming" />
            <h3>Programming</h3>
            <p>Fundamental programming concepts for beginners.</p>
             <a class="product-btn" href="{{ route('auth.login') }}" onclick="alert('⚠️ Silahkan login terlebih dahulu!'); return false;">Learn Now</a>
        </div>

        <!-- Product 4 -->
        <div class="product-card">
            <img src="../images/je1.jpg" alt="Arabic Basics" />
            <h3>Iqra & Basic Qur’an Reading</h3>
            <p>Learn basic Arabic to understand Qur’anic vocabulary.</p>
            <a class="product-btn" href="{{ route('auth.login') }}" onclick="alert('⚠️ Silahkan login terlebih dahulu!'); return false;">Learn Now</a>
        </div>
        <!-- Product 4 -->
        <div class="product-card">
            <img src="../images/je2.jpg" alt="Arabic Basics" />
            <h3>English</h3>
            <p>Learn English fundamentals for beginners.</p>
            <a class="product-btn" href="{{ route('auth.login') }}" onclick="alert('⚠️ Silahkan login terlebih dahulu!'); return false;">Learn Now</a>
        </div>
        <!-- Product 4 -->
        <div class="product-card">
            <img src="../images/je3.jpg" alt="Arabic Basics" />
            <h3>Mandarin</h3>
            <p>Learn Mandarin fundamentals for beginners.</p>
            <a class="product-btn" href="{{ route('auth.login') }}" onclick="alert('⚠️ Silahkan login terlebih dahulu!'); return false;">Learn Now</a>
        </div>
        <!-- Product 4 -->
        <div class="product-card">
            <img src="../images/je4.jpg" alt="Arabic Basics" />
            <h3>Japanese</h3>
            <p>Learn Japanese fundamentals for beginners.</p>
            <a class="product-btn" href="{{ route('auth.login') }}" onclick="alert('⚠️ Silahkan login terlebih dahulu!'); return false;">Learn Now</a>
        </div>
        <!-- Product 4 -->
        <div class="product-card">
            <img src="../images/je5.jpg" alt="Arabic Basics" />
            <h3>Drawing</h3>
            <p>Learn drawing fundamentals for beginners.</p>
            <a class="product-btn" href="{{ route('auth.login') }}" onclick="alert('⚠️ Silahkan login terlebih dahulu!'); return false;">Learn Now</a>
        </div>
    <!-- Product 4 -->
        <div class="product-card">
            <img src="../images/je6.jpg" alt="Arabic Basics" />
            <h3>Cooking</h3>
            <p>Learn cooking fundamentals for beginners.</p>
            <a class="product-btn" href="{{ route('auth.login') }}" onclick="alert('⚠️ Silahkan login terlebih dahulu!'); return false;">Learn Now</a>
        </div>
            <!-- Product 4 -->
        <div class="product-card">
            <img src="../images/je7.jpg" alt="Arabic Basics" />
            <h3>Music</h3>
            <p>Learn music fundamentals for beginners.</p>
            <a class="product-btn" href="{{ route('auth.login') }}" onclick="alert('⚠️ Silahkan login terlebih dahulu!'); return false;">Learn Now</a>
        </div>
         <!-- Product 4 -->
        <div class="product-card">
            <img src="../images/je8.jpg" alt="Arabic Basics" />
            <h3>Science</h3>
            <p>Learn science fundamentals for beginners.</p>
            <a class="product-btn" href="{{ route('auth.login') }}" onclick="alert('⚠️ Silahkan login terlebih dahulu!'); return false;">Learn Now</a>
        </div>
    </div>
</section>
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
          <a href="{{ route('auth.register.tutor') }}" class="btn">Join as a Tutor</a>
        </div>
      </div>
    </div>
  </section>

@endsection
