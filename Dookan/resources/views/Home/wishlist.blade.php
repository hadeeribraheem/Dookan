@extends('Home.layouts.master')
@section('content')
    <div class="cart-wrap py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="main-heading mb-10">{{ __('keywords.my_wishlist') }}</div>
                    @if(empty($wishlistResource))
                        <div class="d-flex align-items-center justify-content-center flex-column" style="width: 500px; margin: auto;">
                            <p class="text-center text-info fw-bold mt-5">{{ __('keywords.empty_wishlist_message') }}</p>
                            <img src="{{ asset('images/no_data.svg') }}" alt="no products" class="img-fluid" style="height: 80vh; width: 80vh;">
                        </div>
                    @else
                        <div class="table-wishlist table-responsive-sm">
                            <table class="table table-hover text-center">
                                <thead>
                                <tr>
                                    <th class="text-center">{{ __('keywords.product_image') }}</th>
                                    <th class="text-center">{{ __('keywords.product_name') }}</th>
                                    <th class="text-center">{{ __('keywords.unit_price') }}</th>
                                    <th class="text-center">{{ __('keywords.stock_status') }}</th>
                                    <th class="text-center"></th>
                                    <th class="text-center"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($wishlistResource as $wishlist)
                                    <tr>
                                        <td class="text-center align-middle">
                                            <div class="d-flex justify-content-center align-items-center">
                                                <div class="img-product">
                                                    @if(isset($wishlist['image'][1]))
                                                        <img src="{{ asset('images/' . $wishlist['image'][1]['name']) }}" class="img-fluid w-50" alt="Product Image" style="max-width: 100px;">
                                                    @elseif(isset($wishlist['image'][0]))
                                                        <img src="{{ asset('images/' . $wishlist['image'][0]['name']) }}" class="img-fluid w-50" alt="Product Image" style="max-width: 100px;">
                                                    @endif
                                                </div>
                                            </div>
                                        </td>
                                        <td class="name-product text-center align-middle">
                                            {{ $wishlist['name'] }}
                                        </td>
                                        <td class="price text-center align-middle">
                                            {{ '$'.$wishlist['price'] }}
                                        </td>
                                        @if($wishlist['status']=='1')
                                            <td class="text-center align-middle"><span class="in-stock-box bg-success">{{ __('keywords.in_stock') }}</span></td>
                                        @else
                                            <td class="text-center align-middle"><span class="in-stock-box bg-danger">{{ __('keywords.out_of_stock') }}</span></td>
                                        @endif
                                        <td class="text-center align-middle">
                                            @if($wishlist['status']=='1')
                                                <form action="{{ route('cart.store') }}" method="POST" style="display: inline-block;">
                                                    @csrf
                                                    <input type="hidden" name="product_id" value="{{ $wishlist['product_id'] }}">
                                                    <input type="hidden" name="quantity" value="1">
                                                    <button type="submit" class="round-blue-btn small-btn" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ __('keywords.add_to_cart_btn') }}">
                                                        {{ __('keywords.add_to_cart_btn') }}
                                                    </button>
                                                </form>
                                            @else
                                                <button type="button" class="round-blue-btn small-btn" disabled data-bs-toggle="tooltip" data-bs-placement="top" title="{{ __('keywords.out_of_stock_message') }}">
                                                    {{ __('keywords.add_to_cart') }}
                                                </button>
                                            @endif
                                        </td>
                                        <td class="text-center align-middle">
                                            <a href="/delete-item?model_name=Wishlist&id={{ $wishlist['id'] }}" class="trash-icon" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ __('keywords.remove_from_wishlist') }}">
                                                <i class="far fa-trash-alt"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
