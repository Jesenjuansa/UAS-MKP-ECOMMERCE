@extends('components.layoutUser')


@section('content')
<link rel="stylesheet" href="{{ asset('cssUser/navbar.css') }}">
<link rel="stylesheet" href="{{ asset('cssUser/tutor-requests.css') }}">

  <main class="requests-container">

    <section class="requests-header">
      <h1>Student Requests</h1>
      <p>View and manage new learning requests from students.</p>
    </section>

    <section class="requests-grid">

      <!-- ========== CARD: DISCUSS (Tutor harus set deal) ========== -->
      <div class="request-card discuss">

        <div class="request-info">
          <h3>Ahmad Rahman</h3>
          <p><strong>Age:</strong> 15</p>
          <p><strong>Subject:</strong> Qur’an Recitation</p>
          <p><strong>Learning Mode:</strong> Online</p>
          <p><strong>Notes:</strong> I want to improve my pronunciation.</p>

          <p>
            <strong>Status:</strong>
            <span class="badge discuss-badge">DISCUSS</span>
            <a href="/html/chat.html" class="chat-link"><i class="fa-solid fa-comment"></i> Chat</a>
          </p>
        </div>

        <!-- FORM SET DEAL -->
        <form class="deal-form" method="POST" action="/tutor/set-deal">
          <!-- id request (backend penting) -->
          <input type="hidden" name="request_id" value="1">

          <label>Schedule:</label>
          <input type="datetime-local" name="schedule" required>

          <label>Duration:</label>
          <select name="duration" required>
            <option value="30">30 mins</option>
            <option value="60">60 mins</option>
            <option value="90">90 mins</option>
          </select>

          <label>Price:</label>
          <input type="number" name="price" placeholder="Enter amount" required>

          <label>Notes (optional):</label>
          <textarea name="note" rows="2"></textarea>

          <button type="submit" class="set-deal-btn">
            <i class="fa-solid fa-handshake"></i> Set Deal
          </button>
        </form>

      </div>


      <!-- ========== CARD: DEAL (Menunggu pembayaran) ========== -->
      <div class="request-card deal">
        <div class="request-info">
          <h3>Yusuf Ali</h3>
          <p><strong>Age:</strong> 18</p>
          <p><strong>Subject:</strong> Arabic Language</p>
          <p><strong>Schedule:</strong> 2025-02-20 • 15:00</p>
          <p><strong>Duration:</strong> 60 mins</p>
          <p><strong>Total Price:</strong> Rp 150000</p>

          <p>
            <strong>Status:</strong>
            <span class="badge deal-badge">DEAL</span>
          </p>
        </div>

        <button class="deal-wait-btn" disabled>WAITING FOR STUDENT PAYMENT</button>
      </div>


      <!-- ========== CARD: ONGOING ========== -->
      <div class="request-card ongoing">

        <div class="request-info">
          <h3>Fatimah Noor</h3>
          <p><strong>Age:</strong> 25</p>
          <p><strong>Subject:</strong> Tajwid Advanced</p>
          <p><strong>Schedule:</strong> 2025-02-21 • 19:00</p>
          <p><strong>Duration:</strong> 60 mins</p>
          <p><strong>Total Price:</strong> Rp 120000</p>

          <p>
            <strong>Status:</strong>
            <span class="badge ongoing-badge">ONGOING</span>
          </p>
        </div>

        <!-- tutor menekan mark done -->
        <form method="POST" action="/tutor/mark-done">
          <input type="hidden" name="request_id" value="2">

          <button type="submit" class="mark-done-btn active">
            MARK AS DONE
          </button>
        </form>

      </div>


      <!-- ========== CARD: DONE ========== -->
      <div class="request-card done">

        <div class="request-info">
          <h3>Rahma F.</h3>
          <p><strong>Age:</strong> 19</p>
          <p><strong>Subject:</strong> Qur’an Recitation</p>
          <p><strong>Schedule:</strong> 2025-02-18 • 20:00</p>
          <p><strong>Duration:</strong> 60 mins</p>
          <p><strong>Total Price:</strong> Rp 100000</p>

          <p>
            <strong>Status:</strong>
            <span class="badge done-badge">DONE</span>
          </p>
        </div>

        <button class="done-complete-btn" disabled>LESSON COMPLETED</button>
      </div>

    </section>

  </main>

@endsection
