<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h5>{{__('Lead Information')}}</h5>
            </div>
            <div class="card-body" style=>
                <dl class="row">
                    <!-- <dt class="col-md-4"><span class="h6 text-md mb-0">{{__('Lead Name')}}</span></dt>
                    <dd class="col-md-8"><span class="text-md">{{ $lead->name ?: '-' }}</span></dd> -->

                    <dt class="col-md-4"><span class="h6 text-md mb-0">{{__('Customer Name')}}</span></dt>
                    <dd class="col-md-8"><span class="text-md">{{ $lead->cust_name ?: '-' }}</span></dd>

                    <!-- <dt class="col-md-4"><span class="h6 text-md mb-0">{{__('Contact Person')}}</span></dt>
                    <dd class="col-md-8"><span class="text-md">{{ $lead->contact ?: '-' }}</span></dd> -->

                    <dt class="col-md-4"><span class="h6 text-md mb-0">{{__('Email')}}</span></dt>
                    <dd class="col-md-8"><span class="text-md">{{ $lead->email ?: '-' }}</span></dd>

                    <!-- <dt class="col-md-4"><span class="h6 text-md mb-0">{{__('Phone')}}</span></dt>
                    <dd class="col-md-8"><span class="text-md">{{ $lead->phone ?: '-' }}</span></dd> -->

                    <!-- <dt class="col-md-4"><span class="h6 text-md mb-0">{{__('Website')}}</span></dt>
                    <dd class="col-md-8"><span class="text-md">{{ $lead->website ?: '-' }}</span></dd> -->

                    <dt class="col-md-4"><span class="h6 text-md mb-0">{{__('Date')}}</span></dt>
                    <dd class="col-md-8"><span class="text-md">{{ $lead->date ? \Auth::user()->dateFormat($lead->date) : '-' }}</span></dd>

                    <dt class="col-md-4"><span class="h6 text-md mb-0">{{__('Lead Type')}}</span></dt>
                    <dd class="col-md-8"><span class="text-md">{{ !empty($lead->leadType)?$lead->leadType->name:'-'}}</span></dd>

                    <dt class="col-md-4"><span class="h6 text-md mb-0">{{__('Product')}}</span></dt>
                    <dd class="col-md-8">
                        @if(!empty($lead->product))
                            <div class="product-details">
                                <div><strong>{{__('Name')}}:</strong> {{ $lead->product->part_name }}</div>
                                @if($lead->product->Year)
                                    <div><strong>{{__('Year')}}:</strong> {{ $lead->product->Year }}</div>
                                @endif
                                @if($lead->product->make)
                                    <div><strong>{{__('Make')}}:</strong> {{ $lead->product->make }}</div>
                                @endif
                            </div>
                        @else
                            <span class="text-md">-</span>
                        @endif
                    </dd>
                    <!-- <dt class="col-md-4"><span class="h6 text-md mb-0">{{__('Account')}}</span></dt>
                    <dd class="col-md-8"><span class="text-md">{{ !empty($lead->accounts)?$lead->accounts->name:'-'}}</span></dd> -->

                    <dt class="col-md-4"><span class="h6 text-md mb-0">{{__('Disposition')}}</span></dt>
                    <dd class="col-md-8"><span class="text-md">{{ $lead->disposition ?$status[$lead->disposition]: '-' }}</span></dd>

                    <!-- <dt class="col-md-4"><span class="h6 text-md mb-0">{{__('Opportunity Amount')}}</span></dt>
                    <dd class="col-md-8"><span class="text-md">{{ $lead->opportunity_amount ? '$' . number_format($lead->opportunity_amount, 2) : '-' }}</span></dd> -->

                    <dt class="col-md-4"><span class="h6 text-md mb-0">{{__('Note')}}</span></dt>
                    <dd class="col-md-8"><span class="text-md">{{ $lead->note ?: '-' }}</span></dd>
                </dl>
            </div>
        </div>
    </div>

</div>

<div class="row mt-3">
    <div class="col-12">
        <div class="d-flex justify-content-end">
            <!-- @can('Edit Lead')
            <div class="action-btn bg-info ms-2">
                <a href="{{ route('lead.edit',$lead->id) }}" class="mx-3 btn btn-sm d-inline-flex align-items-center text-white" data-bs-toggle="tooltip" data-title="{{__('Lead Edit')}}" title="{{__('Edit')}}">
                    <i class="ti ti-edit"></i>
                </a>
            </div>
            @endcan -->
            
            @can('Show Lead')
            <button type="button" class="btn  btn-primary" data-bs-dismiss="modal">{{ __('Close') }}</button>
            @endcan
        </div>
    </div>
</div>

