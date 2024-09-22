@extends('layouts.master')
@section('title','Register')
@section('content')
    <div class="container register-container">
        <div class='box'>
            <div class='wave -one'></div>
            <div class='wave -two'></div>
        </div>

        <div class="card register-card shadow-lg">
            <div class="row g-0">
                <!-- Form Section -->
                <div class="col-md-6 register-form-section p-5">
                    <h3 class="card-title mb-4">Register</h3>
                    <form method="POST" action="{{ route('auth.register') }}" enctype="multipart/form-data" >
                        @csrf
                        @if (Session::has('success'))
                            <div class="alert alert-success">
                                {{ Session::get('success') }}
                            </div>
                        @endif

                        <div class="mb-3">
                            <label for="name" class="form-label">Full Name</label>
                            <input type="text" class="form-control" id="name" placeholder="Your Full Name" name="name" value="{{ old('name') }}" required>
                            @error('name')
                                <p class="alert alert-danger mt-2"> {{$message}}</p>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" placeholder="Your Username" name="username" value="{{ old('username') }}" required>
                            @error('username')
                            <p class="alert alert-danger mt-2"> {{$message}}</p>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" class="form-control" id="email" placeholder="you@example.com" name="email" value="{{ old('email') }}" required>
                            @error('email')
                                <p class="alert alert-danger mt-2"> {{$message}}</p>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone Number</label>
                            <input type="tel" class="form-control" id="phone" placeholder="Your Phone Number" name="phone" value="{{ old('phone') }}" required>
                            @error('phone')
                            <p class="alert alert-danger mt-2"> {{$message}}</p>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" id="password" placeholder="Enter 6 characters or more" required>
                            @error('password')
                                <p class="alert alert-danger mt-2"> {{$message}}</p>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Image</label>
                            <input class="form-control" name="image" type="file">
                            @error('image')
                                <p class="alert alert-danger mt-2"> {{$message}}</p>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary w-100 mb-3">Register</button>
                        <p>Already have an account? <a href="{{ route('login') }}">Login here</a></p>
                    </form>
                </div>

                <!-- Illustration Section -->
                <div class="col-md-6 d-flex justify-content-center align-items-center p-5">
                    <img src="{{ asset('images/designs/registerpage.svg') }}" alt="Illustration" class="register-illustration img-fluid">
                </div>
            </div>
        </div>
    </div>
@endsection
