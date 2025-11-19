@extends('layouts.admin')
@section('page-title')
{{ __('Sales Return') }}
@endsection
@section('title')
{{ __('Sales Return') }}
@endsection
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Home') }}</a></li>
<li class="breadcrumb-item">{{ __('Sales Return') }}</li>
@endsection
@section('action-btn')
@can('Create SalesOrder')
<div class="action-btn ms-2">
    <a href="#" data-size="lg" data-url="{{ route('sales_return.create') }}" data-ajax-popup="true"
       data-bs-toggle="tooltip" data-title="{{ __('Create New Sales Return') }}" title=" {{ __('Create') }}"
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
                                <th scope="col" class="sort" data-sort="id">{{ __('ID') }}</th>
                                <th scope="col" class="sort" data-sort="name">{{ __('Sales Order No') }}</th>
                                <th scope="col" class="sort" data-sort="completion">{{ __('Return Date') }} </th>
                                <th scope="col" class="sort" data-sort="completion">{{ __('Request Type') }}</th>
                                <th scope="col" class="sort" data-sort="completion">{{ __('Return By User') }}</th>
                                @if (Gate::check('Show SalesOrder') || Gate::check('Edit SalesOrder') || Gate::check('Delete SalesOrder'))
                                <th scope="col" class="text-end">{{ __('Action') }}</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($salesreturn as $sales_return)
                            <tr>
                                <td>
                                    <a href="{{ route('sales_return.edit', $sales_return->id) }}"
                                       class="btn btn-outline-primary" data-title="{{ __('Sales Return Details') }}">
                                        {{ \Auth::user()->salesReturnFormat($sales_return->id) }}
                                    </a>
                                </td>
                                <td>
                                    <span class="budget">
                                        {{ \Auth::user()->salesorderNumberFormat($sales_return->salesorder_id) }}

                                    </span>
                                </td>
                                <td>
                                    <span class="budget">{{ \Auth::user()->dateFormat($sales_return->return_date) }}</span>
                                </td>
                                <td>
                                    <span class="badge bg-warning p-2 px-3 rounded"
                                          style="width: 91px;">{{ __(\App\Models\SalesReturn::$request_type[$sales_return->request_type]) }}</span>
                                </td>   
                                <td>
                                    <span
                                        class="budget">{{ ucfirst(!empty($sales_return->source_user) ? $sales_return->source_user->name : '-') }}</span>
                                </td>
                                @if (Gate::check('Show SalesOrder') || Gate::check('Edit SalesOrder') || Gate::check('Delete SalesOrder'))
                                <td class="text-end">                                    
                                    @can('Show SalesOrder')
                                    <div class="action-btn bg-warning ms-2">
                                        <a href="{{ route('sales_return.show', $sales_return->id) }}"
                                           data-bs-toggle="tooltip" title="{{ __('Quick View') }}"
                                           class="mx-3 btn btn-sm align-items-center text-white "
                                           data-title="{{ __('Sales Return Details') }}">
                                            <i class="ti ti-eye"></i>
                                        </a>
                                    </div>
                                    @endcan
                                    @can('Edit SalesOrder')
                                    <div class="action-btn bg-info ms-2">
                                        <a href="{{ route('sales_return.edit', $sales_return->id) }}"
                                           data-bs-toggle="tooltip" title="{{ __('Details') }}"
                                           class="mx-3 btn btn-sm align-items-center text-white "
                                           data-title="{{ __('Edit Sales Return') }}"><i
                                                class="ti ti-edit"></i></a>
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
        console.log(opportunities);
        getaccount(opportunities);
    });

    function getaccount(opportunities_id) {
        $.ajax({
            url: '{{ route('invoice.getaccount') }}',
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
