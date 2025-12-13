 @extends('components.layoutUser')


@section('content')
<link rel="stylesheet" href="{{ asset('cssUser/navbar.css') }}">
<link rel="stylesheet" href="{{ asset('cssUser/tutor-detail.css') }}">
<link rel="stylesheet" href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css') }}">

  <!-- main container -->
  <div class="container">

    <!-- LEFT: tutor detail -->
    <div class="left">
      <div class="panel">
        <h1>About the Tutor</h1>
        <p class="lead">I’ve been teaching Qur’an recitation and tajweed for 6 years, helping students improve reading,
          pronunciation, and memorization. I also teach general subjects (math, Mandarin) for basic to intermediate
          levels.</p>

        <div class="grid-2" style="margin-bottom:14px">
          <div class="detail-card">
            <h4>🗣️ Languages</h4>
            <p>Arabic, English, Indonesian</p>
          </div>
          <div class="detail-card">
            <h4>💼 Experience</h4>
            <p>6 years</p>
          </div>
        </div>

        <div class="panel" style="padding:16px">
          <h3 style="color:var(--accent);margin-bottom:8px">Packages & Pricing</h3>

          <!-- Static examples of packages (these represent tutor-myclasses) -->
          <div class="pricing-list">
            <div class="pkg">
              <strong>Iqra' Level 1 — Starter</strong>
              <small>45 minutes • Rp 150.000 per session</small>
              <small class="days">Hari: Senin & Rabu</small>
            </div>

            <div class="pkg">
              <strong>Mathematics — Basic Algebra</strong>
              <small>60 minutes • Rp 200.000 per session</small>
              <small class="days">Hari: Senin & Rabu</small>
            </div>
          </div>

          <div class="muted">Note: final total will be calculated by the system when you submit the request. You can
            select multiple packages on the right panel.</div>
        </div>

        <div class="subjects">
          <h3>Teaching Focus</h3>
          <div class="badges">
            <span>Qur’an Recitation</span>
            <span>Mathematics</span>
            <span>Mandarin</span>
          </div>
        </div>
        <!-- ================= STUDENT REVIEWS ================= -->
      <div id="reviews" class="reviews-section">
        <h2 class="reviews-title">Student Reviews</h2>

        <div class="review-card">
          <div class="review-stars">⭐⭐⭐⭐⭐</div>
          <p class="review-text">
            “Ustadzah Aisha sangat sabar dan penjelasannya mudah dipahami.
            Bacaan saya jauh lebih baik dalam 2 minggu.”
          </p>
          <div class="review-author">— Fatimah, 14 tahun</div>
        </div>

        <div class="review-card">
          <div class="review-stars">⭐⭐⭐⭐</div>
          <p class="review-text">
            “Kelasnya rapi, struktur belajarnya jelas. Saya suka modul Tajwidnya.”
          </p>
          <div class="review-author">— Ahmad, 22 tahun</div>
        </div>
      </div>

      </div>
    </div>

    <!-- RIGHT: profile + packages (select) + request form -->
    <aside class="right">

      <!-- profile -->
      <div class="profile-card">
        <img src="/client/images/w1.jpg" alt="Tutor photo">
        <h2>Aisha Amira</h2>
        <p class="title">Qur’an & Tajweed Tutor</p>
        <div class="rating" onclick="document.getElementById('reviews').scrollIntoView({ behavior: 'smooth' })"
          style="cursor:pointer">
          ⭐ 4.9 <span style="color:var(--muted);font-size:13px"> (2 students)</span>
        </div>

      </div>

      <!-- packages selector (part of form below) -->
      <div class="packages panel">
        <h3>Select Packages</h3>

        <!-- NOTE: name attributes are arrays so backend receives multiple packages -->
        <form method="POST" action="/request/submit" enctype="multipart/form-data" class="request-form">

          <!-- each package row: checkbox + hidden price + quantity -->
          <div class="pkg-row">
            <div class="pkg-left">
              <b>Iqra' Level 1 — Starter</b>
              <small>45 minutes • Rp 150.000 / session</small>
              <small class="days">Hari: Senin & Rabu</small>
            </div>
            <div class="pkg-actions">
              <input type="checkbox" id="pkg1" name="packages[]" value="iqra1">
              <label for="pkg1" style="font-size:13px;color:var(--muted);display:block;margin-top:6px">Select</label>
              <!-- send price & title so server can compute -->
              <input type="hidden" name="pkg_price_iqra1" value="150000">
              <input type="number" name="pkg_qty_iqra1" min="1" value="1" aria-label="quantity" />
            </div>
          </div>

          <div class="pkg-row">
            <div class="pkg-left">
              <b>Mathematics — Basic Algebra</b>
              <small>60 minutes • Rp 200.000 / session</small>
              <small class="days">Hari: Senin & Rabu</small>
            </div>
            <div class="pkg-actions">
              <input type="checkbox" id="pkg3" name="packages[]" value="math1">
              <label for="pkg3" style="font-size:13px;color:var(--muted);display:block;margin-top:6px">Select</label>
              <input type="hidden" name="pkg_price_math1" value="200000">
              <input type="number" name="pkg_qty_math1" min="1" value="1" aria-label="quantity" />
            </div>
          </div>

          <!-- summary (visual only) -->
          <div class="summary" aria-hidden="true">
            <h4>Order Summary</h4>
            <div class="line">
              <div>Selected packages</div>
              <div class="muted">—</div>
            </div>
            <div class="line">
              <div>Subtotal</div>
              <div class="muted">—</div>
            </div>
            <div class="total">Total: <span class="muted">Calculated at checkout</span></div>
          </div>

          <!-- bank info (visible for student for payment destination) -->
          <div class="bank-card">
            <h4>Payment Information</h4>
            <div>Bank: <span class="bank-info">BCA</span></div>
            <div>Account: <span class="bank-info">1234567890</span></div>
            <div>Account Name: <span class="bank-info">PrivEdu Indonesia</span></div>
            <div class="muted">Upload payment proof after transfer. Admin will verify.
            </div>
          </div>

          <!-- request form fields -->
          <h3 style="margin-top:6px">Your Details & Request</h3>

          <!-- hidden tutor info -->
          <input type="hidden" name="tutor_id" value="1">
          <input type="hidden" name="tutor_name" value="Aisha Amira">

          <label>Full Name</label>
          <input type="text" name="full_name" placeholder="Your full name" required>

          <div class="small-row">
            <div class="half">
              <label>Learning Mode</label>
              <select name="learning_mode" required>
                <option value="">Select mode</option>
                <option value="online">Online</option>
                <option value="in-person">In-person (Nearby)</option>
              </select>
            </div>
            <div class="half">
              <label>City / Area</label>
              <input type="text" name="city" placeholder="e.g., Kuta Alam">
            </div>
          </div>

          <label>Upload Proof of Payment (optional)</label>
          <input type="file" name="payment_proof" accept="image/*">


          <div style="height:8px"></div>

          <!-- submit -->
          <button type="submit" class="send-btn">Send Request & Upload</button>

          <div style="height:10px"></div>
          <div class="muted" style="font-size:12px">After submitting, request will appear in "My Lessons"</div>

        </form>
      </div>

    </aside>
  </div>

@endsection
