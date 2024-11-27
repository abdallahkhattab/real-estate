<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* مركز المربع عموديًا وأفقيًا */
        .login-container {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .card {
            max-width: 400px;
            width: 100%;
            padding: 20px;
        }

        /* تنسيق حقل العنوان العائم والأيقونة */
        .form-floating .form-control {
            border: none;
            border-bottom: 2px solid #ced4da;
            border-radius: 0;
            padding-right: 40px;
        }

        .form-floating .form-control:focus {
            border-color: #6c63ff; /* تغيير لون الإطار عند التركيز */
            box-shadow: none; /* إزالة الظل */
            outline: none; /* إزالة الإطار الافتراضي */
        }

        .form-floating label {
            color: #6c757d;
        }

        .input-icon {
            position: absolute;
            right: 10px;
            bottom: 12px;
            color: #6c757d;
            opacity: 0.6;
            font-size: 1.2rem;
        }

        .invalid-feedback {
            display: block;
        }
    </style>
</head>

<body>

    <div class="container login-container">
        <div class="card shadow">
            <div class="card-body">
                <div class="text-center mb-4">
                    <i class="fas fa-sign-in-alt" style="font-size: 2rem; color: #6c63ff;"></i>
                    <h3 class="mt-2">Welcome!</h3>
                    <p class="text-muted">Sign in to your account</p>
                </div>

                <!-- نموذج تسجيل الدخول مع Laravel -->
                <form method="POST" action="{{ route('login') }}">
                    @csrf  <!-- حماية النموذج باستخدام CSRF -->

                    <!-- حقل البريد الإلكتروني -->
                    <div class="form-floating mb-3 position-relative">
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="floatingEmail" name="email" placeholder="Email" value="{{ old('email') }}" required>
                        <label for="floatingEmail">Email</label>
                        <i class="fas fa-envelope input-icon"></i>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- حقل كلمة المرور -->
                    <div class="form-floating mb-3 position-relative">
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="floatingPassword" name="password" placeholder="Password" required>
                        <label for="floatingPassword">Password</label>
                        <i class="fas fa-lock input-icon"></i>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- خيار تذكرني -->
                    <div class="d-flex justify-content-between mb-3">
                        <div>
                            <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label for="remember" class="form-check-label">Remember me?</label>
                        </div>
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="text-decoration-none">Forgot password?</a>
                        @endif
                    </div>

                    <!-- زر تسجيل الدخول -->
                    <button type="submit" class="btn btn-primary w-100">Login <i class="fas fa-arrow-right"></i></button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
