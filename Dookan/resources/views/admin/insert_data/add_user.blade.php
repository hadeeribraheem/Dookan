@extends('admin.layouts.master')
@section('content')
    <section class="section">
        <div class="section-body">
            <h2 class="section-title">{{ __('keywords.hi', ['name' => Auth::user()->name]) }} !</h2>
            <p class="section-lead">
                {{ __('keywords.add_users') }}
            </p>

            <div class="row mt-sm-4">
                <div class="col-12 col-md-12 col-lg-7">
                    <div class="card">
                        <form method="post" action="{{route('admin.users.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-header">
                                <h4>{{ __('keywords.add_user') }}</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-12 col-md-6">
                                        <label>{{ __('keywords.user_name') }}</label>
                                        <input class="form-control" name="name" id="name" placeholder="{{ __('keywords.user_name_placeholder') }}" value="{{ old('name') }}" required>
                                    </div>
                                    <div class="form-group col-12 col-md-6">
                                        <label>{{ __('keywords.username') }}</label>
                                        <input class="form-control" name="username" id="username" placeholder="{{ __('keywords.username_placeholder') }}" value="{{ old('username') }}" required>
                                    </div>

                                    <div class="form-group col-12 col-md-4">
                                        <label for="email">{{ __('keywords.email_address') }}</label>
                                        <input type="email" class="form-control" id="email" name="email"  placeholder="{{ __('keywords.email_placeholder') }}" value="{{ old('email') }}" required>
                                    </div>
                                    <div class="form-group col-12 col-md-4">
                                        <label for="phone">{{ __('keywords.phone_number') }}</label>
                                        <input type="tel" class="form-control" id="phone" placeholder="{{ __('keywords.phone_placeholder') }}" name="phone" value="{{ old('phone') }}" required>
                                    </div>
                                    <div class="form-group col-12 col-md-4">
                                        <label for="password">{{ __('keywords.password') }}</label>
                                        <input type="password" class="form-control" id="password" name="password"  placeholder="{{ __('keywords.password_placeholder') }}" required>
                                    </div>

                                    <div class="form-group col-12 col-md-6">
                                        <label>{{ __('keywords.user_roles') }}</label>
                                        <select name="role" id="role" class="form-control" required>
                                            <option value="">{{ __('keywords.select_roles') }}</option>
                                            @foreach($roles as $role)
                                                <option value="{{ $role }}">{{ $role }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-12 col-md-6">
                                        <label>{{ __('keywords.user_status') }}</label>
                                        <select name="status" id="status" class="form-control" required>
                                            <option value="">{{ __('keywords.select_status') }}</option>
                                            @foreach($statuses as $status)
                                                <option value="{{$status}}">{{ $status }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-12">
                                        <label>{{ __('keywords.images') }}</label>
                                        <input class="form-control" type="file" name="image">
                                    </div>

                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-primary">{{ __('keywords.add_user_button') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
