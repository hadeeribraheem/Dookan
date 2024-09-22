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
                        <form method="POST" action="{{ route('admin.products.update', $product['id']) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-header">
                                <h4>Edit Product</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-12">
                                        <label>Product Name</label>
                                        <input class="form-control" name="name" id="name" placeholder="use more clear name" value="{{$product['name']}}" required>
                                    </div>
                                    <div class="form-group col-12 col-md-4">
                                        <label for="quantity">Quantity</label>
                                        <input type="number" class="form-control" id="quantity" name="quantity" min="1" value="{{$product['quantity']}}" required>
                                    </div>
                                    <div class="form-group col-12 col-md-4">
                                        <label for="price">Price</label>
                                        <input type="number" class="form-control" id="price" name="price" min="1" placeholder="xx $" value="{{$product['price']}}" required>
                                    </div>
                                    <div class="form-group col-12 col-md-4">
                                        <label for="price">SKU</label>
                                        <input type="text" class="form-control" id="sku" name="sku" min="1" placeholder="xxx-x" value="{{$product['sku']}}" required>
                                    </div>

                                    <div class="form-group col-12">
                                        <label for="category">Category</label>
                                        <select name="category_id" id="category" class="form-control" required>
                                            <option value="">Select Category</option>
                                            @foreach($categories as $category)
{{--                                                @if($product['category_name'] == $category['name'])
                                                    <option value="{{ $category['id'] }}" selected>{{ $category['name'] }}</option>
                                                @endif--}}
                                                <option value="{{ $category['id'] }}" {{ $product['category_name'] == $category['name'] ? 'selected' : '' }}>{{ $category['name'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-12">
                                        <label>Product Description</label>
                                        <textarea  name="description" id="description" type="text" class="form-control" rows="4" placeholder="this is a description for this product to help user knew about it more ">{{ $product['description'] }}</textarea>
                                    </div>

                                    <div class="form-group col-12">
                                        <label>Images</label>
                                        <span style="font-size: 0.9em; color: gray; font-style: italic;">leave blank if you don't want to change it</span>
                                        <input class="form-control" type="file" name="images[]" accept="images/*" multiple>
                                    </div>
                                    @if(!empty($product['image']))
                                        <div class="form-group col-12">
                                            <label class="h2">Current Images:</label>
                                            <div class="row d-flex">
                                                @foreach($product['image'] as $image)
                                                    @foreach ($image as $img)
                                                        <div class="col-md-3 d-flex position-relative delete-image justify-content-center ms-3">
                                                            <a href="/delete-item?model_name=Images&id={{ $img['id'] }}" class="btn btn-sm deleted-img"> <i class="bi bi-x-square-fill text-danger"></i></a>

                                                            {{-- <form action="{{ route('admin.delete.item') }}" method="POST" style=" position: relative; /*display:inline-block;*/" >
                                                                 @csrf
                                                                 <input type="hidden" name="id" value="{{ $img['id'] }}">
                                                                 <input type="hidden" name="model_name" value="Images">
                                                                 <button type="submit" class="btn btn-sm deleted-img">
                                                                     <i class="bi bi-x-square-fill text-danger"></i>
                                                                 </button>
                                                             </form>--}}
                                                            <img src="{{ asset('images/'.$img['name']) }}" alt="Product Image" class="img-fluid align-items-center mb-3" style="max-width: 100%; max-height: 149px; margin-right: 10px;">
                                                        </div>
                                                    @endforeach
                                                @endforeach
                                            </div>
                                        </div>
                                    @else
                                        <p id="NoImg">No images available, please add some images.</p>
                                    @endif
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-primary">Edit Product</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-5">
                    {{--<div class="icon_box">
                        <i class="{{ $category['icon'] }}"></i>
                        <h3>{{  $category['name']  }}</h3>
                        <p>{{ $category['description'] }}</p>
                    </div>--}}
                </div>
            </div>
        </div>
    </section>
@endsection
