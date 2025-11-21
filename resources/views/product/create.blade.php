@extends('layouts.admin')
@section('page-title')
{{ __('Dispute') }}
@endsection
@section('title')
{{ __('Create Dispute / Service') }}
@endsection
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Home') }}</a></li>
<li class="breadcrumb-item"><a href="{{ route('product.index') }}">{{ __('Dispute') }}</a></li>
<li class="breadcrumb-item">{{ __('Create') }}</li>
@endsection
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h5>{{ __('Create Dispute / Service') }}</h5>
                <small class="text-muted">{{ __('Add new Dispute information') }}</small>
            </div>
            <div class="card-body">
                @php
                $plansettings = App\Models\Utility::plansettings();
                @endphp
                {{Form::open(array('url'=>'product','method'=>'post','enctype'=>'multipart/form-data'))}}
                <div class="row">
                    @if (isset($plansettings['enable_chatgpt']) && $plansettings['enable_chatgpt'] == 'on')
                    <div class="text-end">
                        <a href="#" data-size="md" class="btn btn-sm btn-primary" data-ajax-popup-over="true" data-size="md"
                           data-title="{{ __('Generate content with AI') }}" data-url="{{ route('generate', ['product']) }}"
                           data-toggle="tooltip" title="{{ __('Generate') }}">
                            <i class="fas fa-robot"></span><span class="robot">{{ __('Generate With AI') }}</span></i>
                        </a>
                    </div>
                    @endif
                    <div class="col-6">
                        <div class="form-group">
                            {{Form::label('year',__('Year'),['class'=>'form-label']) }}
                            {!!Form::select('year', $years, null,array('class' => 'form-control','required'=>'required')) !!}
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            {{Form::label('make',__('Make'),['class'=>'form-label']) }}
                            {{Form::text('make',null,array('class'=>'form-control','placeholder'=>__('Enter Make'),'required'=>'required'))}}
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            {{Form::label('model',__('Model'),['class'=>'form-label']) }}
                            {{Form::text('model',null,array('class'=>'form-control','placeholder'=>__('Enter Model'),'required'=>'required'))}}
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            {{Form::label('part_name',__('Part Name'),['class'=>'form-label']) }}
                            {{Form::text('part_name',null,array('class'=>'form-control','placeholder'=>__('Enter Part Name'),'required'=>'required'))}}
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            {{Form::label('is_active',__('Status'),['class'=>'form-label']) }}
                            {!!Form::select('is_active', $status, null,array('class' => 'form-control','required'=>'required')) !!}
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group text-end">
                            <a href="{{ route('product.index') }}" class="btn btn-light">{{ __('Cancel') }}</a>
                            {{Form::submit(__('Create'),array('class'=>'btn btn-primary'))}}
                        </div>
                    </div>
                </div>
                {{Form::close()}}
            </div>
        </div>
    </div>
</div>
@endsection

@push('script-page')
<script src="{{asset('assets/js/plugins/choices.min.js')}}"></script>
<script src="{{ asset('libs/select2/dist/js/select2.min.js')}}"></script>
@endpush
