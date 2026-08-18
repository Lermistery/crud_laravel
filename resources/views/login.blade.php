<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | ProSite</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #0a0a0a;
            background-image:
                radial-gradient(ellipse 55% 60% at 10% 55%, rgba(60, 90, 0, 0.55) 0%, transparent 70%),
                radial-gradient(ellipse 35% 35% at 88% 80%, rgba(50, 80, 0, 0.35) 0%, transparent 65%);
            position: relative;
            overflow: hidden;
        }

        .page-label {
            position: fixed;
            top: 20px;
            left: 24px;
            font-size: 13px;
            color: #6b7280;
            letter-spacing: 0.01em;
            font-weight: 400;
        }

        .login-card {
            background: #1a1a1a;
            border: 1px solid #2a2a2a;
            border-radius: 18px;
            padding: 42px 40px 36px;
            width: 100%;
            max-width: 400px;
            display: flex;
            flex-direction: column;
            align-items: center;
            box-shadow: 0 8px 40px rgba(0,0,0,0.6);
        }

        .logo-icon {
            width: 52px;
            height: 52px;
            background: #c8f135;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 12px;
        }

        .logo-icon svg {
            width: 28px;
            height: 28px;
        }

        .brand-name {
            font-size: 13px;
            font-weight: 700;
            color: #ffffff;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            margin-bottom: 22px;
        }

        .login-title {
            font-size: 24px;
            font-weight: 700;
            color: #ffffff;
            margin-bottom: 6px;
            text-align: center;
        }

        .login-subtitle {
            font-size: 13px;
            color: #6b7280;
            text-align: center;
            margin-bottom: 28px;
        }

        .alert-error {
            width: 100%;
            background: rgba(220, 38, 38, 0.15);
            border: 1px solid rgba(220, 38, 38, 0.3);
            color: #f87171;
            padding: 10px 14px;
            border-radius: 8px;
            margin-bottom: 16px;
            font-size: 13px;
        }

        .form-group {
            width: 100%;
            margin-bottom: 14px;
        }

        .form-group label {
            display: block;
            font-size: 11px;
            font-weight: 600;
            color: #9ca3af;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            margin-bottom: 8px;
        }

        .input-wrapper {
            position: relative;
            display: flex;
            align-items: center;
        }

        .input-icon {
            position: absolute;
            left: 14px;
            display: flex;
            align-items: center;
            color: #6b7280;
            pointer-events: none;
        }

        .input-icon svg {
            width: 16px;
            height: 16px;
        }

        .form-group input[type="text"],
        .form-group input[type="password"] {
            width: 100%;
            padding: 12px 44px;
            background: #111111;
            border: 1px solid #2d2d2d;
            border-radius: 9px;
            font-size: 14px;
            color: #e5e7eb;
            font-family: 'Inter', sans-serif;
            transition: border-color 0.2s;
            outline: none;
        }

        .form-group input[type="text"]:focus,
        .form-group input[type="password"]:focus {
            border-color: #c8f135;
        }

        .form-group input::placeholder {
            color: #4b5563;
        }

        .toggle-password {
            position: absolute;
            right: 14px;
            display: flex;
            align-items: center;
            color: #6b7280;
            cursor: pointer;
            background: none;
            border: none;
            padding: 0;
        }

        .toggle-password svg {
            width: 17px;
            height: 17px;
        }

        .toggle-password:hover {
            color: #9ca3af;
        }

        .form-options {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 22px;
        }

        .remember-me {
            display: flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
        }

        .remember-me input[type="checkbox"] {
            appearance: none;
            -webkit-appearance: none;
            width: 18px;
            height: 18px;
            border: 2px solid #c8f135;
            border-radius: 4px;
            background: transparent;
            cursor: pointer;
            position: relative;
            flex-shrink: 0;
            transition: background 0.15s;
        }

        .remember-me input[type="checkbox"]:checked {
            background: #c8f135;
        }

        .remember-me input[type="checkbox"]:checked::after {
            content: '';
            position: absolute;
            top: 2px;
            left: 5px;
            width: 5px;
            height: 8px;
            border: 2px solid #0a0a0a;
            border-top: none;
            border-left: none;
            transform: rotate(45deg);
        }

        .remember-me span {
            font-size: 13px;
            color: #c8f135;
            font-weight: 500;
        }

        .forgot-link {
            font-size: 13px;
            color: #c8f135;
            text-decoration: none;
            font-weight: 500;
            transition: opacity 0.2s;
        }

        .forgot-link:hover {
            opacity: 0.75;
        }

        .btn-login {
            width: 100%;
            padding: 13px;
            background: #c8f135;
            color: #0a0a0a;
            border: none;
            border-radius: 9px;
            font-size: 15px;
            font-weight: 700;
            cursor: pointer;
            font-family: 'Inter', sans-serif;
            letter-spacing: 0.01em;
            transition: background 0.2s, transform 0.1s;
            margin-bottom: 20px;
        }

        .btn-login:hover {
            background: #d4f542;
        }

        .btn-login:active {
            transform: scale(0.99);
        }

        .signup-text {
            font-size: 13px;
            color: #6b7280;
            text-align: center;
        }

        .signup-link {
            color: #c8f135;
            text-decoration: none;
            font-weight: 600;
            margin-left: 4px;
            transition: opacity 0.2s;
        }

        .signup-link:hover {
            opacity: 0.75;
        }
    </style>
</head>
<body>

    <span class="page-label">page-login</span>

    <div class="login-card">

        <!-- Logo -->
        <div class="logo-icon">
            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect x="3" y="3" width="7" height="7" rx="1.5" fill="#0a0a0a"/>
                <rect x="14" y="3" width="7" height="7" rx="1.5" fill="#0a0a0a"/>
                <rect x="3" y="14" width="7" height="7" rx="1.5" fill="#0a0a0a"/>
                <rect x="14" y="14" width="7" height="7" rx="1.5" fill="#0a0a0a"/>
            </svg>
        </div>

        <div class="brand-name">PROSITE</div>

        <h1 class="login-title">Welcome Back</h1>
        <p class="login-subtitle">Sign in to continue managing your projects</p>

        @if(session('error'))
            <div class="alert-error">{{ session('error') }}</div>
        @endif

        @if($errors->any())
            <div class="alert-error">{{ $errors->first() }}</div>
        @endif

        <form method="POST" action="{{ url('/login') }}" style="width:100%">
            @csrf

            <!-- Username -->
            <div class="form-group">
                <label for="username">USERNAME</label>
                <div class="input-wrapper">
                    <span class="input-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="2" y="4" width="20" height="16" rx="2"/>
                            <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/>
                        </svg>
                    </span>
                    <input
                        type="text"
                        id="username"
                        name="username"
                        placeholder="developer"
                        value="{{ old('username') }}"
                        required
                        autofocus
                    >
                </div>
            </div>

            <!-- Password -->
            <div class="form-group">
                <label for="password">PASSWORD</label>
                <div class="input-wrapper">
                    <span class="input-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="3" y="11" width="18" height="11" rx="2" ry="2"/>
                            <path d="M7 11V7a5 5 0 0 1 10 0v4"/>
                        </svg>
                    </span>
                    <input
                        type="password"
                        id="password"
                        name="password"
                        placeholder="••••••••••••"
                        required
                    >
                    <button type="button" class="toggle-password" id="togglePassword" aria-label="Toggle password visibility">
                        <svg id="eyeIcon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
                            <circle cx="12" cy="12" r="3"/>
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Remember me & Forgot password -->
            <div class="form-options">
                <label class="remember-me">
                    <input type="checkbox" id="rememberMe" name="remember">
                    <span>Remember Me</span>
                </label>
                <a href="#" class="forgot-link">Forgot Password?</a>
            </div>

            <!-- Sign In button -->
            <button type="submit" class="btn-login" id="signInBtn">Sign In</button>

        </form>

        <p class="signup-text">
            Don't have an account?<a href="#" class="signup-link">Sign Up</a>
        </p>

    </div>

    <script>
        const togglePassword = document.getElementById('togglePassword');
        const passwordInput  = document.getElementById('password');
        const eyeIcon        = document.getElementById('eyeIcon');

        const eyeOpenPath   = '<path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/>';
        const eyeClosedPath = '<path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94"/><path d="M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19"/><line x1="1" y1="1" x2="23" y2="23"/>';

        togglePassword.addEventListener('click', function () {
            const isPassword = passwordInput.type === 'password';
            passwordInput.type = isPassword ? 'text' : 'password';
            eyeIcon.innerHTML  = isPassword ? eyeClosedPath : eyeOpenPath;
        });
    </script>

</body>
</html>
