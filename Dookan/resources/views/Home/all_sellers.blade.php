@extends('Home.layouts.master')
@section('content')
    <div class="container vendor-products  mt-5">
        <div class="vendor-header mb-4">
            <h1>{{ __('keywords.our_vendors') }}</h1>
            <p class="ms-3 ">{{ __('keywords.welcome_message') }}</p><hr><br>
        </div>

        <div class="row">
            @if(!(isset($sellers)) || empty($sellers))
                <div class="d-flex align-items-center justify-content-center flex-column" style="width: 500px; margin: auto;">
                    <p class="text-center text-info fw-bold">{{ __('keywords.no_products') }}</p>
                    <img src="{{ asset('images/no_data.svg') }}" alt="{{ __('keywords.no_products_image_alt') }}" class="img-fluid ">
                </div>
            @else
                @foreach ($sellers as $vendor)
                    <div class="col-lg-3 col-sm-12 mb-4 ">
                        <a href="{{ route('vendor.show', $vendor->id, ['lang' => app()->getLocale()]) }}">
                            <div class="card vendor-card ">
                                @if($vendor['image'])
                                    <img src="{{ asset('images/'. $vendor['image']['name']) }}" alt="User Image" class="rounded-circle " >
                                @endif
                                <div class="card-body">
                                    <h5 class="card-title">{{ $vendor['name'] }}</h5>

                                    <p><i class="fa fa-phone"></i> {{ $vendor->phone }}</p>
                                    <p><i class="fa fa-envelope"></i> {{ $vendor->email }}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection
