@php
    // Dapatkan role dari database jika user login
    $role = Auth::check() ? Auth::user()->role : 'guest';
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
                        {{-- Profile sesuai role --}}
                        @if($role == 'tutor')
                            <a href="{{-- {{ route('tutors.profile') }} --}}">My Profile</a>
                        @else
                            <a href="{{-- {{ route('students.profile') }} --}}">My Profile</a>
                        @endif

                        {{-- Logout --}}
                        <form method="POST" action="{{ route('auth.logout') }}">
                            @csrf
                            <button type="submit" class="logout-btn">Logout</button>
                        </form>
                    </div>
                </div>

            {{-- Jika guest --}}
            @else
                <div class="nav-links" id="navLinks">
                    <a href="{{ route('auth.login') }}" id="loginBtn">Login</a>
                    <a href="{{ route('auth.register') }}" id="registerBtn" class="register">Register</a>
                </div>
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
                <li><a href="{{ route('student.mylesson') }}">My Lesson</a></li>
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
