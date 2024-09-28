@extends('layouts.master')
@section('title', __('keywords.login')) <!-- Added translation for the title -->
@section('content')

    <div class="container login-container">
        <div class='box'>
            <div class='wave -one'></div>
            <div class='wave -two'></div>
        </div>

        <div class="card login-card shadow-lg">
            <div class="row g-0">
                <a href="?lang={{ app()->getLocale() === 'ar' ? 'en' : 'ar' }}">
                    <button type="button" class="lang-btn btn btn-primary">
                        {{ app()->getLocale() === 'ar' ? __('keywords.english') : __('keywords.arabic') }}
                    </button>
                </a>
                <!-- Form Section -->
                <div class="col-md-6 login-form-section p-5">
                    <h3 class="card-title mb-4">{{ __('keywords.login') }}</h3> <!-- Translated "Login" -->

                    <form method="POST" action="{{ route('auth.login') }}" enctype="multipart/form-data">
                        @csrf
                        @if (Session::has('success'))
                            <div class="alert alert-success">
                                {{ Session::get('success') }}
                            </div>
                        @endif

                        <div class="mb-3">
                            <label for="email" class="form-label">{{ __('keywords.email_address') }}</label> <!-- Translated "Email Address" -->
                            <input type="email" class="form-control" id="email" placeholder="{{ __('keywords.placeholder_email') }}" name="email" value="{{ old('email') }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">{{ __('keywords.password') }}</label> <!-- Translated "Password" -->
                            <input type="password" name="password" class="form-control" id="password" placeholder="{{ __('keywords.placeholder_password') }}" required>
                        </div>
                        <!-- Error Message -->
                        @if ($errors->has('error'))
                            <div class="alert alert-danger">
                                {{ $errors->first('error') }}
                            </div>
                        @endif
                        <button type="submit" class="btn btn-primary w-100 mb-3">{{ __('keywords.login') }}</button> <!-- Translated "Login" button -->
                        <p><a href="#">{{ __('keywords.forgot_password') }}</a></p> <!-- Translated "Forgot Password" -->
                        <p>{{ __('keywords.no_account') }} <a href="{{ route('register') }}">{{ __('keywords.sign_up') }}</a></p> <!-- Translated "Don't have an account? Sign Up" -->
                    </form>
                </div>

                <!-- Illustration Section -->
                <div class="col-md-6 d-flex justify-content-center align-items-center p-5">
                    <img src="{{ asset('images/designs/loginpage.svg') }}" alt="{{ __('keywords.login_illustration_alt') }}" class="login-illustration img-fluid"> <!-- Translated alt text -->
                </div>
            </div>
        </div>
    </div>

@endsection
