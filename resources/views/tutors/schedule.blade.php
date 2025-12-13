@extends('components.layoutUser')


@section('content')
<link rel="stylesheet" href="{{ asset('cssUser/navbar.css') }}">
<link rel="stylesheet" href="{{ asset('cssUser/tutor-schedule.css') }}">

 <main class="schedule-page">

  <section class="title-section">
   <h1>Teaching Schedule</h1>
   <p>Your sessions scheduled with students.</p>
  </section>

<section class="schedule-list">

    {{-- ================= UPCOMING ================= --}}
    @foreach ($upcoming as $item)
    <form action="{{ route('tutor.startclass') }}" method="POST" class="schedule-card">
        @csrf
        <input type="hidden" name="request_id" value="{{ $item->id }}">

        <div class="card-header">
            <span class="status-badge upcoming">Upcoming</span>
        </div>

        <div class="card-body">
            <p><i class="fa-solid fa-calendar-alt"></i> {{ $item->schedule }}</p>
            <p><i class="fa-solid fa-user"></i> Student: {{ $item->student_name }}</p>
            <p><i class="fa-solid fa-book"></i> Topic: {{ $item->subject }}</p>

            @if ($item->learning_mode == 'online')
                <p><i class="fa-solid fa-laptop"></i> Online</p>
            @else
                <p><i class="fa-solid fa-location-dot"></i> {{ $item->location }}</p>
            @endif

            <p><i class="fa-solid fa-clock"></i> Duration: {{ $item->duration }}</p>
        </div>

        <div class="card-actions">
            <button type="submit" class="start-btn">Start Class</button>
        </div>
    </form>
    @endforeach



    {{-- ================= ONGOING ================= --}}
    @foreach ($ongoing as $item)
    <form action="{{ route('tutor.completeclass') }}" method="POST" class="schedule-card ongoing">
        @csrf
        <input type="hidden" name="request_id" value="{{ $item->id }}">

        <div class="card-header">
            <span class="status-badge ongoing">Ongoing</span>
        </div>

        <div class="card-body">
            <p><i class="fa-solid fa-calendar-alt"></i> {{ $item->schedule }}</p>
            <p><i class="fa-solid fa-user"></i> Student: {{ $item->student_name }}</p>
            <p><i class="fa-solid fa-book"></i> Topic: {{ $item->subject }}</p>

            @if ($item->learning_mode == 'online')
                <p><i class="fa-solid fa-laptop"></i> Online</p>
            @else
                <p><i class="fa-solid fa-location-dot"></i> {{ $item->location }}</p>
            @endif

            <p><i class="fa-solid fa-clock"></i> Duration: {{ $item->duration }}</p>
        </div>

        <div class="card-actions">
            <button type="submit" class="done-btn">Mark as Done</button>
        </div>
    </form>
    @endforeach

</section>


 </main>

@endsection
