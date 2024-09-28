@extends('seller.layouts.master')
@section('content')
    <section class="section">
        <div class="section-body">
            <h2 class="section-title">{{ __('keywords.hi') }}, {{ Auth::user()->name }}!</h2> <!-- Translated greeting -->
            <p class="section-lead">
                {{ __('keywords.add_your_products') }} <!-- Translated instruction -->
            </p>

            <div class="row mt-sm-4">
                <div class="col-12 col-md-12 col-lg-7">
                    <div class="card">
                        <form method="post" action="{{ route('seller.products.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-header">
                                <h4>{{ __('keywords.add_product') }}</h4> <!-- Translated "Add Product" -->
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-12">
                                        <label>{{ __('keywords.product_name') }}</label> <!-- Translated "Product Name" -->
                                        <input class="form-control" name="name" id="name" placeholder="{{ __('keywords.placeholder_product_name') }}" required>
                                    </div>
                                    <div class="form-group col-12 col-md-4">
                                        <label for="quantity">{{ __('keywords.quantity') }}</label> <!-- Translated "Quantity" -->
                                        <input type="number" class="form-control" id="quantity" name="quantity" min="1" required>
                                    </div>
                                    <div class="form-group col-12 col-md-4">
                                        <label for="price">{{ __('keywords.price') }}</label> <!-- Translated "Price" -->
                                        <input type="number" class="form-control" id="price" name="price" min="1" placeholder="{{ __('keywords.placeholder_price') }}" required>
                                    </div>
                                    <div class="form-group col-12 col-md-4">
                                        <label for="sku">{{ __('keywords.sku') }}</label> <!-- Translated "SKU" -->
                                        <input type="text" class="form-control" id="sku" name="sku" min="1" placeholder="{{ __('keywords.placeholder_sku') }}" required>
                                    </div>

                                    <div class="form-group col-12">
                                        <label for="category">{{ __('keywords.category') }}</label> <!-- Translated "Category" -->
                                        <select name="category_id" id="category" class="form-control" required>
                                            <option value="">{{ __('keywords.select_category') }}</option> <!-- Translated "Select Category" -->
                                            @foreach($categories as $category)
                                                <option value="{{ $category['id'] }}">{{ $category['name'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-12">
                                        <label>{{ __('keywords.product_description') }}</label> <!-- Translated "Product Description" -->
                                        <textarea name="description" id="description" class="form-control" rows="4" placeholder="{{ __('keywords.placeholder_description') }}"></textarea>
                                    </div>

                                    <div class="form-group col-12">
                                        <label>{{ __('keywords.images') }}</label> <!-- Translated "Images" -->
                                        <input class="form-control" type="file" name="images[]" accept="images/*" multiple required>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-primary">{{ __('keywords.add_product') }}</button> <!-- Translated "Add Product" button -->
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
