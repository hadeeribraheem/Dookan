@extends('admin.layouts.master')
@section('content')

    <div class="datatable-wrapper datatable-loading no-footer sortable searchable fixed-columns dataTable_ms">

        {{-- Filter Form --}}
        <form action="{{ route('admin.users.index') }}" method="GET" class="mb-sm-4">
            <div class="row">
                {{-- Role Filter --}}
                <div class="col-md-4">
                    <label for="role">{{ __('keywords.filter_by_role') }}</label> <!-- Filter by Role -->
                    <select name="role" id="role" class="form-control">
                        <option value="">{{ __('keywords.all_roles') }}</option> <!-- All Roles -->
                        <option value="admin" {{ request('role') == 'admin' ? 'selected' : '' }}>{{ __('keywords.admin') }}</option> <!-- Admin -->
                        <option value="seller" {{ request('role') == 'seller' ? 'selected' : '' }}>{{ __('keywords.seller') }}</option> <!-- Seller -->
                        <option value="customer" {{ request('role') == 'customer' ? 'selected' : '' }}>{{ __('keywords.customer') }}</option> <!-- Customer -->
                    </select>
                </div>

                {{-- Status Filter --}}
                <div class="col-md-4">
                    <label for="status">{{ __('keywords.filter_by_status') }}</label> <!-- Filter by Status -->
                    <select name="status" id="status" class="form-control">
                        <option value="">{{ __('keywords.all_statuses') }}</option> <!-- All Statuses -->
                        <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>{{ __('keywords.active') }}</option> <!-- Active -->
                        <option value="inactive" {{ request('status') == 'inactive' ? 'selected' : '' }}>{{ __('keywords.inactive') }}</option> <!-- Inactive -->
                    </select>
                </div>

                {{-- Filter Button --}}
                <div class="col-md-4 d-flex align-items-end">
                    <button type="submit" class="btn btn-primary ms-auto w-75">{{ __('keywords.apply_filter') }}</button> <!-- Apply Filter -->
                </div>
            </div>
        </form>

        <div class="datatable-container">
            <table id="Data_table" class="table table-striped table-borderless datatable datatable-table">
                <thead>
                <tr>
                    <th>{{ __('keywords.id') }}</th> <!-- ID -->
                    <th>{{ __('keywords.name') }}</th> <!-- Name -->
                    <th>{{ __('keywords.username') }}</th> <!-- Username -->
                    <th>{{ __('keywords.profile_image') }}</th> <!-- Profile Image -->
                    <th>{{ __('keywords.email') }}</th> <!-- Email -->
                    <th>{{ __('keywords.role') }}</th> <!-- Role -->
                    <th>{{ __('keywords.status') }}</th> <!-- Status -->
                    <th>{{ __('keywords.actions') }}</th> <!-- Actions -->
                </tr>
                </thead>
                <tbody>
                @foreach ($usersByRole as $user)

                    <tr>
                        <td>{{ $user['id'] }}</td>
                        <td>{{ $user['name'] }}</td>
                        <td>{{ $user['username'] }}</td>

                        <td>
                            @if(!empty($user['image']))
                                <img src="{{ asset('images/'.$user['image']['name']) }}" alt="User Image" class="img-fluid w-80">
                            @else
                                <img src="{{ asset('images/default.png') }}" alt="default.png" class="img-fluid rounded-circle w-80" style="width: 150px; height: 150px;">
                            @endif
                        </td>
                        <td>{{ $user['email'] }}</td>
                        <td>{{ $user['role'] }}</td>
                        <td>{{ $user['status'] }}</td>
                        <td>
                            <a href="{{ route('admin.users.edit', $user['id']) }}" class="btn btn-sm btn-primary rounded-circle m-1">
                                <i class="bi bi-pen-fill text-white"></i>
                            </a>

                            <form action="{{ route('admin.users.destroy', $user['id']) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger rounded-circle m-1">
                                    <i class="bi bi-trash3-fill text-white"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    </div>
@endsection
