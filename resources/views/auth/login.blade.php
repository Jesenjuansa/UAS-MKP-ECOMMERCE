<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login - PrivEdu</title>

  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="{{ asset('cssUser/auth.css') }}" />
</head>

<body>

  <div class="container">

    <form action="#" method="POST">

      <div class="form-group">
        <label>Email / Username</label>
        <input type="text" name="login" required>
      </div>

      <div class="form-group">
        <label>Password</label>
        <input type="password" name="password" required>
      </div>

      <button class="btn" type="submit">Login</button>

      <div class="divider">or</div>

      <div class="link">
        Don’t have an account? <a href="{{ route('register') }}">Register now</a>
      </div>
    </form>

  </div>

</body>

</html>
