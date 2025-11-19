@php
$plansettings = App\Models\Utility::plansettings();
@endphp
{{Form::open(array('url'=>'lead','method'=>'post','enctype'=>'multipart/form-data'))}}
<div class="row">
    @if (isset($plansettings['enable_chatgpt']) && $plansettings['enable_chatgpt'] == 'on')
    <div class="text-end">
        <a href="#" data-size="md" class="btn btn-sm btn-primary" data-ajax-popup-over="true" data-size="md"
           data-title="{{ __('Generate content with AI') }}" data-url="{{ route('generate', ['lead']) }}"
           data-toggle="tooltip" title="{{ __('Generate') }}">
            <i class="fas fa-robot"></span><span class="robot">{{ __('Generate With AI') }}</span></i>
        </a>
    </div>
    @endif
    
    <div class="col-6">
        <div class="form-group">
            {{Form::label('date',__('Date'),['class'=>'form-label']) }}<span class="text-danger">*</span>
            {{Form::date('date',null,array('class'=>'form-control','required'=>'required'))}}
        </div>
    </div>
    
    <div class="col-6">
        <div class="form-group">
            {{Form::label('cust_name',__('Customer Name'),['class'=>'form-label']) }}<span class="text-danger">*</span>
            {{Form::text('cust_name',null,array('class'=>'form-control','placeholder'=>__('Enter Customer Name'),'required'=>'required'))}}
        </div>
    </div>    
    
    <div class="col-6">
        <div class="form-group">
            {{Form::label('contact',__('Contact'),['class'=>'form-label']) }}<span class="text-danger">*</span>
            {{Form::text('contact',null,array('class'=>'form-control','placeholder'=>__('Enter Contact'),'required'=>'required'))}}
        </div>
    </div> 
       
    <div class="col-6">
        <div class="form-group">
            {{Form::label('email',__('Email'),['class'=>'form-label']) }}
            {{Form::text('email',null,array('class'=>'form-control','placeholder'=>__('Enter Email')))}}
        </div>
    </div> 
    
    <div class="col-6">
        <div class="form-group">
            {{Form::label('lead_type_id',__('Lead Type'),['class'=>'form-label']) }}
            {!! Form::select('lead_type_id', $leadTypes, null,array('class' => 'form-control')) !!}
        </div>
    </div>
    
    <div class="col-6">
        <div class="form-group">
            {{Form::label('product',__('Product'),['class'=>'form-label']) }}
            {!! Form::select('product', $product, null,array('class' => 'form-control', 'id' => 'product-select')) !!}
        </div>
    </div>
    
    <div class="col-6">
        <div class="form-group">
            {{Form::label('part_name',__('Part Name'),['class'=>'form-label']) }}
            {{Form::text('part_name',null,array('class'=>'form-control','placeholder'=>__('Enter Part Name')))}}
        </div>
    </div>
    
    <div class="col-12" id="product-details" style="display: none;">
        <div class="form-group">
            <label class="form-label">{{__('Selected Product Details')}}</label>
            <div class="card">
                <div class="card-body">
                    <div class="row" id="product-info">
                        <!-- Product details will be populated here via JavaScript -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-12">
        <div class="form-group">
            {{Form::label('disposition',__('Disposition Note'),['class'=>'form-label']) }}
            {{Form::textarea('disposition',null,array('class'=>'form-control','rows'=>3,'placeholder'=>__('Enter Disposition Note')))}}
        </div>
    </div>
    
    <div class="col-12">
        <div class="form-group">
            {{Form::label('note',__('Note'),['class'=>'form-label']) }}
            {{Form::textarea('note',null,array('class'=>'form-control','rows'=>3,'placeholder'=>__('Enter Note')))}}
        </div>
    </div>
    
    <div class="col-6">
        <div class="form-group">
            {{Form::label('user_id',__('User'),['class'=>'form-label']) }}
            {!! Form::select('user_id', $user, \Auth::user()->id,array('class' => 'form-control')) !!}
        </div>
    </div>
    <!-- @if($type == 'campaign')
    <div class="col-6">
        <div class="form-group">
            {{Form::label('campaign',__('Campaign'),['class'=>'form-label']) }}
            {!! Form::select('campaign', $campaign, $id,array('class' => 'form-control')) !!}
        </div>
    </div>
    @else
    <div class="col-6">
        <div class="form-group">
            {{Form::label('campaign',__('Campaign'),['class'=>'form-label']) }}
            {!! Form::select('campaign', $campaign, null,array('class' => 'form-control')) !!}
        </div>
    </div>
    @endif
    <div class="col-6">
        <div class="form-group">
            {{Form::label('industry',__('Industry'),['class'=>'form-label']) }}
            {!! Form::select('industry', $industry, null,array('class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            {{Form::label('Assign User',__('Assign User'),['class'=>'form-label']) }}
            {!! Form::select('user', $user, null,array('class' => 'form-control')) !!}
        </div>
    </div>   -->
</div>
<div class="modal-footer">
    <button type="button" class="btn  btn-light"
            data-bs-dismiss="modal">Close</button>
    {{Form::submit(__('Save'),array('class'=>'btn btn-primary '))}}
</div>
</div>
{{Form::close()}}

@push('script-page')
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
                        
                        // Show product details
                        var productInfo = '<div class="col-md-3"><strong>{{__("Name")}}:</strong><br>' + product.name + '</div>';
                        if (product.Year) {
                            productInfo += '<div class="col-md-3"><strong>{{__("Year")}}:</strong><br>' + product.Year + '</div>';
                        }
                        if (product.make) {
                            productInfo += '<div class="col-md-3"><strong>{{__("Make")}}:</strong><br>' + product.make + '</div>';
                        }
                        if (product.part_number) {
                            productInfo += '<div class="col-md-3"><strong>{{__("Part Number")}}:</strong><br>' + product.part_number + '</div>';
                        }
                        
                        $('#product-info').html(productInfo);
                        $('#product-details').show();
                        
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
            $('#product-details').hide();
        }
    });
});
</script>
@endpush

