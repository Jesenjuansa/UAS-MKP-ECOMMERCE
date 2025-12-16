@extends('components.layoutUser')

@section('content')
<link rel="stylesheet" href="{{ asset('cssUser/navbar.css') }}">
<link rel="stylesheet" href="{{ asset('cssUser/siswa-mylessons.css') }}">

<main class="lessons-container">
    <h1 class="page-title">My Lessons</h1>

    <div class="lessons-grid">

        @forelse ($lessons as $lesson)

        @php
            // cek apakah student sudah memberi rating
            $alreadyRated = \App\Models\Rating::where('student_id', auth()->id())
                ->where('class_id', $lesson->class_id)
                ->exists();

            // cek payment terakhir
            $payment = \App\Models\StudentPayment::where('lesson_request_id', $lesson->id)
                ->where('student_id', auth()->id())
                ->latest()
                ->first();
        @endphp

        <!-- ================= CARD ================= -->
        <div class="lesson-card {{ strtolower($lesson->status) }}">
            <div class="lesson-info">
                <h3>Tutor: {{ $lesson->tutor->name }}</h3>

                <p><strong>Subject:</strong> {{ $lesson->subject }}</p>
                <p><strong>Schedule:</strong> {{ $lesson->schedule }}</p>
                <p><strong>Duration:</strong> {{ $lesson->duration }}</p>
                <p><strong>Total Price:</strong>
                    Rp {{ number_format($lesson->price,0,',','.') }}
                </p>

                <p>
                    <strong>Status:</strong>
                    <span class="badge {{ strtolower($lesson->status) }}-badge">
                        {{ $lesson->status }}
                    </span>
                </p>
            </div>

            <!-- ================= ACTION ================= -->
            <div class="lesson-action">

                {{-- DEAL --}}
                @if ($lesson->status === 'DEAL')
                    <button class="disabled-btn">Waiting Tutor Verification</button>

                {{-- WAITING PAYMENT --}}
                @elseif ($lesson->status === 'WAITING_PAYMENT')

                    @if (!$payment)
                        <label for="payment-modal-{{ $lesson->id }}" class="pay-btn">
                            Pay Now
                        </label>
                    @elseif ($payment->status === 'pending')
                        <button class="disabled-btn">
                            Waiting Admin Verification
                        </button>
                    @elseif ($payment->status === 'rejected')
                        <label for="payment-modal-{{ $lesson->id }}" class="pay-btn">
                            Re-upload Payment
                        </label>
                    @endif

                {{-- ONGOING --}}
                @elseif ($lesson->status === 'ONGOING')
                    <button class="disabled-btn">Lesson in Progress</button>

                {{-- DONE --}}
                @elseif ($lesson->status === 'DONE')
                    @if ($alreadyRated)
                        <button class="disabled-btn">Already Reviewed</button>
                    @else
                        <label for="review-modal-{{ $lesson->id }}" class="review-btn">
                            Leave Review
                        </label>
                    @endif
                @endif

            </div>
        </div>

        <!-- ================= PAYMENT MODAL ================= -->
        @if ($lesson->status === 'WAITING_PAYMENT')
        <input type="checkbox"
               id="payment-modal-{{ $lesson->id }}"
               class="modal-toggle">

        <div class="modal">
            <label for="payment-modal-{{ $lesson->id }}" class="modal-overlay"></label>

            <div class="modal-box">
                <h3>Payment Confirmation</h3>

                <form method="POST"
                      action="{{ route('student.payment.store') }}"
                      enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="lesson_request_id" value="{{ $lesson->id }}">
                    <input type="hidden" name="tutor_id" value="{{ $lesson->tutor_id }}">

                    <div class="detail-item">
                        <label>Student</label>
                        <div class="detail-box">
                            {{ auth()->user()->full_name ?? auth()->user()->name }}
                        </div>
                    </div>

                    <div class="detail-item">
                        <label>Class</label>
                        <div class="detail-box">
                            {{ $lesson->subject }}
                        </div>
                    </div>

                    <div class="detail-item">
                        <label>Price</label>
                        <div class="detail-box">
                            Rp {{ number_format($lesson->price,0,',','.') }}
                        </div>
                    </div>

                    <div class="detail-item">
                        <label>Upload Payment Proof</label>
                        <input type="file" name="proof" required>
                    </div>

                    <div class="modal-actions">
                        <button type="submit" class="submit-btn">
                            Submit Payment
                        </button>

                        <label for="payment-modal-{{ $lesson->id }}"
                               class="close-btn">
                            Cancel
                        </label>
                    </div>
                </form>
            </div>
        </div>
        @endif

        <!-- ================= REVIEW MODAL ================= -->
        @if ($lesson->status === 'DONE' && !$alreadyRated)
        <input type="checkbox"
               id="review-modal-{{ $lesson->id }}"
               class="modal-toggle">

        <div class="modal">
            <label for="review-modal-{{ $lesson->id }}" class="modal-overlay"></label>

            <div class="modal-box">
                <h3>Leave a Review</h3>

                <form method="POST" action="{{ route('student.rating.store') }}">
                    @csrf

                    <input type="hidden" name="class_id" value="{{ $lesson->class_id }}">
                    <input type="hidden" name="tutor_id" value="{{ $lesson->tutor_id }}">

                    <div class="rating">
                        @for ($i = 5; $i >= 1; $i--)
                            <input type="radio"
                                   id="star{{ $i }}-{{ $lesson->id }}"
                                   name="rating"
                                   value="{{ $i }}"
                                   required>
                            <label for="star{{ $i }}-{{ $lesson->id }}">★</label>
                        @endfor
                    </div>

                    <textarea name="review"
                              class="review-text"
                              placeholder="Write your review (optional)"></textarea>

                    <div class="modal-actions">
                        <button type="submit" class="submit-btn">
                            Submit Review
                        </button>

                        <label for="review-modal-{{ $lesson->id }}"
                               class="close-btn">
                            Cancel
                        </label>
                    </div>
                </form>
            </div>
        </div>
        @endif

        @empty
            <p>No lessons yet.</p>
        @endforelse

    </div>
</main>
@endsection
