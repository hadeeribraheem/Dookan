@extends('admin.layouts.master')
@section('content')
    <section class="section">
        <div class="section-body">
            <h2 class="section-title">Hi, {{ Auth::user()->name }} !</h2>
            <p class="section-lead">
                Easily categorize your products here.
            </p>

            <div class="row mt-sm-4">
                <div class="col-12 col-md-12 col-lg-7">
                    <div class="card">
                        <form method="POST" action="{{ route('admin.categories.update', $category['id']) }}" class="needs-validation" novalidate>
                            @csrf
                            @method('PUT')
                            <div class="card-header">
                                <h4>Edit Category</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-12">
                                        <label>Category Name:</label>
                                        <input class="form-control" name="name" id="name" value="{{$category['name'] }}">
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Select an Icon:</label>

                                        <select id="icon-dropdown" class="select2-icons" style="width: 100px;" name="icon">
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Category Description:</label>
                                        <textarea  name="description" id="description" type="text" class="form-control" rows="4">{{ $category['description'] }}</textarea>
                                    </div>

                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-primary">Edit Category</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="icon_box">
                        <i class="{{ $category['icon'] }}"></i>
                        <h3>{{  $category['name']  }}</h3>
                        <p>{{ $category['description'] }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
