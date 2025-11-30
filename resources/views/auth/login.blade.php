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

      <form action="{{ route('auth.login.process') }}" method="POST">
    @csrf

    @if ($errors->any())
        <div>
            <strong style="color:red;">{{ $errors->first() }}</strong>
        </div>
        <br>
    @endif

    <div>
        <label>Email / Username</label><br>
        <input type="text" name="login" value="{{ old('login') }}" required>
    </div>

    <br>

    <div>
        <label>Password</label><br>
        <input type="password" name="password" required>
    </div>

    <br>

    <button class="btn" type="submit">Login</button>

    <div class="divider">or</div>

    <div style="text-align:center;">
        Don’t have an account?<a href="{{ route('auth.register') }}">Register now</a>
    </div>
</form>



    </div>

</body>

</html>
