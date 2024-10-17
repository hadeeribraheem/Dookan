@php
    use App\Actions\DisplayDataWithCurrentLang;
@endphp
@extends('Home.layouts.master')
@section('content')
    <div class="container mt-5">
        <div class="row">
            @if(!(isset($category)))
                <div class="d-flex align-items-center justify-content-center flex-column" style="width: 500px; margin: auto;">
                    <p class="text-center text-info fw-bold">{{ __('keywords.no_products') }}</p>
                    <img src="{{ asset('images/no_data.svg') }}" alt="{{ __('keywords.no_products_image_alt') }}" class="img-fluid">
                </div>
            @else
                <div class="category-header mb-4">
                    <h1>{{ $category['name'] }}</h1>
                    <p class="ms-3 ">{{ $category['description'] }}</p><hr><br>
                </div>

                <div class="row">
                    @if($category['products']->isEmpty())
                        <div class="d-flex align-items-center justify-content-center flex-column" style="width: 500px; margin: auto;">
                            <p class="text-center text-info fw-bold">{{ __('keywords.no_products') }}</p>
                            <img src="{{ asset('images/no_data.svg') }}" alt="{{ __('keywords.no_products_image_alt') }}" class="img-fluid">
                        </div>
                    @else
                        @foreach($category['products'] as $product)
                            <div class="col-lg-3 col-md-4 col-sm-6 col-12 mb-4">
                                <div class="card product-card">
                                    <a href="{{ route('products.show' ,['product'=>$product['id'],'lang' => app()->getLocale()]) }}" class="product-card-link">
                                        <div class="product-card">
                                            <div class="product-image">
                                                <!-- Main image -->
                                                {{--<p>{{$product['images'][0]}}</p>--}}
                                                @if(isset($product['images'][0]))
                                                    <img src="{{ asset('images/' . $product['images'][0]['name']) }}" class="main-image img-fluid" alt="{{ __('keywords.product_image_alt', ['name' =>  DisplayDataWithCurrentLang::display($product['name']) ]) }}">
                                                @endif

                                                <!-- Hover image -->
                                                @if(isset($product['images'][1]))
                                                    <img src="{{ asset('images/' . $product['images'][1]['name']) }}" class="hover-image img-fluid" alt="{{ __('keywords.product_hover_image_alt', ['name' => DisplayDataWithCurrentLang::display($product['name'])]) }}">
                                                @endif

                                                <div class="product-icons d-flex flex-column">
                                                    <a href="{{ route('products.show', $product['id'], ['lang' => app()->getLocale()]) }}" class="icon view" data-bs-toggle="tooltip" data-bs-placement="left" title="{{ __('keywords.show_product', ['name' => DisplayDataWithCurrentLang::display($product['name']) ]) }}">
                                                        <i class="fa-solid fa-eye"></i>
                                                    </a>

                                                    @auth
                                                        <form action="{{ route('wishlist.store') }}" method="POST" style="display: inline-block; margin: 0 !important;">
                                                            @csrf
                                                            <input type="hidden" name="product_id" value="{{ $product['id'] }}">
                                                            <button type="submit" class="icon wishlist" data-bs-toggle="tooltip" data-bs-placement="left" title="{{ __('keywords.add_to_wishlist', ['name' => DisplayDataWithCurrentLang::display($product['name']) ]) }}" style=" border: none;">
                                                                <i class="fa-solid fa-heart"></i>
                                                            </button>
                                                        </form>
                                                    @else
                                                        <a href="{{ route('login', ['lang' => app()->getLocale()]) }}" class="icon wishlist" data-bs-toggle="tooltip" data-bs-placement="left" title="{{ __('keywords.login_to_add_wishlist') }}" style=" border: none;">
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
                                                        <a href="{{ route('login', ['lang' => app()->getLocale()]) }}" class="icon" data-bs-toggle="tooltip" data-bs-placement="left" title="{{ __('keywords.login_to_add_cart') }}">
                                                            <i class="fa-solid fa-cart-shopping"></i>
                                                        </a>
                                                    @endauth

                                                </div>
                                            </div>
                                            <div class="product-info">
                                                <h5 class="product-category">{{ $category['name'] }}</h5>
                                                <h4 class="product-title">{{ DisplayDataWithCurrentLang::display($product['name']) }}</h4>
                                                <p class="product-price">{{ $product['price'] }} $</p>
                                            </div>
                                        </div>
                                        {{--<div class="card-body">
                                            <h5 class="product-title">{{ $product['name'] }}</h5>
                                            <p class="product-price">{{ $product['price'] }} $</p>
                                        </div>--}}
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            @endif
        </div>
    </div>


@endsection
