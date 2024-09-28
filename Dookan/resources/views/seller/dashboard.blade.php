@extends('seller.layouts.master')

@section('content')
    <section class="dashboard section">
        <div class="section-body">
            <h2 class="section-title ">Hi, {{ Auth::user()->name }} !</h2>
            <p class="section-lead">
                {{ __('keywords.dashboard_overview') }}
            </p>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-4 col-md-12">
                    <div class="card radius-10 border-start border-0 border-3 border-success">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <p class="mb-0 text-secondary">{{ __('keywords.total_users') }}</p>
                                    <h4 class="my-1 text-success">{{ $usersCount }}</h4>
                                </div>
                                <div class="widgets-icons-2 rounded-circle bg-gradient-ohhappiness text-white ms-auto"><i class="fa-regular fa-user"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card radius-10 border-start border-0 border-3 border-danger">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <p class="mb-0 text-secondary">{{ __('keywords.total_products') }}</p>
                                    <h4 class="my-1 text-danger">{{ $productsCount }}</h4>
                                </div>
                                <div class="widgets-icons-2 rounded-circle bg-gradient-bloody text-white ms-auto">
                                    <i class="fa-brands fa-shopify"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="card radius-10 border-start border-0 border-3 border-success">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <p class="mb-0 text-secondary">{{ __('keywords.total_orders') }}</p>
                                    <h4 class="my-1 text-success">{{ $totalSales.' $' }}</h4>
                                </div>
                                <div class="widgets-icons-2 rounded-circle bg-gradient-ohhappiness text-white ms-auto">
                                    <i class="fa fa-dollar"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
