@extends('layouts.master')
@section('title','login')
@section('content')
    <div class="container login-container">
        <div class='box'>
            <div class='wave -one'> </div>
            <div class='wave -two'></div>
        </div>

        <div class="card login-card shadow-lg">
            <div class="row g-0">
                <!-- Form Section -->
                <div class="col-md-6 login-form-section p-5">
                    <h3 class="card-title mb-4">Login</h3>
                    <form method="POST" action="{{ route('auth.login') }}" enctype="multipart/form-data">
                        @csrf
                        @if (Session::has('success'))
                            <div class="alert alert-success">
                                {{ Session::get('success') }}
                            </div>
                        @endif

                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" class="form-control" id="email" placeholder="you@example.com" name="email" value="{{ old('email') }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" id="password" placeholder="Enter 6 characters or more"  required>
                        </div>
                        <!-- Error Message -->
                        @if ($errors->has('error'))
                            <div class="alert alert-danger">
                                {{ $errors->first('error') }}
                            </div>
                        @endif
                        <button type="submit" class="btn btn-primary w-100 mb-3">Login</button>
                        <p><a href="#">Forgot Password?</a></p>
                        <p>Don't have an account? <a href="{{ route('register') }}">Sign Up</a></p>
                    </form>
                </div>

                <!-- Illustration Section -->
                <div class="col-md-6 d-flex justify-content-center align-items-center p-5">
                    <img src="{{ asset('images/designs/loginpage.svg') }}" alt="Illustration" class="login-illustration img-fluid">
                </div>
            </div>
        </div>
    </div>

@endsection























