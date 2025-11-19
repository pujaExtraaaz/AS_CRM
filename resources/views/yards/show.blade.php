@extends('layouts.admin')
@section('page-title')
    {{ __('Yard Details') }}
@endsection
@section('title')
    {{ __('Yard Details') }} {{ '(' . $yard->yard_name . ')' }}
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Home') }}</a></li>
    <li class="breadcrumb-item"><a href="{{ route('yards.index') }}">{{ __('Yards') }}</a></li>
    <li class="breadcrumb-item">{{ __('Details') }}</li>
@endsection
@section('action-btn')
    <div class="btn-group" role="group">
        <div class="action-btn bg-info ms-2">
            <a href="{{ route('yards.edit', $yard->id) }}" class="btn btn-sm btn-primary btn-icon m-1"
               data-bs-toggle="tooltip" title="{{ __('Edit') }}">
                <i class="ti ti-edit"></i>
            </a>
        </div>
        <div class="action-btn bg-danger ms-2">
            {!! Form::open(['method' => 'DELETE', 'route' => ['yards.destroy', $yard->id]]) !!}
            <a href="#!" class="btn btn-sm btn-danger btn-icon m-1 show_confirm"
               data-bs-toggle="tooltip" title="{{ __('Delete') }}">
                <i class="ti ti-trash"></i>
            </a>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <!-- Simple table layout to ensure data shows -->
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td style="width: 30%; font-weight: bold; background-color: #f8f9fa;">{{ __('Yard ID') }}</td>
                                <td style="color: #333; font-weight: 500;">{{ 'Y-' . str_pad($yard->id, 6, '0', STR_PAD_LEFT) }}</td>
                            </tr>
                            <tr>
                                <td style="width: 30%; font-weight: bold; background-color: #f8f9fa;">{{ __('Yard Name') }}</td>
                                <td style="color: #333; font-weight: 500;">{{ ucfirst($yard->yard_name) }}</td>
                            </tr>
                            <tr>
                                <td style="width: 30%; font-weight: bold; background-color: #f8f9fa;">{{ __('Contact Person') }}</td>
                                <td style="color: #333; font-weight: 500;">{{ ucfirst($yard->yard_person_name) }}</td>
                            </tr>
                            <tr>
                                <td style="width: 30%; font-weight: bold; background-color: #f8f9fa;">{{ __('Phone') }}</td>
                                <td style="color: #333; font-weight: 500;">{{ $yard->contact }}</td>
                            </tr>
                            <tr>
                                <td style="width: 30%; font-weight: bold; background-color: #f8f9fa;">{{ __('Email') }}</td>
                                <td style="color: #333; font-weight: 500;">{{ $yard->yard_email }}</td>
                            </tr>
                            <tr>
                                <td style="width: 30%; font-weight: bold; background-color: #f8f9fa;">{{ __('Address') }}</td>
                                <td style="color: #333; font-weight: 500;">{{ $yard->yard_address }}</td>
                            </tr>
                            <tr>
                                <td style="width: 30%; font-weight: bold; background-color: #f8f9fa;">{{ __('Created At') }}</td>
                                <td style="color: #333; font-weight: 500;">{{ $yard->created_at ? \Auth::user()->dateFormat($yard->created_at) : '--' }}</td>
                            </tr>
                            <tr>
                                <td style="width: 30%; font-weight: bold; background-color: #f8f9fa;">{{ __('Last Updated') }}</td>
                                <td style="color: #333; font-weight: 500;">{{ $yard->updated_at ? \Auth::user()->dateFormat($yard->updated_at) : '--' }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
