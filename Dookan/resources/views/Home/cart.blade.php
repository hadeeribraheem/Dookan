@extends('Home.layouts.master')
@section('content')
    <div class="container">
        @if(empty($cartResource))
            <div class="d-flex align-items-center justify-content-center flex-column" style="width: 500px; margin: auto;">
                <p class="text-center text-info fw-bold mt-5">{{ __('keywords.empty_cart_message') }}</p>
                <img src="{{ asset('images/no_data.svg') }}" alt="no products" class="img-fluid" style="height: 80vh; width: 80vh;">
            </div>
        @else
            @php
                $totalPrice = 0;
            @endphp

            <form id="cartForm" method="POST" action="{{ route('order.store') }}">
                @csrf

                <div class="card cart-card mt-4">
                    <div class="row">
                        <div class="col-md-8 p-4">
                            <h4 class="mb-4"><b>{{ __('keywords.shopping_cart') }}</b></h4>

                            @foreach($cartResource as $cart)
                                <div class="row border-top border-bottom py-3">
                                    <div class="row main align-items-center">
                                        <div class="col-2">
                                            @if(isset($cart['image'][1]))
                                                <img src="{{ asset('images/' . $cart['image'][1]['name']) }}" class="img-fluid" style="max-width: 100px;" alt="{{ __('keywords.product_image') }}">
                                            @elseif(isset($cart['image'][0]))
                                                <img src="{{ asset('images/' . $cart['image'][0]['name']) }}" class="img-fluid" style="max-width: 100px;" alt="{{ __('keywords.product_image') }}">
                                            @endif
                                        </div>
                                        <div class="col">
                                            <div class="row text-muted">{{ $cart['category_name'] }}</div>
                                            <div class="row">{{ $cart['name'] }}</div>
                                        </div>
                                        <div class="col">
                                            <div class="d-flex align-items-center">
                                                <button type="button" class="btn btn-outline-primary btn-sm decrement-btn" data-id="{{ $cart['id'] }}" data-price="{{ $cart['price'] }}">-</button>
                                                <input type="text" name="cart_items[{{ $cart['id'] }}][quantity]" id="quantity-{{ $cart['id'] }}" value="1" class="border text-center mx-2 quantity-input" style="width: 40px;" readonly>
                                                <input type="hidden" name="cart_items[{{ $cart['id'] }}][price]" value="{{ $cart['price'] }}">
                                                <button type="button" class="btn btn-outline-primary btn-sm increment-btn" data-id="{{ $cart['id'] }}" data-price="{{ $cart['price'] }}" data-max="{{ $cart['quantity'] }}">+</button>
                                            </div>
                                        </div>
                                        <div class="col price" id="item-price-{{ $cart['id'] }}">{{ '$' . number_format($cart['price'], 2) }}</div>
                                        <div class="col">
                                            <a href="/delete-item?model_name=Cart&id={{ $cart['id'] }}" class="trash-icon">
                                                <i class="far fa-trash-alt"></i>
                                            </a>
                                        </div>

                                        @php
                                            $itemTotal = $cart['price'] * 1;
                                            $totalPrice += $itemTotal;
                                        @endphp
                                    </div>
                                </div>
                            @endforeach

                            <div class="back-to-shop mt-3">
                                <a href="{{route('products.index', ['lang' => app()->getLocale()])}}">&leftarrow; <span class="text-muted">{{ __('keywords.back_to_shop') }}</span></a>
                            </div>
                        </div>

                        <div class="col-md-4 summary gradient">
                            <h5><b>{{ __('keywords.summary') }}</b></h5>
                            <hr>
                            <div class="row">
                                <div class="col">{{ __('keywords.items_count', ['count' => $distinctProductCount]) }}</div>
                                <div class="col text-right">
                                    <span id="total-price" class="ms-4">{{ '$' . number_format($totalPrice, 2) }}</span>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col">{{ __('keywords.shipping') }}</div>
                                <div class="col text-right">
                                    <span class="ms-4"> $5.00</span>
                                </div>
                            </div>
                            <div class="row mt-3" style="border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0;">
                                <div class="col">{{ __('keywords.total_price') }}</div>
                                <div class="col text-right">
                                    <span id="final-price">{{ '$' . number_format(($totalPrice + 5), 2) }}</span>
                                </div>
                            </div>

                            <button type="button" class="checkout-btn w-100 btn">{{ __('keywords.checkout') }}</button>

                            <div class="modal fade" id="addressModal" tabindex="-1" aria-labelledby="addressModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="addressModalLabel">{{ __('keywords.choose_address') }}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            @if(!empty($addressesResource) && count($addressesResource) > 0)
                                                <p>{{ __('keywords.select_saved_address') }}</p>
                                                @foreach($addressesResource as $address)
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="selected_address" id="address_{{ $address['id'] }}" value="{{ $address['id'] }}" @if(Auth::user()->default_address_id == $address['id']) checked @endif>
                                                        <label class="form-check-label" for="address_{{ $address['id'] }}">
                                                            <strong>{{ __('keywords.address') }}:</strong> {{ $address['address'] }}<br>
                                                        </label>
                                                    </div>
                                                @endforeach
                                            @else
                                                <p class="text-danger">{{ __('keywords.no_address') }}</p>
                                                <div class="mb-3">
                                                    <label for="address_en" class="form-label">{{ __('keywords.address_en') }}</label>
                                                    <input type="text" name="address_en" class="form-control" id="address_en" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="address_ar" class="form-label">{{ __('keywords.address_ar') }}</label>
                                                    <input type="text" name="address_ar" class="form-control" id="address_ar" required>
                                                </div>
                                            @endif
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('keywords.close') }}</button>
                                            <button type="submit" class="btn btn-primary">{{ __('keywords.submit_order') }}</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        @endif
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('.increment-btn').forEach(button => {
                button.onclick = function () {
                    let itemId = this.dataset.id;
                    let itemPrice = parseFloat(this.dataset.price);
                    let maxQuantity = parseInt(this.dataset.max);
                    let quantityInput = document.getElementById('quantity-' + itemId);
                    let currentQuantity = parseInt(quantityInput.value);

                    if (currentQuantity < maxQuantity) {
                        currentQuantity += 1;
                        quantityInput.value = currentQuantity;
                        updateItemTotal(itemId, currentQuantity, itemPrice);
                        updateTotalPrice();
                    }
                };
            });

            document.querySelectorAll('.decrement-btn').forEach(button => {
                button.onclick = function () {
                    let itemId = this.dataset.id;
                    let itemPrice = parseFloat(this.dataset.price);
                    let quantityInput = document.getElementById('quantity-' + itemId);
                    let currentQuantity = parseInt(quantityInput.value);

                    if (currentQuantity > 1) {
                        currentQuantity -= 1;
                        quantityInput.value = currentQuantity;
                        updateItemTotal(itemId, currentQuantity, itemPrice);
                        updateTotalPrice();
                    }
                };
            });

            function updateItemTotal(itemId, quantity, price) {
                let itemPriceElement = document.getElementById('item-price-' + itemId);
                let newItemPrice = quantity * price;
                itemPriceElement.innerText = '$' + newItemPrice.toFixed(2);
            }

            function updateTotalPrice() {
                let total = 0;
                document.querySelectorAll('.price').forEach(function (itemPriceElement) {
                    let price = parseFloat(itemPriceElement.innerText.replace('$', ''));
                    total += price;
                });

                document.getElementById('total-price').innerText = '$' + total.toFixed(2);
                document.getElementById('final-price').innerText = '$' + (total + 5).toFixed(2); // Add shipping
            }

            // Show address modal on checkout
            document.querySelector('.checkout-btn').addEventListener('click', function (e) {
                e.preventDefault();
                let myModal = new bootstrap.Modal(document.getElementById('addressModal'));
                myModal.show();
            });
        });
    </script>
@endsection
