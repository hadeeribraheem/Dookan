@extends('Home.layouts.master')
@section('content')
    <div class="container mt-5">
        <div class="row">
            @if(isset($product))
                <!-- Images Section -->
                <div class="col-md-5">
                    <div class="product-main-image">
                        @if(isset($product['image'][0]))
                            <img  id="mainProductImage" src="{{ asset('images/' . $product['image'][0]['name']) }}" class="main-image img-fluid" alt="{{ __('keywords.product_image_alt', ['name' => $product['name']]) }}">
                        @endif
                    </div>
                    @if(!empty($product['image']))
                        <div class="product-thumbnails d-flex">
                            @foreach($product['image'] as $image)
                                @foreach ($image as $img)
                                    <img src="{{ asset('images/'.$img['name']) }}" class="img-fluid" alt="{{ __('keywords.thumbnail_image_alt', ['name' => $product['name']]) }}" onclick="changeImage(this)">
                                @endforeach
                            @endforeach
                            <script>
                                function changeImage(element) {
                                    document.getElementById('mainProductImage').src = element.src;
                                }
                            </script>
                        </div>
                    @else
                        <p id="NoImg">{{ __('keywords.no_images') }}</p>
                    @endif
                </div>

                <!-- Product Details Section -->
                <div class="col-md-5">
                    <h2>{{$product['name']}}</h2>
                    <h5 class="product-category">{{$product['category_name']}}</h5>
                    <div>
                        @if($product['status'] == '1')
                            <td class="text-center align-middle"><span class="in-stock-box badge bg-success">{{ __('keywords.in_stock') }}</span></td>
                        @else
                            <td class="text-center align-middle"><span class="in-stock-box badge bg-danger">{{ __('keywords.out_of_stock') }}</span></td>
                        @endif
                    </div>
                    <p class="mt-3">
                        {{ $product['description'] }}
                    </p>
                    <h3>${{ $product['price'] }} / {{ __('keywords.per_unit') }}</h3>

                    <div class="mt-3">
                        @if($product['status'] == '1')
                            <form action="{{ route('cart.store') }}" method="POST" style="display: inline-block;">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product['id'] }}">
                                <input type="hidden" id="hidden-quantity-{{ $product['id'] }}" name="quantity" value="1">
                                <button type="submit" class="round-blue-btn small-btn">{{ __('keywords.add_to_cart_btn') }}</button>
                            </form>
                        @else
                            <button class="btn btn-primary" disabled>{{ __('keywords.add_to_cart_btn') }}</button>
                        @endif
                    </div>
                </div>
                <div class="col-md-2">
                    @auth
                        <form action="{{ route('wishlist.store') }}" method="POST" style="display: inline-block; margin: 0 !important;">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product['id'] }}">
                            <button type="submit" class="icon wishlist" data-bs-toggle="tooltip" data-bs-placement="left" title="{{ __('keywords.add_to_wishlist', ['name' => $product['name']]) }}" style=" border: none;">
                                <i class="fa-solid fa-heart"></i>
                            </button>
                        </form>
                    @else
                        <a href="{{ route('login', ['lang' => app()->getLocale()]) }}" class="icon wishlist" data-bs-toggle="tooltip" data-bs-placement="left" title="{{ __('keywords.login_to_add_wishlist') }}" style=" border: none;">
                            <i class="fa-solid fa-heart"></i>
                        </a>
                    @endauth
                </div>
            @else
                <div class="d-flex align-items-center justify-content-center flex-column" style="width: 500px; margin: auto;">
                    <p class="text-center text-info fw-bold">{{ __('keywords.no_product_available') }}</p>
                    <img src="{{ asset('images/error.svg') }}" alt="{{ __('keywords.no_product_image_alt') }}" class="img-fluid ">
                </div>
            @endif
        </div>
    </div>
@endsection
