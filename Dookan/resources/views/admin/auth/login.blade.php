@extends('admin.auth.auth_layout')
@section('content')
    <div class="login">
        <div class="container">

            <div class="card login-card">
                <a href="?lang={{ app()->getLocale() === 'ar' ? 'en' : 'ar' }}">
                    <button type="button" class="lang-btn">
                        {{ app()->getLocale() === 'ar' ? __('keywords.english') : __('keywords.arabic') }}
                    </button>
                </a>
                <div class="login-logo d-flex justify-content-center align-items-center">
                    <i class="bi bi-bag-check-fill"></i>

                </div>
                <h2 class="text-center">{{ __('keywords.login_page') }}</h2>
                <form method="post" action="{{ route('admin.auth.login') }}" enctype="multipart/form-data" class="admin-login">
                    @csrf
                    @if (Session::has('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                        </div>
                    @endif
                    <div class="mb-3">
                        <label class="form-label">{{ __('keywords.email') }}</label>
                        <input class="form-control" name="email"
                               value="{{ old('email') }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">{{ __('keywords.password') }}</label>
                        <input class="form-control" name="password" type="password">
                    </div>
                    @if ($errors->has('error'))
                        <div>
                            <p class="alert alert-danger mt-2">{{ $errors->first('error') }}</p>
                        </div>
                    @endif
                    <button type="submit" class="btn btn-primary">{{ __('keywords.submit') }}</button>
                </form>
            </div>
        </div>
    </div>
@endsection
