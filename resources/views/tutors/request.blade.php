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

@forelse ($requests as $req)

<div class="request-card {{ strtolower($req->status) }}">

    <div class="request-info">
        <h3>{{ $req->student_name }}</h3>

        <p><strong>Subject:</strong> {{ $req->subject }}</p>
        <p><strong>Schedule:</strong> {{ $req->schedule }}</p>
        <p><strong>Duration:</strong> {{ $req->duration }}</p>
        <p><strong>Total Price:</strong> Rp {{ number_format($req->price,0,',','.') }}</p>

        <p>
            <strong>Status:</strong>
            <span class="badge {{ strtolower($req->status) }}-badge">
                {{ $req->status }}
            </span>
        </p>
    </div>

    {{-- DEAL CARD --}}
    @if ($req->status === 'DEAL')
        <form method="POST" action="{{ route('tutor.accept') }}">
            @csrf
            <input type="hidden" name="request_id" value="{{ $req->id }}">
            <button class="accept-btn">ACCEPT</button>
        </form>

        <form method="POST" action="{{ route('tutor.reject') }}">
            @csrf
            <input type="hidden" name="request_id" value="{{ $req->id }}">
            <button class="reject-btn">REJECT</button>
        </form>
    @endif


    {{-- ONGOING CARD --}}
    @if ($req->status === 'ONGOING')
        <form method="POST" action="{{ route('tutor.markdone') }}">
            @csrf
            <input type="hidden" name="request_id" value="{{ $req->id }}">
            <button class="mark-done-btn active">MARK AS DONE</button>
        </form>
    @endif


    {{-- DONE CARD --}}
    @if ($req->status === 'DONE')
        <button class="done-complete-btn" disabled>
            LESSON COMPLETED
        </button>
    @endif

</div>

@empty
    <p style="text-align:center; width:100%;">No requests yet.</p>
@endforelse

</section>


  </main>

@endsection
