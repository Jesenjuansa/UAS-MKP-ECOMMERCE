@extends('components.layoutAdmin')

@section('content')
<link rel="stylesheet" href="{{ asset('cssAdmin/sidebar.css') }}">
<link rel="stylesheet" href="{{ asset('cssAdmin/dashboard.css') }}">

<header class="content-header">
    <h1>Dashboard</h1>
    <p class="sub">Ringkasan aktivitas & metrik penting platform belajar mengaji</p>
</header>

<!-- Statistik Utama -->
<section class="stats">
    <div class="stats-grid">

        <!-- Total Students -->
        <article class="stat-card">
            <div class="stat-icon"><i class="fa-solid fa-user-graduate"></i></div>
            <div class="stat-body">
                <div class="stat-number">{{ $totalStudents }}</div>
                <div class="stat-label">Total Students</div>
            </div>
        </article>

        <!-- Total Tutors -->
        <article class="stat-card">
            <div class="stat-icon"><i class="fa-solid fa-chalkboard-user"></i></div>
            <div class="stat-body">
                <div class="stat-number">{{ $totalTutors }}</div>
                <div class="stat-label">Total Tutors</div>
            </div>
        </article>

        <!-- Pending Tutor Verifications -->
        <article class="stat-card">
            <div class="stat-icon"><i class="fa-solid fa-user-clock"></i></div>
            <div class="stat-body">
                <div class="stat-number">{{ $pendingVerifications }}</div>
                <div class="stat-label">Pending Tutor Verifications</div>
            </div>
        </article>

        <!-- Pending Payment Proofs -->
        <article class="stat-card">
            <div class="stat-icon"><i class="fa-solid fa-file-invoice-dollar"></i></div>
            <div class="stat-body">
                <div class="stat-number">{{ $pendingPaymentProofs }}</div>
                <div class="stat-label">Pending Payment Proofs</div>
            </div>
        </article>

        <!-- Completed Lessons -->
        <article class="stat-card">
            <div class="stat-icon"><i class="fa-solid fa-book"></i></div>
            <div class="stat-body">
                <div class="stat-number">{{ $completedLessons }}</div>
                <div class="stat-label">Completed Lessons</div>
            </div>
        </article>

        <!-- Total Payments Received This Month -->
        <article class="stat-card">
            <div class="stat-icon"><i class="fa-solid fa-wallet"></i></div>
            <div class="stat-body">
                <div class="stat-number">IDR {{ number_format($totalPaymentsMonth, 0, ',', '.') }}</div>
                <div class="stat-label">Total Payments Received (This Month)</div>
            </div>
        </article>

        <!-- Total Tutor Payouts This Month -->
        <article class="stat-card">
            <div class="stat-icon"><i class="fa-solid fa-hand-holding-dollar"></i></div>
            <div class="stat-body">
                <div class="stat-number">IDR {{ number_format($totalPayoutsMonth, 0, ',', '.') }}</div>
                <div class="stat-label">Total Tutor Payouts (This Month)</div>
            </div>
        </article>

    </div>
</section>

@endsection
