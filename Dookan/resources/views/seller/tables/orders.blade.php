@extends('seller.layouts.master')
@section('title', __('keywords.orders') . ' - Dookan')

@section('content')
    <section class="section">
        <div class="section-body">
            <h2 class="section-title">{{ __('keywords.hi', ['name' => Auth::user()->name]) }}</h2>
            <p class="section-lead">
                {{ __('keywords.orders_note') }}
            </p>
        </div>
    </section>
    <div class="datatable-wrapper datatable-loading no-footer sortable searchable fixed-columns dataTable_ms">

        <div class="datatable-container">
            <table id="Data_table" class="table table-striped table-borderless datatable datatable-table">
                <thead>
                <tr>
                    <th>{{ __('keywords.hash') }}</th>
                    <th>{{ __('keywords.user_name') }}</th>
                    <th>{{ __('keywords.address') }}</th>
                    <th>{{__('keywords.num_of_items')}}</th>
                    <th>{{ __('keywords.total_price') }}</th>
                    <th>{{ __('keywords.order_status') }}</th>
                    <th>{{ __('keywords.created_at') }}</th>
                    <th>{{ __('keywords.actions') }}</th>
                </tr>
                </thead>
                <tbody>
                {{-- Orders --}}
                @foreach($orders as $order)
                    <tr>
                        <td>{{'#'. $order['order_id'] }}</td>
                        <td>{{ $order['user_name'] }}</td>
                        <td>{{ $order['shipping_address'] }}</td>
                        <td>{{ count($order['order_items']) }}</td>
                        <td class="text-center">{{ $order['total_price'] }} $</td>
                        <td>
                            <span class="badge bg-{{ $order['status'] === 'Shipped' ? 'success' : 'warning' }}">
                                {{ ucfirst(__('keywords.' . strtolower($order['status']))) }}
                            </span>
                        </td>
                        {{--<td>
                            <form action="{{ route('orders.update-status',['lang' => app()->getLocale()]) }}" method="POST">
                                @csrf
                                <input type="hidden" name="order_id" value="{{ $order['order_id'] }}">
                                <select name="status" class="form-select" onchange="this.form.submit()">
                                    <option value="Pending" {{ $order['status'] === 'Pending' ? 'selected' : '' }}>{{ __('keywords.pending') }}</option>
                                    <option value="Shipped" {{ $order['status'] === 'Shipped' ? 'selected' : '' }}>{{ __('keywords.shipped') }}</option>
                                    <option value="Delivered" {{ $order['status'] === 'Delivered' ? 'selected' : '' }}>{{ __('keywords.delivered') }}</option>
                                </select>
                            </form>
                        </td>--}}
                        <td>{{ $order['created_at'] }}</td>
                        <td>
                            <a href="{{ route('order.show-order-items', $order['order_id']) }}" class="btn btn-sm btn-primary rounded-circle m-1">
                                <i class="bi bi-eye open-eye text-white"></i>
                            </a>

                            <a href="/delete-item?model_name=Order&id={{ $order['order_id'] }}" class="btn btn-sm btn-danger rounded-circle m-1">
                                <i class="bi bi-trash3-fill text-white"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
