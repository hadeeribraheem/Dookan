@extends('admin.layouts.master')
@section('content')
    <div class="datatable-wrapper datatable-loading no-footer sortable searchable fixed-columns dataTable_ms">

        <div class="datatable-container">
            <table id="Data_table" class="table table-striped table-borderless datatable datatable-table">
                <thead>
                <tr>
                    <th>SKU</th>
                    <th>Added By</th>
                    <th>Image</th>
                    <th>Product Name</th>
                    <th>Description</th>
                    <th>Created At</th>
                    <th>Actions</th>
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
                                <p>No image available</p>
                            @endif
                           {{-- {{ $product['image']}}--}}
                        </td>
                        <td>{{ $product['name'] }}</td>
                        <td>{{ $product['description'] }}</td>
                        <td>{{ $product['created_at'] }}</td>
                        <td>
                            <a href="{{ route('admin.products.edit', $product['id']) }}" class="btn btn-sm btn-primary rounded-circle m-1">
                                <i class="bi bi-pen-fill text-white"></i>
                            </a>
                            <a href="/delete-item?model_name=Products&id={{ $product['id'] }}" class="btn btn-sm btn-danger rounded-circle m-1"> <i class="bi bi-trash3-fill text-white"></i></a>

                            {{--<form action="{{ route('admin.delete.item') }}" method="POST" style="display:inline-block;">
                                @csrf
                                <input type="hidden" name="id" value="{{ $product['id'] }}">
                                <input type="hidden" name="model_name" value="Products">
                                <button type="submit" class="btn btn-sm btn-danger rounded-circle m-1">
                                    <i class="bi bi-trash3-fill text-white"></i>
                                </button>
                            </form>--}}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    </div>
@endsection
