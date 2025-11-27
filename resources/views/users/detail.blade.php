@extends('components.layoutUser')


@section('content')
<link rel="stylesheet" href="{{ asset('cssUser/navbar.css') }}">
<link rel="stylesheet" href="{{ asset('cssUser/tutor-detail.css') }}">

 <main class="tutor-detail-container">

    <!-- LEFT SECTION -->
    <section class="tutor-info">

      <h2>About the Tutor</h2>
      <p>
        I’ve been teaching Qur’an recitation and tajweed for 6 years, helping students improve reading,
        pronunciation, and memorization.
      </p>

      <!-- LANGUAGES & EXPERIENCE -->
      <div class="detail-row">

        <div class="detail-card">
          <h3>🗣️ Languages</h3>
          <p>Arabic, English, Indonesian</p>
        </div>

        <div class="detail-card">
          <h3>💼 Experience</h3>
          <p>6 years</p>
        </div>

      </div>

      <!-- PRICING -->
      <div class="detail-card pricing-card">
        <h3>💰 Pricing</h3>
        <p>IDR 90.000/hour</p>
        <p>2 hours package: IDR 165.000</p>
        <p>In-person transport fee: +IDR 10.000</p>
      </div>

      <!-- AVAILABILITY -->
      <div class="detail-card">
        <h3>🗓️ Schedule / Availability</h3>
        <p>
          Monday–Friday: 07.00 – 21.00 <br>
          Saturday–Sunday: 09.00 – 18.00
        </p>
      </div>

      <!-- SUBJECTS -->
      <div class="subjects">
        <h3>Teaching Focus</h3>
        <div class="badges">
          <span>Qur’an Recitation</span>
          <span>Tajweed</span>
          <span>Memorization (Tahfidz)</span>
          <span>Basic Arabic</span>
        </div>
      </div>

    </section>

    <!-- RIGHT SECTION -->
    <aside class="profile-form">

      <div class="profile-card">
        <img src="/images/w1.jpg" alt="Tutor Photo">

        <h2>Aisha Amira</h2>
        <p>Qur’an & Tajweed Tutor</p>
        <p class="education">Al-Azhar University</p>

        <div class="rating">
          ⭐ 4.9 <span>(58 students)</span>
        </div>
      </div>

      <!-- FORM -->
      <form method="GET" action="chat.html" class="request-form">

        <!-- Hidden untuk backend -->
        <input type="hidden" name="tutor_id" value="1">
        <input type="hidden" name="tutor_name" value="Aisha Amira">
        <input type="hidden" name="subject_display" value="Qur’an & Tajweed Tutor">

        <h3>Send Request</h3>

        <label>Full Name</label>
        <input type="text" name="full_name" required>

        <label>Age</label>
        <input type="number" name="age" min="5" max="100" required>

        <label>Learning Mode</label>
        <select name="learning_mode" required>
          <option value="">Select Mode</option>
          <option value="online">Online</option>
          <option value="in-person">In-person</option>
        </select>

        <label>City / Area</label>
        <input type="text" name="city" placeholder="e.g., Kuta Alam, Darussalam">

        <label>Subject / Focus</label>
        <select name="subject" required>
          <option value="">Select Subject</option>
          <option value="recitation">Qur’an Recitation</option>
          <option value="tajweed">Tajweed</option>
          <option value="tahfidz">Memorization (Tahfidz)</option>
          <option value="arabic">Basic Arabic</option>
        </select>

        <label>Preferred Schedule</label>
        <textarea name="preferred_schedule" rows="2" placeholder="e.g., Monday 7PM - 8PM"></textarea>

        <label>Additional Message</label>
        <textarea name="extra_message" rows="3" placeholder="Optional message to tutor"></textarea>

        <button type="submit" class="send-btn">Send Request</button>
      </form>

    </aside>

  </main>
@endsection
