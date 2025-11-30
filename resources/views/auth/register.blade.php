<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register - Student</title>

  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet" />
  <link rel="stylesheet" href="{{ asset('cssUser/auth.css') }}" />
</head>

<body>
  <div class="container">

    <!-- ROLE SWITCH (TANPA JS) -->
    <div class="role-switch">
      <a href="{{ route('auth.register') }}" class="role-btn active">
        <i class="bi bi-person-lines-fill"></i> STUDENT
      </a>
      <a href="{{ route('auth.register.tutor') }}" class="role-btn">
        <i class="bi bi-mortarboard-fill"></i> TUTOR
      </a>
    </div>

   <form method="POST" action="{{ route('auth.register.process') }}">
    @csrf

    <div class="scroll-area">

        <div class="form-group">
            <label>Full Name</label>
            <input name="full_name" required>
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

        <!-- penting: role student -->
        <input type="hidden" name="role" value="student">

    </div>

    <button class="btn" type="submit">Register as Student</button>

    <div class="link">
        Already have an account? <a href="{{ route('auth.login') }}">Login here</a>
    </div>
</form>

  </div>
</body>

</html>
