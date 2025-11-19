<div class="row">
    <div class="col-lg-12">

            <div class="">
                <dl class="row">
                    <dt class="col-md-5"><span class="h6 text-md mb-0">{{__('Year')}}</span></dt>
                    <dd class="col-md-5"><span class="text-md">{{ $product->year ?? '-' }}</span></dd>

                    <dt class="col-md-5"><span class="h6 text-md mb-0">{{__('Make')}}</span></dt>
                    <dd class="col-md-5"><span class="text-md">{{ $product->make ?? '-'}}</span></dd>

                    <dt class="col-md-5"><span class="h6 text-md mb-0">{{__('Model')}}</span></dt>
                    <dd class="col-md-5"><span class="text-md">{{ $product->model ?? '-'}}</span></dd>

                    <dt class="col-md-5"><span class="h6 text-md mb-0">{{__('Part Name')}}</span></dt>
                    <dd class="col-md-5"><span class="text-md">{{ $product->part_name ?? '-'}}</span></dd>

                    <dt class="col-md-5"><span class="h6 text-md mb-0">{{__('Status')}}</span></dt>
                    <dd class="col-md-5">
                        @if($product->is_active == 1)
                            <span class="badge bg-success p-2 px-3 rounded">{{ __('Active') }}</span>
                        @else
                            <span class="badge bg-danger p-2 px-3 rounded">{{ __('Inactive') }}</span>
                        @endif
                    </dd>

                    <dt class="col-md-5"><span class="h6 text-md mb-0">{{__('Created')}}</span></dt>
                    <dd class="col-md-5"><span class="text-md">{{\Auth::user()->dateFormat($product->created_at)}}</span></dd>

                </dl>
            </div>

    </div>
    <div class="w-100 text-end pr-2">
        @can('Edit Product')
        <div class="action-btn bg-info ms-2">
            <a href="{{ route('product.edit', ['product' => $product->id, 'year' => $year ?? '', 'warehouse' => $warehouse ?? '']) }}" class="mx-3 btn btn-sm d-inline-flex align-items-center text-white" data-bs-toggle="tooltip"data-title="{{__('product Edit')}}" title="{{__('Edit')}}"><i class="ti ti-edit"></i>
        </a>
        </div>
        @endcan
    </div>
</div>

