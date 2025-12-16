 @extends('components.layoutUser')


 @section('content')
 <link rel="stylesheet" href="{{ asset('cssUser/navbar.css') }}">
 <link rel="stylesheet" href="{{ asset('cssUser/tutor-detail.css') }}">
 <link rel="stylesheet" href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css') }}">

 <style>
     .container {
         max-width: 1100px;
         margin: 40px auto;
         display: grid;
         grid-template-columns: 1.3fr .7fr;
         gap: 30px
     }

     .panel {
         background: #fff;
         padding: 24px;
         border-radius: 14px;
         box-shadow: 0 3px 12px rgba(0, 0, 0, .08)
     }

     .profile img {
         width: 140px;
         height: 140px;
         object-fit: cover;
         border-radius: 12px;
         margin-bottom: 10px
     }

     .pkg {
         border: 1px solid #eee;
         padding: 14px;
         border-radius: 10px;
         margin-bottom: 10px
     }

     .small {
         font-size: 14px;
         color: #666
     }

     .badge {
         padding: 6px 12px;
         border-radius: 8px;
         font-size: 13px;
         background: #111;
         color: #fff
     }

     .alert-error {
         background: #fee2e2;
         color: #991b1b;
         padding: 12px 16px;
         border-radius: 8px;
         margin-bottom: 16px;
         font-weight: 500;
     }

     .alert-success {
         background: #ecfdf5;
         color: #065f46;
         padding: 12px 16px;
         border-radius: 8px;
         margin-bottom: 16px;
         font-weight: 500;
     }

     .tutor-profile {
    text-align: center;
    padding: 24px 20px;
}

.tutor-photo {
    width: 120px;
    height: 120px;
    border-radius: 50%;
    object-fit: cover;
    margin-bottom: 14px;
    border: 3px solid #f1f5f9;
}

.tutor-name {
    font-size: 18px;
    font-weight: 600;
    margin-bottom: 6px;
}

.tutor-subject {
    font-size: 14px;
    color: #6b7280;
    margin-bottom: 10px;
}

.class-badge {
    display: inline-block;
    background: #111827;
    color: #fff;
    font-size: 12px;
    padding: 5px 12px;
    border-radius: 999px;
    margin-bottom: 12px;
}

.rating-box {
    margin-top: 10px;
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 3px;
}

.star {
    font-size: 16px;
    color: #d1d5db;
}

.star.filled {
    color: #facc15;
}

.rating-count {
    margin-left: 6px;
    font-size: 13px;
    color: #6b7280;
}

/* ===============================
   STUDENT REVIEWS
================================ */
.reviews-section {
    margin-top: 40px;
}

.reviews-title {
    font-size: 20px;
    font-weight: 600;
    color: #1f2937;
    margin-bottom: 18px;
}

/* ===============================
   REVIEW CARD
================================ */
.review-card {
    background: #ffffff;
    padding: 16px 18px;
    border-radius: 12px;
    margin-bottom: 14px;
    box-shadow: 0 6px 18px rgba(0, 0, 0, 0.06);
    transition: all 0.2s ease;
}

.review-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 28px rgba(0, 0, 0, 0.08);
}

/* ===============================
   STARS
================================ */
.review-stars {
    color: #facc15;
    font-size: 16px;
    letter-spacing: 1px;
}

/* ===============================
   REVIEW TEXT
================================ */
.review-text {
    margin: 10px 0 12px;
    font-size: 14px;
    line-height: 1.6;
    color: #374151;
    font-style: italic;
}

/* ===============================
   FOOTER
================================ */
.review-footer {
    display: flex;
    justify-content: flex-end;
}

.review-user {
    font-size: 13px;
    font-weight: 500;
    color: #1f2937;
}

/* ===============================
   EMPTY STATE
================================ */
.no-review {
    color: #6b7280;
    font-size: 14px;
}


 </style>


 <div class="container">

     {{-- LEFT --}}
     <div class="panel">
         @if (session('success'))
         <div class="alert-success" id="successAlert">
             {{ session('success') }}
         </div>
         <script>
             setTimeout(() => {
                 document.getElementById('successAlert') ? .remove();
             }, 3000);

         </script>
         @endif
         @if (session('error'))
         <div class="alert-error">
             {{ session('error') }}
         </div>
         @endif

         <h2>About the Tutor</h2>

         <p class="small">
             This tutor provides {{ $tutor->class_type ?? 'flexible' }} classes.
             Detailed biography has not been added yet.
         </p>

         <h3 style="margin-top:20px">Packages & Pricing</h3>

         <div class="pkg">
             <strong>{{ $class->title }}</strong>
             <div class="small">
                 {{ $class->duration }} •
                 Rp {{ number_format($class->price,0,',','.') }}
             </div>
             <div class="small">Hari: {{ $class->day }}</div>
         </div>

         <form method="POST" action="{{ route('student.request.store') }}">
             @csrf
             <input type="hidden" name="class_id" value="{{ $class->id }}">

             <button type="submit" class="badge"
                 style="display:block;text-align:center;margin-top:20px;border:none;cursor:pointer;">
                 Request Class
             </button>
         </form>


     </div>

     {{-- RIGHT --}}
<aside class="panel profile tutor-profile">

    <img
        src="{{ $class->tutor->pas_foto
            ? asset('uploads/tutors/'.$class->tutor->pas_foto)
            : asset('images/default-user.png') }}"
        alt="Tutor Photo"
        class="tutor-photo"
    >

    <h2 class="tutor-name">
        {{ $class->tutor->name }}
    </h2>

    {{-- TEACHING SUBJECT (GANTI TOTAL STUDENT) --}}
    <p class="tutor-subject">
        {{ $class->tutor->teaching_subject ?? 'Teaching Subject Not Set' }}
    </p>

    {{-- CLASS TYPE --}}
    @if($class->tutor->class_type)
        <span class="badge class-badge">
            {{ ucfirst($class->tutor->class_type) }} Class
        </span>
    @endif

    {{-- RATING --}}
    @php
        $fullStars = floor($averageRating ?? 0);
    @endphp

    <div class="rating-box">
        @for ($i = 1; $i <= 5; $i++)
            @if ($i <= $fullStars)
                <span class="star filled">★</span>
            @else
                <span class="star">★</span>
            @endif
        @endfor

        <span class="rating-count">
            ({{ $totalRaters ?? 0 }})
        </span>
    </div>

</aside>


 </div>

 {{-- ================= STUDENT REVIEWS ================= --}}
<div class="reviews-section">
    <h3 class="reviews-title">Student Reviews</h3>

    @forelse ($reviews as $review)
        <div class="review-card">

            {{-- ⭐ STARS --}}
            <div class="review-stars">
                @for ($i = 1; $i <= 5; $i++)
                    @if ($i <= $review->rating)
                        ★
                    @else
                        ☆
                    @endif
                @endfor
            </div>

            {{-- REVIEW TEXT --}}
            <p class="review-text">
                “{{ $review->review }}”
            </p>

            {{-- STUDENT NAME --}}
            <div class="review-footer">
                <span class="review-user">
                    {{ $review->student->full_name
                        ?? $review->student->name
                        ?? $review->student->email }}
                </span>
            </div>

        </div>
    @empty
        <p class="no-review">No reviews yet.</p>
    @endforelse
</div>


 @endsection
