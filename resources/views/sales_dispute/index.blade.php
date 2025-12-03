@extends('layouts.admin')
@section('page-title')
{{ __('Sales Dispute') }}
@endsection
@section('title')
{{ __('Sales Dispute') }}
@endsection
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Home') }}</a></li>
<li class="breadcrumb-item">{{ __('Sales Dispute') }}</li>
@endsection
@section('action-btn')
@can('Create SalesOrder')
<div class="action-btn ms-2">
    <a href="#" data-size="lg" data-url="{{ route('dispute.create') }}" data-ajax-popup="true"
       data-bs-toggle="tooltip" data-title="{{ __('Create New Dispute') }}" title=" {{ __('Create') }}"
       class="btn btn-sm btn-primary btn-icon m-1">
        <i class="ti ti-plus"></i>
    </a>
</div>
@endcan
@endsection
@section('filter')
@endsection

@section('content')
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body table-border-style">
                <div class="table-responsive">
                    <table class="table datatable" id="datatable">
                        <thead>
                            <tr>
                                <th scope="col" class="sort" data-sort="id">{{ __('Dispute ID') }}</th>
                                <th scope="col" class="sort" data-sort="name">{{ __('Invoice No') }}</th>
                                <th scope="col" class="sort" data-sort="name">{{ __('Customer') }}</th>
                                <th scope="col" class="sort" data-sort="completion">{{ __('Dispute Date') }} </th>
                                <th scope="col" class="sort" data-sort="completion">{{ __('Dispute Type') }}</th>
                                <th scope="col" class="sort" data-sort="completion">{{ __('Status') }}</th>
                                <th scope="col" class="sort" data-sort="completion">{{ __('Disputed Amount') }}</th>
                                <!--<th scope="col" class="sort" data-sort="completion">{{ __('Total Deduction') }}</th>-->
                                <th scope="col" class="sort" data-sort="completion">{{ __('Dispute By User') }}</th>
                                @if (Gate::check('Show SalesOrder') || Gate::check('Edit SalesOrder') || Gate::check('Delete SalesOrder'))
                                <th scope="col" class="text-end">{{ __('Action') }}</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($disputes as $dispute)
                            <tr>
                                <td>
                                    <a href="{{ route('dispute.edit', $dispute->id) }}"
                                       class="btn btn-outline-primary" data-title="{{ __('Dispute Details') }}">
                                        {{ \Auth::user()->disputeFormat($dispute->dispute_id) }}
                                    </a>
                                </td>
                                <th>
                                    {{ (($dispute->sales_order)?$dispute->sales_order->sale_invoice_number:'') }}
                                </th>
                                <td>
                                    {{ (($dispute->sales_order->lead)? $dispute->sales_order->lead->cust_name.' ('.$dispute->sales_order->lead->contact.')':'') }}
                                </td>
                                <td>
                                    <span class="budget">{{ \Auth::user()->dateFormat($dispute->dispute_date) }}</span>
                                </td>
                                <td>
                                    <span class="budget">{{ $dispute->dispute_type ?? '-' }}</span>
                                </td>
                                <td>
                                    <span class="budget">{{ $dispute->dispute_status ?? '-' }}</span>
                                </td>
                                <td>
                                    <span class="budget">${{ number_format($dispute->disputed_amount, 2) }}</span>
                                </td>
<!--                                <td>
                                    <span class="budget">${{ number_format($dispute->total_deduction, 2) }}</span>
                                </td>-->
                                <td>
                                    <span
                                        class="budget">{{ ucfirst(!empty($dispute->source_user) ? $dispute->source_user->name : '-') }}</span>
                                </td>
                                @if (Gate::check('Show SalesOrder') || Gate::check('Edit SalesOrder') || Gate::check('Delete SalesOrder'))
                                <td class="text-end">                                    
                                    @can('Show SalesOrder')
                                    <div class="action-btn bg-warning ms-2">
                                        <a href="{{ route('dispute.show', $dispute->id) }}"
                                           data-bs-toggle="tooltip" title="{{ __('Quick View') }}"
                                           class="mx-3 btn btn-sm align-items-center text-white "
                                           data-title="{{ __('Dispute Details') }}">
                                            <i class="ti ti-eye"></i>
                                        </a>
                                    </div>
                                    @endcan
                                    @can('Edit SalesOrder')
                                    <div class="action-btn bg-info ms-2">
                                        <a href="{{ route('dispute.edit', $dispute->id) }}"
                                           data-bs-toggle="tooltip" title="{{ __('Details') }}"
                                           class="mx-3 btn btn-sm align-items-center text-white "
                                           data-title="{{ __('Edit Dispute') }}"><i
                                                class="ti ti-edit"></i></a>
                                    </div>
                                    @endcan
                                    @can('Delete SalesOrder')
                                    <div class="action-btn bg-danger ms-2">
                                        {!! Form::open(['method' => 'DELETE', 'route' => ['dispute.destroy', $dispute->id], 'id' => 'delete-form-' . $dispute->id]) !!}
                                        <a href="#" class="mx-3 btn btn-sm align-items-center text-white bs-pass-para"
                                           data-bs-toggle="tooltip" title="{{ __('Delete') }}"
                                           data-confirm="{{ __('Are You Sure?') . '|' . __('This action can not be undone. Do you want to continue?') }}"
                                           data-confirm-yes="document.getElementById('delete-form-{{ $dispute->id }}').submit();">
                                            <i class="ti ti-trash"></i>
                                        </a>
                                        {!! Form::close() !!}
                                    </div>
                                    @endcan

                                </td>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

