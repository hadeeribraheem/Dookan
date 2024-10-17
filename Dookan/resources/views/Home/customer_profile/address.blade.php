@extends('Home.layouts.master')

@section('sidebar')
    @include('Home.customer_profile.sidebar')
@endsection

@section('content')

    <section class="section">
        <div class="section-body customer-profile">
            <h2 class="section-title">{{ __('keywords.hi_user', ['name' => Auth::user()->name]) }}</h2>
            <p class="section-lead">{{ __('keywords.add_address_info') }}</p>

            <div class="row mt-sm-4">
                <div class="col-12 col-md-12 col-lg-7">
                    <div class="card">
                        <form method="POST" action="{{ route('user.address.store') }}">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-12">
                                        <label for="address_en" class="form-label">{{ __('keywords.address_english') }}</label>
                                        <input type="text" class="form-control" id="address_en" name="address_en" required>
                                    </div>
                                    <div class="form-group col-12">
                                        <label for="address_ar" class="form-label">{{ __('keywords.address_arabic') }}</label>
                                        <input type="text" class="form-control" id="address_ar" name="address_ar" required>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary ms-auto">{{ __('keywords.save_changes') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-12 col-lg-5">
                    @if(!empty($addressesResource) && count($addressesResource) > 0)
                        <form action="{{ route('address.select') }}" method="POST">
                            @csrf
                            <div class="row">
                                @foreach($addressesResource as $address)
                                    <div class="col-md-12">
                                        <div class="card mb-3">
                                            <div class="card-body d-flex justify-content-center align-items-center">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="selected_address" id="address_{{ $address['id'] }}" value="{{ $address['id'] }}"
                                                           @if(Auth::user()->default_address_id == $address['id']) checked @endif>
                                                    <label class="form-check-label" for="address_{{ $address['id'] }}">
                                                        <strong>{{ __('keywords.address') }}</strong> {{ $address['address'] }}<br>
                                                    </label>
                                                </div>
                                                <div class="{{ app()->getLocale() === 'ar' ? 'me-4' : 'ms-4' }} ">
                                                    <a href="/delete-item?model_name=UserAddress&id={{ $address['id'] }}" class="trash-icon">
                                                        <i class="far fa-trash-alt"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <div class="address-card-footer">
                                <button type="submit" class="btn btn-primary ms-auto">{{ __('keywords.select_address') }}</button>
                            </div>
                        </form>
                    @else
                        <p class="text-danger ms-3">{{ __('keywords.no_addresses_found') }}</p>
                    @endif
                </div>
            </div>
        </div>
    </section>

@endsection
