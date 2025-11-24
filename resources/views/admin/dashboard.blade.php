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

                <article class="stat-card">
                    <div class="stat-icon"><i class="fa-solid fa-user-graduate"></i></div>
                    <div class="stat-body">
                        <div class="stat-number">3,842</div>
                        <div class="stat-label">Total Students</div>
                    </div>
                </article>

                <article class="stat-card">
                    <div class="stat-icon"><i class="fa-solid fa-chalkboard-user"></i></div>
                    <div class="stat-body">
                        <div class="stat-number">412</div>
                        <div class="stat-label">Total Tutors</div>
                    </div>
                </article>

                <article class="stat-card">
                    <div class="stat-icon"><i class="fa-solid fa-user-clock"></i></div>
                    <div class="stat-body">
                        <div class="stat-number">24</div>
                        <div class="stat-label">Pending Tutor Verifications</div>
                    </div>
                </article>

                <article class="stat-card">
                    <div class="stat-icon"><i class="fa-solid fa-file-invoice-dollar"></i></div>
                    <div class="stat-body">
                        <div class="stat-number">9</div>
                        <div class="stat-label">Pending Payment Proofs</div>
                    </div>
                </article>

                <article class="stat-card">
                    <div class="stat-icon"><i class="fa-solid fa-book"></i></div>
                    <div class="stat-body">
                        <div class="stat-number">1,128</div>
                        <div class="stat-label">Completed Lessons</div>
                    </div>
                </article>

                <article class="stat-card">
                    <div class="stat-icon"><i class="fa-solid fa-wallet"></i></div>
                    <div class="stat-body">
                        <div class="stat-number">IDR 42,750,000</div>
                        <div class="stat-label">Total Payments Received (This Month)</div>
                    </div>
                </article>

                <article class="stat-card">
                    <div class="stat-icon"><i class="fa-solid fa-hand-holding-dollar"></i></div>
                    <div class="stat-body">
                        <div class="stat-number">IDR 28,300,000</div>
                        <div class="stat-label">Total Tutor Payouts (This Month)</div>
                    </div>
                </article>

            </div>
        </section>

        <!-- Quick Notifications -->
        <section class="notifications">
            <div class="card-notif">
                <div class="card-head">
                    <h2>Quick Notifications</h2>
                    <p class="muted">Notifikasi singkat yang membutuhkan perhatian</p>
                </div>

                <ul class="notif-list">

                    <li class="notif-item warning">
                        <div class="notif-icon"><i class="fa-solid fa-circle-exclamation"></i></div>
                        <div class="notif-body">
                            <div class="notif-title">Tutor belum mengisi Payment Information</div>
                            <div class="notif-desc">Tutor: Ahmad S. — belum mengisi info bank dan nomor rekening.
                                Verifikasi tutor
                                sudah selesai.</div>
                        </div>
                        <div class="notif-action"><button class="btn-view">View</button></div>
                    </li>

                    <li class="notif-item error">
                        <div class="notif-icon"><i class="fa-solid fa-ban"></i></div>
                        <div class="notif-body">
                            <div class="notif-title">Invalid Payment Proof uploaded by student</div>
                            <div class="notif-desc">Student: Naima — bukti transfer tidak sesuai (jumlah berbeda).</div>
                        </div>
                        <div class="notif-action"><button class="btn-view">View</button></div>
                    </li>

                    <li class="notif-item info">
                        <div class="notif-icon"><i class="fa-solid fa-info-circle"></i></div>
                        <div class="notif-body">
                            <div class="notif-title">New Tutor awaiting profile completion</div>
                            <div class="notif-desc">Tutor: Siti — profil sudah dibuat namun belum mengunggah foto diri.
                            </div>
                        </div>
                        <div class="notif-action"><button class="btn-view">View</button></div>
                    </li>

                </ul>
            </div>
        </section>

@endsection
