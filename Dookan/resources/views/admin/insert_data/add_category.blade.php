@extends('admin.layouts.master')
@section('title', __('keywords.add_category') . ' - Dookan')
@section('content')
    <section class="section">
        <div class="section-body">
            <h2 class="section-title">{{ __('keywords.hi', ['name' => Auth::user()->name]) }}</h2>
            <p class="section-lead">
                {{ __('keywords.categorize_products') }}
            </p>

            <div class="row mt-sm-4">
                <div class="col-12 col-md-12 col-lg-7">
                    <div class="card">
                        <form method="post" action="{{route('admin.categories.store')}}" class="needs-validation" novalidate="">
                            @csrf
                            <div class="card-header">
                                <h4>{{ __('keywords.add_category') }}</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-12">
                                        <label>{{ __('keywords.category_name') }}</label>
                                        <input class="form-control" name="name" id="name">
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>{{ __('keywords.select_icon') }}</label>
                                        <select id="icon-dropdown" class="select2-icons" style="width: 100px;" name="icon">
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>{{ __('keywords.category_description') }}</label>
                                        <textarea name="description" id="description" type="text" class="form-control" rows="4"></textarea>
                                        <div class="invalid-feedback">
                                            {{ __('keywords.fill_description') }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-primary">{{ __('keywords.add_category_button') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @if(session('soft_deleted_category'))
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    title: "Restore Category?",
                    text: "{{ session('soft_deleted_category')['message'] }}",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Yes, restore it!",
                    cancelButtonText: "No, create a new one",
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById('restoreCategoryForm').submit();
                    }
                });
            });
        </script>

        <form id="restoreCategoryForm" action="{{ route('admin.category.restore') }}" method="POST" style="display: none;">
            @csrf
            <input type="hidden" name="category_id" value="{{ session('soft_deleted_category')['id'] }}">
        </form>
    @endif

@endsection
