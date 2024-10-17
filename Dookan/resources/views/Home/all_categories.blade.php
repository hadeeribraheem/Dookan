@extends('Home.layouts.master')
@section('content')
    <div class="container mt-5">
        <div class="category-header mb-4">
            <h1>{{ __('keywords.our_categories') }}</h1>
            <p class="ms-3 ">{{ __('keywords.categories_welcome_message') }}</p><hr><br>
        </div>
        <div class="row">
            @if(!(isset($categories)))
                <div class="d-flex align-items-center justify-content-center flex-column" style="width: 500px; margin: auto;">
                    <p class="text-center text-info fw-bold">{{ __('keywords.no_products') }}</p>
                    <img src="{{ asset('images/no_data.svg') }}" alt="{{ __('keywords.no_products_image_alt') }}" class="img-fluid">
                </div>
            @else
                @foreach($categories as $category)
                    <div class="col-lg-4">
                        <a href="{{ route('categoriesdata.show', ['categoriesdatum' => $category['id'], 'lang' => app()->getLocale()]) }}" class="product-card-link">
                            <div class="icon_box">
                                <i class="{{ $category['icon'] }}"></i>
                                <h3>{{ $category['name'] }}</h3>
                                <p>{{ $category['description'] }}</p>
                            </div>
                        </a>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection
