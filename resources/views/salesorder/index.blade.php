@extends('layouts.admin')
@section('page-title')
{{ __('Sales Order') }}
@endsection
@section('title')
{{ __('Sales') }}
@endsection
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Home') }}</a></li>
<li class="breadcrumb-item">{{ __('Sales') }}</li>
@endsection
@section('action-btn')
<div class="action-btn ms-2">
    <a href="{{ route('salesorder.export') }}" class="btn btn-sm btn-primary btn-icon m-1" data-bs-toggle="tooltip"
       title=" {{ __('Export') }}">
        <i class="ti ti-file-export"></i>
    </a>
</div>


<!--    @can('Create SalesOrder')
        <div class="action-btn bg-warning ms-2">
            <a href="#" data-size="lg" data-url="{{ route('salesorder.create', ['salesorder', 0]) }}" data-ajax-popup="true"
                data-bs-toggle="tooltip" data-title="{{ __('Create New Sales Order') }}" title="{{ __('Create') }}"
                class="btn btn-sm btn-primary btn-icon m-1">
                <i class="ti ti-plus"></i>
            </a>
        </div>
    @endcan-->

@endsection
@section('filter')
@endsection

@section('content')
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body table-border-style">
                <div class="table-responsive" style="overflow-x: auto;">
                    <table class="table datatable" id="datatable" style="min-width: 1200px;">
                        <thead>
                            <tr>
                                <th scope="col" class="sort" data-sort="name" style="width: 100px;">{{ __('ID') }}</th>
                                <th scope="col" class="sort" data-sort="name" style="width: 150px;">{{ __('Name') }}</th>
                                <th scope="col" class="sort" data-sort="sale_date" style="width: 120px;">{{ __('Sale Date') }}</th>
                                <th scope="col" class="sort" data-sort="sale_status" style="width: 120px;">{{ __('Sale Status') }}</th>
                                <!--<th scope="col" class="sort" data-sort="lead_id" style="width: 100px;">{{ __('Lead ID') }}</th>-->
                                <th scope="col" class="sort" data-sort="source_type" style="width: 130px;">{{ __('Sourcing Type') }}</th>
                                <th scope="col" class="sort" data-sort="yard" style="width: 120px;">{{ __('Yard') }}</th>
                                <th scope="col" class="sort" data-sort="payment_gateway" style="width: 140px;">{{ __('Payment Gateway') }}</th>
                                <th scope="col" class="sort" data-sort="status" style="width: 100px;">{{ __('Status') }}</th>
                                <th scope="col" class="sort" data-sort="completion" style="width: 120px;">{{ __('Amount') }}</th>
                                <th scope="col" class="sort" data-sort="completion" style="width: 150px;">{{ __('Source User') }}</th>
                                @if (Gate::check('Show SalesOrder') || Gate::check('Edit SalesOrder') || Gate::check('Delete SalesOrder'))
                                <th scope="col" class="text-end" style="width: 150px;">{{ __('Action') }}</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($salesorders as $salesorder)
                            <tr>
                                <td>
                                    <a href="{{ route('salesorder.edit', $salesorder->id) }}"
                                       class="btn btn-outline-primary" data-title="{{ __('Sales Order Details') }}">
                                        {{ 'SO-' . str_pad($salesorder->id, 6, '0', STR_PAD_LEFT) }}
                                    </a>
                                </td>
                                <td> {{ ucfirst($salesorder->lead->cust_name) }} </td>
                                <td>
                                    <span class="budget">{{ $salesorder->sale_date ? \Auth::user()->dateFormat($salesorder->sale_date) : ($salesorder->created_at ? \Auth::user()->dateFormat($salesorder->created_at) : '--') }}</span>
                                </td>
                                <td>
                                    <span class="badge bg-primary p-2 px-3 rounded">{{ $salesorder->sale_status ?? 'Open' }}</span>
                                </td>
<!--                                        <td>
                                    <span class="budget">{{ $salesorder->lead_id ?? '--' }}</span>
                                </td>-->
                                <td>
                                    <span class="budget">{{ ucfirst($salesorder->sourceType ?$salesorder->sourceType->name: '--') }}</span>
                                </td>
                                <td>
                                    <span class="budget">{{ $salesorder->yard ? $salesorder->yard->yardname : '--' }}</span>
                                </td>
                                <td>
                                    <span class="badge bg-info p-2 px-3 rounded">{{ ucfirst($salesorder->payment_gateway_name ?? '--') }}</span>
                                </td>
                                <td>
                                    @if (isset($salesorder->status))
                                    @php
                                    $statusText = \App\Models\SalesOrder::statuss($salesorder->status);
                                    @endphp
                                    @if ($salesorder->status == 0)
                                    <span class="badge bg-secondary p-2 px-3 rounded" style="width: 79px;">{{ __($statusText) }}</span>
                                    @elseif($salesorder->status == 1)
                                    <span class="badge bg-info p-2 px-3 rounded" style="width: 79px;">{{ __($statusText) }}</span>
                                    @elseif($salesorder->status == 2)
                                    <span class="badge bg-warning p-2 px-3 rounded" style="width: 79px;">{{ __($statusText) }}</span>
                                    @elseif($salesorder->status == 3)
                                    <span class="badge bg-success p-2 px-3 rounded" style="width: 79px;">{{ __($statusText) }}</span>
                                    @elseif($salesorder->status == 4)
                                    <span class="badge bg-danger p-2 px-3 rounded" style="width: 79px;">{{ __($statusText) }}</span>
                                    @else
                                    <span class="badge bg-secondary p-2 px-3 rounded" style="width: 79px;">{{ __('Unknown') }}</span>
                                    @endif
                                    @else
                                    <span class="badge bg-secondary p-2 px-3 rounded" style="width: 79px;">{{ __('--') }}</span>
                                    @endif
                                </td>
                                <td>
                                    <span class="budget">{{ \Auth::user()->priceFormat($salesorder->getTotal()) }}</span>
                                </td>
                                <td>
                                    <span class="budget">{{ ucfirst(!empty($salesorder->sourceAgent) ? $salesorder->sourceAgent->name : '-') }}</span>
                                </td>
                                @if (Gate::check('Show SalesOrder') || Gate::check('Edit SalesOrder') || Gate::check('Delete SalesOrder'))
                                <td class="text-end">
                                    <!--                                                @can('Create SalesOrder')
                                                                                        <div class="action-btn bg-success ms-2">
                                                                                            {!! Form::open(['method' => 'get', 'route' => ['salesorder.duplicate', $salesorder->id], 'id' => 'duplicate-form-' . $salesorder->id]) !!}
                                                                                            <a href="#" class="mx-3 btn btn-sm align-items-center text-white duplicate_confirm"
                                                                                                data-bs-toggle="tooltip" title="{{ __('Duplicate') }}"
                                                                                                data-confirm="You want to confirm this action. Press Yes to continue or Cancel to go back"
                                                                                                data-confirm-yes="document.getElementById('duplicate-form-{{ $salesorder->id }}').submit();">
                                                                                                <i class="ti ti-copy"></i>
                                                                                                {!! Form::close() !!}
                                                                                            </a>
                                                                                        </div>
                                                                                    @endcan-->
                                    @can('Show SalesOrder')
                                    <div class="action-btn bg-warning ms-2">
                                        <a href="{{ route('salesorder.show', $salesorder->id) }}"
                                           data-size="md" class="mx-3 btn btn-sm d-inline-flex align-items-center text-white"
                                           data-bs-toggle="tooltip" title="{{ __('Quick View') }}"
                                           data-title="{{ __('SalesOrders Details') }}">
                                            <i class="ti ti-eye"></i>
                                        </a>
                                    </div>
                                    @endcan
                                    @can('Edit SalesOrder')
                                    <div class="action-btn bg-info ms-2">
                                        <a href="{{ route('salesorder.edit', $salesorder->id) }}"
                                           class="mx-3 btn btn-sm d-inline-flex align-items-center text-white"
                                           data-bs-toggle="tooltip" title="{{ __('Details') }}"
                                           data-title="{{ __('Edit SalesOrders') }}"><i class="ti ti-edit"></i></a>
                                    </div>
                                    @endcan
                                    @can('Delete SalesOrder')
                                    <div class="action-btn bg-danger ms-2">
                                        {!! Form::open(['method' => 'DELETE', 'route' => ['salesorder.destroy', $salesorder->id]]) !!}
                                        <a href="#!"
                                           class="mx-3 btn btn-sm   align-items-center text-white show_confirm"
                                           data-bs-toggle="tooltip" title='Delete'>
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
@push('script-page')
<script>
    $(document).on('click', '#billing_data', function () {
        $("[name='shipping_address']").val($("[name='billing_address']").val());
        $("[name='shipping_city']").val($("[name='billing_city']").val());
        $("[name='shipping_state']").val($("[name='billing_state']").val());
        $("[name='shipping_country']").val($("[name='billing_country']").val());
        $("[name='shipping_postalcode']").val($("[name='billing_postalcode']").val());
    })

    $(document).on('change', 'select[name=opportunity]', function () {

        var opportunities = $(this).val();

        getaccount(opportunities);
    });

    function getaccount(opportunities_id) {

        $.ajax({
            url: '{{ route('salesorder.getaccount') }}',
            type: 'POST',
            data: {
                "opportunities_id": opportunities_id,
                "_token": "{{ csrf_token() }}",
            },
            success: function (data) {
                console.log(data);
                $('#amount').val(data.opportunitie.amount);
                $('#account_name').val(data.account.name);
                $('#account_id').val(data.account.id);
                $('#billing_address').val(data.account.billing_address);
                $('#shipping_address').val(data.account.shipping_address);
                $('#billing_city').val(data.account.billing_city);
                $('#billing_state').val(data.account.billing_state);
                $('#shipping_city').val(data.account.shipping_city);
                $('#shipping_state').val(data.account.shipping_state);
                $('#billing_country').val(data.account.billing_country);
                $('#billing_postalcode').val(data.account.billing_postalcode);
                $('#shipping_country').val(data.account.shipping_country);
                $('#shipping_postalcode').val(data.account.shipping_postalcode);

            }
        });
    }
</script>
@endpush
