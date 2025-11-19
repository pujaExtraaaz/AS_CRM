@extends('layouts.admin')
@section('page-title')
{{ __('Sales Return') }}
@endsection
@section('title')
{{ __('Sales Return') }} {{ '(' . \Auth::user()->salesorderNumberFormat($salesreturn->salesorder_id) . ')' }}
@endsection
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Home') }}</a></li>
<li class="breadcrumb-item"><a href="{{ route('sales_return.index') }}">{{ __('Sales Return') }}</a></li>
<li class="breadcrumb-item">{{ __('Details') }}</li>
@endsection
@section('action-btn')
@can('Edit SalesOrder')
<div class="action-btn ms-2">
    <a href="{{ route('sales_return.edit', $salesreturn->id) }}" class="btn btn-sm btn-info btn-icon m-1"
       data-bs-toggle="tooltip" data-title="{{ __('Sales order Edit') }}" title="{{ __('Edit') }}"><i
            class="ti ti-edit"></i>
    </a>
</div>
@endcan
<div class="action-btn ms-2">
    <a href="#" data-size="md" data-url="{{ route('sales_return.create', $salesreturn->id) }}"
       data-ajax-popup="true" data-bs-toggle="tooltip" data-title="{{ __('Create New SalesReturn') }}"
       title="{{ __('Create') }}" class="btn btn-sm btn-primary btn-icon m-1">
        <i class="ti ti-plus"></i>
    </a>
</div>
@endsection
@section('content')

<div class="row">
    <div class="col-lg-12">
        <!-- [ Invoice ] start -->
        <div class="container">
            <div>
                <div class="card" id="printTable">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12 ">
                                <div class="table-responsive mt-4">
                                    <table class="table invoice-detail-table">
                                        <thead>
                                            <tr class="thead-default">
                                                <th scope="col" class="sort" data-sort="id">{{ __('Sales Return ID') }}</th><td>{{ \Auth::user()->salesReturnFormat($salesreturn->id) }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="col" class="sort" data-sort="name">{{ __('Sales Order No') }}</th><td>{{ \Auth::user()->salesorderNumberFormat($salesreturn->salesorder_id) }} </td>
                                            </tr>
                                            <tr>
                                                <th scope="col" class="sort" data-sort="completion">{{ __('Return Date') }} </th><td>{{ \Auth::user()->dateFormat($salesreturn->return_date) }} </td>          
                                            </tr>
                                            <tr>
                                                <th scope="col" class="sort" data-sort="completion">{{ __('Request Type') }}</th><td>{{ __(\App\Models\SalesReturn::$request_type[$salesreturn->request_type]) }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="col" class="sort" data-sort="completion">{{ __('Return By User') }}</th><td>{{ ucfirst(!empty($salesreturn->source_user) ? $salesreturn->source_user->name : '-') }}</td>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>                       

                    </div>
                </div>
            </div>
        </div>

    </div>

    @endsection
    @push('script-page')
    <script>
        document.querySelector('.btn-print-invoice').addEventListener('click', function() {
        var link2 = document.createElement('link');
        link2.innerHTML =
                '<style>@media print{*,::after,::before{text-shadow:none!important;box-shadow:none!important}a:not(.btn){text-decoration:none}abbr[title]::after{content:" ("attr(title) ")"}pre{white-space:pre-wrap!important}blockquote,pre{border:1px solid #adb5bd;page-break-inside:avoid}thead{display:table-header-group}img,tr{page-break-inside:avoid}table,thead,tr,td{background:transparent}h2,h3,p{orphans:3;widows:3}h2,h3{page-break-after:avoid}@page{size:a3}body{min-width:992px!important}.container{min-width:992px!important}.page-header,.pc-sidebar,.pc-mob-header,.pc-header,.pct-customizer,.modal,.navbar{display:none}.pc-container{top:0;}.invoice-contact{padding-top:0;}@page,.card-body,.card-header,body,.pcoded-content{padding:0;margin:0}.badge{border:1px solid #000}.table{border-collapse:collapse!important}.table td,.table th{background-color:#fff!important}.table-bordered td,.table-bordered th{border:1px solid #dee2e6!important}.table-dark{color:inherit}.table-dark tbody+tbody,.table-dark td,.table-dark th,.table-dark thead th{border-color:#dee2e6}.table .thead-dark th{color:inherit;border-color:#dee2e6}}</style>';
        document.getElementsByTagName('head')[0].appendChild(link2);
        window.print();
        })
    </script>
    @endpush
