@extends('layouts.admin')
@section('page-title')
    {{ __('Edit Yard') }}
@endsection
@section('title')
    {{ __('Edit Yard') }} {{ '(' . $yard->yard_name . ')' }}
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Home') }}</a></li>
    <li class="breadcrumb-item"><a href="{{ route('yards.index') }}">{{ __('Yards') }}</a></li>
    <li class="breadcrumb-item">{{ __('Edit') }}</li>
@endsection
@section('action-btn')
@endsection
@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <form method="post" action="{{ route('yards.update', $yard->id) }}" class="needs-validation" novalidate="">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">{{ __('Yard Name') }} <span class="text-danger">*</span></label>
                                    <div class="form-icon-user">
                                        {{ Form::text('yard_name', $yard->yard_name, ['class' => 'form-control', 'required' => 'required', 'placeholder' => __('Enter Yard Name')]) }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">{{ __('Email') }} <span class="text-danger">*</span></label>
                                    <div class="form-icon-user">
                                        {{ Form::email('yard_email', $yard->yard_email, ['class' => 'form-control', 'required' => 'required', 'placeholder' => __('Enter Email')]) }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">{{ __('Contact Person') }} <span class="text-danger">*</span></label>
                                    <div class="form-icon-user">
                                        {{ Form::text('yard_person_name', $yard->yard_person_name, ['class' => 'form-control', 'required' => 'required', 'placeholder' => __('Enter Contact Person Name')]) }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">{{ __('Phone') }} <span class="text-danger">*</span></label>
                                    <div class="form-icon-user">
                                        {{ Form::text('contact', $yard->contact, ['class' => 'form-control', 'required' => 'required', 'placeholder' => __('Enter Contact Number')]) }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">{{ __('Address') }} <span class="text-danger">*</span></label>
                                    <div class="form-icon-user">
                                        {{ Form::textarea('yard_address', $yard->yard_address, ['class' => 'form-control', 'required' => 'required', 'placeholder' => __('Enter Address'), 'rows' => 3]) }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="text-end">
                                        <input type="submit" value="{{ __('Update') }}" class="btn btn-primary">
                                        <input type="button" value="{{ __('Cancel') }}" class="btn btn-secondary" onclick="location.href = '{{ route('yards.index') }}';">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
