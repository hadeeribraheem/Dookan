@extends('admin.layouts.master')
@section('content')
    <div class="datatable-wrapper datatable-loading no-footer sortable searchable fixed-columns dataTable_ms">

        <div class="datatable-container">
            <table id="Data_table" class="table table-striped table-borderless datatable datatable-table">
                <thead>
                <tr>
                    <th>{{ __('keywords.sku') }}</th> <!-- SKU -->
                    <th>{{ __('keywords.added_by') }}</th> <!-- Added By -->
                    <th>{{ __('keywords.image') }}</th> <!-- Image -->
                    <th>{{ __('keywords.product_name') }}</th> <!-- Product Name -->
                    <th>{{ __('keywords.description') }}</th> <!-- Description -->
                    <th>{{ __('keywords.created_at') }}</th> <!-- Created At -->
                    <th>{{ __('keywords.actions') }}</th> <!-- Actions -->
                </tr>
                </thead>
                <tbody>
                @foreach ($productsResource as $product)

                    <tr>
                        <td>{{ $product['sku'] }}</td>
                        <td>{{ $product['user_name'] }}</td>
                        <td>
                            @if(!empty($product['image']))
                                <img src="{{ asset('images/'.$product['image'][0]['name']) }}" alt="Product Image" class="img-fluid w-50">
                            @else
                                <p>{{ __('keywords.no_image') }}</p> <!-- No image available -->
                            @endif
                        </td>
                        <td>{{ $product['name'] }}</td>
                        <td>{{ $product['description'] }}</td>
                        <td>{{ $product['created_at'] }}</td>
                        <td>
                            <a href="{{ route('admin.products.edit', $product['id']) }}" class="btn btn-sm btn-primary rounded-circle m-1">
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
