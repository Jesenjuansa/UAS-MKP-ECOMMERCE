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
    white-space: normal !important;
    word-wrap: break-word !important;
    overflow-wrap: break-word !important;
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
      <a href="#" class="btn">Reserve Now</a>
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

    @foreach ($classes as $class)
    <div class="product-card">

        {{-- FOTO KELAS --}}
<img src="{{ $class->photo
 ? asset('uploads/classes/'.$class->photo)
 : asset('images/default-class.jpg') }}"
 style="width:140px; height:140px; object-fit:cover; border-radius:10px;">



        {{-- TITLE --}}
        <h3>{{ $class->title }}</h3>

        {{-- DESCRIPTION --}}
        <p>{{ $class->description }}</p>

        {{-- BUTTON --}}
        <a class="product-btn"
           href="{{ route('tutors.classes') }}">
            Manage Class
        </a>

    </div>
    @endforeach
    @if($classes->isEmpty())
    <p style="text-align:center; opacity:0.7;">You haven't created any classes yet.</p>
@endif

</div>

</section>


@endsection
