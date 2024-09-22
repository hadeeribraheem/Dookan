@extends('admin.layouts.master')
@section('content')
    <section class="section">
        <div class="section-body">
            <h2 class="section-title">Hi, {{ Auth::user()->name }} !</h2>
            <p class="section-lead">
                Easily edit user data here.
                <span style="font-size: 0.9em; font-weight: bold; font-style: italic;">leave sections blank if you don't want to change it</span>
            </p>

            <div class="row mt-sm-4">
                <div class="col-12 col-md-12 col-lg-7">
                    <div class="card">
                        <form method="post" action="{{route('admin.users.update',$user['id'])}}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-header">
                                <h4>Edit User </h4>
                            </div>
                            <div class="card-body">

                                <div class="row">
                                    <div class="form-group col-12 col-md-6">
                                        <label>User Name</label>
                                        <input class="form-control" name="name" id="name" placeholder="full user name" value="{{ $user['name'] }}" required>
                                    </div>
                                    <div class="form-group col-12 col-md-6">
                                        <label>Username</label>
                                        <input class="form-control" name="username" id="username" placeholder="username" value="{{ $user['username'] }}" required>
                                    </div>

                                    <div class="form-group col-12 col-md-4">
                                        <label for="email">Email Address</label>
                                        <input type="email" class="form-control" id="email" name="email"  placeholder="you@example.com" value="{{ $user['email'] }}" required>
                                    </div>
                                    <div class="form-group col-12 col-md-4">
                                        <label for="phone">Phone Number</label>
                                        <input type="tel" class="form-control" id="phone" placeholder="Your Phone Number" name="phone" value="{{ $user['phone'] }}" required>
                                    </div>
                                    <div class="form-group col-12 col-md-4">
                                        <label>Password</label>
                                        <input type="password" class="form-control" id="password" name="password"  placeholder="Enter 6 characters or more" >
                                    </div>

                                    <div class="form-group col-12 col-md-6">
                                        <label>User Roles</label>
                                        <select name="role" id="role" class="form-control" required>
                                            <option value="">Select Roles</option>
                                            @foreach($roles as $role)
                                                <option value="{{ $role }}" {{$role == $user['role']? 'selected' : '' }}>{{ $role }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-12 col-md-6">
                                        <label>User Profile Status</label>
                                        <select name="status" id="status" class="form-control" required>
                                            <option value="">Select Status</option>
                                            @foreach($statuses as $status)
                                                <option value="{{$status}}" {{$status === $user['status']? 'selected' : '' }}>{{ $status }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-12">
                                        <label>Images</label>
                                        <input class="form-control" type="file" name="personal_image">
                                        @if($user['image'])
                                            {{--<p> {{ 'images/'. Auth::user()->image->name }} </p>--}}
                                            <img src="{{ asset('images/'.$user['image']['name']) }}" alt="User Image" class="mt-3" style="max-width: 200px;">
                                        @else
                                            <p id="NoImg">No profile image available the default image is set.</p>
                                            <img src="{{ asset('images/default.png') }}" alt="default.png" class="img-fluid rounded-circle" style="width: 150px; height: 150px;">
                                        @endif
                                    </div>

                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-primary">Edit User</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
