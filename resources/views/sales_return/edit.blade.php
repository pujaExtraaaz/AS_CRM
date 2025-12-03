@extends('layouts.admin')
@section('page-title')
{{__('Sales Return Edit')}}
@endsection
@section('title')
{{__('Edit Sales Return')}}  {{ '('. \Auth::user()->salesorderNumberFormat($salesreturn->salesorder_id) .')' }}
@endsection
@php
$plansettings = App\Models\Utility::plansettings();
@endphp
@section('action-btn')
<div class="btn-group" role="group">
    @if(!empty($previous))
    <div class="action-btn  ms-2">
        <a href="{{ route('sales_return.edit',$previous) }}" class="btn btn-sm btn-primary btn-icon m-1" data-bs-toggle="tooltip" title="{{__('Previous')}}">
            <i class="ti ti-chevron-left"></i>
        </a>
    </div>
    @else
    <div class="action-btn  ms-2">
        <a href="#" class="btn btn-sm btn-primary btn-icon m-1 disabled" data-bs-toggle="tooltip" title="{{__('Previous')}}">
            <i class="ti ti-chevron-left"></i>
        </a>
    </div>
    @endif
    @if(!empty($next))
    <div class="action-btn  ms-2">
        <a href="{{ route('sales_return.edit',$next) }}" class="btn btn-sm btn-primary btn-icon m-1" data-bs-toggle="tooltip" title="{{__('Next')}}">
            <i class="ti ti-chevron-right"></i>
        </a>
    </div>
    @else
    <div class="action-btn  ms-2">
        <a href="#" class="btn btn-sm btn-primary btn-icon m-1 disabled" data-bs-toggle="tooltip" title="{{__('Next')}}">
            <i class="ti ti-chevron-right"></i>
        </a>
    </div>
    @endif
</div>
@endsection
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{__('Home')}}</a></li>
<li class="breadcrumb-item"><a href="{{route('sales_return.index')}}">{{__('Sales Return')}}</a></li>
<li class="breadcrumb-item">{{__('Edit')}}</li>
@endsection
@section('content')
<div class="row">
    <!-- [ sample-page ] start -->
    <div class="col-sm-12">
        <div class="row">
            <div class="col-xl-12">
                <div id="useradd-1" class="card">
                    {{Form::model($salesreturn,array('route' => array('sales_return.update', $salesreturn->id), 'method' => 'PUT','enctype'=>'multipart/form-data',"autocomplete"=>"off")) }}
                    <div class="card-body">
                        <div class="row">
                            <!-- <div class="col-12">
                                <div class="form-group">
                                    {{Form::label('sale_invoice_number',__('Invoice No'),['class'=>'form-label']) }}
                                    {{Form::text('sale_invoice_number',$salesOrder ? $salesOrder->sale_invoice_number : null,array('class'=>'form-control','placeholder'=>__('Search Invoice No'),'id'=>"SalesSearch"))}}
                                    <div id="SalesResults" class="border bg-white hidden"  style="position:absolute;width:auto;z-index:1000;"></div>
                                    <input type="hidden" name="salesorder_id" id="salesorder_id" value="{{$salesreturn->salesorder_id}}">
                                </div>
                            </div>    -->
                            <div class="col-12">
                                <div class="table-responsive">
                                    <table class="table" id="details">
                                        <thead>
                                            <tr>                        
                                                <th scope="col" class="sort" data-sort="completion">{{ __('Invoice No') }}</th>
                                                <th scope="col" class="sort" data-sort="name">{{ __('Customer Name') }}</th>
                                                <th scope="col" class="sort" data-sort="completion">{{ __('Customer Contact') }} </th>
                                                <th scope="col" class="sort" data-sort="completion">{{ __('Agent Name') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if($salesOrder)
                                            <tr>
                                                <td>{{$salesOrder->sale_invoice_number ?? ''}}</td>
                                                <td>{{$salesOrder->lead->cust_name ?? ''}}</td>
                                                <td>{{$salesOrder->lead->contact ?? ''}}</td>
                                                <td>{{$salesOrder->source_agent->name ?? ''}}</td>
                                            </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div> 
                            <div class="col-6">
                                <div class="form-group">
                                    {{Form::label('return_date',__('Return Date'),['class'=>'form-label']) }}
                                    {{Form::date('return_date',date('Y-m-d',strtotime($salesreturn->return_date)),array('class'=>'form-control datepicker','required'=>'required'))}}

                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    {{Form::label('case_status',__('Case Status'),['class'=>'form-label']) }}
                                    {!!Form::select('case_status', $case_status, $salesreturn->case_status,array('id'=>'case_status','class' => 'form-control','required'=>'required')) !!}
                                </div>
                            </div> 
                            <div class="col-6">
                                <div class="form-group">
                                    {{Form::label('request_type',__('Request Type'),['class'=>'form-label']) }}
                                    {!!Form::select('request_type', $request_type, $salesreturn->request_type,array('id'=>'request_type','class' => 'form-control','required'=>'required')) !!}
                                </div>
                            </div> 
                            <div class="col-6">
                                <div class="form-group">
                                    {{Form::label('salesreturn_tracknumber',__('Sales Return Track Number'),['class'=>'form-label']) }}
                                    {{Form::text('salesreturn_tracknumber',$salesreturn->salesreturn_tracknumber,array('class'=>'form-control','placeholder'=>__('Enter Sales Return Track Number')))}}                                   
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    {{Form::label('refund_received',__('Refund received'),['class'=>'form-label']) }}
                                    <div class="input-group">
                                        <span class="input-group-text">$</span>
                                        {{Form::number('refund_received',$salesreturn->refund_received,array('class'=>'form-control','placeholder'=>__('Enter Refund Amount'),'step'=>'0.01','min'=>'0','required'=>'required'))}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    {{Form::label('refund_issued',__('Refund issued'),['class'=>'form-label']) }}
                                    <div class="input-group">
                                        <span class="input-group-text">$</span>
                                        {{Form::number('refund_issued',$salesreturn->refund_issued,array('class'=>'form-control','placeholder'=>__('Enter Refund Amount'),'step'=>'0.01','min'=>'0'))}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    {{Form::label('gp_deduction',__('GP Deduction'),['class'=>'form-label']) }}
                                    <div class="input-group">
                                        <span class="input-group-text">$</span>
                                        {{Form::number('gp_deduction',$salesreturn->gp_deduction,array('class'=>'form-control','placeholder'=>__('Enter Refund Amount'),'step'=>'0.01','min'=>'0'))}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    {{Form::label('loss',__('Loss'),['class'=>'form-label']) }}
                                    <div class="input-group">
                                        <span class="input-group-text">$</span>
                                        {{Form::number('loss',$salesreturn->loss,array('class'=>'form-control','placeholder'=>__('Enter Refund Amount'),'step'=>'0.01','min'=>'0'))}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    {{Form::label('reason',__('Reason'),['class'=>'form-label']) }}
                                    {{Form::textarea('reason',$salesreturn->reason,array('class'=>'form-control','rows'=>2,'placeholder'=>__('Enter Reason')))}}
                                </div>
                            </div>
                            <!-- <input type="hidden" name="salesreturn_id" id="salesreturn_id" value="{{$salesreturn->salesreturn_id}}"> -->
                            <div class="text-end">
                                {{Form::submit(__('Update'),array('class'=>'btn-submit btn btn-primary'))}}
                            </div>
                        </div>
                    </div>
                    {{Form::close()}}
                </div>

            </div>
        </div>
        <!-- [ sample-page ] end -->
    </div>
    <!-- [ Main Content ] end -->
</div>



@endsection
@push('script-page')
<script>
    $(document).ready(function () {
        $("#SalesSearch").keyup(function () {
            let query = $(this).val();
            if (query.length < 1) {
                $("#SalesResults").html('');
                return;
            }

            $.ajax({
                url: "{{ route('sales.search') }}",
                type: "GET",
                data: {term: query},
                success: function (res) {
                    let html = "";
                    if (res.length > 0) {
                        res.forEach(row => {
                            html += `
                            <div class="p-2 border-bottom sales-order" 
                                style="cursor:pointer;"
                                data-id="${row.id}"
                                data-sale_invoice_number="${row.sale_invoice_number}"
                                data-part_number="${row.part_number}"
                                data-total_amount_quoted="${row.total_amount_quoted}"
                                data-part_type_name="${row.part_type_name}">
                                
                                <strong>${row.sale_invoice_number}</strong><br>
                                <small><strong>Part No.</strong>${row.part_number}</small>
                                ${(row.part_type_name) ? ('<small><strong>Part Type</strong> ' + row.part_type_name + '</small>') : ''}
                            </div>
                        `;
                        });
                    } else {
                        html = '<div class="p-2 text-muted">No results found</div>';
                    }
                    $("#SalesResults").html(html);
                }
            });
        });
        // When user clicks on result
        $(document).on("click", ".sales-order", function () {
            var salesOrderId = $(this).data("id");

            // Make second request to get full sales order details
            $.ajax({
                url: "{{ route('sales.order.get', ':id') }}".replace(':id', salesOrderId),
                type: "GET",
                success: function (salesOrder) {
                    console.log(salesOrder);

                    // Populate form fields with the full sales order data
                    $("#SalesSearch").val(salesOrder.sale_invoice_number || '');
                    $("#salesorder_id").val(salesOrder.id || '');

                    // Build table row with proper null checking
                    let customerName = (salesOrder.lead && salesOrder.lead.cust_name) ? salesOrder.lead.cust_name : '';
                    let customerContact = (salesOrder.lead && salesOrder.lead.contact) ? salesOrder.lead.contact : '';
                    let agentName = (salesOrder.source_agent && salesOrder.source_agent.name) ? salesOrder.source_agent.name : '';

                    // Build HTML for table row
                    let html_tbody = '<tr>' +
                            '<td>' + (salesOrder.sale_invoice_number || '') + '</td>' +
                            '<td>' + customerName + '</td>' +
                            '<td>' + customerContact + '</td>' +
                            '<td>' + agentName + '</td>' +
                            '</tr>';

                    // Insert into table tbody
                    $('#details tbody').html(html_tbody);

                    // Hide dropdown
                    $("#SalesResults").html("");
                },
                error: function (xhr) {
                    console.error('Error fetching sales order:', xhr);
                    alert('Error loading sales order details');
                }
            });
        });
    });
    var scrollSpy = new bootstrap.ScrollSpy(document.body, {
        target: '#useradd-sidenav',
        offset: 300
    })
</script>
@endpush
