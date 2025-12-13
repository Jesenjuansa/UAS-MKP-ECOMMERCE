@extends('components.layoutUser')


@section('content')
<link rel="stylesheet" href="{{ asset('cssUser/navbar.css') }}">
<link rel="stylesheet" href="{{ asset('cssUser/tutors.css') }}">

  <!-- ===== MAIN CONTENT ===== -->
  <main>
    <div class="container">
      <div class="left-section">
        <img src="images/images/tutors1.jpg" alt="Tutor banner" class="main-image" />
      </div>

      <div class="right-section">
        <h1>Learn with the best tutors near you or online</h1>

        <ul class="features">
          <li>🏆 Best Online Recitation Course</li>
          <li>🖋️ 69,272 Certified Online Tutors</li>
          <li>🎉 Top Online Learning Course</li>
          <li>🆓 Enjoy Your First Hour for Free!</li>
        </ul>

        <form action="/search-tutors" method="GET">
          <div class="search-bar">

            <input type="text" name="subject" placeholder="Subjects" list="subjects">
            <datalist id="subjects">
              <option value="Iqra & Qur’an Reading"></option>
              <option value="Programming"></option>
              <option value="Mathematics"></option>
              <option value="English"></option>
              <option value="Mandarin"></option>
              <option value="Science"></option>
              <option value="Baking class"></option>
              <option value="Drawing"></option>
            </datalist>

            <input type="text" name="type" placeholder="Class Type" list="classTypes">
            <datalist id="classTypes">
              <option value="Online"></option>
              <option value="Offline"></option>
              <option value="Both"></option>
            </datalist>

            <button type="submit">Search</button>
          </div>
        </form>

      </div>
    </div>
  </main>

  <!-- ===== TUTOR LIST ===== -->
  <section class="catalog-container">
    <a href="/tutor/1" class="card">
      <div class="badge">Offline</div>
      <img src="images/images/tutor1.png" alt="Aisha Amira" class="product-img">
      <h3>Aisha Amira</h3>
      <p class="desc">Mandarin language tutor specializing in beginner to intermediate learners.</p>
      <div class="price-buy">
        <span class="price">Rp120.000/jam</span>
      </div>
    </a>

    <a href="/tutor/2" class="card">
      <div class="badge">Online</div>
      <img src="images/images/tutor2.png" alt="Yohan Smith" class="product-img">
      <h3>Yohan Smith</h3>
      <p class="desc">an art and drawing tutor with 7 years of experience in traditional and digital illustration</p>
      <div class="price-buy">
        <span class="price">Rp95.000/jam</span>
      </div>
    </a>

    <a href="/tutor/3" class="card">
      <div class="badge">Offline</div>
      <img src="images/images/tutor3.jpg" alt="Siti Khadijah" class="product-img">
      <h3>Siti Khadijah</h3>
      <p class="desc">I teach how to create delicious breads, pastries, and cakes using
        simple and reliable techniques.</p>
      <div class="price-buy">
        <span class="price">Rp80.000/jam</span>
      </div>
    </a>
  </section>
@endsection
