@extends('layouts.admin')
@section('page-title')
{{ __('Sales') }}
@endsection
@section('title')
{{ __('Sales') }} {{ '(' . $salesOrder->lead->cust_name . ')' }}
@endsection
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Home') }}</a></li>
<li class="breadcrumb-item"><a href="{{ route('salesorder.index') }}">{{ __('Sales') }}</a></li>
<li class="breadcrumb-item">{{ __('Details') }}</li>
@endsection
@section('action-btn')
<div class="action-btn bg-warning ms-2">
    <a href="{{ route('salesorder.pdf', \Crypt::encrypt($salesOrder->id)) }}" target="_blank"
       class="btn btn-sm btn-primary btn-icon" data-bs-toggle="tooltip" title="{{ __('Print') }}">
        <span class="btn-inner--icon text-white"><i class="ti ti-printer"></i></span>
    </a>
</div>
<!--    @if (Auth::user()->type == 'owner')
        <div class="action-btn ms-2">
            <a href="#" class="btn btn-sm btn-warning btn-icon m-1 cp_link"
                data-link="{{ route('pay.salesorder', \Illuminate\Support\Facades\Crypt::encrypt($salesOrder->id)) }}"
                data-bs-toggle="tooltip"
                data-title="{{ __('Click to copy SalesOrder link') }}"title="{{ __('copy salesorder') }}"><span
                    class="btn-inner--icon text-white"><i class="ti ti-file"></i></span></a>
        </div>
    @endif-->
@can('Edit SalesOrder')
<div class="action-btn ms-2">
    <a href="{{ route('salesorder.edit', $salesOrder->id) }}" class="btn btn-sm btn-info btn-icon m-1"
       data-bs-toggle="tooltip" data-title="{{ __('Sales Edit') }}" title="{{ __('Edit') }}"><i
            class="ti ti-edit"></i>
    </a>
</div>
@endcan
<!--    <div class="action-btn ms-2">
        <a href="#" data-size="md" data-url="{{ route('salesorder.salesorderitem', $salesOrder->id) }}"
            data-ajax-popup="true" data-bs-toggle="tooltip" data-title="{{ __('Create New SalesOrder') }}"
            title="{{ __('Create') }}" class="btn btn-sm btn-primary btn-icon m-1">
            <i class="ti ti-plus"></i>
        </a>
    </div>-->
@endsection
@section('content')

<div class="row">
    <div class="col-lg-12">
        <!-- [ Invoice ] start -->
        <div class="container">
            <div>
                <div class="card" id="printTable">
                    <div class="card-body">
                       
                        <div class="col-lg-10 mt-4">
                            <!-- Sales Order Details Section -->
                            <div class="card">
                                <div class="card-header">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h5 class="mb-0">{{ __('Sales Details') }}</h5>
                                            <small class="text-muted">{{ __('Complete sales information') }}</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <!-- Sales Information -->
                                        <div class="col-md-6">
                                            <h6 class="text-primary mb-3">{{ __('Sales Information') }}</h6>
                                            <div class="row">
                                                <div class="col-12 mb-2">
                                                    <strong>{{ __('Sales Order Number:') }}</strong> SO-{{ str_pad($salesOrder->id, 6, '0', STR_PAD_LEFT) }}
                                                </div>
                                                <div class="col-12 mb-2">
                                                    <strong>{{ __('Sale Date:') }}</strong> {{ $salesOrder->sale_date ?? ($salesOrder->created_at ? \Auth::user()->dateFormat($salesOrder->created_at) : 'Not set') }}
                                                </div>
                                                <div class="col-12 mb-2">
                                                    <strong>{{ __('Sale Status:') }}</strong> {{ $salesOrder->sale_status ?? 'Open' }}
                                                </div>
<!--                                                <div class="col-12 mb-2">
                                                    <strong>{{ __('Lead ID:') }}</strong> {{ $salesOrder->lead_id ?? 'Not set' }}
                                                </div>-->
                                                <div class="col-12 mb-2">
                                                    <strong>{{ __('Sales Agent:') }}</strong> {{ $salesOrder->salesUser ? $salesOrder->salesUser->name : 'Not assigned' }}
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Customer Information -->
                                        <div class="col-md-6">
                                            <h6 class="text-primary mb-3">{{ __('Customer Information') }}</h6>
                                            <div class="row">
                                                @if($salesOrder->lead)
                                                <div class="col-12 mb-2">
                                                    <strong>{{ __('Customer Name:') }}</strong> {{ $salesOrder->lead->cust_name ?? $salesOrder->lead->name ?? 'Not set' }}
                                                </div>
                                                <div class="col-12 mb-2">
                                                    <strong>{{ __('Contact Number:') }}</strong> {{ $salesOrder->lead->contact ?? 'Not set' }}
                                                </div>
                                                <div class="col-12 mb-2">
                                                    <strong>{{ __('Customer Email:') }}</strong> {{ $salesOrder->lead->email ?? 'Not set' }}
                                                </div>
                                                <div class="col-12 mb-2">
                                                    <strong>{{ __('Lead Type:') }}</strong> {{ $salesOrder->leadType ? $salesOrder->leadType->name : 'Not set' }}
                                                </div>
                                                @else
                                                <div class="col-12 mb-2">
                                                    <span class="text-muted">{{ __('No lead information available') }}</span>
                                                </div>
                                                @endif
                                            </div>
                                        </div>

                                        <!-- Product Information -->
                                        @if($salesOrder->lead && $salesOrder->lead->product)
                                        <div class="col-md-6 mt-3">
                                            <h6 class="text-primary mb-3">{{ __('Product Information') }}</h6>
                                            <div class="row">
                                                <div class="col-12 mb-2">
                                                    <strong>{{ __('Part Name:') }}</strong> {{ $salesOrder->lead->product->part_name ?? 'Not set' }}
                                                </div>
                                                <div class="col-12 mb-2">
                                                    <strong>{{ __('Part Number:') }}</strong> {{ $salesOrder->part_number ?? 'Not set' }}
                                                </div>
                                                <div class="col-12 mb-2">
                                                    <strong>{{ __('Year:') }}</strong><br>{{ $salesOrder->lead->product->year ?? 'Not set' }}
                                                </div>
                                                <div class="col-12 mb-2">
                                                    <strong>{{ __('Make:') }}</strong><br>{{ $salesOrder->lead->product->make ?? 'Not set' }}
                                                </div>
                                                <div class="col-12 mb-2">
                                                    <strong>{{ __('Model:') }}</strong><br>{{ $salesOrder->lead->product->model ?? 'Not set' }}
                                                </div>
                                                <div class="col-12 mb-2">
                                                    <strong>{{ __('VIN Number:') }}</strong> {{ $salesOrder->vin_number ?? 'Not set' }}
                                                </div>
                                                <div class="col-12 mb-2">
                                                    <strong>{{ __('Part Type:') }}</strong> {{ ucfirst($salesOrder->part_type ?? 'Not set') }}
                                                </div>
                                            </div>
                                        </div>
                                        @endif

                                        <!-- Sourcing Information -->
                                        <div class="col-md-6 mt-3">
                                            <h6 class="text-primary mb-3">{{ __('Sourcing Information') }}</h6>
                                            <div class="row">
                                                <div class="col-12 mb-2">
                                                    <strong>{{ __('Source Type:') }}</strong> {{ $salesOrder->sourceType ?$salesOrder->sourceType->name: 'Not set' }}
                                                </div>
                                                @if($salesOrder->yard)
                                                <div class="col-12 mb-2">
                                                    <strong>{{ __('Yard Name:') }}</strong> {{ $salesOrder->yard->yard_name }}
                                                </div>
                                                @endif
                                                @if($salesOrder->yard_order_date)
                                                <div class="col-12 mb-2">
                                                    <strong>{{ __('Yard Order Date:') }}</strong> {{ \Auth::user()->dateFormat($salesOrder->yard_order_date) }}
                                                </div>
                                                @endif
                                            </div>
                                        </div>

                                        <!-- Pricing Information -->
                                        <div class="col-md-6 mt-3">
                                            <h6 class="text-primary mb-3">{{ __('Pricing Information') }}</h6>
                                            <div class="row">
                                                <div class="col-6 mb-2">
                                                    <strong>{{ __('Part Price:') }}</strong><br>{{ $salesOrder->part_price ? \Auth::user()->priceFormat($salesOrder->part_price) : 'Not set' }}
                                                </div>
                                                <div class="col-6 mb-2">
                                                    <strong>{{ __('Shipping Price:') }}</strong><br>{{ $salesOrder->shipping_price ? \Auth::user()->priceFormat($salesOrder->shipping_price) : 'Not set' }}
                                                </div>
                                                <div class="col-6 mb-2">
                                                    <strong>{{ __('Charge Amount:') }}</strong><br>{{ $salesOrder->charge_amount ? \Auth::user()->priceFormat($salesOrder->charge_amount) : 'Not set' }}
                                                </div>
                                                <div class="col-6 mb-2">
                                                    <strong>{{ __('Total Quoted:') }}</strong><br>{{ $salesOrder->total_amount_quoted ? \Auth::user()->priceFormat($salesOrder->total_amount_quoted) : 'Not set' }}
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Payment Information -->
                                        <div class="col-md-6 mt-3">
                                            <h6 class="text-primary mb-3">{{ __('Payment Information') }}</h6>
                                            <div class="row">
                                                <div class="col-12 mb-2">
                                                    <strong>{{ __('Payment Gateway:') }}</strong> {{ ucfirst($salesOrder->payment_gateway_name ?? 'Not set') }}
                                                </div>
                                                @if($salesOrder->card_number)
                                                <div class="col-12 mb-2">
                                                    <strong>{{ __('Card Number:') }}</strong> {{ $salesOrder->card_number }}
                                                </div>
                                                @endif
                                                @if($salesOrder->expiration)
                                                <div class="col-12 mb-2">
                                                    <strong>{{ __('Expiration:') }}</strong> {{ $salesOrder->expiration }}
                                                </div>
                                                @endif
                                                @if($salesOrder->cvv_number)
                                                <div class="col-12 mb-2">
                                                    <strong>{{ __('CVV:') }}</strong> {{ $salesOrder->cvv_number }}
                                                </div>
                                                @endif
                                            </div>
                                        </div>

                                        <!-- Agent Notes -->
                                        @if($salesOrder->agent_note)
                                        <div class="col-12 mt-3">
                                            <h6 class="text-primary mb-3">{{ __('Agent Notes') }}</h6>
                                            <div class="alert alert-light">
                                                {{ $salesOrder->agent_note }}
                                            </div>
                                        </div>
                                        @endif

                                        <!-- Description -->
                                        @if($salesOrder->description)
                                        <div class="col-12 mt-3">
                                            <h6 class="text-primary mb-3">{{ __('Description') }}</h6>
                                            <div class="alert alert-light">
                                                {{ $salesOrder->description }}
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <!-- Yard Details Section -->
                            @if($salesOrder->yard)
                            <div class="card">
                                <div class="card-header">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h5 class="mb-0">{{ __('Yard Details') }}</h5>
                                            <small class="text-muted">{{ __('Yard information and order details') }}</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="alert alert-success">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <strong>{{ __('Yard Name:') }}</strong> {{ $salesOrder->yard ? $salesOrder->yard->yard_name : 'Not set' }}<br>
                                                <strong>{{ __('Yard Order Date:') }}</strong> {{ $salesOrder->yard_order_date ? \Auth::user()->dateFormat($salesOrder->yard_order_date) : 'Not set' }}<br>
                                                <strong>{{ __('Expected Delivery:') }}</strong> {{ $salesOrder->delivery_date ? \Auth::user()->dateFormat($salesOrder->delivery_date) : 'Not set' }}<br>                                                
                                            </div>
                                            <div class="col-md-6">
                                                <strong>{{ __('Card Used:') }}</strong> {{ $salesOrder->card_used ?: 'Not set' }}<br>                                                
                                                <strong>{{ __('Tracking Number:') }}</strong> SO-{{ str_pad($salesOrder->id, 6, '0', STR_PAD_LEFT) }}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <strong>{{ __('Comments:') }}</strong> {{ $salesOrder->comment ?: 'No comments' }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif

                            <!-- Yard Logs Section -->
                            @if($salesOrder->yardLogs && $salesOrder->yardLogs->count() > 0)
                            <div class="card mt-4">
                                <div class="card-header">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h5 class="mb-0">{{ __('Yard Activity Logs') }}</h5>
                                            <small class="text-muted">{{ __('Track yard operations and delivery status') }}</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    @foreach($salesOrder->yardLogs as $log)
                                    <div class="card mb-2">
                                        <div class="card-body py-2">
                                            <div class="row align-items-center">
                                                <div class="col-md-7">
                                                    <div class="d-flex align-items-center">
                                                        <div>
                                                            <h6 class="mb-1">
                                                                @if($log->yard)
                                                                <small class="text-muted">({{ $log->yard->yard_name }})</small>
                                                                @endif
                                                            </h6>
                                                            <small class="text-muted">
                                                                <i class="ti ti-user me-1"></i>{{ $log->createdBy->name ?? 'Unknown' }}
                                                                <i class="ti ti-clock me-1 ms-2"></i>{{ $log->created_at->format('M d, Y H:i') }}
                                                            </small>
                                                            @if($log->comments)
                                                            <br><small class="text-info">
                                                                <i class="ti ti-message me-1"></i>{{ $log->comments }}
                                                            </small>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>                                               
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            @endif
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
<script>
            $(document).on('change', 'select[name=item]', function() {
    var item_id = $(this).val();
    $.ajax({
    url: '{{ route('salesorder.items') }}',
            type: 'GET',
            headers: {
            'X-CSRF-TOKEN': jQuery('#token').val()
            },
            data: {
            'item_id': item_id,
            },
            cache: false,
            success: function(data) {
            var invoiceItems = JSON.parse(data);
            $('.taxId').val('');
            $('.tax').html('');
            $('.price').val(invoiceItems.price);
            $('.quantity').val(1);
            $('.discount').val(0);
            var taxes = '';
            var tax = [];
            for (var i = 0; i < invoiceItems.taxes.length; i++) {
            taxes += '<span class="badge bg-primary ms-1 mt-1">' + invoiceItems.taxes[i]
                    .tax_name + ' ' + '(' + invoiceItems.taxes[i].rate + '%)' + '</span>';
            }
            $('.taxId').val(invoiceItems.tax);
            $('.tax').html(taxes);
            }
    });
    });
    $('.cp_link').on('click', function() {
    var value = $(this).attr('data-link');
    var $temp = $("<input>");
    $("body").append($temp);
    $temp.val(value).select();
    document.execCommand("copy");
    $temp.remove();
    show_toastr('Success', '{{ __('Link Copy on Clipboard') }}', 'success')
    });
</script>
@endpush
