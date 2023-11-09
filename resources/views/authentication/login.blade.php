<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/login.css">
    <title>Login</title>
</head>
<body>
    <div class="login-box">
        <h2>Tangerang Business Unit Approval</h2>
        <img src="img/4.png" alt="Logo Perusahaan">
        <form action="/login" method="post">
            @csrf
            <div class="user-box">
                <input type="text" name="email" id="email">
                <label>Username</label>
            </div>
            <div class="user-box" style="margin-top: 20px">
                <input type="password" name="password" id="password">
                <label>Password</label>

                @error('password')
                    <p class="alert"><small>username atau password salah</small></p>
                @enderror
                @error('email')
                    <p class="alert"><small>username atau password salah</small></p>
                @enderror

                @if (session()->has('loginError'))  
                    <p class="alert"><small>{{ Session('loginError') }}</small></p>
                @endif
            </div>
            <div>
                <button type="submit">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    SUBMIT
                </button>
            </div>
        </form>
    </div>
    <footer>
        <p>&copy; 2023 PT SINAR ANTJOL</p>
    </footer>
</body>
</html>