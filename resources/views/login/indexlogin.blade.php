@extends('layout.app')

@section('title', 'Login')

@push('styles')
    <style>
        body {
            background-color: #45a9ea;
            height: 100vh;
        }

        .login-container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .login-card {
            width: 500px;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            background-color: white;
        }

        .logo {
            display: block;
            margin: 0 auto;
            width: 50px;
        }

        .login-title {
            font-size: 20px;
            font-weight: bold;
            text-align: center;
            margin-top: 10px;
        }

        .login-subtitle {
            font-size: 14px;
            text-align: center;
            color: #6c757d;
            margin-bottom: 20px;
        }

        .forgot-password {
            font-size: 14px;
            text-decoration: none;
            color: #007bff;
        }

        .register-link {
            font-size: 14px;
            text-decoration: none;
            color: #007bff;
            font-weight: bold;
        }
    </style>
@endpush

@section('content')
    <div class="login-container">
        <div class="login-card">
            <img src="{{ asset('img/logo.png') }}" alt="Logo" class="logo">
            <h2 class="login-title">Welcome to <br>Property Management System</h2>
            <p class="login-subtitle">Please login your account.</p>

            <form method="POST" action="{{ route('login') }}" id="loginForm">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required
                        placeholder="rio@gmail.com">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required
                        placeholder="********">
                </div>
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="form-check">
                        <!-- <input type="checkbox" class="form-check-input" id="remember_me" name="remember"> -->
                        <!-- <label class="form-check-label" for="remember_me">Remember me</label> -->
                    </div>
                    <!-- <a href="" class="forgot-password">Forgot Password?</a> -->
                </div>
                <button type="submit" class="btn w-100" style="background-color: #45a9ea; color: white;">Log In</button>
                <p class="text-center mt-3">New member here? <a href="#" class="register-link">Reach Out Supervisor to Register</a></p>
            </form>
        </div>
    </div>
@endsection
@section('script')
<script>
   $(document).ready(function() {
            $('#loginForm').on('submit', function(event) {
                event.preventDefault();

                Swal.fire({
                    title: 'Checking...',
                    html: 'Please wait while we check your credentials.',
                    allowOutsideClick: false,
                    didOpen: () => {
                        Swal.showLoading();
                    }
                });

                $.ajax({
                    url: '/login',
                    method: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {
                        Swal.close();

                        if (response.success) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil!',
                                text: response.message,
                                showConfirmButton: false,
                            }).then(() => {
                                window.location.href = response.redirect;
                            });
                        } else {
                            showMessage("error", response
                                .message);
                        }
                    },
                    error: function(xhr) {
                        Swal.close(); 

                        Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            text: 'Email dan Password Salah!',
                            showConfirmButton: true
                        });
                    }
                });
            });
        });

</script>

@endsection
