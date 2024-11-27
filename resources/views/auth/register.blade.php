<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        * {
            box-sizing: border-box;
            font-family: 'Jost', sans-serif;
        }

        body, html {
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }

        .center-container {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .form-container {
            width: 100%;
            max-width: 360px;
            padding: 2rem;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .form-container i.fa-user-circle {
            color: #4d61fc;
            font-size: 2.5rem;
            margin-bottom: 0.5rem;
        }

        .form-container h2 {
            font-weight: bold;
            margin-bottom: 1rem;
            color: #3b3663;
            font-size: 1.5rem;
        }

        .form-floating {
            position: relative;
        }

        .form-floating input {
            height: 50px;
            border: none;
            border-bottom: 2px solid #ced4da;
            padding-right: 40px;
            font-size: 16px;
            border-radius: 0;
        }

        .form-floating input:focus {
            box-shadow: none;
            border-color: #4d61fc;
            outline: none;
        }

        .form-floating label {
            padding-left: 0;
            color: #6c757d;
        }

        .input-icon {
            position: absolute;
            right: 10px;
            bottom: 8px;
            color: #6c757d;
            font-size: 18px;
            opacity: 0.7;
        }

        .btn-primary {
            width: 100%;
            height: 50px;
            font-size: 1rem;
            font-weight: bold;
            background-color: #4d61fc;
            border: none;
            margin-top: 10px;
        }

        .btn-primary:hover {
            background-color: #2036de;
        }

        .social-icons {
            margin-top: 1rem;
            display: flex;
            justify-content: center;
            gap: 15px;
        }

        .social-icons a {
            font-size: 1.5rem;
            text-decoration: none;
        }

        /* Custom Colors for Social Icons */
        .social-icons a.facebook { color: #3b5998; }
        .social-icons a.twitter { color: #1da1f2; }
        .social-icons a.pinterest { color: #bd081c; }

        .social-icons a:hover {
            opacity: 0.8;
        }

        .error-message {
            color: #e3342f;
            font-size: 0.875rem;
            margin-top: 0.25rem;
            text-align: left;
        }
    </style>
</head>
<body>

<div class="center-container">
    <div class="form-container">
        <i class="fas fa-user-circle"></i>
        <h2>Create account!</h2>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="form-floating mb-3">
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="floatingName" name="name" placeholder="Name" value="{{ old('name') }}" required>
                <label for="floatingName">Name</label>
                <i class="fas fa-user input-icon"></i>
                @error('name')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-floating mb-3">
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="floatingEmail" name="email" placeholder="E-mail" value="{{ old('email') }}" required>
                <label for="floatingEmail">E-mail</label>
                <i class="fas fa-envelope input-icon"></i>
                @error('email')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-floating mb-3">
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="floatingPassword" name="password" placeholder="Password" required>
                <label for="floatingPassword">Password</label>
                <i class="fas fa-lock input-icon"></i>
                @error('password')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-floating mb-3">
                <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="floatingPasswordConfirm" name="password_confirmation" placeholder="Confirm Password" required>
                <label for="floatingPasswordConfirm">Confirm Password</label>
                <i class="fas fa-key input-icon"></i>
                @error('password_confirmation')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Create →</button>
        </form>
        <p class="mt-3">Or create account using social media!</p>
        <div class="social-icons">
            <a href="#" class="facebook"><i class="fab fa-facebook"></i></a>
            <a href="#" class="twitter"><i class="fab fa-twitter"></i></a>
            <a href="#" class="pinterest"><i class="fab fa-pinterest"></i></a>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>

