@php
    // ==== SET ROLE SEMENTARA ====
    // Pilihan: tutor | student | guest
    $role = 'student';
@endphp

<header>
    {{-- NAVBAR UTAMA --}}
    <nav class="navbar">
        <div class="brand">PrivEdu</div>

        <div class="nav-links">

            {{-- Jika login (tutor atau student) --}}
            @if($role == 'tutor' || $role == 'student')
                <div class="profile-menu">
                    <button class="profile-icon" type="button">
                        <img src="/images/user.png" alt="Profile" class="profile-img">
                    </button>

                    <div class="dropdown">
                        <a href="{{ route('tutors.profile') }}">My Profile</a>
                        <a href="{{ route('login') }}">
                        <button class="logout-btn">Logout</button>
                        </a>
                    </div>
                </div>

            {{-- Jika guest --}}
            @else
                <a href="{{ route('login') }}" id="loginBtn">Login</a>
                <a href="{{ route('register') }}" id="registerBtn">Register</a>
            @endif

        </div>
    </nav>

    {{-- SUB NAVBAR --}}
    <nav class="sub-navbar">
        <ul>
            {{-- NAV TUTOR --}}
            @if($role == 'tutor')
                <li><a href="{{ route('tutors.home') }}">Home</a></li>
                <li><a href="{{ route('tutors.about') }}">About</a></li>
                <li><a href="{{ route('tutors.request') }}">Request</a></li>
                <li><a href="{{ route('tutors.schedule') }}">Schedule</a></li>

            {{-- NAV STUDENT --}}
            @elseif($role == 'student')
                <li><a href="{{ route('student.home') }}">Home</a></li>
                <li><a href="{{ route('student.mylesson') }}">Mylesson </a></li>
                <li><a href="{{ route('student.schedule') }}">Schedule</a></li>

            {{-- NAV GUEST --}}
            @else
                <li><a href="{{ route('dashboard') }}">Home</a></li>
                <li><a href="{{ route('tutor') }}">Tutor</a></li>
                <li><a href="{{ route('about') }}">About</a></li>
            @endif
        </ul>
    </nav>
</header>
