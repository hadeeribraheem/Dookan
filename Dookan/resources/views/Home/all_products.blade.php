@extends('Home.layouts.master')
@section('content')
    <div class="container mt-5">
        <div class="row">
            @if(!(isset($productsResource)))
                <div class="d-flex align-items-center justify-content-center flex-column" style="width: 500px; margin: auto;">
                    <p class="text-center text-info fw-bold">{{ __('keywords.no_products') }}</p>
                    <img src="{{ asset('images/no_data.svg') }}" alt="{{ __('keywords.no_products_image_alt') }}" class="img-fluid ">
                </div>
            @else
                @foreach($productsResource as $product)
                    <!-- product card -->
                    <div class="col-lg-3 col-sm-2 col-12 mb-3">
                        <a href="{{ route('products.show', $product['id']) }}" class="product-card-link">
                            <div class="product-card">
                                <div class="product-image">
                                    <!-- Main image -->
                                    @if(isset($product['image'][0]))
                                        <img src="{{ asset('images/' . $product['image'][0]['name']) }}" class="main-image img-fluid" alt="{{ __('keywords.product_image_alt', ['name' => $product['name']]) }}">
                                    @endif

                                    <!-- Hover image -->
                                    @if(isset($product['image'][1]))
                                        <img src="{{ asset('images/' . $product['image'][1]['name']) }}" class="hover-image img-fluid" alt="{{ __('keywords.product_hover_image_alt', ['name' => $product['name']]) }}">
                                    @endif

                                    <div class="product-icons d-flex flex-column">
                                        <a href="{{ route('products.show', $product['id']) }}" class="icon view" data-bs-toggle="tooltip" data-bs-placement="left" title="{{ __('keywords.show_product', ['name' => $product['name']]) }}">
                                            <i class="fa-solid fa-eye"></i>
                                        </a>

                                        @auth
                                            <form action="{{ route('wishlist.store') }}" method="POST" style="display: inline-block; margin: 0 !important;">
                                                @csrf
                                                <input type="hidden" name="product_id" value="{{ $product['id'] }}">
                                                <button type="submit" class="icon wishlist" data-bs-toggle="tooltip" data-bs-placement="left" title="{{ __('keywords.add_to_wishlist', ['name' => $product['name']]) }}" style=" border: none;">
                                                    <i class="fa-solid fa-heart"></i>
                                                </button>
                                            </form>
                                        @else
                                            <a href="{{ route('login') }}" class="icon wishlist" data-bs-toggle="tooltip" data-bs-placement="left" title="{{ __('keywords.login_to_add_wishlist') }}" style=" border: none;">
                                                <i class="fa-solid fa-heart"></i>
                                            </a>
                                        @endauth

                                        @auth
                                            <form action="{{ route('cart.store') }}" method="POST" style="display: inline-block;">
                                                @csrf
                                                <input type="hidden" name="product_id" value="{{ $product['id'] }}">
                                                <input type="hidden" name="quantity" value="1">
                                                <button type="submit" class="icon" data-bs-toggle="tooltip" data-bs-placement="left" title="{{ __('keywords.add_to_cart', ['name' => $product['name']]) }}" style=" border: none;">
                                                    <i class="fa-solid fa-cart-shopping"></i>
                                                </button>
                                            </form>
                                        @else
                                            <a href="{{ route('login') }}" class="icon" data-bs-toggle="tooltip" data-bs-placement="left" title="{{ __('keywords.login_to_add_cart') }}">
                                                <i class="fa-solid fa-cart-shopping"></i>
                                            </a>
                                        @endauth

                                    </div>
                                </div>
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
        </div>
    </div>
@endsection
