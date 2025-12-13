@extends('layouts.admin')
@section('page-title')
{{ __('Lead Edit') }}
@endsection
@php
$plansettings = App\Models\Utility::plansettings();
@endphp
@section('title')
<div class="page-header-title">
    {{ __('Edit Lead') }} {{ '(' . $lead->cust_name . ')' }}
</div>
@endsection
@section('action-btn')
<!--@if ($lead->is_converted != 0)
<a href="#" data-url="{{ route('account.show', $lead->is_converted) }}" data-title="{{ __('Account Details') }}"
   data-size="md" data-ajax-popup="true" data-bs-toggle="tooltip" title="{{ __('Already Convert To Account') }}"
   class="btn btn-sm btn-primary btn-icon m-1">
    <i class="ti ti-eye"></i>
</a>
@else
<a href="#" data-url="{{ route('lead.convert.account', $lead->id) }}" data-size="lg" data-ajax-popup="true"
   data-title="{{ __('Convert [' . $lead->cust_name . '] To Account') }}" data-bs-toggle="tooltip"
   title="{{ __('Convert To Account') }}" class="btn btn-sm btn-primary btn-icon m-1">
    <i class="ti ti-exchange">
    </i>
</a>
@endif-->

<div class="btn-group" role="group">
    @if (!empty($previous))
    <div class="action-btn  ms-2">
        <a href="{{ route('lead.edit', $previous) }}" class="btn btn-sm btn-primary btn-icon m-1"
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
    <div class="action-btn  ms-2">
        <a href="{{ route('lead.edit', $next) }}" class="btn btn-sm btn-primary btn-icon m-1"
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
<li class="breadcrumb-item"><a href="{{ route('lead.index') }}">{{ __('Lead') }}</a></li>
<li class="breadcrumb-item">{{ __('Details') }}</li>
@endsection
@section('content')
<div class="row">
    <!-- [ sample-page ] start -->
    <div class="col-sm-12">
        <div class="row">
            <div class="col-xl-3">
                <div class="card sticky-top" style="top:30px">
                    <div class="list-group list-group-flush" id="useradd-sidenav">
                        <a href="#useradd-1"
                           class="list-group-item list-group-item-action border-0">{{ __('Overview') }} <div
                                class="float-end"><i class="ti ti-chevron-right"></i></div></a>
                        <a href="#useradd-2"
                           class="list-group-item list-group-item-action border-0">{{ __('Stream') }} <div
                                class="float-end"><i class="ti ti-chevron-right"></i></div></a>
                        <!--                        <a href="#useradd-3"
                                                   class="list-group-item list-group-item-action border-0">{{ __('Tasks') }} <div
                                                        class="float-end"><i class="ti ti-chevron-right"></i></div></a>-->
                    </div>
                </div>
            </div>
            <div class="col-xl-9">
                <div id="useradd-1" class="card">
                    {{ Form::model($lead, ['route' => ['lead.update', $lead->id], 'method' => 'PUT']) }}
                    <div class="card-header">
                        <!--                        @if (isset($plansettings['enable_chatgpt']) && $plansettings['enable_chatgpt'] == 'on')
                                                <div class="float-end">
                                                    <a href="#" data-size="md" class="btn btn-sm btn-primary "
                                                       data-ajax-popup-over="true" data-size="md"
                                                       data-title="{{ __('Generate content with AI') }}"
                                                       data-url="{{ route('generate', ['lead']) }}" data-toggle="tooltip"
                                                       title="{{ __('Generate') }}">
                                                        <i class="fas fa-robot"></span><span
                                                                class="robot">{{ __('Generate With AI') }}</span></i>
                                                    </a>
                                                </div>
                                                @endif-->
                        <h5>{{ __('Overview') }}</h5>
                        <small class="text-muted">{{ __('Edit About Your Lead Information') }}</small>
                    </div>

                    <div class="card-body">
                        <form>
                            <div class="row">                               
                                <div class="col-6">
                                    <div class="form-group">
                                        {{ Form::label('cust_name', __('Customer Name'), ['class' => 'form-label']) }}
                                        {{ Form::text('cust_name', null, ['class' => 'form-control', 'placeholder' => __('Enter Customer Name'),'readonly'=>'true']) }}
                                        @error('cust_name')
                                        <span class="invalid-cust_name" role="alert">
                                            <strong class="text-danger">{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        {{ Form::label('contact', __('Phone'), ['class' => 'form-label']) }}
                                        {{ Form::text('contact', null, ['class' => 'form-control', 'placeholder' => __('Enter Contact Person')]) }}
                                        @error('contact')
                                        <span class="invalid-contact" role="alert">
                                            <strong class="text-danger">{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        {{ Form::label('year', __('Year'), ['class' => 'form-label']) }}
                                        {{ Form::text('year', $lead->product->year, ['class' => 'form-control', 'placeholder' => __('Enter year')]) }}
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
                                        {{ Form::text('make', $lead->product->make, ['class' => 'form-control', 'placeholder' => __('Enter Make'), 'required' => 'required']) }}
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
                                        {{ Form::text('model', $lead->product->model, ['class' => 'form-control', 'placeholder' => __('Enter Model'), 'required' => 'required']) }}
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
                                        {{ Form::text('part_name', $lead->product->part_name, ['class' => 'form-control', 'placeholder' => __('Enter Part Name'), 'required' => 'required']) }}
                                        @error('part_name')
                                        <span class="invalid-part_name" role="alert">
                                            <strong class="text-danger">{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        {{ Form::label('date', __('Date'), ['class' => 'form-label']) }}
                                        {{ Form::date('date', null, ['class' => 'form-control']) }}
                                        @error('date')
                                        <span class="invalid-date" role="alert">
                                            <strong class="text-danger">{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        {{ Form::label('email', __('Email'), ['class' => 'form-label']) }}
                                        {{ Form::text('email', null, ['class' => 'form-control', 'placeholder' => __('Enter Email')]) }}
                                        @error('email')
                                        <span class="invalid-email" role="alert">
                                            <strong class="text-danger">{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        {{ Form::label('lead_type_id', __('Lead Type'), ['class' => 'form-label']) }}
                                        {!! Form::select('lead_type_id', $leadTypes, $lead->lead_type_id, ['class' => 'form-control']) !!}
                                    </div>
                                </div>                                
                                <div class="col-6">
                                    <div class="form-group">
                                        {{ Form::label('disposition', __('Disposition'), ['class' => 'form-label']) }}
                                        {!! Form::select('disposition', $status, $lead->disposition, ['class' => 'form-control']) !!}
                                        @error('disposition')
                                        <span class="invalid-disposition" role="alert">
                                            <strong class="text-danger">{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        {{ Form::label('note', __('Follow Up Note'), ['class' => 'form-label']) }}
                                        {{ Form::textarea('note', null, ['class' => 'form-control', 'rows' => 3, 'placeholder' => __('Enter Note')]) }}
                                        @error('note')
                                        <span class="invalid-note" role="alert">
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

                <div id="useradd-2" class="card">
                    {{ Form::open(['route' => ['streamstore', 'lead', $lead->id, $lead->name ?: 'Lead-' . $lead->id], 'method' => 'post', 'enctype' => 'multipart/form-data']) }}
                    <div class="card-header">
                        <h5>{{ __('Stream  / Follow Up') }}</h5>
                        <small class="text-muted">{{ __('Add stream comment') }}</small>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        {{ Form::label('stream', __('Stream / Follow Up'), ['class' => 'form-label']) }}
                                        {{ Form::text('stream_comment', null, ['class' => 'form-control', 'placeholder' => __('Enter Stream Comment'), 'required' => 'required']) }}
                                    </div>
                                </div>
                                <input type="hidden" name="log_type" value="lead comment">
                                <div class="col-12 mb-3 field" data-name="attachments">
                                    <div class="attachment-upload">
                                        <div class="attachment-button">
                                            <div class="pull-left">
                                                <div class="form-group">
                                                    {{ Form::label('attachment', __('Attachment'), ['class' => 'form-label']) }}
                                                    {{-- {{Form::file('attachment',array('class'=>'form-control'))}} --}}
                                                    <input type="file"name="attachment" class="form-control mb-3"
                                                           onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                                                    <img id="blah" width="20%" height="20%" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="attachments"></div>
                                    </div>
                                </div>
                                <div class="text-end">
                                    {{ Form::submit(__('Save'), ['class' => 'btn-submit btn btn-primary']) }}
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="col-12">
                        <div class="card-header">
                            <h5>{{ __('Latest comments') }}</h5>
                        </div>
                        @foreach ($streams as $stream)
                        @php
                        $remark = json_decode($stream->remark);
                        @endphp
                        @if ($remark->data_id == $lead->id)
                        <div class="card-body">
                            <div class="row">

                                <div class="col-xl-12">
                                    <ul class="list-group team-msg">
                                        <li class="list-group-item border-0 d-flex align-items-start mb-2">
                                            <div class="avatar me-3">
                                                @php
                                                $profile = \App\Models\Utility::get_file('upload/profile/');
                                                @endphp
                                                <a href="{{ !empty($stream->file_upload) ? $profile . $stream->file_upload : asset(url('./assets/images/user/avatar-5.jpg')) }}"
                                                   target="_blank">
                                                    <img alt="" class="rounded-circle"
                                                         @if (!empty($stream->file_upload)) src="{{ !empty($stream->file_upload) ? $profile . $stream->file_upload : asset(url('./assets/images/user/avatar-5.jpg')) }}" @else  avatar="{{ $remark->user_name }}" @endif>
                                                </a>
                                            </div>
                                            <div class="d-block d-sm-flex align-items-center right-side">
                                                <div
                                                    class="d-flex align-items-start flex-column justify-content-center mb-3 mb-sm-0">
                                                    <div class="h6 mb-1">{{ $remark->user_name }}
                                                    </div>
                                                    <span class="text-sm lh-140 mb-0">
                                                        posted to <a href="#">{{ $remark->title }}</a> ,
                                                        {{ $stream->log_type }} <a
                                                            href="#">{{ $remark->stream_comment }}</a>
                                                    </span>
                                                </div>
                                                <div class=" ms-2  d-flex align-items-center ">
                                                    <small
                                                        class="float-end ">{{ $stream->created_at }}</small>
                                                </div>
                                            </div>

                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @endif
                        @endforeach
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

<script>
            $(document).ready(function() {
    // Handle product selection change
    $('#product-select').on('change', function() {
    var productId = $(this).val();
    if (productId && productId !== '0') {
    // Make AJAX request to get product details
    $.ajax({
    url: '{{ route("product.details") }}',
            method: 'GET',
            data: { product_id: productId },
            success: function(response) {
            if (response.success) {
            var product = response.product;
            // Populate vehicle brand field
            if (product.brand_name) {
            $('#vehicle-brand option').filter(function() {
            return $(this).text() === product.brand_name;
            }).prop('selected', true);
            }

            // Populate vehicle year field
            if (product.Year) {
            $('#vehicle_year option').filter(function() {
            return $(this).val() == product.Year;
            }).prop('selected', true);
            }

            // Populate part number field
            if (product.part_number) {
            $('#vehicle-part-number option').filter(function() {
            return $(this).val() === product.part_number;
            }).prop('selected', true);
            }
            }
            },
            error: function(xhr) {
            console.error('Error fetching product details:', xhr);
            }
    });
    } else {
    // Clear fields if no product selected
    $('#vehicle-brand').val('');
    $('#vehicle_year').val('');
    $('#vehicle-part-number').val('');
    }
    });
    });</script>

<script>
    $(document).on('change', 'select[name=parent]', function() {
    console.log('h');
    var parent = $(this).val();
    getparent(parent);
    });
    function getparent(bid) {
    console.log(bid);
    $.ajax({
    url: '{{ route('task.getparent') }}',
            type: 'POST',
            data: {
            "parent": bid,
                    "_token": "{{ csrf_token() }}",
            },
            success: function(data) {
            console.log(data);
            $('#parent_id').empty();
            {{-- $('#parent_id').append('<option value="">{{__('Select Parent')}}</option>'); --}}

            $.each(data, function(key, value) {
            $('#parent_id').append('<option value="' + key + '">' + value + '</option>');
            });
            if (data == '') {
            $('#parent_id').empty();
            }
            }
    });
    }
</script>
<script>
    $(document).on('click', '#billing_data', function() {
    $("[name='shipping_address']").val($("[name='billing_address']").val());
    $("[name='shipping_city']").val($("[name='billing_city']").val());
    $("[name='shipping_state']").val($("[name='billing_state']").val());
    $("[name='shipping_country']").val($("[name='billing_country']").val());
    $("[name='shipping_postalcode']").val($("[name='billing_postalcode']").val());
    });
</script>
@endpush
