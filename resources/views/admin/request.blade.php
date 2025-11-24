@extends('components.layoutAdmin')


@section('content')
<link rel="stylesheet" href="{{ asset('cssAdmin/sidebar.css') }}">
<link rel="stylesheet" href="{{ asset('cssAdmin/lessonrequest.css') }}">
        
        <main class="lr-container">

   <h1>Lesson Request Management</h1>
   <p class="sub">Menampilkan seluruh permintaan les mengaji dari siswa.</p>

   <div class="card-table">
    <table class="lr-table">
     <thead>
      <tr>
       <th>Student</th>
       <th>Tutor</th>
       <th>Subject</th>
       <th>Schedule</th>
       <th>Status</th>
       <th>Actions</th>
      </tr>
     </thead>

     <tbody>
      <!-- SAMPLE ROW -->
      <tr>
       <td>Aisha Amira</td>
       <td>Ahmad Rahman</td>
       <td>Qur'an Recitation</td>
       <td>6/11/2025 — 07:57</td>

       <td>
        <span class="status discuss">DISCUSS</span>
       </td>

       <td class="actions">
        <label for="view-1" class="btn-view">View</label>
        <label for="delete-1" class="btn-delete">
         <i class="fa-solid fa-trash"></i>
        </label>
       </td>
      </tr>
     </tbody>
    </table>
   </div>
  </main>

   <!-- =========================================
     VIEW DETAILS MODAL (Checkbox System)
     ========================================= -->
 <input type="checkbox" id="view-1" class="modal-toggle">
 <div class="modal">
  <label for="view-1" class="modal-overlay"></label>
  <div class="modal-box request-modal">

   <h2 class="modal-title">Aisha Amira</h2>

   <p><b>Student:</b> Ahmad Rahman</p>
   <p><b>Age:</b> 15</p>
   <p><b>Subject:</b> Qur’an Recitation</p>
   <p><b>Learning Mode:</b> Online</p>
   <p><b>Notes:</b> I want to improve my pronunciation.</p>

   <label>Schedule:</label>
   <input type="text" value="6/11/2025 — 07:57">

   <label>Duration:</label>
   <input type="text" value="60 mins">

   <label>Price:</label>
   <input type="text" value="165000">

   <label>Notes:</label>
   <textarea></textarea>

   <label>Status:</label>
   <select>
    <option>DISCUSS</option>
    <option>DEAL</option>
    <option>ONGOING</option>
    <option>DONE</option>
    <option>CANCELED</option>
   </select>

   <label for="view-1" class="close-btn">Close</label>
  </div>
 </div>

 <!-- =========================================
     EDIT STATUS MODAL
     ========================================= -->
 <input type="checkbox" id="edit-1" class="modal-toggle">
 <div class="modal">
  <label for="edit-1" class="modal-overlay"></label>
  <div class="modal-box small-modal">
   <h3>Edit Status</h3>

   <select class="status-select">
    <option>DISCUSS</option>
    <option>DEAL</option>
    <option>ONGOING</option>
    <option>DONE</option>
    <option>CANCELED</option>
   </select>

   <label for="edit-1" class="close-btn">Save</label>
  </div>
 </div>

 <!-- =========================================
     DELETE CONFIRMATION MODAL
     ========================================= -->
 <input type="checkbox" id="delete-1" class="modal-toggle">
 <div class="modal">
  <label for="delete-1" class="modal-overlay"></label>
  <div class="modal-box delete-modal">

   <h3>Are you sure?</h3>
   <p>This request will be permanently removed.</p>

   <div class="delete-actions">
    <label for="delete-1" class="btn-cancel">Cancel</label>
    <label class="btn-confirm">Delete</label>
   </div>
  </div>

 </div>

@endsection
