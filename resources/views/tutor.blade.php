@extends('components.layoutUser')


@section('content')
<link rel="stylesheet" href="{{ asset('cssUser/navbar.css') }}">
<link rel="stylesheet" href="{{ asset('cssUser/tutors.css') }}">

  <!-- ===== MAIN CONTENT ===== -->
  <main>
    <div class="container">
      <div class="left-section">
        <img src="../images/rta.jpg" alt="Tutor banner" class="main-image" />
      </div>

      <div class="right-section">
        <h1>Learn with the best Qur’an tutors near you or online</h1>

        <ul class="features">
          <li>🏆 Best Online Qur’an Recitation Course</li>
          <li>🖋️ 69,272 Certified Online Tutors</li>
          <li>🎉 Top Online Qur’an Learning Course</li>
          <li>🆓 Enjoy Your First Hour for Free!</li>
        </ul>

        <form action="/search-tutors" method="GET">
          <div class="search-bar">

            <input type="text" name="subject" placeholder="Subjects" list="subjects">
            <datalist id="subjects">
              <option value="Iqra & Basic Qur’an Reading"></option>
              <option value="Tajweed & Tilawah"></option>
              <option value="Tahfidz / Qur’an Memorization"></option>
              <option value="Tahsin Qur’an Recitation"></option>
              <option value="Daily Du’a & Worship"></option>
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
      <img src="../images/w1.jpg" alt="Aisha Amira" class="product-img">
      <h3>Aisha Amira</h3>
      <p class="desc">Experienced Qur’an tutor with a patient and kind approach.</p>
      <div class="price-buy">
        <span class="price">Rp50.000/jam</span>
      </div>
    </a>

    <a href="/tutor/2" class="card">
      <div class="badge">Online</div>
      <img src="../images/m1.jpg" alt="Ahmad Yusuf" class="product-img">
      <h3>Ahmad Yusuf</h3>
      <p class="desc">Certified in Tajweed, focusing on accurate recitation.</p>
      <div class="price-buy">
        <span class="price">Rp55.000/jam</span>
      </div>
    </a>

    <a href="/tutor/3" class="card">
      <div class="badge">Offline</div>
      <img src="../images/m2.jpg" alt="Ibrahim Saleh" class="product-img">
      <h3>Ibrahim Saleh</h3>
      <p class="desc">Helping students memorize the Qur’an effectively.</p>
      <div class="price-buy">
        <span class="price">Rp60.000/jam</span>
      </div>
    </a>

    <a href="/tutor/4" class="card">
      <div class="badge">Online</div>
      <img src="../images/w2.jpg" alt="Siti Khadijah" class="product-img">
      <h3>Siti Khadijah</h3>
      <p class="desc">Teaches Tajwid with calm, step-by-step guidance.</p>
      <div class="price-buy">
        <span class="price">Rp70.000/jam</span>
      </div>
    </a>
  </section>
@endsection
