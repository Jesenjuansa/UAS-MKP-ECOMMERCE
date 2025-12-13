@extends('components.layoutUser')


@section('content')
<link rel="stylesheet" href="{{ asset('cssUser/navbar.css') }}">
<link rel="stylesheet" href="{{ asset('cssUser/abt.css') }}">
<link rel="stylesheet" href="{{ asset('cssUser/tutors.css') }}">

 <!-- ===== ABOUT TITLE ===== -->
 <section class="about-section">
  <h1>ABOUT&nbsp;US</h1>
 </section>

 <!-- ===== QUOTE SECTION ===== -->
 <section class="quote-section">
  <p class="author">Who We Are</p>
  <p class="quote-text">
   PrivEdu is an online learning platform that connects students with qualified tutors across various subjects. We make
   learning easier, more flexible, and personalized anytime and anywhere.
  </p>
 </section>

 <!-- ===== EXTRA SECTIONS (Curiosa style) ===== -->
 <section class="section">
  <div class="image">
   <img src="images/images/about.jpg" alt="Colourful Lamps">
  </div>
  <div class="text">
   <h2>OUR MISSION</h2>
   <p>
    At PrivEdu, our mission is to make quality learning accessible, effective, and personal for everyone. We strive to
    bridge the gap between students and skilled tutors by providing a flexible platform that supports individual goals,
    schedules, and learning levels from academic subjects to languages, and personal development.
   </p>
  </div>
 </section>

 <section class="section reverse">
  <div class="text">
   <h2>OUR STORY</h2>
   <p>
    PrivEdu was founded with a simple purpose to make education more reachable for everyone, anytime, anywhere. We
    understand that many learners struggle to find experienced tutors or flexible learning options. Through this
    platform, we connect passionate tutors with dedicated students, creating a space where both can learn, teach, and
    grow together with purpose.
   </p>
  </div>
  <div class="image">
   <img src="images/images/about2.jpg" alt="Sustainable Glass Products">
  </div>
 </section>

@endsection
