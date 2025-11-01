<?php
$plansettings = App\Models\Utility::plansettings();
?>
<?php echo e(Form::open(array('url'=>'lead','method'=>'post','enctype'=>'multipart/form-data'))); ?>

<div class="row">
    <?php if(isset($plansettings['enable_chatgpt']) && $plansettings['enable_chatgpt'] == 'on'): ?>
    <div class="text-end">
        <a href="#" data-size="md" class="btn btn-sm btn-primary" data-ajax-popup-over="true" data-size="md"
           data-title="<?php echo e(__('Generate content with AI')); ?>" data-url="<?php echo e(route('generate', ['lead'])); ?>"
           data-toggle="tooltip" title="<?php echo e(__('Generate')); ?>">
            <i class="fas fa-robot"></span><span class="robot"><?php echo e(__('Generate With AI')); ?></span></i>
        </a>
    </div>
    <?php endif; ?>
    <div class="col-6">
        <div class="form-group">
            <?php echo e(Form::label('name',__('Name'),['class'=>'form-label'])); ?><span class="text-danger">*</span>
            <?php echo e(Form::text('name',null,array('class'=>'form-control','placeholder'=>__('Enter Name'),'required'=>'required'))); ?>

        </div>
    </div>    
    <div class="col-6">
        <div class="form-group">
            <?php echo e(Form::label('phone',__('Phone'),['class'=>'form-label'])); ?><span class="text-danger">*</span>
            <?php echo e(Form::text('phone',null,array('class'=>'form-control','placeholder'=>__('Enter Phone'),'required'=>'required'))); ?>

        </div>
    </div> 
       
    <!-- <div class="col-6">
        <div class="form-group">
            <?php echo e(Form::label('title',__('Title / Company Name'),['class'=>'form-label'])); ?>

            <?php echo e(Form::text('title',null,array('class'=>'form-control','placeholder'=>__('Enter Title')))); ?>

        </div>
    </div> -->
    <div class="col-6">
        <div class="form-group">
            <?php echo e(Form::label('email',__('Email'),['class'=>'form-label'])); ?>

            <?php echo e(Form::text('email',null,array('class'=>'form-control','placeholder'=>__('Enter Email')))); ?>

        </div>
    </div> 
    <div class="col-6">
        <div class="form-group">
            <?php echo e(Form::label('lead_type_id',__('Lead Type'),['class'=>'form-label'])); ?>

            <?php echo Form::select('lead_type_id', $leadTypes, null,array('class' => 'form-control')); ?>

        </div>
    </div>
    <!-- <div class="col-6">
        <div class="form-group">
            <?php echo e(Form::label('website',__('Website'),['class'=>'form-label'])); ?>

            <?php echo e(Form::text('website',null,array('class'=>'form-control','placeholder'=>__('Enter Website')))); ?>

        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <?php echo e(Form::label('lead_address',__('Address'),['class'=>'form-label'])); ?>

            <?php echo e(Form::text('lead_address',null,array('class'=>'form-control','placeholder'=>__('Address')))); ?>

        </div>
    </div>     -->
    <!-- <div class="col-6">
        <div class="form-group">
            <?php echo e(Form::label('lead_country',__('Country'),['class'=>'form-label'])); ?>

            <?php echo e(Form::text('lead_country',null,array('class'=>'form-control','placeholder'=>__('Country')))); ?>

        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <?php echo e(Form::label('lead_state',__('State'),['class'=>'form-label'])); ?>

            <?php echo e(Form::text('lead_state',null,array('class'=>'form-control','placeholder'=>__('State')))); ?>

        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <?php echo e(Form::label('lead_city',__('City'),['class'=>'form-label'])); ?>

            <?php echo e(Form::text('lead_city',null,array('class'=>'form-control','placeholder'=>__('City')))); ?>

        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <?php echo e(Form::label('lead_postalcode',__('Postal Code'),['class'=>'form-label'])); ?>

            <?php echo e(Form::text('lead_postalcode',null,array('class'=>'form-control','placeholder'=>__('Postal Code')))); ?>

        </div>
    </div>     -->
     <div class="col-6">
        <div class="form-group">
            <?php echo e(Form::label('product',__('Product / Service'),['class'=>'form-label'])); ?>

            <?php echo Form::select('product', $product, null,array('class' => 'form-control', 'id' => 'product-select','required'=>'required')); ?>

        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <?php echo e(Form::label('part_type',__('Part Type'),['class'=>'form-label'])); ?>

            <?php echo Form::select('part_type', $partTypes, null,array('class' => 'form-control')); ?>

        </div>
    </div>
    <!-- <div class="col-12">
        <hr class="mt-2 mb-2">
        <h6><?php echo e(__('Vehicle Information')); ?></h6>
    </div>
    <div class="col-6">
        <div class="form-group">
            <?php echo e(Form::label('vehicle_year',__('Year'),['class'=>'form-label'])); ?>

            <?php echo Form::select('vehicle_year', $years, null,array('class' => 'form-control')); ?>

        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <?php echo e(Form::label('vehicle_brand',__('Model / Brand'),['class'=>'form-label'])); ?>

            <?php echo Form::select('vehicle_brand', $brands, null,array('class' => 'form-control', 'id' => 'vehicle-brand')); ?>

        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <?php echo e(Form::label('vehicle_part_number',__('Part Name (Part Number)'),['class'=>'form-label'])); ?>

            <?php echo Form::select('vehicle_part_number', $partNumbers, null,array('class' => 'form-control', 'id' => 'vehicle-part-number')); ?>

        </div>
    </div> -->
    <div class="col-6">
        <div class="form-group">
            <?php echo e(Form::label('account',__('Account'),['class'=>'form-label'])); ?>

            <?php echo Form::select('account', $account, null,array('class' => 'form-control')); ?>

        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <?php echo e(Form::label('Description',__('Description / Requirements'),['class'=>'form-label'])); ?>

            <?php echo e(Form::textarea('description',null,array('class'=>'form-control','rows'=>2,'placeholder'=>__('Enter Description')))); ?>

        </div>
    </div>
    <div class="col-12">
        <hr class="mt-2 mb-2">
        <h6><?php echo e(__('Details')); ?></h6>
    </div>
    <div class="col-6">
        <div class="form-group">
            <?php echo e(Form::label('status',__('Status'),['class'=>'form-label'])); ?>

            <?php echo Form::select('status',$status, null,array('class' => 'form-control')); ?>

        </div>
    </div>
    <!-- <div class="col-6">
        <div class="form-group">
            <?php echo e(Form::label('source',__('Source'),['class'=>'form-label'])); ?>

            <?php echo Form::select('source', $leadsource, null,array('class' => 'form-control')); ?>

        </div>
    </div> -->
    <div class="col-6">
        <div class="form-group">
            <?php echo e(Form::label('opportunity_amount',__('Opportunity Amount'),['class'=>'form-label'])); ?>

            <?php echo Form::number('opportunity_amount', null,array('class' => 'form-control')); ?>

        </div>
    </div>
    <!-- <?php if($type == 'campaign'): ?>
    <div class="col-6">
        <div class="form-group">
            <?php echo e(Form::label('campaign',__('Campaign'),['class'=>'form-label'])); ?>

            <?php echo Form::select('campaign', $campaign, $id,array('class' => 'form-control')); ?>

        </div>
    </div>
    <?php else: ?>
    <div class="col-6">
        <div class="form-group">
            <?php echo e(Form::label('campaign',__('Campaign'),['class'=>'form-label'])); ?>

            <?php echo Form::select('campaign', $campaign, null,array('class' => 'form-control')); ?>

        </div>
    </div>
    <?php endif; ?>
    <div class="col-6">
        <div class="form-group">
            <?php echo e(Form::label('industry',__('Industry'),['class'=>'form-label'])); ?>

            <?php echo Form::select('industry', $industry, null,array('class' => 'form-control')); ?>

        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <?php echo e(Form::label('Assign User',__('Assign User'),['class'=>'form-label'])); ?>

            <?php echo Form::select('user', $user, null,array('class' => 'form-control')); ?>

        </div>
    </div>   -->
</div>
<div class="modal-footer">
    <button type="button" class="btn  btn-light"
            data-bs-dismiss="modal">Close</button>
    <?php echo e(Form::submit(__('Save'),array('class'=>'btn btn-primary '))); ?>

</div>
</div>
<?php echo e(Form::close()); ?>


<?php $__env->startPush('script-page'); ?>
<script>
$(document).ready(function() {
    // Handle product selection change
    $('#product-select').on('change', function() {
        var productId = $(this).val();
        
        if (productId && productId !== '0') {
            // Make AJAX request to get product details
            $.ajax({
                url: '<?php echo e(route("product.details")); ?>',
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
});
</script>
<?php $__env->stopPush(); ?>
<?php /**PATH D:\xampp\htdocs\AS_CRM\resources\views/lead/create.blade.php ENDPATH**/ ?>