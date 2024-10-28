@extends('admin.layouts.master')
@section('title', __('keywords.order_items') . ' - Dookan')

@section('content')

    <div class="datatable-wrapper datatable-loading no-footer sortable searchable fixed-columns dataTable_ms">

        <div class="datatable-container">
            <table id="Data_table" class="table table-striped table-borderless datatable datatable-table">
                <thead>
                <tr>
                    <th>{{ __('keywords.product') }}</th>
                    <th>{{ __('keywords.image') }}</th>
                    <th>{{ __('keywords.qty') }}</th>
                    <th>{{ __('keywords.price') }}</th>
                    <th>{{ __('keywords.total') }}</th>
                    <th>{{ __('keywords.order_status') }}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($order['order_items'] as $item)

                    <tr>
                        <td>{{ $item['product']['name'] }}</td>
                        <td>
                            <img src="{{ asset('images/' . $item['product']['image'][0]['name']) }}" alt="{{ $item['product']['name'] }}" style="width: 50px;">
                        </td>
                        <td>{{ $item['quantity'] }}</td>
                        <td>${{ number_format($item['price'], 2) }}</td>
                        <td>${{ number_format($item['quantity'] * $item['price'], 2) }}</td>
                        <td>
                            <form action="{{ route('order-items.update-status') }}" method="POST">
                                @csrf
                                <input type="hidden" name="item_id" value="{{ $item['item_id'] }}">
                                <select name="status" onchange="this.form.submit()">
                                    <option value="Pending" {{ $item['status'] == 'Pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="Shipped" {{ $item['status'] == 'Shipped' ? 'selected' : '' }}>Shipped</option>
                                    <option value="Delivered" {{ $item['status'] == 'Delivered' ? 'selected' : '' }}>Delivered</option>
                                </select>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    </div>
@endsection
