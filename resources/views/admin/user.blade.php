@extends('components.layoutAdmin')


@section('content')
<link rel="stylesheet" href="{{ asset('cssAdmin/sidebar.css') }}">
<link rel="stylesheet" href="{{ asset('cssAdmin/usermanagement.css') }}">


<div class="page-header">
    <h1>User Management</h1>
    <p class="sub">Manage all students and tutors registered in your system</p>
</div>

<div class="tab-buttons">
    <label for="tab-students" class="tab">Students</label>
    <label for="tab-tutors" class="tab">Tutors</label>
</div>

<!-- STUDENTS SECTION -->
<section class="section" id="students">
    <h2 class="section-title">Students List</h2>
    <table class="data-table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Registered Date</th>
                <th>Total Bookings</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $student)
            <tr>
                <td>{{ $student->full_name }}</td>
                <td>{{ $student->email }}</td>
                <td>{{ $student->created_at->format('Y-m-d') }}</td>
                <td>{{ $student->total_booking }}</td>


                <td>
                    @if($student->status === 'active')
                    <span class="status active">Active</span>
                    @else
                    <span class="status suspended">Suspended</span>
                    @endif
                </td>

                <td class="actions">

                    @if($student->status === 'active')
                    <form action="{{ route('admin.student.suspend', $student->id) }}" method="POST">
                        @csrf
                        <button class="action-btn warn">Suspend</button>
                    </form>
                    @else
                    <form action="{{ route('admin.student.activate', $student->id) }}" method="POST">
                        @csrf
                        <button class="action-btn safe">Unsuspend</button>
                    </form>
                    @endif
                </td>
            </tr>


            @endforeach
        </tbody>


    </table>
</section>

<!-- TUTORS SECTION -->
<section class="section" id="tutors">
    <h2 class="section-title">Tutors List</h2>
    <table class="data-table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Verified?</th>
                <th>Subjects</th>
                <th>Total Lessons</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tutors as $tutor)

            <tr>
                <td>{{ $tutor->full_name }}</td>
                <td>{{ $tutor->email }}</td>

                {{-- Verified --}}
                <td>
                    {{ $tutor->verified ? 'Yes' : 'No' }}
                </td>

                {{-- Subject --}}
                <td>{{ $tutor->teaching_subject ?? '-' }}</td>


                <td>{{ $tutor->total_lessons }}</td>


                {{-- STATUS --}}
                <td>
                    <span class="status {{ $tutor->status }}">
                        {{ ucfirst($tutor->status) }}
                    </span>
                </td>

                {{-- ACTIONS --}}
                <td class="actions">

                    {{-- SUSPEND OR UNSUSPEND --}}
                    @if ($tutor->status === 'active')
                    <form method="POST" action="{{ route('admin.tutor.suspend', $tutor->id) }}">
                        @csrf
                        <button class="action-btn warn">Suspend</button>
                    </form>
                    @else
                    <form method="POST" action="{{ route('admin.tutor.activate', $tutor->id) }}">
                        @csrf
                        <button class="action-btn safe">Unsuspend</button>
                    </form>
                    @endif

                </td>
            </tr>

            @endforeach
        </tbody>

    </table>
</section>
@endsection
