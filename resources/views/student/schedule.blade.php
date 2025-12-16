@extends('components.layoutUser')

@section('content')
<main style="max-width:900px;margin:auto;padding:20px">
    <h1>My Schedule</h1>

    @forelse ($schedules as $item)
        <div style="background:#fff;padding:16px;border-radius:10px;margin-bottom:14px">

            <p><strong>Tutor:</strong> {{ $item->tutor->full_name }}</p>
            <p><strong>Subject:</strong> {{ $item->subject }}</p>
            <p><strong>Schedule:</strong> {{ $item->schedule }}</p>
            <p><strong>Duration:</strong> {{ $item->duration }}</p>

            <span style="padding:4px 10px;background:#dcfce7;border-radius:6px">
                ONGOING
            </span>
        </div>
    @empty
        <p>No active schedule yet.</p>
    @endforelse
</main>
@endsection
