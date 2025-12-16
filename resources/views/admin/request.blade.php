@extends('components.layoutAdmin')

@section('content')
<link rel="stylesheet" href="{{ asset('cssAdmin/sidebar.css') }}">
<link rel="stylesheet" href="{{ asset('cssAdmin/lessonrequest.css') }}">

<main class="lr-container">

    <h1>Lesson Request Management</h1>
    <p class="sub">Menampilkan seluruh permintaan les dari siswa.</p>

    <div class="card-table">
        <table class="lr-table">
            <thead>
                <tr>
                    <th>Student</th>
                    <th>Tutor</th>
                    <th>Subject</th>
                    <th>Schedule</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($requests as $req)
                <tr>
                    {{-- STUDENT --}}
                    <td>{{ $req->student_name }}</td>

                    {{-- TUTOR --}}
                    <td>{{ $req->tutor->full_name ?? $req->tutor->email }}</td>

                    {{-- SUBJECT --}}
                    <td>{{ $req->subject }}</td>

                    {{-- SCHEDULE (STRING, BUKAN DATE) --}}
                    <td>{{ $req->schedule }}</td>

                    {{-- STATUS --}}
                    <td>
                        <span class="status {{ strtolower($req->status) }}">
                            {{ $req->status }}
                        </span>
                    </td>

                    {{-- ACTION --}}
                    <td class="actions">
                        <label for="view-{{ $req->id }}" class="btn-view">
                            View
                        </label>

                        <label for="delete-{{ $req->id }}" class="btn-delete">
                            <i class="fa-solid fa-trash"></i>
                        </label>
                    </td>
                </tr>

                {{-- ================= VIEW MODAL ================= --}}
                <input type="checkbox" id="view-{{ $req->id }}" class="modal-toggle">
                <div class="modal">
                    <label for="view-{{ $req->id }}" class="modal-overlay"></label>

                    <div class="modal-box request-modal">
                        <h2 class="modal-title">Request Detail</h2>

                        <p><b>Student:</b> {{ $req->student_name }}</p>
                        <p><b>Tutor:</b> {{ $req->tutor->full_name ?? $req->tutor->email }}</p>
                        <p><b>Subject:</b> {{ $req->subject }}</p>

                        <label>Schedule:</label>
                        <input type="text" value="{{ $req->schedule }}" readonly>

                        <label>Status:</label>
                        <input type="text" value="{{ $req->status }}" readonly>

                        <label>Price:</label>
                        <input type="text"
                               value="Rp {{ number_format($req->price,0,',','.') }}"
                               readonly>

                        <label for="view-{{ $req->id }}" class="close-btn">
                            Close
                        </label>
                    </div>
                </div>

                {{-- ================= DELETE MODAL ================= --}}
                <input type="checkbox" id="delete-{{ $req->id }}" class="modal-toggle">
                <div class="modal">
                    <label for="delete-{{ $req->id }}" class="modal-overlay"></label>

                    <div class="modal-box delete-modal">
                        <h3>Are you sure?</h3>
                        <p>This request will be permanently removed.</p>

                        <div class="delete-actions">
                            <label for="delete-{{ $req->id }}" class="btn-cancel">
                                Cancel
                            </label>

                            <form action="{{ route('admin.lesson.requests.delete', $req->id) }}"
                                  method="POST"
                                  style="display:inline">
                                @csrf
                                @method('DELETE')

                                <button class="btn-confirm" type="submit">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

                @empty
                <tr>
                    <td colspan="6" style="text-align:center; padding:20px;">
                        No lesson requests found.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</main>
@endsection
