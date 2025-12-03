@extends('layouts.admin')
@section('page-title')
{{__('Sales Dispute Edit')}}
@endsection
@section('title')
{{__('Edit Sales Dispute')}}  {{ '('. \Auth::user()->disputeFormat($dispute->dispute_id) .')' }}
@endsection
@php
$plansettings = App\Models\Utility::plansettings();
@endphp
@section('action-btn')
<div class="btn-group" role="group">
    @if(!empty($previous))
    <div class="action-btn  ms-2">
        <a href="{{ route('dispute.edit',$previous) }}" class="btn btn-sm btn-primary btn-icon m-1" data-bs-toggle="tooltip" title="{{__('Previous')}}">
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
        <a href="{{ route('dispute.edit',$next) }}" class="btn btn-sm btn-primary btn-icon m-1" data-bs-toggle="tooltip" title="{{__('Next')}}">
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
<li class="breadcrumb-item"><a href="{{route('dispute.index')}}">{{__('Dispute')}}</a></li>
<li class="breadcrumb-item">{{__('Edit')}}</li>
@endsection
@section('content')
<div class="row">
    <!-- [ sample-page ] start -->
    <div class="col-sm-12">
        <div class="row">
            <div class="col-xl-12">
                <div id="useradd-1" class="card">
                    {{Form::model($dispute,array('route' => array('dispute.update', $dispute->id), 'method' => 'PUT','enctype'=>'multipart/form-data',"autocomplete"=>"off")) }}
                    <div class="card-body">
                        <div class="row">
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
                                            @if($dispute->sales_order)
                                            <tr>
                                                <td>{{$dispute->sales_order->sale_invoice_number ?? ''}}</td>
                                                <td>{{$dispute->sales_order->lead->cust_name ?? ''}}</td>
                                                <td>{{$dispute->sales_order->lead->contact ?? ''}}</td>
                                                <td>{{$dispute->source_user->name ?? ''}}</td>
                                            </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div> 
                            <div class="col-6">
                                <div class="form-group">
                                    {{Form::label('dispute_date',__('Dispute Date'),['class'=>'form-label']) }}
                                    {{Form::date('dispute_date',date('Y-m-d',strtotime($dispute->dispute_date)),array('class'=>'form-control datepicker','required'=>'required'))}}

                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    {{Form::label('dispute_type',__('Dispute Type'),['class'=>'form-label']) }}
                                    {{Form::select('dispute_type',$dispute_type,$dispute->dispute_type,array('class'=>'form-control','required'=>'required'))}}
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    {{Form::label('dispute_status',__('Status'),['class'=>'form-label']) }}
                                    {{Form::select('dispute_status',$dispute_status,$dispute->dispute_status,array('class'=>'form-control'))}}
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    {{Form::label('disputed_amount',__('Disputed Amount'),['class'=>'form-label']) }}
                                    <div class="input-group">
                                        <span class="input-group-text">$</span>
                                        {{Form::number('disputed_amount',$dispute->disputed_amount,array('class'=>'form-control','placeholder'=>__('Enter Disputed Amount'),'step'=>'0.01','min'=>'0','required'=>'required'))}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    {{Form::label('gp_deduction',__('GP Deduction'),['class'=>'form-label']) }}
                                    <div class="input-group">
                                        <span class="input-group-text">$</span>
                                        {{Form::number('gp_deduction',$dispute->gp_deduction,array('class'=>'form-control','placeholder'=>__('Enter GP Deduction'),'step'=>'0.01','min'=>'0'))}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    {{Form::label('loss',__('Loss'),['class'=>'form-label']) }}
                                    <div class="input-group">
                                        <span class="input-group-text">$</span>
                                        {{Form::number('loss',$dispute->loss,array('class'=>'form-control','placeholder'=>__('Enter Loss'),'step'=>'0.01','min'=>'0'))}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    {{Form::label('reason',__('Reason'),['class'=>'form-label']) }}
                                    {{Form::textarea('reason',$dispute->reason,array('class'=>'form-control','rows'=>2,'placeholder'=>__('Enter Reason')))}}
                                </div>
                            </div>
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
    var scrollSpy = new bootstrap.ScrollSpy(document.body, {
        target: '#useradd-sidenav',
        offset: 300
    })
</script>
@endpush

