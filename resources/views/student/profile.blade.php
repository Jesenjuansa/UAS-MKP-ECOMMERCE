@extends('components.layoutUser')

@section('content')
<link rel="stylesheet" href="{{ asset('cssUser/navbar.css') }}">
<link rel="stylesheet" href="{{ asset('cssUser/profile.css') }}">

<main class="profile-wrapper">

    <h1 class="profile-title">My Profile</h1>

    <div class="profile-grid">

        {{-- PROFILE INFO --}}
        <div class="profile-card">
            <h3>Profile Information</h3>

            <div class="info-row">
                <span>Name</span>
                <span>{{ $student->full_name ?? $student->name }}</span>
            </div>

            <div class="info-row">
                <span>Email</span>
                <span>{{ $student->email }}</span>
            </div>

            <div class="info-row">
                <span>Phone</span>
                <span>{{ $student->phone_number ?? '-' }}</span>
            </div>

            <div class="info-row">
                <span>Joined</span>
                <span>{{ $student->created_at->format('d M Y') }}</span>
            </div>
        </div>

        {{-- ACCOUNT --}}
        <div class="profile-card">
            <h3>Account Status</h3>

            <div class="info-row">
                <span>Status</span>
                <span class="badge active">Active</span>
            </div>

            <div class="info-row">
                <span>Role</span>
                <span class="badge student">Student</span>
            </div>
        </div>

        {{-- LEARNING --}}
        <div class="profile-card">
            <h3>Learning Summary</h3>

            <ul class="summary-list">
                <li>Total Requests <span>{{ $totalRequested }}</span></li>
                <li>Ongoing Lessons <span>{{ $ongoingLessons }}</span></li>
                <li>Completed Lessons <span>{{ $completedLessons }}</span></li>
                <li>Total Tutors <span>{{ $totalTutors }}</span></li>
            </ul>
        </div>

        {{-- PAYMENT --}}
        <div class="profile-card">
            <h3>Payment Summary</h3>

            <ul class="summary-list">
                <li>Total Paid
                    <span>Rp {{ number_format($totalPaid,0,',','.') }}</span>
                </li>
                <li>Pending Payments <span>{{ $pendingPayments }}</span></li>
            </ul>
        </div>

    </div>

</main>
@endsection
