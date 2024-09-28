@extends('seller.layouts.master')
@section('content')
    <div class="datatable-wrapper datatable-loading no-footer sortable searchable fixed-columns dataTable_ms">

        <div class="datatable-container">
            <table id="Data_table" class="table table-striped table-borderless datatable datatable-table">
                <thead>
                <tr>
                    <th>{{ __('keywords.sku') }}</th>
                    <th>{{ __('keywords.image') }}</th>
                    <th>{{ __('keywords.product_name') }}</th>
                    <th>{{ __('keywords.description') }}</th>
                    <th>{{ __('keywords.price') }}</th>
                    <th>{{ __('keywords.quantity') }}</th>
                    <th>{{ __('keywords.created_at') }}</th>
                    <th>{{ __('keywords.actions') }}</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($productsResource as $product)

                    <tr>
                        <td>{{ $product['sku'] }}</td>
                        <td>
                            @if(!empty($product['image']))
                                <img src="{{ asset('images/'.$product['image'][0]['name']) }}" alt="{{ __('keywords.product_image') }}" class="img-fluid w-50">
                            @else
                                <p>{{ __('keywords.no_image_available') }}</p>
                            @endif
                        </td>
                        <td>{{ $product['name'] }}</td>
                        <td>{{ $product['description'] }}</td>
                        <td>{{ $product['price'] }}</td>
                        <td>{{ $product['quantity'] }}</td>
                        <td>{{ $product['created_at'] }}</td>
                        <td>
                            <a href="{{ route('seller.products.edit', $product['id']) }}" class="btn btn-sm btn-primary rounded-circle m-1">
                                <i class="bi bi-pen-fill text-white"></i>
                            </a>
                            <a href="/delete-item?model_name=Products&id={{ $product['id'] }}" class="btn btn-sm btn-danger rounded-circle m-1">
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
