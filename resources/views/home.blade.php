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
<div class="card mb-4">
    <div class="card-header d-flex justify-content-between align-items-center">
        <!-- <h4 class="mb-0">Dashboard Menu</h4> -->

        <div class="btn-group" role="group">

            <a href="{{ route('part_type.index') }}" class="btn btn-primary ms-2">
                Top Performer
            </a>

            <a href="{{ route('part_type.index') }}" class="btn btn-success ms-2">
                Your Standing Gp
            </a>

            <a href="{{ route('part_type.index') }}" class="btn btn-info ms-2">
                Total Sales
            </a>

            <a href="{{ route('part_type.index') }}" class="btn btn-warning ms-2">
                Target Pending
            </a>

        </div>
    </div>
</div>


<div class="row">

    <!-- [ sample-page ] start -->
    <div class="col-sm-12">
        <div class="row">
            @if (\Auth::user()->type == 'owner')
            <div class="col-xxl-7">
                <div class="row">
                    <div class="col-lg-4 col-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="theme-avtar bg-warning">
                                    <i class="ti ti-user"></i>
                                </div>
                                <p class="text-muted text-sm mt-4 mb-2"></p>
                                <h6 class="mb-3">{{ __('Total User') }}</h6>
                                <h3 class="mb-0">{{ $data['totalUser'] }} </h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="theme-avtar bg-info">
                                    <i class="fas fa-address-card"></i>
                                </div>
                                <p class="text-muted text-sm mt-4 mb-2"></p>
                                <h6 class="mb-3">{{ __('Total Lead') }}</h6>
                                <h3 class="mb-0">{{ $data['totalLead'] }}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="theme-avtar bg-secondary">
                                    <i class="ti ti-file-invoice"></i>
                                </div>
                                <p class="text-muted text-sm mb-1 "></p>
                                <h6 class="mb-3">{{ __('Total Sales Order') }}</h6>
                                <h3 class="mb-0">{{ $data['totalSalesorder'] }}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="theme-avtar bg-success">
                                    <i class="ti ti-brand-producthunt"></i>
                                </div>
                                <p class="text-muted text-sm mt-4 mb-2"></p>
                                <h6 class="mb-3">{{ __('Total Product') }}</h6>
                                <h3 class="mb-0">{{ $data['totalProduct'] }}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="theme-avtar bg-danger">
                                    <i class="fas fa-house-damage"></i>
                                </div>
                                <p class="text-muted text-sm mt-4 mb-2"></p>
                                <h6 class="mb-3">{{ __('Total Yard') }}</h6>
                                <h3 class="mb-0">{{ $data['totalYard'] }}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="theme-avtar bg-dark">
                                    <i class="fas fa-history"></i>
                                </div>
                                <p class="text-muted text-sm mt-4 mb-2"></p>
                                <h6 class="mb-3">{{ __('Total Return') }}</h6>
                                <h3 class="mb-0">{{ $data['totalSalesReturn'] }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
        <!-- [ sample-page ] end -->
    </div>

    <!-- [ Main Content ] end -->
</div>

@endsection

