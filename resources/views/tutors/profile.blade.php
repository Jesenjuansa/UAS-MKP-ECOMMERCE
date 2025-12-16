@extends('components.layoutUser')

@section('content')
<link rel="stylesheet" href="{{ asset('cssUser/navbar.css') }}">

<style>
    body { background: #f5f7fa; }

    .profile-container {
        max-width: 1100px;
        margin: 40px auto;
        padding: 0 20px;
    }

    .profile-header {
        margin-bottom: 25px;
    }

    .profile-header h1 {
        font-size: 32px;
        font-weight: 700;
        color: #222;
        margin-bottom: 5px;
    }

    .profile-header p {
        color: #666;
        font-size: 15px;
    }

    .profile-grid {
        display: grid;
        grid-template-columns: 1.2fr 0.8fr;
        gap: 30px;
        align-items: start;
    }

    /* LEFT SECTION */
    .profile-card {
        background: #fff;
        padding: 30px 35px;
        border-radius: 14px;
        box-shadow: 0 3px 12px rgba(0,0,0,0.08);
    }

    .profile-card label {
        font-weight: 600;
        color: #333;
        margin-top: 10px;
    }

    .profile-card input,
    .profile-card select {
        width: 100%;
        padding: 12px;
        margin-top: 6px;
        border: 1px solid #d0d0d0;
        border-radius: 8px;
        font-size: 15px;
    }

    .profile-card button {
        width: 100%;
        background: #111;
        color: #fff;
        padding: 14px;
        border-radius: 8px;
        border: none;
        font-size: 16px;
        margin-top: 18px;
        cursor: pointer;
        transition: 0.2s;
    }

    .profile-card button:hover {
        background: #000;
    }

    .photo-box {
        text-align: center;
        margin-bottom: 20px;
    }

    .photo-box img {
        width: 160px;
        height: 160px;
        object-fit: cover;
        border-radius: 12px;
        border: 3px solid #eee;
        margin-bottom: 10px;
    }

    /* RIGHT SECTION */
    .info-card {
        background: #fff;
        padding: 30px;
        border-radius: 14px;
        box-shadow: 0 3px 12px rgba(0,0,0,0.08);
    }

    .info-card h3 {
        font-size: 22px;
        margin-bottom: 20px;
        font-weight: 700;
        color: #222;
    }

    .info-item {
        margin-bottom: 14px;
    }

    .info-item strong {
        color: #333;
    }

    .badge {
        padding: 5px 12px;
        font-size: 13px;
        border-radius: 8px;
        color: #fff;
        margin-left: 6px;
    }

    .badge.active { background: #28a745; }
    .badge.suspended { background: #dc3545; }
    .badge.pending { background: #ffc107; color:#222; }

    .info-value {
        font-weight: 600;
        margin-left: 4px;
    }

</style>



<div class="profile-container">

    <div class="profile-header">
        <h1>Tutor Profile</h1>
        <p>Manage your personal information & teaching details.</p>
    </div>

    <div class="profile-grid">

        <!-- ============================
             LEFT — FORM PROFILE
        ============================= -->
        <form action="{{ route('tutors.profile.update') }}" method="POST" enctype="multipart/form-data" class="profile-card">
            @csrf

            <div class="photo-box">
                <img src="{{ $tutor->pas_foto
                    ? asset('uploads/tutors/'.$tutor->pas_foto)
                    : asset('images/default-user.png') }}">
                <input type="file" name="pas_foto">
            </div>

            <label>Full Name</label>
            <input type="text" name="full_name" value="{{ $tutor->full_name }}" required>

            <label>Email</label>
            <input type="text" value="{{ $tutor->email }}" disabled>

            <label>Phone Number</label>
            <input type="text" name="phone_number" value="{{ $tutor->phone_number }}">

            <label>Class Type</label>
            <select name="class_type">
                <option value="">-- Select --</option>
                <option value="online" {{ $tutor->class_type == 'online' ? 'selected' : '' }}>Online</option>
                <option value="offline" {{ $tutor->class_type == 'offline' ? 'selected' : '' }}>Offline</option>
                <option value="hybrid" {{ $tutor->class_type == 'hybrid' ? 'selected' : '' }}>Hybrid</option>
            </select>

            <button>Save Profile</button>
        </form>



        <!-- ============================
             RIGHT — ACCOUNT STATS
        ============================= -->
        <aside class="info-card">
            <h3>Account Information</h3>

            <div class="info-item">
                <strong>Status:</strong>
                <span class="badge {{ $tutor->status }}">
                    {{ ucfirst($tutor->status) }}
                </span>
            </div>

            <div class="info-item">
                <strong>Verified:</strong>
                <span class="info-value">{{ $tutor->verified ? 'Yes' : 'No' }}</span>
            </div>

            <div class="info-item">
                <strong>Total Earnings:</strong>
                <span class="info-value">
                    Rp {{ number_format($totalEarnings ?? 0, 0, ',', '.') }}
                </span>
            </div>

            <div class="info-item">
                <strong>Total Students:</strong>
                <span class="info-value">{{ $totalStudents ?? 0 }}</span>
            </div>

            <p>
        <strong>Rating:</strong>
        ⭐ {{ number_format($avgRating, 1) }}
        <span style="color:#6b7280">
            ({{ $ratingCount }} students)
        </span>
    </p>

        </aside>

    </div>
</div>

@endsection
