@extends('components.layoutUser')


@section('content')
<link rel="stylesheet" href="{{ asset('cssUser/navbar.css') }}">
<link rel="stylesheet" href="{{ asset('cssUser/abt.css') }}">

<!-- ===== ABOUT TITLE ===== -->
 <section class="about-section">
  <h1>ABOUT&nbsp;US</h1>
 </section>

 <!-- ===== QUOTE SECTION ===== -->
 <section class="quote-section">
  <p class="author">Who We Are</p>
  <p class="quote-text">
   PrivEdu is an online platform that helps people learn and teach the Qur’an easily.
   We connect students with trusted tutors for private Qur’an lessons anytime and anywhere.
  </p>
 </section>

 <!-- ===== EXTRA SECTIONS (Curiosa style) ===== -->
 <section class="section">
  <div class="image">
   <img src="../images/ppl.jpg" alt="Colourful Lamps">
  </div>
  <div class="text">
   <h2>OUR MISSION</h2>
   <p>
    At PrivEdu Qur’an, our mission is to make Qur’an learning more accessible, effective, and personal for everyone.
    We aim to bridge the gap between students and qualified Qur’an tutors by providing a flexible platform that supports
    individual goals, schedules, and learning levels — from beginner recitation to advanced tajwid and memorization.
   </p>
  </div>
 </section>

 <section class="section reverse">
  <div class="text">
   <h2>OUR STORY</h2>
   <p>
    PrivEdu Qur’an was founded with a simple purpose — to make quality Qur’an education available to everyone, anytime,
    anywhere.
    We understand that many learners struggle to find experienced tutors or flexible study options.
    Through this platform, we connect passionate tutors with dedicated students, creating a space where both can learn,
    teach, and grow together with sincerity and purpose
   </p>
  </div>
  <div class="image">
   <img src="../images/qr.jpg" alt="Sustainable Glass Products">
  </div>
 </section>

@endsection
