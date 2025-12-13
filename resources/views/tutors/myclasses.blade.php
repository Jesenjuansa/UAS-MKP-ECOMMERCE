@extends('components.layoutUser')

@section('content')
<link rel="stylesheet" href="{{ asset('cssUser/navbar.css') }}">
<link rel="stylesheet" href="{{ asset('cssUser/tutor-myclasses.css') }}">

<main class="classes-page">

    <section class="title-section">
        <h1>My Classes</h1>
        <p>Manage your teaching packages for students.</p>

        <a href="#add-class" class="add-btn">
            <i class="fa-solid fa-plus"></i> Add New Class
        </a>
    </section>
    <!-- ================= LIST OF CLASSES ================= -->
    <section class="classes-list">

        @forelse($classes as $class)
        <div class="class-card">
            <h3>{{ $class->title }}</h3>

            <p class="price">Rp {{ number_format($class->price,0,',','.') }}</p>

            <p class="duration">
                <i class="fa-solid fa-clock"></i>
                Duration: {{ $class->duration }}
            </p>

            <p class="desc" >{{ $class->description }}</p>

            <div class="days">
                <i class="fa-solid fa-calendar-days"></i>
                <span>{{ $class->day }}</span>
            </div>

            <div class="card-actions">
                <a href="#edit-{{ $class->id }}" class="edit-btn">
                    <i class="fa-solid fa-pen"></i> Edit
                </a>

                <a href="#delete-{{ $class->id }}" class="delete-btn">
                    <i class="fa-solid fa-trash"></i> Delete
                </a>
            </div>
        </div>

        @empty
        <p style="text-align:center; width:100%; padding:30px;">No classes yet.</p>
        @endforelse

    </section>

    {{-- ========== ALERT SUCCESS / ERROR ========== --}}
    @if(session('error'))
        <div style="
            padding:12px;
            background:#ffe3e3;
            color:#b40000;
            border:1px solid #ffb6b6;
            border-radius:8px;
            margin:20px 0;
            font-weight:600;
            text-align:center;
        ">
            {{ session('error') }}
        </div>
    @endif

    @if(session('success'))
        <div style="
            padding:12px;
            background:#e2ffea;
            color:#007a26;
            border:1px solid #9ff0b5;
            border-radius:8px;
            margin:20px 0;
            font-weight:600;
            text-align:center;
        ">
            {{ session('success') }}
        </div>
    @endif

    {{-- ================= LIST OF CLASSES ================= --}}
    <section class="classes-list">




<!-- ======================================================
                ADD NEW CLASS MODAL
====================================================== -->
<div id="add-class" class="modal">
    <div class="modal-content">
        <h2>Add New Class</h2>
        <a href="#" class="modal-close">&times;</a>

<form action="{{ route('tutors.classes.store') }}"
      method="POST"
      enctype="multipart/form-data"
      class="form-modal">
    @csrf

    <label>Class Title</label>
    <input type="text" name="title" required>

    <label>Price</label>
    <input type="number" name="price" required>

    <label>Duration</label>
    <input type="text" name="duration" required>

    <label>Description</label>
    <textarea name="description" required></textarea>

    <label>Days Available</label>
    <div class="day-options">
        <label><input type="checkbox" name="day[]" value="Monday"> Monday</label>
        <label><input type="checkbox" name="day[]" value="Tuesday"> Tuesday</label>
        <label><input type="checkbox" name="day[]" value="Wednesday"> Wednesday</label>
        <label><input type="checkbox" name="day[]" value="Thursday"> Thursday</label>
        <label><input type="checkbox" name="day[]" value="Friday"> Friday</label>
        <label><input type="checkbox" name="day[]" value="Saturday"> Saturday</label>
        <label><input type="checkbox" name="day[]" value="Sunday"> Sunday</label>
    </div>

    <label>Class Photo</label>
    <input type="file" name="photo">

    <button type="submit" class="save-btn">Save</button>
</form>


    </div>
</div>




<!-- ======================================================
                EDIT + DELETE MODALS
====================================================== -->

@foreach($classes as $class)

@php
    $selectedDays = explode(', ', $class->day); // ubah string → array
@endphp

<!-- EDIT MODAL -->
<div id="edit-{{ $class->id }}" class="modal">
    <div class="modal-content">
        <a href="#" class="modal-close">&times;</a>

        <h2>Edit Class</h2>

<form action="{{ route('tutors.classes.update', $class->id) }}" method="POST" class="form-modal">
    @csrf
    @method('PUT')

    <label>Class Title</label>
    <input type="text" name="title" value="{{ $class->title }}" required>

    <label>Price</label>
    <input type="number" name="price" value="{{ $class->price }}" required>

    <label>Duration</label>
    <input type="text" name="duration" value="{{ $class->duration }}" required>

    <label>Description</label>
    <textarea name="description" required>{{ $class->description }}</textarea>

    <label>Days Available</label>
    <div class="day-options">
        @foreach(['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday'] as $day)
            <label>
                <input type="checkbox" name="day[]" value="{{ $day }}"
                    {{ in_array($day, $selectedDays) ? 'checked' : '' }}>
                {{ $day }}
            </label>
        @endforeach
    </div>

    <button type="submit" class="save-btn">Save Changes</button>
</form>

    </div>
</div>




<!-- DELETE MODAL -->
<div id="delete-{{ $class->id }}" class="modal small">
    <div class="modal-content small">
        <a href="#" class="modal-close">&times;</a>

        <h3>Delete Class?</h3>
        <p>Are you sure you want to delete <b>{{ $class->title }}</b>?</p>

        <div class="modal-actions">
            <a href="#" class="modal-close cancel-btn">Cancel</a>

            <form action="{{ route('tutors.classes.delete', $class->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="confirm-delete">Yes, Delete</button>
            </form>
        </div>
    </div>
</div>

@endforeach

@endsection
