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
                    {{Form::model($salesreturn,array('route' => array('sales_return.update', $salesreturn->id), 'method' => 'PUT')) }}
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    {{Form::label('salesorder',__('Sales Orders'),['class'=>'form-label']) }}
                                    {!!Form::select('salesorder', $salesorder, $salesreturn->salesorder_id,array('id'=>'salesorder','class' => 'form-control','required'=>'required')) !!}
                                </div>
                            </div>        
                            <div class="col-6">
                                <div class="form-group">
                                    {{Form::label('salesreturn_number',__('Sales Return Number'),['class'=>'form-label']) }}
                                    {{Form::text('salesreturn_number',\Auth::user()->salesReturnFormat($salesreturn->salesreturn_id),array('class'=>'form-control','placeholder'=>__('Enter Sales Return Number'),'disabled'))}}
                                    <input type="hidden" name="salesreturn_id" id="salesreturn_id" value="{{$salesreturn->salesreturn_id}}">
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
                                    {{Form::label('request_type',__('Request Type'),['class'=>'form-label']) }}
                                    {!!Form::select('request_type', $request_type, $salesreturn->request_type,array('id'=>'request_type','class' => 'form-control','required'=>'required')) !!}
                                </div>
                            </div> 
                            <div class="col-6">
                                <div class="form-group">
                                    {{Form::label('refund_amount',__('Refund Amount'),['class'=>'form-label']) }}
                                    <div class="input-group">
                                        <span class="input-group-text">$</span>
                                        {{Form::number('refund_amount',null,array('class'=>'form-control','placeholder'=>__('Enter Refund Amount'),'step'=>'0.01','min'=>'0'))}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    {{Form::label('reason',__('Reason'),['class'=>'form-label']) }}
                                    {{Form::textarea('reason',null,array('class'=>'form-control','rows'=>2,'placeholder'=>__('Enter Reason')))}}
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
