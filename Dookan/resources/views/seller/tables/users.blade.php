@extends('seller.layouts.master')
@section('content')

    <div class="datatable-wrapper datatable-loading no-footer sortable searchable fixed-columns dataTable_ms">

        <div class="datatable-container">
            <table id="Data_table" class="table table-striped table-borderless datatable datatable-table">
                <thead>
                <tr>
                    <th>{{ __('keywords.id') }}</th>
                    <th>{{ __('keywords.name') }}</th>
                    <th>{{ __('keywords.username') }}</th>
                    <th>{{ __('keywords.profile_image') }}</th>
                    <th>{{ __('keywords.email') }}</th>
                    <th>{{ __('keywords.role') }}</th>
                    <th>{{ __('keywords.status') }}</th>
                    <th>{{ __('keywords.actions') }}</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($users as $user)

                    <tr>
                        <td>{{ $user['id'] }}</td>
                        <td>{{ $user['name'] }}</td>
                        <td>{{ $user['username'] }}</td>

                        <td>
                            @if(!empty($user['image']))
                                <img src="{{ asset('images/'.$user['image']['name']) }}" alt="{{ __('keywords.user_image') }}" class="img-fluid w-80">
                            @else
                                <img src="{{ asset('images/default.png') }}" alt="{{ __('keywords.default_image') }}" class="img-fluid rounded-circle w-80" style="width: 150px; height: 150px;">
                            @endif
                        </td>
                        <td>{{ $user['email'] }}</td>
                        <td>{{ $user['role'] }}</td>
                        <td>{{ $user['status'] }}</td>
                        <td>
                            <a href="/delete-item?model_name=User&id={{ $user['id'] }}" class="btn btn-sm btn-danger rounded-circle m-1">
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
