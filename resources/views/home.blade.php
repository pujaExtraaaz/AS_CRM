@extends('layouts.admin')
@section('breadcrumb')
@endsection
@section('page-title')
{{ __('Home') }}
@endsection
@section('title')
{{ __('Dashboard') }}

@endsection

@section('action-btn')

@endsection

@section('content')
<style>
    /* Mobile responsive styles for traffic chart */
    @media (max-width: 768px) {
        .card-body {
            padding: 0.75rem;
        }
        #traffic-chart {
            min-height: 180px !important;
        }
    }

    @media (max-width: 480px) {
        .card-body {
            padding: 0.5rem;
        }
        #traffic-chart {
            min-height: 160px !important;
        }
    }
    .btn-group .btn {
        /* margin-left: 5px; */
        border-radius: 6px !important;
    }

    .btn-group .btn:hover {
        transform: translateY(-2px);
        transition: 0.2s;
    }


</style>

<!-- Vertical Performance Metrics Section -->
<div class="row mb-4">
    <div class="col-12">
        <div class="row">
            <!-- Top Performer Card -->
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="theme-avtar bg-primary">
                            <i class="ti ti-trophy"></i>
                        </div>
                        <p class="text-muted text-sm mt-2">{{ __('Top Performer') }}</p>
                        <h6 class="mb-1">{{ __('This Month') }}</h6>
                        <h3 class="mb-0">{{ $data['topPerformerValue'] ?? '0.00' }}</h3>
                        <small class="text-muted">{{ $data['topPerformer'] ?? 'N/A' }}</small>
                    </div>
                </div>
            </div>

            <!-- Your Standing GP Card -->
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="theme-avtar bg-success">
                            <i class="ti ti-chart-line"></i>
                        </div>
                        <p class="text-muted text-sm mt-2">{{ __('Your Standing GP') }}</p>
                        <h6 class="mb-1">{{ __('Gross Profit') }}</h6>
                        <h3 class="mb-0">{{ $data['standingGP'] ?? '0.00' }}</h3>
                        <small class="text-muted">Current period performance</small>
                    </div>
                </div>
            </div>

            <!-- Total Sales Card -->
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="theme-avtar bg-info">
                            <i class="ti ti-shopping-cart"></i>
                        </div>
                        <p class="text-muted text-sm mt-2">{{ __('Total Sales') }}</p>
                        <h6 class="mb-1">{{ __('This Month') }}</h6>
                        <h3 class="mb-0">{{ $data['totalSales'] ?? '0.00' }}</h3>
                        <small class="text-muted">Cumulative sales amount</small>
                    </div>
                </div>
            </div>
            <!-- Total Sales Return Card -->
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="theme-avtar bg-info">
                            <i class="ti ti-shopping-cart"></i>
                        </div>
                        <p class="text-muted text-sm mt-2">{{ __('Total Sales Return') }}</p>
                        <h6 class="mb-1">{{ __('This Month') }}</h6>
                        <h3 class="mb-0">{{ $data['totalSalesReturn'] ?? '0.00' }}</h3>
                        <small class="text-muted">Cumulative sales amount</small>
                    </div>
                </div>
            </div>
            <!-- Total Dispute Card -->
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="theme-avtar bg-info">
                            <i class="ti ti-shopping-cart"></i>
                        </div>
                        <p class="text-muted text-sm mt-2">{{ __('Total Dispute') }}</p>
                        <h6 class="mb-1">{{ __('This Month') }}</h6>
                        <h3 class="mb-0">{{ $data['totalSalesDispute'] ?? '0.00' }}</h3>
                        <small class="text-muted">Cumulative sales amount</small>
                    </div>
                </div>
            </div>

            <!-- Target Return Card -->
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="theme-avtar bg-warning">
                            <i class="ti ti-target"></i>
                        </div>
                        <p class="text-muted text-sm mt-2">{{ __('Target '.$data['targetText']) }}</p>
                        <h6 class="mb-1">{{ __($data['targetText']) }}</h6>
                        <h3 class="mb-0 {{$data['targetTextColor']}}">{{ $data['targetAmount'] ?? '0.00' }}</h3>
                        <small class="text-muted">Amount to reach target</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">

    <!-- [ sample-page ] start -->
    <div class="col-sm-12">
        <div class="row">
            <div class="col-xxl-12">
                <div class="row">
                    <div class="col-lg-2 col-md-6 col-sm-12">
                        <a href="{{ route('user.index') }}" class="text-decoration-none">
                            <div class="card">
                                <div class="card-body">
                                    <div class="theme-avtar bg-warning">
                                        <i class="ti ti-user"></i>
                                    </div>
                                    <p class="text-muted text-sm mt-4 mb-2"></p>
                                    <h6 class="mb-3">{{ __('Total User') }}</h6>
                                    <h3 class="mb-0">{{ $data['totalUser'] ?? 0 }}</h3>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-2 col-md-6 col-sm-12">
                        <a href="{{ route('lead.index') }}" class="text-decoration-none">
                            <div class="card">
                                <div class="card-body">
                                    <div class="theme-avtar bg-info">
                                        <i class="fas fa-address-card"></i>
                                    </div>
                                    <p class="text-muted text-sm mt-4 mb-2"></p>
                                    <h6 class="mb-3">{{ __('Total Lead') }}</h6>
                                    <h3 class="mb-0">{{ $data['totalLead'] ?? 0 }}</h3>
                                </div>
                            </div>
                        </a>
                    </div>                    
                    <div class="col-lg-2 col-md-6 col-sm-12">
                        <a href="{{ route('yards.index') }}" class="text-decoration-none">
                            <div class="card">
                                <div class="card-body">
                                    <div class="theme-avtar bg-danger">
                                        <i class="fas fa-house-damage"></i>
                                    </div>
                                    <p class="text-muted text-sm mt-4 mb-2"></p>
                                    <h6 class="mb-3">{{ __('Total Yard') }}</h6>
                                    <h3 class="mb-0">{{ $data['totalYard'] ?? 0 }}</h3>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-2 col-md-6 col-sm-12">
                        <a href="{{ route('salesorder.index') }}" class="text-decoration-none">
                            <div class="card">
                                <div class="card-body">
                                    <div class="theme-avtar bg-secondary">
                                        <i class="ti ti-file-invoice"></i>
                                    </div>
                                    <p class="text-muted text-sm mt-4 mb-2"></p>
                                    <h6 class="mb-3">{{ __('Total Sales') }}</h6>
                                    <h3 class="mb-0">{{ $data['totalSalesorder'] ?? 0 }}</h3>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-2 col-md-6 col-sm-12">
                        <a href="{{ route('dispute.index') }}" class="text-decoration-none">
                            <div class="card">
                                <div class="card-body">
                                    <div class="theme-avtar bg-primary">
                                        <i class="ti ti-package"></i>
                                    </div>
                                    <p class="text-muted text-sm mt-4 mb-2"></p>
                                    <h6 class="mb-3">{{ __('Total Dispute') }}</h6>
                                    <h3 class="mb-0">{{ $data['totalDispute'] ?? 0 }}</h3>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-2 col-md-6 col-sm-12">
                        <a href="{{ route('sales_return.index') }}" class="text-decoration-none">
                            <div class="card">
                                <div class="card-body">
                                    <div class="theme-avtar bg-dark">
                                        <i class="fas fa-history"></i>
                                    </div>
                                    <p class="text-muted text-sm mt-4 mb-2"></p>
                                    <h6 class="mb-3">{{ __('Total Return') }}</h6>
                                    <h3 class="mb-0">{{ $data['totalReturn'] ?? 0 }}</h3>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ sample-page ] end -->
    </div>

    <!-- [ Main Content ] end -->
</div>

@endsection

