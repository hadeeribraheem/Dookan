@extends('layouts.master')
@section('title', __('keywords.register')) <!-- Translated title -->
@section('content')
    <div class="container register-container">
        <div class='box'>
            <div class='wave -one'></div>
            <div class='wave -two'></div>
        </div>

        <div class="card register-card shadow-lg">
            <div class="row g-0">
                <a href="?lang={{ app()->getLocale() === 'ar' ? 'en' : 'ar' }}">
                    <button type="button" class="lang-btn btn btn-primary">
                        {{ app()->getLocale() === 'ar' ? __('keywords.english') : __('keywords.arabic') }}
                    </button>
                </a>

                <!-- Form Section -->
                <div class="col-md-6 register-form-section p-5">
                    <h3 class="card-title mb-4">{{ __('keywords.register') }}</h3> <!-- Translated "Register" -->

                    <form method="POST" action="{{ route('auth.register') }}" enctype="multipart/form-data">
                        @csrf
                        @if (Session::has('success'))
                            <div class="alert alert-success">
                                {{ Session::get('success') }}
                            </div>
                        @endif

                        <div class="mb-3">
                            <label for="name" class="form-label">{{ __('keywords.full_name') }}</label> <!-- Translated "Full Name" -->
                            <input type="text" class="form-control" id="name" placeholder="{{ __('keywords.placeholder_full_name') }}" name="name" value="{{ old('name') }}" required>
                            @error('name')
                            <p class="alert alert-danger mt-2"> {{$message}}</p>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="username" class="form-label">{{ __('keywords.username') }}</label> <!-- Translated "Username" -->
                            <input type="text" class="form-control" id="username" placeholder="{{ __('keywords.placeholder_username') }}" name="username" value="{{ old('username') }}" required>
                            @error('username')
                            <p class="alert alert-danger mt-2"> {{$message}}</p>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">{{ __('keywords.email_address') }}</label> <!-- Translated "Email Address" -->
                            <input type="email" class="form-control" id="email" placeholder="{{ __('keywords.placeholder_email') }}" name="email" value="{{ old('email') }}" required>
                            @error('email')
                            <p class="alert alert-danger mt-2"> {{$message}}</p>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="phone" class="form-label">{{ __('keywords.phone_number') }}</label> <!-- Translated "Phone Number" -->
                            <input type="tel" class="form-control" id="phone" placeholder="{{ __('keywords.placeholder_phone') }}" name="phone" value="{{ old('phone') }}" required>
                            @error('phone')
                            <p class="alert alert-danger mt-2"> {{$message}}</p>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">{{ __('keywords.password') }}</label> <!-- Translated "Password" -->
                            <input type="password" name="password" class="form-control" id="password" placeholder="{{ __('keywords.placeholder_password') }}" required>
                            @error('password')
                            <p class="alert alert-danger mt-2"> {{$message}}</p>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">{{ __('keywords.image') }}</label> <!-- Translated "Image" -->
                            <input class="form-control" name="image" type="file">
                            @error('image')
                            <p class="alert alert-danger mt-2"> {{$message}}</p>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary w-100 mb-3">{{ __('keywords.register') }}</button> <!-- Translated "Register" button -->
                        <p>{{ __('keywords.already_have_account') }} <a href="{{ route('login') }}">{{ __('keywords.login_here') }}</a></p> <!-- Translated "Already have an account? Login here" -->
                    </form>
                </div>

                <!-- Illustration Section -->
                <div class="col-md-6 d-flex justify-content-center align-items-center p-5">
                    <img src="{{ asset('images/designs/registerpage.svg') }}" alt="{{ __('keywords.register_illustration_alt') }}" class="register-illustration img-fluid"> <!-- Translated alt text -->
                </div>
            </div>
        </div>
    </div>
@endsection
