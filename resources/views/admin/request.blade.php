@extends('components.layoutAdmin')

@section('content')
<link rel="stylesheet" href="{{ asset('cssAdmin/sidebar.css') }}">
<link rel="stylesheet" href="{{ asset('cssAdmin/lessonrequest.css') }}">

<main class="lr-container">

    <h1>Lesson Request Management</h1>
    <p class="sub">Menampilkan seluruh permintaan les mengaji dari siswa.</p>

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
                @foreach ($requests as $req)
                <tr>
                    <td>{{ $req->student->full_name }}</td>
                    <td>{{ $req->tutor->full_name }}</td>
                    <td>{{ $req->subject }}</td>
                    <td>{{ $req->schedule->format('m/d/Y — H:i') }}</td>

                    <td>
                        <span class="status {{ $req->status }}">
                            {{ strtoupper($req->status) }}
                        </span>
                    </td>

                    <td class="actions">
                        <!-- View -->
                        <label for="view-{{ $req->id }}" class="btn-view">View</label>

                        <!-- Delete -->
                        <label for="delete-{{ $req->id }}" class="btn-delete">
                            <i class="fa-solid fa-trash"></i>
                        </label>
                    </td>
                </tr>

                <!-- ================================
                    VIEW DETAILS MODAL
                    ================================ -->
                <input type="checkbox" id="view-{{ $req->id }}" class="modal-toggle">
                <div class="modal">
                    <label for="view-{{ $req->id }}" class="modal-overlay"></label>

                    <div class="modal-box request-modal">

                        <h2 class="modal-title">{{ $req->student->full_name }}</h2>

                        <p><b>Student:</b> {{ $req->student->full_name }}</p>
                        <p><b>Tutor:</b> {{ $req->tutor->full_name }}</p>
                        <p><b>Subject:</b> {{ $req->subject }}</p>

                        <label>Schedule:</label>
                        <input type="text" value="{{ $req->schedule->format('m/d/Y — H:i') }}" />

                        <label>Status:</label>
                        <select disabled>
                            <option>{{ strtoupper($req->status) }}</option>
                        </select>

                        <!-- Tombol Close -->
                        <label for="view-{{ $req->id }}" class="close-btn">Close</label>
                    </div>
                </div>


                <!-- ================================
                    DELETE CONFIRMATION MODAL
                    ================================ -->
                <input type="checkbox" id="delete-{{ $req->id }}" class="modal-toggle">
                <div class="modal">
                    <label for="delete-{{ $req->id }}" class="modal-overlay"></label>

                    <div class="modal-box delete-modal">
                        <h3>Are you sure?</h3>
                        <p>This request will be permanently removed.</p>

                        <div class="delete-actions">

                            <label for="delete-{{ $req->id }}" class="btn-cancel">Cancel</label>

                            <form action="{{ route('admin.request.delete', $req->id) }}" method="POST" style="display:inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn-confirm" type="submit">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

                @endforeach
            </tbody>
        </table>
    </div>

</main>

@endsection
