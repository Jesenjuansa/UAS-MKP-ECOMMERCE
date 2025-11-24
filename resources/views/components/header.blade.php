 <!-- ===== HEADER (TUTOR) ===== -->
 
 <header>
     <nav class="navbar">
         <div class="brand">PrivEdu</div>

         <div class="nav-links">
             <div class="profile-menu">
                 <button class="profile-icon" aria-haspopup="true" aria-expanded="false" type="button">
                     <img src="/images/user.png" alt="Profile" class="profile-img">
                 </button>

                 <div class="dropdown" role="menu" aria-hidden="true">
                     <a href="tutor-profile.html">My Profile</a>

                     <form action="/logout" method="POST">
                         <button type="submit" class="logout-btn">Logout</button>
                     </form>
                 </div>
             </div>
         </div>
     </nav>

     <nav class="sub-navbar">
         <ul>
             <li class="{{ request()->routeIs('home') ? 'active' : '' }}"><a href="{{ route('tutor.home') }}">Home</a></li>
             <li class="{{ request()->routeIs('about') ? 'active' : '' }}"><a href="{{ route('tutor.about') }}">About</a></li>
             <li class="{{ request()->routeIs('request') ? 'active' : '' }}"> <a href="{{ route('tutor.request') }}">Request</a></li>
             <li class="{{ request()->routeIs('schedule') ? 'active' : '' }}"><a href="{{ route('tutor.schedule') }}">Schedule</a></li>
         </ul>
     </nav>
 </header>
