@extends('layouts.admin')
@section('page-title')
{{ __('Product') }}
@endsection
@section('title')
{{ __('Product') }}
@endsection
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Home') }}</a></li>
<li class="breadcrumb-item">{{ __('Products / Services') }}</li>
@endsection
@section('action-btn')
<div class="action-btn ms-2">
    <a href="{{ route('product.grid') }}" class="btn btn-sm btn-primary btn-icon m-1" data-bs-toggle="tooltip"
       title="{{ __('Grid View') }}">
        <i class="ti ti-layout-grid text-white"></i>
    </a>
</div>

<div class="action-btn ms-2">
    <a href="{{ route('product.export') }}" class="btn btn-sm btn-primary btn-icon m-1" data-bs-toggle="tooltip"
       title="{{ __('Export') }}">
        <i class="ti ti-file-export"></i>
    </a>
</div>

<div class="action-btn ms-2">
    <a href="#" class="btn btn-sm btn-primary btn-icon m-1" data-url="{{ route('product.file.import') }}"
       data-ajax-popup="true" data-title="{{ __('Import Product CSV File') }}" data-bs-toggle="tooltip"
       title=" {{ __('Import') }}">
        <i class="ti ti-file-import"></i>
    </a>
</div>

@can('Create Product')
<div class="action-btn ms-2">
    <a href="{{ route('product.create') }}" 
       data-bs-toggle="tooltip" data-title="{{ __('Create New Product / Service') }}" title="{{ __('Create') }}"
       class="btn btn-sm btn-primary btn-icon m-1">
        <i class="ti ti-plus"></i>
    </a>
</div>
@endcan
@endsection
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body table-border-style">
                <div class="table-responsive overflow_hidden">
                    <table id="datatable" class="table datatable align-items-center">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col" class="sort" data-sort="year">{{ __('Year') }}</th>
                                <th scope="col" class="sort" data-sort="make">{{ __('Make') }}</th>
                                <th scope="col" class="sort" data-sort="model">{{ __('Model') }}</th>
                                <th scope="col" class="sort" data-sort="part_name">{{ __('Part Name') }}</th>
                                <th scope="col" class="sort" data-sort="is_active">{{ __('Status') }}</th>
                                @if (Gate::check('Show Product') || Gate::check('Edit Product') || Gate::check('Delete Product'))
                                <th scope="col" class="text-end">{{ __('Action') }}</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                            <tr>
                                <td>
                                    <a href="{{ route('product.edit', $product->id) }}" data-size="md"
                                       data-title="{{ __('Product / Service Details') }}" class="action-item text-primary">
                                        {{ $product->year ?? '-' }}
                                    </a>
                                </td>
                                <td>
                                    <span class="budget">{{ ucfirst($product->make ?? '-') }}</span>
                                </td>
                                <td>
                                    <span class="budget">{{ ucfirst($product->model ?? '-') }}</span>
                                </td>
                                <td>
                                    <span class="budget">{{ ucfirst($product->part_name ?? '-') }}</span>
                                </td>
                                <td>
                                    @if ($product->is_active == 1)
                                    <span class="badge bg-success p-2 px-3 rounded"
                                          style="width: 88px;">{{ __('Active') }}</span>
                                    @else
                                    <span class="badge bg-danger p-2 px-3 rounded"
                                          style="width: 88px;">{{ __('Inactive') }}</span>
                                    @endif
                                </td>
                                @if (Gate::check('Show Product') || Gate::check('Edit Product') || Gate::check('Delete Product'))
                                <td class="text-end">
                                    @can('Show Product')
                                    <div class="action-btn bg-warning ms-2">
                                        <a href="#" data-size="md"
                                           data-url="{{ route('product.show', $product->id) }}"
                                           data-bs-toggle="tooltip" title="{{ __('Quick View') }}"
                                           data-ajax-popup="true" data-title="{{ __('Product Details') }}"
                                           class="mx-3 btn btn-sm d-inline-flex align-items-center text-white">
                                            <i class="ti ti-eye"></i>
                                        </a>
                                    </div>
                                    @endcan
                                    @can('Edit Product')
                                    <div class="action-btn bg-info ms-2">
                                        <a href="{{ route('product.edit', $product->id) }}"
                                           class="mx-3 btn btn-sm d-inline-flex align-items-center text-white"
                                           data-bs-toggle="tooltip" title="{{ __('Details') }}"
                                           data-title="{{ __('Edit Product') }}"><i
                                                class="ti ti-edit"></i></a>
                                    </div>
                                    @endcan
                                    @can('Delete Product')
                                    <div class="action-btn bg-danger ms-2">
                                        {!! Form::open(['method' => 'DELETE', 'route' => ['product.destroy', $product->id]]) !!}
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
