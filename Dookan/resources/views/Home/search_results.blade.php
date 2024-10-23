@extends('Home.layouts.master')

@section('content')
    <div class="container mt-5">
        <div class="row">
            @if(!empty($products))
                <div class="category-header mb-4 mt-4">
                    <h1>{{ __('keywords.our_products') }}</h1>
                    <hr><br>
                </div>
                {{-- Products --}}
                @foreach($products as $product)
                    <div class="col-lg-3 col-sm-2 col-12 mb-3">
                        <a href="{{ route('products.show', ['product' => $product['id'], 'lang' => app()->getLocale()]) }}" class="product-card-link">
                            <div class="product-card">
                                <div class="product-image">
                                    {{-- Main Image --}}
                                    @if(isset($product['image'][0]))
                                        <img src="{{ asset('images/' . $product['image'][0]['name']) }}" class="main-image img-fluid" alt="{{ __('keywords.product_image_alt', ['name' => $product['name']]) }}">
                                    @endif

                                    {{-- Hover Image --}}
                                    @if(isset($product['image'][1]))
                                        <img src="{{ asset('images/' . $product['image'][1]['name']) }}" class="hover-image img-fluid" alt="{{ __('keywords.product_hover_image_alt', ['name' => $product['name']]) }}">
                                    @endif

                                    {{-- Action Icons --}}
                                    <div class="product-icons d-flex flex-column">
                                        <a href="{{ route('products.show', ['product' => $product['id'], 'lang' => app()->getLocale()]) }}" class="icon view" data-bs-toggle="tooltip" data-bs-placement="left" title="{{ __('keywords.show_product', ['name' => $product['name']]) }}">
                                            <i class="fa-solid fa-eye"></i>
                                        </a>

                                        {{-- Wishlist Icon --}}
                                        @auth
                                            <form action="{{ route('wishlist.store', ['lang' => app()->getLocale()]) }}" method="POST" style="display: inline-block; margin: 0 !important;">
                                                @csrf
                                                <input type="hidden" name="product_id" value="{{ $product['id'] }}">
                                                <button type="submit" class="icon wishlist" data-bs-toggle="tooltip" data-bs-placement="left" title="{{ __('keywords.add_to_wishlist', ['name' => $product['name']]) }}" style="border: none;">
                                                    <i class="fa-solid fa-heart"></i>
                                                </button>
                                            </form>
                                        @else
                                            <a href="{{ route('login', ['lang' => app()->getLocale()]) }}" class="icon wishlist" data-bs-toggle="tooltip" data-bs-placement="left" title="{{ __('keywords.login_to_add_wishlist') }}" style="border: none;">
                                                <i class="fa-solid fa-heart"></i>
                                            </a>
                                        @endauth

                                        {{-- Cart Icon --}}
                                        @auth
                                            <form action="{{ route('cart.store') }}" method="POST" style="display: inline-block;">
                                                @csrf
                                                <input type="hidden" name="product_id" value="{{ $product['id'] }}">
                                                <input type="hidden" name="quantity" value="1">
                                                <button type="submit" class="icon" data-bs-toggle="tooltip" data-bs-placement="left" title="{{ __('keywords.add_to_cart', ['name' => $product['name']]) }}" style="border: none;">
                                                    <i class="fa-solid fa-cart-shopping"></i>
                                                </button>
                                            </form>
                                        @else
                                            <a href="{{ route('login', ['lang' => app()->getLocale()]) }}" class="icon" data-bs-toggle="tooltip" data-bs-placement="left" title="{{ __('keywords.login_to_add_cart') }}">
                                                <i class="fa-solid fa-cart-shopping"></i>
                                            </a>
                                        @endauth
                                    </div>
                                </div>

                                {{-- Product Info --}}
                                <div class="product-info">
                                    <h5 class="product-category">{{ $product['category_name'] }}</h5>
                                    <h4 class="product-title">{{ $product['name'] }}</h4>
                                    <p class="product-price">{{ $product['price'] }} $</p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            @endif

            @if(!empty($categories))
                    <div class="category-header mb-4 mt-4">
                        <h1>{{ __('keywords.our_categories') }}</h1>
                        <hr><br>
                    </div>
                    @foreach($categories as $category)
                        <div class="col-lg-4 mb-3">
                            <a href="{{ route('categoriesdata.show', ['categoriesdatum' => $category['id'], 'lang' => app()->getLocale()]) }}" class="product-card-link">
                                <div class="icon_box">
                                    <i class="{{ $category['icon'] }}"></i>
                                    <h3>{{ $category['name'] }}</h3>
                                    <p>{{ $category['description'] }}</p>
                                </div>
                            </a>
                        </div>
                    @endforeach
            @endif

            @if($sellers->isNotEmpty())
                <div class="vendor-header mb-4 mt-4">
                    <h1>{{ __('keywords.our_vendors') }}</h1>
                    <hr><br>
                </div>

                <div class="row">
                    @foreach ($sellers as $vendor)
                            <div class="col-lg-3 col-sm-12 mb-3 ">
                                <a href="{{ route('vendor.show',['vendorID'=>$vendor->id, 'lang' => app()->getLocale()]) }}">
                                    <div class="card vendor-card ">
                                        @if($vendor['image'])
                                            <img src="{{ asset('images/'. $vendor['image']['name']) }}" alt="User Image" class="rounded-circle " >
                                        @endif
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $vendor['name'] }}</h5>

                                            <p><i class="fa fa-phone"></i> {{ $vendor->phone }}</p>
                                            <p><i class="fa fa-envelope"></i> {{ $vendor->email }}</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                </div>
            @endif

            {{-- Check if all are empty --}}
            @if(empty($products) && empty($categories) && $sellers->isEmpty())
                <div class="d-flex align-items-center justify-content-center flex-column" style="width: 500px; margin: auto;">
                    <p class="text-center text-info fw-bold">{{ __('keywords.no_products') }}</p>
                    <img src="{{ asset('images/no_data.svg') }}" alt="{{ __('keywords.no_products_image_alt') }}" class="img-fluid">
                </div>
            @endif
        </div>
    </div>
@endsection
