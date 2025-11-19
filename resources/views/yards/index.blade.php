@extends('layouts.admin')
@section('page-title')
    {{ __('Yards') }}
@endsection
@section('title')
    {{ __('Yards') }}
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Home') }}</a></li>
    <li class="breadcrumb-item">{{ __('Yards') }}</li>
@endsection
@section('action-btn')
    <div class="action-btn ms-2">
        <a href="{{ route('yards.create') }}" 
            data-bs-toggle="tooltip" title="{{ __('Create New Yard') }}"
            class="btn btn-sm btn-primary btn-icon m-1">
            <i class="ti ti-plus"></i>
        </a>
    </div>
@endsection
@section('filter')
@endsection

@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body table-border-style">
                    <div class="table-responsive" style="overflow-x: auto; overflow-y: hidden; white-space: nowrap;">
                        <table class="table datatable" id="datatable" style="min-width: 1200px; width: max-content; table-layout: fixed;">
                            <thead>
                                <tr>
                                    <th scope="col" class="sort" data-sort="id" style="width: 100px;">{{ __('ID') }}</th>
                                    <th scope="col" class="sort" data-sort="yard_name" style="width: 150px;">{{ __('Name') }}</th>
                                    <th scope="col" class="sort" data-sort="yard_address" style="width: 200px;">{{ __('Address') }}</th>
                                    <!-- <th scope="col" class="sort" data-sort="yard_email" style="width: 150px;">{{ __('Email') }}</th> -->
                                    <th scope="col" class="sort" data-sort="yard_person_name" style="width: 150px;">{{ __('Contact Person') }}</th>
                                    <th scope="col" class="sort" data-sort="contact" style="width: 120px;">{{ __('Contact Number') }}</th>
                                   
                                    <th scope="col" class="text-end" style="width: 150px;">{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($yards as $yard)
                                    <tr>
                                        <td>
                                            <a href="{{ route('yards.edit', $yard->id) }}"
                                                class="btn btn-outline-primary" data-title="{{ __('Yard Details') }}">
                                                {{ 'Y-' . str_pad($yard->id, 6, '0', STR_PAD_LEFT) }}
                                            </a>
                                        </td>
                                        <td>{{ ucfirst($yard->yard_name) }}</td>
                                        <td>
                                            <span class="budget">{{ Str::limit($yard->yard_address, 50) }}</span>
                                        </td>
                                        <!-- <td>
                                            <span class="budget">{{ $yard->yard_email }}</span>
                                        </td> -->
                                        <td>
                                            <span class="budget">{{ ucfirst($yard->yard_person_name) }}</span>
                                        </td>
                                        <td>
                                            <span class="budget">{{ $yard->contact }}</span>
                                        </td>
                                       
                                        <td class="text-end">
                                            <div class="action-btn bg-warning ms-2">
                                                <a href="{{ route('yards.show', $yard->id) }}"
                                                    data-size="md" class="mx-3 btn btn-sm d-inline-flex align-items-center text-white"
                                                    data-bs-toggle="tooltip" title="{{ __('Quick View') }}"
                                                    data-title="{{ __('Yard Details') }}">
                                                    <i class="ti ti-eye"></i>
                                                </a>
                                            </div>
                                            <div class="action-btn bg-info ms-2">
                                                <a href="{{ route('yards.edit', $yard->id) }}"
                                                    class="mx-3 btn btn-sm d-inline-flex align-items-center text-white"
                                                    data-bs-toggle="tooltip" title="{{ __('Details') }}"
                                                    data-title="{{ __('Edit Yard') }}"><i class="ti ti-edit"></i></a>
                                            </div>
                                            <div class="action-btn bg-danger ms-2">
                                                {!! Form::open(['method' => 'DELETE', 'route' => ['yards.destroy', $yard->id]]) !!}
                                                <a href="#!"
                                                    class="mx-3 btn btn-sm   align-items-center text-white show_confirm"
                                                    data-bs-toggle="tooltip" title='Delete'>
                                                    <i class="ti ti-trash"></i>
                                                </a>
                                                {!! Form::close() !!}
                                            </div>
                                        </td>
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

@section('style')
<style>
.table-responsive {
    -webkit-overflow-scrolling: touch;
    border: 1px solid #dee2e6;
    border-radius: 0.375rem;
}

.table-responsive table {
    margin-bottom: 0;
}

/* Ensure proper horizontal scrolling on mobile */
@media (max-width: 768px) {
    .table-responsive {
        overflow-x: scroll;
        -webkit-overflow-scrolling: touch;
    }
    
    .table-responsive table {
        min-width: 100%;
        width: max-content;
    }
}

/* Fix for DataTables horizontal scroll */
.dataTables_wrapper .dataTables_scrollBody {
    overflow-x: auto !important;
}

/* Ensure table cells don't wrap */
.table td, .table th {
    white-space: nowrap;
    vertical-align: middle;
}

/* Make address column slightly wider for better readability */
.table th[data-sort="yard_address"],
.table td:has(.budget) {
    min-width: 200px;
    max-width: 250px;
}
</style>
@endsection

