<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $profil->nama_sekolah ?? 'Nama Sekolah' }}</title>

    <meta name="description" content="Login Admin SMA CENDIKIA">

    <link rel="icon" type="image/png" href="{{ asset('assets/images/favicon.ico') }}">
    <link rel="stylesheet" href="{{ asset('assets/libs/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/libs/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
</head>
<body>
    @php
        $profil = \App\Models\Profil::first();
    @endphp

    <div class="login-wrapper">
        <!-- Background Shapes -->
        <div class="login-bg-shape login-bg-shape-1"></div>
        <div class="login-bg-shape login-bg-shape-2"></div>

        <!-- Login Card -->
        <div class="login-card">
            <a href="{{ route('login') }}" class="login-brand text-decoration-none"><i class="bi bi-asterisk"></i>
                <span>{{ $profil->nama_sekolah ?? 'Nama Sekolah' }}</span>
            </a>

            <p class="login-subtitle">Silakan masuk untuk mengakses dashboard</p>

            <!-- LOGIN FORM -->
            <form action="{{ route('login.process') }}" method="POST" id="loginForm">
                @csrf
                <!-- Error Message -->
                @if(session('error'))
                    <div class="alert alert-danger mb-3"><i class="bi bi-exclamation-circle me-2"></i>{{ session('error') }}</div>
                @endif

                <!-- Validation Error -->
                @if($errors->any())
                    <div class="alert alert-danger mb-3"><i class="bi bi-exclamation-circle me-2"></i>{{ $errors->first() }}</div>
                @endif

                <!-- Username -->
                <div class="login-form-group">
                    <label for="username" class="login-form-label">Username</label>

                    <div class="login-input-group">
                        <i class="bi bi-person input-icon"></i>
                        <input type="text" id="username" name="username" class="login-input" placeholder="Masukkan username" value="{{ old('username') }}" required autofocus>
                    </div>
                </div>

                <!-- Password -->
                <div class="login-form-group">
                    <label for="password"class="login-form-label">Password</label>
                    <div class="login-input-group"><i class="bi bi-shield-lock input-icon"></i>
                        <input type="password" id="password" name="password" class="login-input login-input-password" placeholder="Masukkan password" require>

                        <button type="button" class="password-toggle-btn" onclick="togglePassword()" aria-label="Show password">
                            <i class="bi bi-eye" id="passwordIcon"></i>
                        </button>
                    </div>
                </div>

                <button type="submit" class="btn-login" id="btn-submit" style="margin-top: 25px;">
                    <span>Login</span>
                </button>
            </form>
        </div>
    </div>

    <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/auth.js') }}"></script>


    <!-- Password Toggle -->
    <script>
        function togglePassword() {
            const password = document.getElementById('password');
            const icon = document.getElementById('passwordIcon');
            if (password.type === 'password') {

                password.type = 'text';
                icon.classList.remove('bi-eye');
                icon.classList.add('bi-eye-slash');

            } else {

                password.type = 'password';
                icon.classList.remove('bi-eye-slash');
                icon.classList.add('bi-eye');

            }
        }
    </script>

</body>
</html>
