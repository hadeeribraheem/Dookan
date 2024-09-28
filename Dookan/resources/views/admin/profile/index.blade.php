@extends('admin.layouts.master')
@section('content')

    <section class="section">
        <div class="section-body">
            <h2 class="section-title ">{{ __('keywords.hi') }}, {{ Auth::user()->name }}!</h2>
            <p class="section-lead">
                {{ __('keywords.change_info') }}
            </p>

            <div class="row mt-sm-4">
                <div class="col-12 col-md-12 col-lg-7">
                    <div class="card">
                        <form method="POST" action="{{route('admin.update.user', Auth::user()->id)}}" enctype="multipart/form-data" class="needs-validation" novalidate="">
                            @csrf
                            @method('PUT')
                            <div class="card-header">
                                <h4>{{ __('keywords.update_profile') }}</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-12">
                                        <label>{{ __('keywords.personal_image') }}</label>
                                        <input class="form-control" type="file" name="personal_image">

                                        @if(Auth::user()->image)
                                            <img src="{{ asset('images/'. Auth::user()->image->name) }}" alt="User Image" class="mt-3" style="max-width: 200px;">
                                        @else
                                            <p id="NoImg">{{ __('keywords.no_profile_image') }}</p>
                                            <img src="{{ asset('images/default.png') }}" alt="default.png" class="img-fluid rounded-circle" style="width: 150px; height: 150px;">
                                        @endif
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>{{ __('keywords.full_name') }}</label>
                                        <input type="text" class="form-control" value="{{ Auth::user()->name}}"  name="name">
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>{{ __('keywords.username') }}</label>
                                        <input type="text" class="form-control" value="{{ Auth::user()->username }}"  name="username">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-7 col-12">
                                        <label>{{ __('keywords.email') }}</label>
                                        <input type="email" class="form-control" value="{{ Auth::user()->email }}"  name="email">
                                        <div class="invalid-feedback">
                                            {{ __('keywords.fill_in_email') }}
                                        </div>
                                    </div>
                                    <div class="form-group col-md-5 col-12">
                                        <label>{{ __('keywords.phone') }}</label>
                                        <input type="tel" class="form-control" value="{{ Auth::user()->phone }}" name="phone">
                                    </div>
                                    <div class="form-group col-12">
                                        <label>{{ __('keywords.password') }} <span style="font-size: 0.9em; color: gray; font-style: italic;">{{ __('keywords.leave_blank_password') }}</span></label>
                                        <input class="form-control" type="password" name="password">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary ms-auto">{{ __('keywords.save_changes') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
