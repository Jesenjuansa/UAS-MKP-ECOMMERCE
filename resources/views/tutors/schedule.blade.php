@extends('components.layoutUser')

@section('content')
<main style="max-width:900px;margin:auto;padding:20px">

    <h1>Teaching Schedule</h1>

    @forelse ($schedules as $item)

        <div style="
            background:#fff;
            padding:16px;
            border-radius:10px;
            margin-bottom:14px;
            box-shadow:0 2px 8px rgba(0,0,0,.08)
        ">
            <p><strong>Student:</strong> {{ $item->student_name }}</p>
            <p><strong>Subject:</strong> {{ $item->subject }}</p>
            <p><strong>Schedule:</strong> {{ $item->schedule }}</p>
            <p><strong>Duration:</strong> {{ $item->duration }}</p>

            <span style="
                display:inline-block;
                margin-top:6px;
                padding:4px 10px;
                background:#dcfce7;
                border-radius:6px;
                font-size:13px
            ">
                ONGOING
            </span>
        </div>

    @empty
        <p style="color:#999">No active teaching schedule.</p>
    @endforelse

</main>
@endsection
