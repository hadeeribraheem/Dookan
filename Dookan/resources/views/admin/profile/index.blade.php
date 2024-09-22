@extends('admin.layouts.master')
@section('content')

    <section class="section">
        {{--<div class="section-header">
            <h1>Profile</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item">Profile</div>
            </div>
        </div>--}}

        <div class="section-body">
            <h2 class="section-title ">Hi, {{ Auth::user()->name }} !</h2>
            <p class="section-lead">
                Change information about yourself on this page.
            </p>

            <div class="row mt-sm-4">
                <div class="col-12 col-md-12 col-lg-7">
                    <div class="card">
                       {{-- @if(session('success'))
                            <p class="alert alert-success">{{session('success')}}</p>
                        @endif--}}
                        <form method="POST" action="{{route('admin.update.user', Auth::user()->id)}}" enctype="multipart/form-data" class="needs-validation" novalidate="">
                            @csrf
                            @method('PUT')
                            <div class="card-header">
                                <h4>Update Profile</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-12">
                                        <label>Personal Image (leave blank if you don't want to change it)</label>
                                        <input class="form-control" type="file" name="personal_image">

                                        @if(Auth::user()->image)
                                            {{--<p> {{ 'images/'. Auth::user()->image->name }} </p>--}}
                                            <img src="{{ asset('images/'. Auth::user()->image->name) }}" alt="User Image" class="mt-3" style="max-width: 200px;">
                                        @else
                                            <p id="NoImg">No profile image available the default image is set.</p>
                                            <img src="{{ asset('images/default.png') }}" alt="default.png" class="img-fluid rounded-circle" style="width: 150px; height: 150px;">
                                        @endif
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Full Name</label>
                                        <input type="text" class="form-control" value="{{ Auth::user()->name}}"  name="name">
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Username</label>
                                        <input type="text" class="form-control" value="{{ Auth::user()->username }}"  name="username">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-7 col-12">
                                        <label>Email</label>
                                        <input type="email" class="form-control" value="{{ Auth::user()->email }}"  name="email">
                                        <div class="invalid-feedback">
                                            Please fill in the email
                                        </div>
                                    </div>
                                    <div class="form-group col-md-5 col-12">
                                        <label>Phone</label>
                                        <input type="tel" class="form-control" value="{{ Auth::user()->phone }}" name="phone">
                                    </div>
                                    <div class="form-group col-12">
                                        <label>Password <span style="font-size: 0.9em; color: gray; font-style: italic;">leave blank if you don't want to change it</span></label>
                                        <input class="form-control" type="password" name="password">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary ms-auto">Save Changes</button>
                            </div>
                        </form>
                       {{-- <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
                                Dropdown
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                <li><button class="dropdown-item" type="button">Action</button></li>
                                <li><button class="dropdown-item" type="button">Another action</button></li>
                                <li><button class="dropdown-item" type="button">Something else here</button></li>
                            </ul>
                        </div>--}}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
