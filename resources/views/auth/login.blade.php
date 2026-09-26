<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login - SMKS YPC Tasikmalaya</title>

    <meta name="description" content="Login Admin SMKS YPC Tasikmalaya">

    <!-- Favicon -->
    <link rel="icon" type="image/png"
          href="{{ asset('assets/images/favicon.ico') }}">

    <!-- Bootstrap -->
    <link rel="stylesheet"
          href="{{ asset('assets/libs/bootstrap/css/bootstrap.min.css') }}">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet"
          href="{{ asset('assets/libs/bootstrap-icons/bootstrap-icons.css') }}">

    <!-- Main CSS -->
    <link rel="stylesheet"
          href="{{ asset('assets/css/main.css') }}">
</head>

<body>

    <!-- ==========================================
         START: Authentication Container
         ========================================== -->

    <div class="login-wrapper">

        <!-- Background Shapes -->
        <div class="login-bg-shape login-bg-shape-1"></div>
        <div class="login-bg-shape login-bg-shape-2"></div>

        <!-- Login Card -->
        <div class="login-card">

            <!-- Brand -->
            <a href="{{ route('login') }}"
               class="login-brand text-decoration-none">

                <i class="bi bi-asterisk"></i>

                <span>SMKS YPC Tasikmalaya</span>

            </a>

            <p class="login-subtitle">
                Silakan masuk untuk mengakses dashboard
            </p>


            <!-- ==========================================
                 LOGIN FORM
                 ========================================== -->

            <form action="{{ route('login.process') }}"
                  method="POST"
                  id="loginForm">

                @csrf


                <!-- Error Message -->
                @if(session('error'))
                    <div class="alert alert-danger mb-3">
                        <i class="bi bi-exclamation-circle me-2"></i>
                        {{ session('error') }}
                    </div>
                @endif


                <!-- Validation Error -->
                @if($errors->any())
                    <div class="alert alert-danger mb-3">
                        <i class="bi bi-exclamation-circle me-2"></i>

                        {{ $errors->first() }}
                    </div>
                @endif


                <!-- Username -->
                <div class="login-form-group">

                    <label for="username"
                           class="login-form-label">

                        Username

                    </label>

                    <div class="login-input-group">

                        <i class="bi bi-person input-icon"></i>

                        <input
                            type="text"
                            id="username"
                            name="username"
                            class="login-input"
                            placeholder="Masukkan username"
                            value="{{ old('username') }}"
                            required
                            autofocus
                        >

                    </div>

                </div>


                <!-- Password -->
                <div class="login-form-group">

                    <label for="password"
                           class="login-form-label">

                        Password

                    </label>

                    <div class="login-input-group">

                        <i class="bi bi-shield-lock input-icon"></i>

                        <input
                            type="password"
                            id="password"
                            name="password"
                            class="login-input login-input-password"
                            placeholder="Masukkan password"
                            required
                        >

                        <button
                            type="button"
                            class="password-toggle-btn"
                            id="toggle-password"
                            aria-label="Show password">

                            <i class="bi bi-eye"></i>

                        </button>

                    </div>

                </div>


                <!-- Options -->
                <div class="login-options">

                    <label class="custom-control-label">

                        <input
                            type="checkbox"
                            class="custom-checkbox-input"
                            id="rememberMe"
                        >

                        <span>Remember Me</span>

                    </label>


                    <a href="#"
                       class="forgot-password-link">

                        Forgot Password?

                    </a>

                </div>


                <!-- Submit -->
                <button
                    type="submit"
                    class="btn-login"
                    id="btn-submit">

                    <span>Sign In to Dashboard</span>

                    <i class="bi bi-arrow-right"></i>

                </button>

            </form>


            <!-- Divider -->
            <div class="login-divider">
                Or sign in with
            </div>


            <!-- Social Login -->
            <div class="social-login-grid">

                <button
                    class="btn-social"
                    type="button"
                    id="btn-google">

                    <i class="bi bi-google text-danger"></i>

                    <span>Google</span>

                </button>


                <button
                    class="btn-social"
                    type="button"
                    id="btn-github">

                    <i class="bi bi-github"></i>

                    <span>GitHub</span>

                </button>

            </div>


            <!-- Footer -->
            <p class="login-footer-text">

                Don't have an account?

                <a href="#"
                   id="link-register">

                    Register Now

                </a>

            </p>

        </div>

    </div>

    <!-- ==========================================
         END: Authentication Container
         ========================================== -->


    <!-- Bootstrap JS -->
    <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>


    <!-- Custom Authentication JS -->
    <script src="{{ asset('assets/js/auth.js') }}"></script>


    <!-- Password Toggle -->
    <script>

        const togglePassword =
            document.getElementById('toggle-password');

        const password =
            document.getElementById('password');

        if (togglePassword && password) {

            togglePassword.addEventListener('click', function () {

                const type =
                    password.getAttribute('type') === 'password'
                        ? 'text'
                        : 'password';

                password.setAttribute('type', type);

                const icon =
                    this.querySelector('i');

                if (type === 'text') {

                    icon.classList.remove('bi-eye');

                    icon.classList.add('bi-eye-slash');

                    this.setAttribute(
                        'aria-label',
                        'Hide password'
                    );

                } else {

                    icon.classList.remove('bi-eye-slash');

                    icon.classList.add('bi-eye');

                    this.setAttribute(
                        'aria-label',
                        'Show password'
                    );

                }

            });

        }

    </script>

</body>
</html>
