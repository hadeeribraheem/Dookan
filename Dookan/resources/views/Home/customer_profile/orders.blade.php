@extends('Home.layouts.master')

@section('sidebar')
    @include('Home.customer_profile.sidebar')
@endsection

@section('content')
    <section class="section">
        <div class="container mt-3">
            <div class="section-body customer-profile">
                <h2 class="section-title">{{ __('keywords.order_history') }}</h2>
                <p class="section-lead">{{ __('keywords.manage_order') }}</p>

                <div class="row mt-sm-4">
                    <div class="col-12">
                        {{-- Orders --}}
                        @forelse($orders as $order)
                            <div class="card mb-4 order-card">
                                <div class="card-body">
                                    <div class="d-flex mb-3">
                                        <h5 class="card-title">{{ __('Order') }} #{{ $order['order_id'] }}</h5>
{{--
                                        <button id="cancelOrderBtn" class="cancel-btn ms-auto">{{ __('Cancel') }}</button>
--}}
                                        <form class="ms-auto" id="cancelOrderForm" action="{{ route('order.cancel', $order['order_id']) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" id="cancelOrderBtn" class="btn btn-outline-dark">Cancel</button>
                                        </form>

                                    </div>

                                    <p class="card-text">
                                        <strong>{{ __('Date:') }}</strong> {{ $order['created_at'] }} <br>
                                        <strong>{{ __('Items:') }}</strong> {{ count($order['order_items']) }} <br>
                                        <strong>{{ __('Total amount:') }}</strong> ${{ number_format($order['total_price'], 2) }} <br>
                                        <strong>{{ __('Status:') }}</strong>
                                        <span class="badge bg-{{ $order['status'] === 'Shipped' ? 'success' : 'warning' }}">
                                    {{ ucfirst($order['status']) }}
                                </span>
                                    </p>
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <p class="mb-0"><strong>{{ __('Shipping address:') }}</strong> {{ $order['shipping_address'] }}</p>
                                            <p class="mb-0"><strong>{{ __('Shipping tax:') }}</strong> $5</p>

                                            <p class="mb-0"><strong>{{ __('Tracking number:') }}</strong> {{ $order['order_id'] }}</p>
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
                </div>

            </div>
        </div>
    </section>
    <script>
        document.getElementById('cancelOrderBtn').addEventListener('click', function(event) {
            event.preventDefault();

            Swal.fire({
                title: 'Are you sure?',
                text: "Do you want to cancel this order?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, cancel it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Submit the form if confirmed
                    document.getElementById('cancelOrderForm').submit();
                }
            });
        });
    </script>
@endsection
