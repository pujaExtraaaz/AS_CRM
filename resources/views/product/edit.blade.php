@extends('layouts.admin')
@section('page-title')
{{ __('Product') }}
@endsection
@section('title')
{{ __('Edit Dispute / Service') }} {{ '(' . $product->part_name . ')' }}
@endsection
@php
$plansettings = App\Models\Utility::plansettings();
@endphp
@section('action-btn')
<div class="btn-group" role="group">
    @if (!empty($previous))
    <div class="action-btn  ms-2">
        <a href="{{ route('product.edit', ['product' => $previous, 'year' => $year ?? '', 'warehouse' => $warehouseParam ?? '']) }}" class="btn btn-sm btn-primary btn-icon m-1"
           data-bs-toggle="tooltip" title="{{ __('Previous') }}">
            <i class="ti ti-chevron-left"></i>
        </a>
    </div>
    @else
    <div class="action-btn  ms-2">
        <a href="#" class="btn btn-sm btn-primary btn-icon m-1 disabled" data-bs-toggle="tooltip"
           title="{{ __('Previous') }}">
            <i class="ti ti-chevron-left"></i>
        </a>
    </div>
    @endif
    @if (!empty($next))
    <div class="action-btn ms-2">
        <a href="{{ route('product.edit', ['product' => $next, 'year' => $year ?? '', 'warehouse' => $warehouseParam ?? '']) }}" class="btn btn-sm btn-primary btn-icon m-1"
           data-bs-toggle="tooltip" title="{{ __('Next') }}">
            <i class="ti ti-chevron-right"></i>
        </a>
    </div>
    @else
    <div class="action-btn  ms-2">
        <a href="#" class="btn btn-sm btn-primary btn-icon m-1 disabled" data-bs-toggle="tooltip"
           title="{{ __('Next') }}">
            <i class="ti ti-chevron-right"></i>
        </a>
    </div>
    @endif
</div>
@endsection
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Home') }}</a></li>
<li class="breadcrumb-item"><a href="{{ route('product.index') }}">{{ __('Dispute') }}</a></li>
<li class="breadcrumb-item">{{ __('Edit') }}</li>
@endsection
@section('content')
<div class="row">
    <!-- [ sample-page ] start -->
    <div class="col-sm-12">
        <div class="row">
            <div class="col-xl-3">
                <div class="card sticky-top" style="top:30px">
                    <div class="list-group list-group-flush" id="useradd-sidenav">
                        <a href="#useradd-1" class="list-group-item list-group-item-action">{{ __('Overview') }} <div
                                class="float-end"><i class="ti ti-chevron-right"></i></div></a>
                    </div>
                </div>
            </div>
            <div class="col-xl-9">
                <div id="useradd-1" class="card">
                    {{ Form::model($product, ['route' => ['product.update', $product->id], 'method' => 'PUT']) }}
                    <div class="card-header">
                        @if (isset($plansettings['enable_chatgpt']) && $plansettings['enable_chatgpt'] == 'on')
                        <div class="float-end">
                            <a href="#" data-size="md" class="btn btn-sm btn-primary "
                               data-ajax-popup-over="true" data-size="md"
                               data-title="{{ __('Generate content with AI') }}"
                               data-url="{{ route('generate', ['product']) }}" data-toggle="tooltip"
                               title="{{ __('Generate') }}">
                                <i class="fas fa-robot"></span><span
                                        class="robot">{{ __('Generate With AI') }}</span></i>
                            </a>
                        </div>
                        @endif
                        <h5>{{ __('Overview') }}</h5>
                        <small class="text-muted">{{ __('Edit about your product information') }}</small>
                    </div>

                    <div class="card-body">
                        <form>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        {{ Form::label('year', __('Year'), ['class' => 'form-label']) }}
                                        {!! Form::select('year', $years ?? [], $product->year, ['class' => 'form-control', 'required' => 'required']) !!}
                                        @error('year')
                                        <span class="invalid-year" role="alert">
                                            <strong class="text-danger">{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        {{ Form::label('make', __('Make'), ['class' => 'form-label']) }}
                                        {{ Form::text('make', $product->make, ['class' => 'form-control', 'placeholder' => __('Enter Make'), 'required' => 'required']) }}
                                        @error('make')
                                        <span class="invalid-make" role="alert">
                                            <strong class="text-danger">{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        {{ Form::label('model', __('Model'), ['class' => 'form-label']) }}
                                        {{ Form::text('model', $product->model, ['class' => 'form-control', 'placeholder' => __('Enter Model'), 'required' => 'required']) }}
                                        @error('model')
                                        <span class="invalid-model" role="alert">
                                            <strong class="text-danger">{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        {{ Form::label('part_name', __('Part Name'), ['class' => 'form-label']) }}
                                        {{ Form::text('part_name', $product->part_name, ['class' => 'form-control', 'placeholder' => __('Enter Part Name'), 'required' => 'required']) }}
                                        @error('part_name')
                                        <span class="invalid-part_name" role="alert">
                                            <strong class="text-danger">{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        {{ Form::label('is_active', __('Status'), ['class' => 'form-label']) }}
                                        {!! Form::select('is_active', $status, $product->is_active, ['class' => 'form-control', 'required' => 'required']) !!}
                                        @error('is_active')
                                        <span class="invalid-is_active" role="alert">
                                            <strong class="text-danger">{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="text-end">
                                    {{ Form::submit(__('Update'), ['class' => 'btn-submit btn btn-primary']) }}
                                </div>
                            </div>
                        </form>
                    </div>
                    {{ Form::close() }}
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
