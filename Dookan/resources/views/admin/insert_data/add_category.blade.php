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
                        <form method="post" action="{{route('admin.categories.store')}}" class="needs-validation" novalidate="">
                            @csrf
                            <div class="card-header">
                                <h4>Add Category</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-12">
                                        <label>Category Name:</label>
                                        <input class="form-control" name="name" id="name">
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Select an Icon:</label>
                                        <select id="icon-dropdown" class="select2-icons" style="width: 100px;" name="icon">
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Category Description:</label>
                                        <textarea  name="description" id="description" type="text" class="form-control" rows="4"></textarea>
                                        <div class="invalid-feedback">
                                            Please fill in the description.
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-primary">Add Category</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
