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
                        @foreach($orders as $order)
                            <div class="card mb-4 order-card">
                                <div class="card-body">
                                    <div class="d-flex mb-3">
                                        <h5 class="card-title">{{ __('keywords.order') }} #{{ $order['order_id'] }}</h5>

                                        <form  class="{{ app()->getLocale() === 'ar' ? 'me-auto' : 'ms-auto' }}"  id="cancelOrderForm-{{ $order['order_id'] }}" action="{{ route('order.cancel', ['orderId'=>$order['order_id'],'lang' => app()->getLocale()]) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" id="cancelOrderBtn-{{ $order['order_id'] }}" class="btn btn-outline-dark">{{ __('keywords.cancel') }}</button>
                                        </form>
                                    </div>

                                    <p class="card-text">
                                        <strong>{{ __('keywords.date') }}</strong> {{ $order['created_at'] }} <br>
                                        <strong>{{ __('keywords.items') }}</strong> {{ count($order['order_items']) }} <br>
                                        <strong>{{ __('keywords.total_amount') }}</strong> ${{ number_format($order['total_price'], 2) }} <br>
                                        <strong>{{ __('keywords.status') }}</strong>
                                        <span class="badge bg-{{ $order['status'] === 'Pending' ? 'warning' : 'success' }}">
                                            {{ ucfirst(__('keywords.' . strtolower($order['status']))) }}
                                        </span>
                                    </p>

                                    <!-- Order Items Table -->
                                    <table class="table mt-3">
                                        <thead>
                                        <tr>
                                            <th>{{ __('keywords.product') }}</th>
                                            <th>{{ __('keywords.qty') }}</th>
                                            <th>{{ __('keywords.price') }}</th>
                                            <th>{{ __('keywords.total') }}</th>
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
                        @endforeach

                        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                        <script>
                            document.querySelectorAll("[id^='cancelOrderBtn-']").forEach(button => {
                                button.addEventListener('click', function(event) {
                                    event.preventDefault();

                                    const orderId = this.id.split('-')[1];
                                    Swal.fire({
                                        title: '{{ __("keywords.cancel_confirmation_title") }}',
                                        text: '{{ __("keywords.cancel_confirmation_text") }}',
                                        icon: 'warning',
                                        showCancelButton: true,
                                        confirmButtonColor: '#3085d6',
                                        cancelButtonColor: '#d33',
                                        confirmButtonText: '{{ __("keywords.cancel_confirmation_confirm") }}',
                                        cancelButtonText: '{{ __("keywords.cancel_button") }}', // Corrected line
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            document.getElementById('cancelOrderForm-' + orderId).submit();
                                        }
                                    });
                                });
                            });
                        </script>

                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
