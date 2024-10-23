@extends('Home.layouts.master')

@section('sidebar')
    @include('Home.customer_profile.sidebar')
@endsection

@section('content')

    <div class="container mt-3">
        <h2>{{ __('Order History') }}</h2>

        <p>{{ __('Here you can manage your order') }}</p>

        {{-- Search Bar --}}
        <div class="row mb-3">
            <div class="col">
                <input type="text" class="form-control" placeholder="{{ __('Search for Order ID or Product') }}">
            </div>
            <div class="col-auto">
                <button class="btn btn-outline-secondary" type="button">{{ __('Filters') }}</button>
            </div>
        </div>

        {{-- Orders --}}
        @forelse($orders as $order)
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">{{ __('Order') }} #{{ $order['order_id'] }}</h5>
                    <p class="card-text">
                        <strong>{{ __('Date:') }}</strong> {{ $order['created_at'] }} <br>
{{--
                        <strong>{{ __('Items:') }}</strong> {{ count($order['order_items']) }} <br>
--}}
                        <strong>{{ __('Total amount:') }}</strong> ${{ number_format($order['total_price'], 2) }} <br>
                        <strong>{{ __('Status:') }}</strong>
                        <span class="badge bg-{{ $order['status'] === 'Shipped' ? 'success' : 'warning' }}">
                            {{ ucfirst($order['status']) }}
                        </span>
                    </p>
                    <div class="d-flex justify-content-between">
                        <div>
                            <p class="mb-0"><strong>{{ __('Shipping address:') }}</strong> {{ $order['shipping_address'] }}</p>
                            <p class="mb-0"><strong>{{ __('Shipping tax:') }}</strong> 5$</p>

                            <p class="mb-0"><strong>{{ __('Tracking number:') }}</strong> {{ $order['order_id'] }}</p>
                        </div>
                        <div>
                            <button class="btn btn-primary">{{ __('Cancel') }}</button>
                        </div>
                    </div>
                    {{-- Order Items Table --}}
                    <table class="table mt-3">
                        <thead>
                        <tr>
                            <th>{{ __('Product') }}</th>
                            <th>{{ __('Qty') }}</th>
                            <th>{{ __('Price') }}</th>
                            <th>{{ __('Total') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($order['order_items'] as $item)
                            <tr>
                                <td>
                                    <img src="{{ asset('images/' . $item['product']['image'][0]['name']) }}" alt="{{ $item['product']['name'] }}" style="width: 50px;">
                                    {{ $item['product']['name'] }}
                                </td>
                                <td>{{ $item['quantity'] }}</td>
                                <td>${{ number_format($item['price'], 2) }}</td>
                                <td>${{ number_format($item['quantity'] * $item['price'], 2) }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        @empty
            <div class="alert alert-info text-center">
                {{ __('No orders found.') }}
            </div>
        @endforelse
    </div>

@endsection
