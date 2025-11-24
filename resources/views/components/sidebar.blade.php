<input type="radio" name="tabs" id="tab-students" checked>
<input type="radio" name="tabs" id="tab-tutors">
<input type="checkbox" id="toggle-aisyah-status" class="status-toggle">
<input type="checkbox" id="toggle-abdullah-status" class="status-toggle">
<input type="checkbox" id="sidebar-toggle">
<label for="sidebar-toggle" class="toggle-btn"><i class="fa-solid fa-bars"></i></label>
    <aside class="sidebar">
        <div class="brand">
            <span>PrivEdu Admin</span>
        </div>

        <ul class="menu">
            <li class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"><a href="{{ route('admin.dashboard') }}"><i class="fa-solid fa-gauge"></i> Dashboard</a></li>
            <li class="{{ request()->routeIs('admin.user') ? 'active' : '' }}"><a href="{{ route('admin.user') }}"><i class="fa-solid fa-users"></i> User Management</a></li>
            <li class="{{ request()->routeIs('admin.verification') ? 'active' : '' }}"><a href="{{ route('admin.verification') }}"><i class="fa-solid fa-user-check"></i> Tutor Verification</a></li>
            <li class="{{ request()->routeIs('admin.request') ? 'active' : '' }}"><a href="{{ route('admin.request') }}"><i class="fa-solid fa-book-open"></i> Lesson Request Management</a></li>
            <li class="{{ request()->routeIs('admin.payment') ? 'active' : '' }}"><a href="{{ route('admin.payment') }}"><i class="fa-solid fa-credit-card"></i> Payment Management</a></li>
           
        </ul>

        <div class="sidebar-bottom">
            <div class="user-box">
                <div class="avatar">A</div>
                <div>
                    <p class="username">admin</p>
                    <p class="role">admin</p>
                </div>
            </div>
        </div>
    </aside>
