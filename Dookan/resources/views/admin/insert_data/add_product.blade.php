@extends('admin.layouts.master')
@section('content')
    <section class="section">
        <div class="section-body">
            <h2 class="section-title">{{ __('keywords.hi', ['name' => Auth::user()->name]) }} !</h2>
            <p class="section-lead">
                {{ __('keywords.add_products') }}
            </p>

            <div class="row mt-sm-4">
                <div class="col-12 col-md-12 col-lg-7">
                    <div class="card">
                        <form method="post" action="{{route('admin.products.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-header">
                                <h4>{{ __('keywords.add_product') }}</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-12">
                                        <label>{{ __('keywords.product_name') }}</label>
                                        <input class="form-control" name="name" id="name" placeholder="{{ __('keywords.clear_name_placeholder') }}" required>
                                    </div>
                                    <div class="form-group col-12 col-md-4">
                                        <label for="quantity">{{ __('keywords.quantity') }}</label>
                                        <input type="number" class="form-control" id="quantity" name="quantity" min="1" required>
                                    </div>
                                    <div class="form-group col-12 col-md-4">
                                        <label for="price">{{ __('keywords.price') }}</label>
                                        <input type="number" class="form-control" id="price" name="price" min="1" placeholder="{{ __('keywords.price_placeholder') }}" required>
                                    </div>
                                    <div class="form-group col-12 col-md-4">
                                        <label for="sku">{{ __('keywords.sku') }}</label>
                                        <input type="text" class="form-control" id="sku" name="sku" placeholder="{{ __('keywords.sku_placeholder') }}" required>
                                    </div>

                                    <div class="form-group col-12">
                                        <label for="category">{{ __('keywords.category') }}</label>
                                        <select name="category_id" id="category" class="form-control" required>
                                            <option value="">{{ __('keywords.select_category') }}</option>
                                            @foreach($categories as $category)
                                                <option value="{{ $category['id'] }}">{{ $category['name'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-12">
                                        <label>{{ __('keywords.product_description') }}</label>
                                        <textarea name="description" id="description" class="form-control" rows="4" placeholder="{{ __('keywords.description_placeholder') }}"></textarea>
                                    </div>

                                    <div class="form-group col-12">
                                        <label>{{ __('keywords.images') }}</label>
                                        <input class="form-control" type="file" name="images[]" accept="images/*" multiple required>
                                    </div>

                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-primary">{{ __('keywords.add_product_button') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
