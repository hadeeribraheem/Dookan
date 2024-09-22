@extends('admin.layouts.master')
@section('content')
    <section class="section">
        <div class="section-body">
            <h2 class="section-title">Hi, {{ Auth::user()->name }} !</h2>
            <p class="section-lead">
                Easily add new users here.
            </p>

            <div class="row mt-sm-4">
                <div class="col-12 col-md-12 col-lg-7">
                    <div class="card">
                        <form method="post" action="{{route('admin.users.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-header">
                                <h4>Add User</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-12 col-md-6">
                                        <label>User Name</label>
                                        <input class="form-control" name="name" id="name" placeholder="full user name" value="{{ old('name') }}" required>
                                    </div>
                                    <div class="form-group col-12 col-md-6">
                                        <label>Username</label>
                                        <input class="form-control" name="username" id="username" placeholder="username" value="{{ old('username') }}" required>
                                    </div>

                                    <div class="form-group col-12 col-md-4">
                                        <label for="email">Email Address</label>
                                        <input type="email" class="form-control" id="email" name="email"  placeholder="you@example.com" value="{{ old('email') }}" required>
                                    </div>
                                    <div class="form-group col-12 col-md-4">
                                        <label for="phone">Phone Number</label>
                                        <input type="tel" class="form-control" id="phone" placeholder="Your Phone Number" name="phone" value="{{ old('phone') }}" required>
                                    </div>
                                    <div class="form-group col-12 col-md-4">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control" id="password" name="password"  placeholder="Enter 6 characters or more" required>
                                    </div>

                                    <div class="form-group col-12 col-md-6">
                                        <label>User Roles</label>
                                        <select name="role" id="role" class="form-control" required>
                                            <option value="">Select Roles</option>
                                            @foreach($roles as $role)
                                                <option value="{{ $role }}">{{ $role }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-12 col-md-6">
                                        <label>User Profile Status</label>
                                        <select name="status" id="status" class="form-control" required>
                                            <option value="">Select Status</option>
                                            @foreach($statuses as $status)
                                                <option value="{{$status}}">{{ $status }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-12">
                                        <label>Images</label>
                                        <input class="form-control" type="file" name="image">
                                    </div>

                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-primary">Add User</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
