@extends('admin.layouts.master')
@section('content')

    <div class="datatable-wrapper datatable-loading no-footer sortable searchable fixed-columns dataTable_ms">

        <div class="datatable-container">
            <table id="Data_table" class="table table-striped table-borderless datatable datatable-table">
                <thead>
                <tr>
                    <th>{{ __('keywords.hash') }}</th>
                    <th>{{ __('keywords.category_name') }}</th>
                    <th>{{ __('keywords.description') }}</th>
                    <th>{{ __('keywords.icon') }}</th>
                    <th>{{ __('keywords.created_at') }}</th>
                    <th>{{ __('keywords.actions') }}</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td>{{'#'. $category['id']}}</td>
                        <td>{{ $category['name'] }}</td>
                        <td>{{ $category['description'] }}</td>
                        <td><i class="{{ $category['icon'] }}"></i></td>
                        <td>{{ $category['created_at'] }}</td>
                        <td>
                            <a href="{{ route('admin.categories.edit', $category['id']) }}" class="btn btn-sm btn-primary rounded-circle m-1">
                                <i class="bi bi-pen-fill text-white"></i>
                            </a>
                            <a href="/delete-item?model_name=Categories&id={{ $category['id'] }}" class="btn btn-sm btn-danger rounded-circle m-1">
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
