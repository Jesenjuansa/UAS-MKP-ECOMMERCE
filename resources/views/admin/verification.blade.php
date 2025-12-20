@extends('components.layoutAdmin')


@section('content')
<link rel="stylesheet" href="{{ asset('cssAdmin/sidebar.css') }}">
<link rel="stylesheet" href="{{ asset('cssAdmin/tutorverification.css') }}">

<h1>Tutor Verification</h1>
<p class="sub">Verify new tutors before they can accept student requests</p>

<div class="card-table">
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Subjects</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>

            @foreach ($pendingTutors as $tutor)
            <tr>
                <td>{{ $tutor->full_name }}</td>
                <td>{{ $tutor->email }}</td>
                <td>{{ $tutor->phone_number ?? '-' }}</td>
                <td>{{ $tutor->teaching_subject ?? '-' }}</td>


                <td class="actions">

                   <label class="btn-view" for="modal-{{ $tutor->id }}">View Detail</label>


                    {{-- Verify --}}
                    <form action="{{ route('admin.verification.verify', $tutor->id) }}" method="POST"
                        style="display:inline">
                        @csrf
                        <button class="btn-verify" type="submit">Verify</button>
                    </form>

                    {{-- Reject --}}
                    <form action="{{ route('admin.verification.reject', $tutor->id) }}" method="POST"
                        style="display:inline">
                        @csrf
                        <button class="btn-reject" type="submit">Reject</button>
                    </form>

                </td>
            </tr>

            @endforeach

        </tbody>
    </table>

</div>

@foreach ($pendingTutors as $tutor)

<!-- Checkbox pemicu modal -->
<input type="checkbox" id="modal-{{ $tutor->id }}" class="modal-toggle">

<div class="modal">
    <label for="modal-{{ $tutor->id }}" class="modal-overlay"></label>

    <div class="modal-box">
        <h3>Tutor Detail</h3>

        <!-- NAME -->
        <div class="detail-item">
            <label>Name</label>
            <div class="detail-box">{{ $tutor->full_name }}</div>
        </div>

        <!-- EMAIL -->
        <div class="detail-item">
            <label>Email</label>
            <div class="detail-box">{{ $tutor->email }}</div>
        </div>

        <!-- PHONE -->
        <div class="detail-item">
            <label>Phone</label>
            <div class="detail-box">{{ $tutor->phone_number ?? '-' }}</div>
        </div>

        <!-- SUBJECT -->
        <div class="detail-item">
            <label>Teaching Subject</label>
            <div class="detail-box">{{ $tutor->teaching_subject ?? '-' }}</div>
        </div>

        <!-- CLASS TYPE -->
        <div class="detail-item">
            <label>Class Type</label>
            <div class="detail-box">{{ $tutor->class_type ?? '-' }}</div>
        </div>

        <!-- RATE -->
        {{-- <div class="detail-item">
            <label>Rate Per Session</label>
            <div class="detail-box">
                {{ $tutor->rate_per_session ? 'Rp ' . number_format($tutor->rate_per_session, 0, ',', '.') : '-' }}
            </div>
        </div> --}}

        <!-- PHOTO (JIKA ADA) -->
        @if ($tutor->pas_foto)
        <div class="detail-item">
            <label>Profile Photo</label>
            <img src="{{ asset('storage/' . $tutor->pas_foto) }}"
                 alt="Tutor Photo"
                 style="width:120px; border-radius:8px; margin-top:10px;">
        </div>
        @endif

        <!-- REGISTERED DATE -->
        <div class="detail-item">
            <label>Registered Date</label>
            <div class="detail-box">{{ $tutor->created_at->format('Y-m-d') }}</div>
        </div>

        <label for="modal-{{ $tutor->id }}" class="close-btn">Close</label>
    </div>
</div>

@endforeach

@endsection
