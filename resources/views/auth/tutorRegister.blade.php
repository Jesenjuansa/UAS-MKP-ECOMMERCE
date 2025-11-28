<!DOCTYPE html>
<html lang="en">

<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Register - Tutor</title>

 <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet" />
 <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet" />
  <link rel="stylesheet" href="{{ asset('cssUser/auth.css') }}" />
</head>

<body>
 <div class="container">

  <div class="role-switch">
   <a href="{{ route('register') }}" class="role-btn">
    <i class="bi bi-person-lines-fill"></i> STUDENT
   </a>

   <a href="{{ route('tutorRegister') }}" class="role-btn active">
    <i class="bi bi-mortarboard-fill"></i> TUTOR
   </a>
  </div>

  <form method="POST" action="/register-tutor">
   <div class="scroll-area">

    <div class="form-group">
     <label>Full Name</label>
     <input name="name" required>
    </div>

    <div class="form-group">
     <label>Email</label>
     <input type="email" name="email" required>
    </div>

    <div class="form-group">
     <label>Password</label>
     <input type="password" name="password" required>
    </div>

    <div class="form-group">
     <label>Confirm Password</label>
     <input type="password" name="password_confirmation" required>
    </div>

    <div class="form-group">
     <label>Phone Number</label>
     <input name="phone">
    </div>

    <div class="form-group">
     <label>Teaching Subject</label>
     <select name="subject" required>
      <option value="">Select</option>
      <option>Iqra & Basic Qur’an Reading</option>
      <option>Tajweed & Tilawah</option>
      <option>Tahfidz / Memorization</option>
      <option>Tahsin Qur’an Recitation</option>
      <option>Daily Du’a & Worship</option>
     </select>
    </div>

    <div class="form-group">
     <label>Class Type</label>
     <select name="class_type" required>
      <option value="">Select</option>
      <option>Online</option>
      <option>In-person</option>
     </select>
    </div>

    <div class="form-group">
     <label>Rate per Session</label>
     <input type="number" name="rate" required>
    </div>

   </div>

   <button class="btn" type="submit">Register as Tutor</button>

   <div class="link">
    Already have an account? <a href="{{ route('login') }}">Login here</a>
   </div>
  </form>
 </div>

</body>

</html>
