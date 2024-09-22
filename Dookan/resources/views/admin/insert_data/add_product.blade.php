@extends('admin.layouts.master')
@section('content')
    <section class="section">
        <div class="section-body">
            <h2 class="section-title">Hi, {{ Auth::user()->name }} !</h2>
            <p class="section-lead">
                Easily add your products here.
            </p>

            <div class="row mt-sm-4">
                <div class="col-12 col-md-12 col-lg-7">
                    <div class="card">
                        <form method="post" action="{{route('admin.products.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-header">
                                <h4>Add Product</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-12">
                                        <label>Product Name</label>
                                        <input class="form-control" name="name" id="name" placeholder="use more clear name" required>
                                    </div>
                                    <div class="form-group col-12 col-md-4">
                                        <label for="quantity">Quantity</label>
                                        <input type="number" class="form-control" id="quantity" name="quantity" min="1" required>
                                    </div>
                                    <div class="form-group col-12 col-md-4">
                                        <label for="price">Price</label>
                                        <input type="number" class="form-control" id="price" name="price" min="1" placeholder="xx $" required>
                                    </div>
                                    <div class="form-group col-12 col-md-4">
                                        <label for="price">SKU</label>
                                        <input type="text" class="form-control" id="sku" name="sku" min="1" placeholder="xxx-x" required>
                                    </div>

                                    <div class="form-group col-12">
                                        <label for="category">Category</label>
                                        <select name="category_id" id="category" class="form-control" required>
                                            <option value="">Select Category</option>
                                            @foreach($categories as $category)
                                                <option value="{{ $category['id'] }}">{{ $category['name'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-12">
                                        <label>Product Description</label>
                                        <textarea  name="description" id="description" type="text" class="form-control" rows="4" placeholder="this is a description for this product to help user knew about it more "></textarea>
                                    </div>

                                    <div class="form-group col-12">
                                        <label>Images</label>
                                        <input class="form-control" type="file" name="images[]" accept="images/*" multiple required>
                                    </div>

                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-primary">Add Product</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
