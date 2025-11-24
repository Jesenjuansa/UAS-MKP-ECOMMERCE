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

    <div class="search-box">
      <input type="text" placeholder="Search user...">
      <i class="fa-solid fa-search"></i>
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

          <!-- Aisyah: ACTIVE ROW (visible when #toggle-aisyah-status is unchecked) -->
          <tr class="row-aisyah row-active-aisyah">
            <td>Aisyah Rahma</td>
            <td>aisyah@example.com</td>
            <td>2024-02-15</td>
            <td>12</td>
            <td><span class="status active">Active</span></td>
            <td class="actions">

              <label for="modal-edit-aisyah" class="action-btn">Edit</label>

              <label for="toggle-aisyah-status" class="action-btn warn">Suspend</label>
            </td>
          </tr>

          <!-- Aisyah: SUSPENDED ROW (visible when #toggle-aisyah-status is checked) -->
          <tr class="row-aisyah row-suspended-aisyah">
            <td>Aisyah Rahma</td>
            <td>aisyah@example.com</td>
            <td>2024-02-15</td>
            <td>12</td>
            <td><span class="status suspended">Suspended</span></td>
            <td class="actions">
              <label for="modal-edit-aisyah" class="action-btn">Edit</label>
              <label for="toggle-aisyah-status" class="action-btn safe">Unsuspend</label>
            </td>
          </tr>

          <!-- Modal for editing Aisyah (checkbox must be immediately before .modal so + selector works) -->
          <input type="checkbox" id="modal-edit-aisyah" class="modal-toggle">
          <div class="modal">
            <label for="modal-edit-aisyah" class="modal-overlay"></label>
            <div class="modal-box">
              <h3>Edit Student</h3>

              <label>Name</label>
              <input type="text" value="Aisyah Rahma" class="modal-input">

              <label style="margin-top:10px;">Email</label>
              <input type="email" value="aisyah@example.com" class="modal-input">

              <label for="modal-edit-aisyah" class="close-btn">Save</label>
            </div>
          </div>

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
            <th>Payment Info</th>
            <th>Total Lessons</th>
            <th>Status</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>

          <!-- ================== ABDULLAH ================== -->
          <!-- Active row (shown when #toggle-abdullah-status is unchecked) -->
          <tr class="row-abdullah row-active-abdullah">
            <td>Ustadz Abdullah</td>
            <td>abdullah@example.com</td>
            <td>Yes</td>
            <td>Qur'an Recitation</td>
            <td class="status filled payment-filled-abdullah">Filled</td>
            <td>48</td>
            <td><span class="status active">Active</span></td>
            <td class="actions">
              <label for="modal-edit-abdullah" class="action-btn">Edit</label>
              <label for="toggle-abdullah-status" class="action-btn warn">Suspend</label>
            </td>
          </tr>

          <!-- Suspended row (shown when #toggle-abdullah-status is checked) -->
          <tr class="row-abdullah row-suspended-abdullah">
            <td>Ustadz Abdullah</td>
            <td>abdullah@example.com</td>
            <td>Yes</td>
            <td>Qur'an Recitation</td>
            <td class="status filled">Filled</td>
            <td>48</td>
            <td><span class="status suspended">Suspended</span></td>
            <td class="actions">
              <label for="modal-edit-abdullah" class="action-btn">Edit</label>
              <label for="toggle-abdullah-status" class="action-btn.safe">Unsuspend</label>
            </td>
          </tr>

          <!-- Modal edit Abdullah -->
          <input type="checkbox" id="modal-edit-abdullah" class="modal-toggle">
          <div class="modal">
            <label for="modal-edit-abdullah" class="modal-overlay"></label>
            <div class="modal-box">
              <h3>Edit Tutor — Ustadz Abdullah</h3>

              <label>Name</label>
              <input type="text" value="Ustadz Abdullah" class="modal-input">

              <label style="margin-top:10px;">Email</label>
              <input type="email" value="abdullah@example.com" class="modal-input">

              <label style="margin-top:10px;">Verified?</label>
              <div style="margin-top:6px;">
                <label><input type="radio" name="verified-abdullah" checked> Yes</label>
                <label style="margin-left:12px;"><input type="radio" name="verified-abdullah"> No</label>
              </div>

              <label style="margin-top:10px;">Subjects</label>
              <input type="text" value="Qur'an Recitation" class="modal-input">

              <!--PAYMENT INFO (UPDATED!) -->
              <label style="margin-top:10px;">Payment Info</label>
              <div style="margin-top:6px;">
                <label><input type="radio" name="payment-abdullah" checked> Filled</label>
                <label style="margin-left:12px;"><input type="radio" name="payment-abdullah"> Not Filled</label>
              </div>

              <label for="modal-edit-abdullah" class="close-btn">Save</label>
            </div>
          </div>

        </tbody>
      </table>
    </section>
    @endsection