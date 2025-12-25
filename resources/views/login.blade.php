<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Demo Account</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
            background: linear-gradient(135deg, #667eea, #764ba2);
        }

        .login-wrapper {
            background: rgba(255, 255, 255, 0.95);
            padding: 40px 50px;
            border-radius: 18px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
            width: 100%;
            max-width: 420px;
            text-align: center;
            backdrop-filter: blur(6px);
        }

        /* Dummy Logo */
        .logo-wrapper {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            margin-bottom: 25px;
        }

        .logo-icon {
            width: 48px;
            height: 48px;
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: #fff;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 22px;
        }

        .logo-text {
            font-size: 22px;
            font-weight: 700;
            color: #333;
        }

        h2 {
            color: #222;
            font-weight: 600;
            font-size: 24px;
            margin-bottom: 8px;
        }

        p {
            color: #666;
            font-size: 14px;
            margin-bottom: 30px;
        }

        .input-group {
            position: relative;
            margin-bottom: 20px;
        }

        .input-field {
            width: 100%;
            padding: 14px 18px 14px 45px;
            border: 1px solid #ddd;
            border-radius: 10px;
            font-size: 15px;
        }

        .input-field:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.2);
        }

        .input-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #888;
            width: 20px;
            height: 20px;
        }

        .submit-btn {
            width: 100%;
            padding: 15px;
            border: none;
            border-radius: 10px;
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: #fff;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 10px;
        }

        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(118, 75, 162, 0.35);
        }

        .links-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 18px;
            font-size: 13px;
        }

        .links-section a {
            color: #667eea;
            font-weight: 500;
            text-decoration: none;
        }

        .links-section a:hover {
            text-decoration: underline;
        }

        .error-message {
            background-color: #fdecea;
            color: #842029;
            padding: 14px;
            border-radius: 10px;
            margin-bottom: 20px;
            text-align: left;
            border: 1px solid #f5c2c7;
            font-size: 13px;
        }
    </style>
</head>

<body>

    <div class="login-wrapper">

        <!-- Dummy Logo -->
        <div class="logo-wrapper">
            <div class="logo-icon">D</div>
            <div class="logo-text">DemoApp</div>
        </div>

        <h2>Selamat Datang 👋</h2>
        <p>Gunakan akun demo untuk mencoba aplikasi ini.</p>

        <form action="{{ route('check') }}" method="post">
            @csrf

            @if ($errors->any())
            <div class="error-message">
                <strong>Terjadi kesalahan</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <!-- Email -->
            <div class="input-group">
                <svg class="input-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75" />
                </svg>
                <input
                    type="email"
                    name="email"
                    class="input-field"
                    value="admin@example.com"
                    required>
            </div>

            <!-- Password -->
            <div class="input-group">
                <svg class="input-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75" />
                </svg>
                <input
                    type="password"
                    name="password"
                    class="input-field"
                    value="password"
                    required>
            </div>

            <div class="links-section">
                <label>
                    <input type="checkbox" name="remember"> Ingat saya
                </label>
                <span style="color:#999;font-style:italic;">Demo Account</span>
            </div>

            <button type="submit" class="submit-btn">LOGIN DEMO</button>
        </form>

    </div>

</body>

</html>