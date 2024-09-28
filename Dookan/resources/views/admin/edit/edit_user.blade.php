@extends('admin.layouts.master')
@section('content')
    <section class="section">
        <div class="section-body">
            <h2 class="section-title">{{ __('keywords.hi') }}, {{ Auth::user()->name }}!</h2>
            <p class="section-lead">
                {{ __('keywords.edit_user_data') }}
                <span style="font-size: 0.9em; font-weight: bold; font-style: italic;">{{ __('keywords.leave_sections_blank') }}</span>
            </p>

            <div class="row mt-sm-4">
                <div class="col-12 col-md-12 col-lg-7">
                    <div class="card">
                        <form method="post" action="{{ route('admin.users.update', $user['id']) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-header">
                                <h4>{{ __('keywords.edit_user') }}</h4>
                            </div>
                            <div class="card-body">

                                <div class="row">
                                    <div class="form-group col-12 col-md-6">
                                        <label>{{ __('keywords.user_name') }}</label>
                                        <input class="form-control" name="name" id="name" placeholder="{{ __('keywords.full_user_name') }}" value="{{ $user['name'] }}" required>
                                    </div>
                                    <div class="form-group col-12 col-md-6">
                                        <label>{{ __('keywords.username') }}</label>
                                        <input class="form-control" name="username" id="username" placeholder="{{ __('keywords.username') }}" value="{{ $user['username'] }}" required>
                                    </div>

                                    <div class="form-group col-12 col-md-4">
                                        <label for="email">{{ __('keywords.email_address') }}</label>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="{{ __('keywords.example_email') }}" value="{{ $user['email'] }}" required>
                                    </div>
                                    <div class="form-group col-12 col-md-4">
                                        <label for="phone">{{ __('keywords.phone_number') }}</label>
                                        <input type="tel" class="form-control" id="phone" placeholder="{{ __('keywords.phone_number_placeholder') }}" name="phone" value="{{ $user['phone'] }}" required>
                                    </div>
                                    <div class="form-group col-12 col-md-4">
                                        <label>{{ __('keywords.password') }}</label>
                                        <input type="password" class="form-control" id="password" name="password" placeholder="{{ __('keywords.password_placeholder') }}">
                                    </div>

                                    <div class="form-group col-12 col-md-6">
                                        <label>{{ __('keywords.user_roles') }}</label>
                                        <select name="role" id="role" class="form-control" required>
                                            <option value="">{{ __('keywords.select_roles') }}</option>
                                            @foreach($roles as $role)
                                                <option value="{{ $role }}" {{ $role == $user['role'] ? 'selected' : '' }}>{{ $role }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-12 col-md-6">
                                        <label>{{ __('keywords.user_profile_status') }}</label>
                                        <select name="status" id="status" class="form-control" required>
                                            <option value="">{{ __('keywords.select_status') }}</option>
                                            @foreach($statuses as $status)
                                                <option value="{{ $status }}" {{ $status == $user['status'] ? 'selected' : '' }}>{{ $status }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-12">
                                        <label>{{ __('keywords.images') }}</label>
                                        <input class="form-control" type="file" name="personal_image">
                                        @if($user['image'])
                                            <img src="{{ asset('images/'.$user['image']['name']) }}" alt="{{ __('keywords.user_image') }}" class="mt-3" style="max-width: 200px;">
                                        @else
                                            <p id="NoImg">{{ __('keywords.no_profile_image') }}</p>
                                            <img src="{{ asset('images/default.png') }}" alt="{{ __('keywords.default_image') }}" class="img-fluid rounded-circle" style="width: 150px; height: 150px;">
                                        @endif
                                    </div>

                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-primary">{{ __('keywords.edit_user') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
