@extends('seller.layouts.master')
@section('content')
    <section class="section">
        <div class="section-body">
            <h2 class="section-title">{{ __('keywords.hi') }}, {{ Auth::user()->name }}!</h2> <!-- Translated greeting -->
            <p class="section-lead">
                {{ __('keywords.categorize_products') }} <!-- Translated instruction -->
            </p>

            <div class="row mt-sm-4">
                <div class="col-12 col-md-12 col-lg-7">
                    <div class="card">
                        <form method="POST" action="{{ route('seller.products.update', $product['id']) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-header">
                                <h4>{{ __('keywords.edit_product') }}</h4> <!-- Translated "Edit Product" -->
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-12">
                                        <label>{{ __('keywords.product_name') }}</label> <!-- Translated "Product Name" -->
                                        <input class="form-control" name="name" id="name" placeholder="{{ __('keywords.placeholder_product_name') }}" value="{{ $product['name'] }}" required>
                                    </div>
                                    <div class="form-group col-12 col-md-4">
                                        <label for="quantity">{{ __('keywords.quantity') }}</label> <!-- Translated "Quantity" -->
                                        <input type="number" class="form-control" id="quantity" name="quantity" min="1" value="{{ $product['quantity'] }}" required>
                                    </div>
                                    <div class="form-group col-12 col-md-4">
                                        <label for="price">{{ __('keywords.price') }}</label> <!-- Translated "Price" -->
                                        <input type="number" class="form-control" id="price" name="price" min="1" placeholder="{{ __('keywords.placeholder_price') }}" value="{{ $product['price'] }}" required>
                                    </div>
                                    <div class="form-group col-12 col-md-4">
                                        <label for="sku">{{ __('keywords.sku') }}</label> <!-- Translated "SKU" -->
                                        <input type="text" class="form-control" id="sku" name="sku" min="1" placeholder="{{ __('keywords.placeholder_sku') }}" value="{{ $product['sku'] }}" required>
                                    </div>

                                    <div class="form-group col-12">
                                        <label for="category">{{ __('keywords.category') }}</label> <!-- Translated "Category" -->
                                        <select name="category_id" id="category" class="form-control" required>
                                            <option value="">{{ __('keywords.select_category') }}</option> <!-- Translated "Select Category" -->
                                            @foreach($categories as $category)
                                                <option value="{{ $category['id'] }}" {{ $product['category_name'] == $category['name'] ? 'selected' : '' }}>{{ $category['name'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-12">
                                        <label>{{ __('keywords.product_description') }}</label> <!-- Translated "Product Description" -->
                                        <textarea name="description" id="description" class="form-control" rows="4" placeholder="{{ __('keywords.placeholder_description') }}">{{ $product['description'] }}</textarea>
                                    </div>

                                    <div class="form-group col-12">
                                        <label>{{ __('keywords.images') }}</label> <!-- Translated "Images" -->
                                        <span style="font-size: 0.9em; color: gray; font-style: italic;">{{ __('keywords.leave_blank') }}</span> <!-- Translated "Leave blank if you don't want to change it" -->
                                        <input class="form-control" type="file" name="images[]" accept="images/*" multiple>
                                    </div>

                                    @if(!empty($product['image']))
                                        <div class="form-group col-12">
                                            <label class="h2">{{ __('keywords.current_images') }}</label> <!-- Translated "Current Images" -->
                                            <div class="row d-flex">
                                                @foreach($product['image'] as $image)
                                                    @foreach ($image as $img)
                                                        <div class="col-md-3 d-flex position-relative delete-image justify-content-center ms-3">
                                                            <a href="/delete-item?model_name=Images&id={{ $img['id'] }}" class="btn btn-sm deleted-img"> <i class="bi bi-x-square-fill text-danger"></i></a>
                                                            <img src="{{ asset('images/'.$img['name']) }}" alt="{{ __('keywords.product_image_alt') }}" class="img-fluid align-items-center mb-3" style="max-width: 100%; max-height: 149px; margin-right: 10px;">
                                                        </div>
                                                    @endforeach
                                                @endforeach
                                            </div>
                                        </div>
                                    @else
                                        <p id="NoImg">{{ __('keywords.no_images_available') }}</p> <!-- Translated "No images available" -->
                                    @endif
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-primary">{{ __('keywords.edit_product') }}</button> <!-- Translated "Edit Product" -->
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
