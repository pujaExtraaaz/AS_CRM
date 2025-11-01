<?php
$plansettings = App\Models\Utility::plansettings();
?>
<?php echo e(Form::open(array('route'=>'salesinvoice.store','method'=>'post','enctype'=>'multipart/form-data'))); ?>

<div class="row">
    <?php if(isset($plansettings['enable_chatgpt']) && $plansettings['enable_chatgpt'] == 'on'): ?>
    <div class="text-end">
        <a href="#" data-size="md" class="btn btn-sm btn-primary" data-ajax-popup-over="true" data-size="md"
           data-title="<?php echo e(__('Generate content with AI')); ?>" data-url="<?php echo e(route('generate', ['sales order'])); ?>"
           data-toggle="tooltip" title="<?php echo e(__('Generate')); ?>">
            <i class="fas fa-robot"></span><span class="robot"><?php echo e(__('Generate With AI')); ?></span></i>
        </a>
    </div>
    <?php endif; ?>

    <!-- Sales Order Header Section -->
    <div class="col-12">
        <h4 class="mb-3"><?php echo e(__('Sales Invoice Information')); ?></h4>
    </div>

    <!-- A. Sale Date -->
    <div class="col-6">
        <div class="form-group">
            <?php echo e(Form::label('sale_date',__(' Sale Date'),['class'=>'form-label'])); ?>

            <?php echo e(Form::date('sale_date',date('Y-m-d'),array('class'=>'form-control','required'=>'required'))); ?>

        </div>
    </div>


    <!-- C. Sale Status -->
    <div class="col-6">
        <div class="form-group">
            <?php echo e(Form::label('sale_status',__(' Sale Status'),['class'=>'form-label'])); ?>

            <select name="sale_status" id="sale_status" class="form-control" data-toggle="select" required>
                <option value=""><?php echo e(__('Select Status')); ?></option>
                <option value="pending"><?php echo e(__('Pending')); ?></option>
                <option value="confirmed"><?php echo e(__('Confirmed')); ?></option>
                <option value="shipped"><?php echo e(__('Shipped')); ?></option>
                <option value="delivered"><?php echo e(__('Delivered')); ?></option>
                <option value="cancelled"><?php echo e(__('Cancelled')); ?></option>
            </select>
        </div>
    </div>

    <!-- D. Sourcing Agent Name -->
    <div class="col-6">
        <div class="form-group">
            <?php echo e(Form::label('sourcing_agent_id',__(' Sourcing Agent Name'),['class'=>'form-label'])); ?>

            <?php echo Form::select('sourcing_agent_id', $user, null,array('class' => 'form-control','data-toggle'=>'select','required'=>'required')); ?>

        </div>
    </div>

  

    <!-- Sales Order Number -->
    <div class="col-6">
        <div class="form-group">
            <?php echo e(Form::label('sales_order_number',__('Sales Order Number'),['class'=>'form-label'])); ?>

            <?php echo e(Form::text('sales_order_number',\Auth::user()->salesorderNumberFormat($sales_no) ,array('class'=>'form-control','placeholder'=>__('Sales Order Number'),'disabled'))); ?>

            <input type="hidden" name="sales_invoice_id" id="sales_invoice_id" value="<?php echo e($sales_no); ?>">
            
        </div>
    </div>




    <!-- Address Information Section -->
    <div class="col-12 mt-4">
        <h4 class="mb-3"><?php echo e(__('Address Information')); ?></h4>
    </div>

    <!-- R. Billing Address -->
    <div class="col-6">
        <div class="form-group">
            <?php echo e(Form::label('billing_address',__(' Billing Address'),['class'=>'form-label'])); ?>

            <div class="action-btn bg-primary ms-2 float-end">
                <a class="mx-3 btn btn-sm d-inline-flex align-items-center text-white" id="billing_data" data-toggle="tooltip" data-placement="top" title="Same As Billing Address"><i class="fas fa-copy"></i></a>
                <span class="clearfix"></span>
            </div>
            <?php echo e(Form::text('billing_address',null,array('id'=>'billing_address','class'=>'form-control','placeholder'=>__('Billing Address')))); ?>

        </div>
    </div>

    <!-- S. Shipping Address -->
    <div class="col-6">
        <div class="form-group">
            <?php echo e(Form::label('shipping_address',__(' Shipping Address'),['class'=>'form-label'])); ?>

            <?php echo e(Form::text('shipping_address',null,array('id'=>'shipping_address','class'=>'form-control','placeholder'=>__('Shipping Address')))); ?>

        </div>
    </div>

    <!-- Billing Address Details -->
    <div class="col-3">
        <div class="form-group">
            <?php echo e(Form::text('billing_country',null,array('id'=>'billing_country','class'=>'form-control','placeholder'=>__('Billing Country')))); ?>

        </div>
    </div>    
    <div class="col-3">
        <div class="form-group">
            <?php echo e(Form::text('billing_state',null,array('id'=>'billing_state','class'=>'form-control','placeholder'=>__('Billing State')))); ?>

        </div>
    </div>
    <div class="col-3">
        <div class="form-group">
            <?php echo e(Form::text('billing_city',null,array('id'=>'billing_city','class'=>'form-control','placeholder'=>__('Billing City')))); ?>

        </div>
    </div>
    <div class="col-3">
        <div class="form-group">
            <?php echo e(Form::text('billing_postalcode',null,array('id'=>'billing_postalcode','class'=>'form-control','placeholder'=>__('Billing Postal Code')))); ?>

        </div>
    </div>

    <!-- Shipping Address Details -->
    <div class="col-3">
        <div class="form-group">
            <?php echo e(Form::text('shipping_country',null,array('id'=>'shipping_country','class'=>'form-control','placeholder'=>__('Shipping Country')))); ?>

        </div>
    </div>    
    <div class="col-3">
        <div class="form-group">
            <?php echo e(Form::text('shipping_state',null,array('id'=>'shipping_state','class'=>'form-control','placeholder'=>__('Shipping State')))); ?>

        </div>
    </div>
    <div class="col-3">
        <div class="form-group">
            <?php echo e(Form::text('shipping_city',null,array('id'=>'shipping_city','class'=>'form-control','placeholder'=>__('Shipping City')))); ?>

        </div>
    </div>
    <div class="col-3">
        <div class="form-group">
            <?php echo e(Form::text('shipping_postalcode',null,array('id'=>'shipping_postalcode','class'=>'form-control','placeholder'=>__('Shipping Postal Code')))); ?>

        </div>
    </div>

    <!-- Payment Information Section -->
    <div class="col-12 mt-4">
        <h4 class="mb-3"><?php echo e(__('Payment Information')); ?></h4>
    </div>

    <!-- T. Payment Gateway -->
    <div class="col-6">
        <div class="form-group">
            <?php echo e(Form::label('payment_gateway',__(' Payment Gateway'),['class'=>'form-label'])); ?>

            <select name="payment_gateway" id="payment_gateway" class="form-control" required onchange="toggleCardFieldsDirect()">
                <option value=""><?php echo e(__('Select Payment Gateway')); ?></option>
                <option value="card"><?php echo e(__(' Card')); ?></option>
                <option value="paypal"><?php echo e(__(' Paypal')); ?></option>
                <option value="zelle"><?php echo e(__(' Zelle')); ?></option>
                <option value="bank_transfer"><?php echo e(__(' Bank Transfer')); ?></option>
                <option value="ach"><?php echo e(__(' ACH')); ?></option>
                <option value="invoice"><?php echo e(__(' Invoice')); ?></option>
            </select>
         
         
        </div>
    </div>

    <!-- Card Information (Conditional) -->
    <div class="col-6" id="card_info" style="display: none;">
        <div class="form-group">
            <?php echo e(Form::label('name_on_card',__(' Name On Card'),['class'=>'form-label'])); ?>

            <?php echo e(Form::text('name_on_card',null,array('class'=>'form-control','placeholder'=>__('Enter Name On Card')))); ?>

        </div>
    </div>

    <div class="col-6" id="card_number" style="display: none;">
        <div class="form-group">
            <?php echo e(Form::label('card_number',__(' Card Number'),['class'=>'form-label'])); ?>

            <?php echo e(Form::text('card_number',null,array('class'=>'form-control','placeholder'=>__('Enter Card Number'),'maxlength'=>'19'))); ?>

        </div>
    </div>

    <div class="col-3" id="expiration" style="display: none;">
        <div class="form-group">
            <?php echo e(Form::label('expiration',__(' Expiration'),['class'=>'form-label'])); ?>

            <?php echo e(Form::text('expiration',null,array('class'=>'form-control','placeholder'=>__('MM/YY'),'maxlength'=>'5'))); ?>

        </div>
    </div>

    <div class="col-3" id="cvv" style="display: none;">
        <div class="form-group">
            <?php echo e(Form::label('cvv',__(' CVV'),['class'=>'form-label'])); ?>

            <?php echo e(Form::text('cvv',null,array('class'=>'form-control','placeholder'=>__('CVV'),'maxlength'=>'4'))); ?>

        </div>
    </div>

    <!-- Pricing Information Section -->
    <div class="col-12 mt-4">
        <h4 class="mb-3"><?php echo e(__('Pricing Information')); ?></h4>
    </div>

    <!-- Y. Part Price -->
    <div class="col-6">
        <div class="form-group">
            <?php echo e(Form::label('part_price',__(' Part Price'),['class'=>'form-label'])); ?>

            <div class="input-group">
                <span class="input-group-text">$</span>
                <?php echo e(Form::number('part_price',null,array('class'=>'form-control','placeholder'=>__('Enter Part Price'),'step'=>'0.01','min'=>'0'))); ?>

            </div>
        </div>
    </div>

    <!-- Z. Shipping Price -->
    <div class="col-6">
        <div class="form-group">
            <?php echo e(Form::label('shipping_price',__(' Shipping Price'),['class'=>'form-label'])); ?>

            <div class="input-group">
                <span class="input-group-text">$</span>
                <?php echo e(Form::number('shipping_price',null,array('class'=>'form-control','placeholder'=>__('Enter Shipping Price'),'step'=>'0.01','min'=>'0'))); ?>

            </div>
        </div>
    </div>

    <!-- AA. Gross Profit -->
    <div class="col-6">
        <div class="form-group">
            <?php echo e(Form::label('gross_profit',__(' Gross Profit'),['class'=>'form-label'])); ?>

            <div class="input-group">
                <span class="input-group-text">$</span>
                <?php echo e(Form::number('gross_profit',null,array('class'=>'form-control','placeholder'=>__('Enter Gross Profit'),'step'=>'0.01','min'=>'0'))); ?>

            </div>
        </div>
    </div>

    <!-- BB. Charge Amount -->
    <div class="col-6">
        <div class="form-group">
            <?php echo e(Form::label('charge_amount',__(' Charge Amount'),['class'=>'form-label'])); ?>

            <div class="input-group">
                <span class="input-group-text">$</span>
                <?php echo e(Form::number('charge_amount',null,array('class'=>'form-control','placeholder'=>__('Enter Charge Amount'),'step'=>'0.01','min'=>'0'))); ?>

            </div>
        </div>
    </div>

    <!-- CC. Total Amount Quoted -->
    <div class="col-6">
        <div class="form-group">
                <?php echo e(Form::label('total_amount_quoted',__(' Total Amount Quoted'),['class'=>'form-label'])); ?>

            <div class="input-group">
                <span class="input-group-text">$</span>
                <?php echo e(Form::number('total_amount_quoted',null,array('class'=>'form-control','placeholder'=>__('Enter Total Amount Quoted'),'step'=>'0.01','min'=>'0'))); ?>

            </div>
        </div>
    </div>

    <!-- DD. Agent Note -->
    <div class="col-6">
        <div class="form-group">
            <?php echo e(Form::label('agent_note',__('DD. Agent Note'),['class'=>'form-label'])); ?>

            <?php echo e(Form::textarea('agent_note',null,array('class'=>'form-control','rows'=>3,'placeholder'=>__('Enter Agent Note')))); ?>

        </div>
    </div>

    <!-- Additional Fields -->
    <div class="col-6">
        <div class="form-group">
            <?php echo e(Form::label('billing_contact_id',__('Billing Contact'),['class'=>'form-label'])); ?>

            <?php echo Form::select('billing_contact_id', $contact, null,array('class' => 'form-control','data-toggle'=>'select')); ?>

        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <?php echo e(Form::label('shipping_contact_id',__('Shipping Contact'),['class'=>'form-label'])); ?>

            <?php echo Form::select('shipping_contact_id', $contact, null,array('class' => 'form-control','data-toggle'=>'select')); ?>

        </div>
    </div>

    <div class="col-6">
        <div class="form-group">
            <?php echo e(Form::label('shipping_provider_id',__('Shipping Provider'),['class'=>'form-label'])); ?>

            <?php echo Form::select('shipping_provider_id', $shipping_provider, null,array('class' => 'form-control','data-toggle'=>'select')); ?>

        </div>
    </div>

   
    <div class="modal-footer">
        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
        <?php echo e(Form::submit(__('Save'),array('class'=>'btn btn-primary'))); ?>

    </div>
</div>
</div>
<?php echo e(Form::close()); ?>


<script>
document.addEventListener('DOMContentLoaded', function() {
    console.log('DOM loaded, initializing card fields toggle...');
    
    // Show/hide card information fields based on payment gateway selection
    const paymentGateway = document.getElementById('payment_gateway');
    const cardInfo = document.getElementById('card_info');
    const cardNumber = document.getElementById('card_number');
    const expiration = document.getElementById('expiration');
    const cvv = document.getElementById('cvv');

    console.log('Payment Gateway Element:', paymentGateway);
    console.log('Card Info Element:', cardInfo);
    console.log('Card Number Element:', cardNumber);
    console.log('Expiration Element:', expiration);
    console.log('CVV Element:', cvv);

    function toggleCardFields() {
        console.log('Toggle function called, payment gateway value:', paymentGateway.value);
        
        if (paymentGateway.value === 'card') {
            console.log('Showing card fields...');
            cardInfo.style.display = 'block';
            cardNumber.style.display = 'block';
            expiration.style.display = 'block';
            cvv.style.display = 'block';
        } else {
            console.log('Hiding card fields...');
            cardInfo.style.display = 'none';
            cardNumber.style.display = 'none';
            expiration.style.display = 'none';
            cvv.style.display = 'none';
        }
    }

    // Add multiple event listeners to ensure it works
    if (paymentGateway) {
        // Primary change event
        paymentGateway.addEventListener('change', toggleCardFields);
        console.log('Change event listener added');
        
        // Also listen for input events (for some browsers)
        paymentGateway.addEventListener('input', toggleCardFields);
        console.log('Input event listener added');
        
        // Click event for debugging
        paymentGateway.addEventListener('click', function() {
            console.log('Payment gateway clicked, current value:', this.value);
        });
        
        // Focus event to trigger on selection
        paymentGateway.addEventListener('focus', function() {
            console.log('Payment gateway focused');
        });
        
        // Manual trigger after a short delay to ensure DOM is ready
        setTimeout(function() {
            console.log('Manual trigger after timeout');
            toggleCardFields();
        }, 100);
        
    } else {
        console.error('Payment gateway element not found!');
    }

    // Auto-calculate total amount when part price and shipping price change
    const partPrice = document.querySelector('input[name="part_price"]');
    const shippingPrice = document.querySelector('input[name="shipping_price"]');
    const totalAmount = document.querySelector('input[name="total_amount_quoted"]');

    function calculateTotal() {
        const part = parseFloat(partPrice.value) || 0;
        const shipping = parseFloat(shippingPrice.value) || 0;
        const total = part + shipping;
        totalAmount.value = total.toFixed(2);
    }

    partPrice.addEventListener('input', calculateTotal);
    shippingPrice.addEventListener('input', calculateTotal);

    // Format card number input
    const cardNumberInput = document.querySelector('input[name="card_number"]');
    if (cardNumberInput) {
        cardNumberInput.addEventListener('input', function(e) {
            let value = e.target.value.replace(/\s/g, '').replace(/[^0-9]/gi, '');
            let formattedValue = value.match(/.{1,4}/g)?.join(' ') || value;
            e.target.value = formattedValue;
        });
    }

    // Format expiration date input
    const expirationInput = document.querySelector('input[name="expiration"]');
    if (expirationInput) {
        expirationInput.addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, '');
            if (value.length >= 2) {
                value = value.substring(0, 2) + '/' + value.substring(2, 4);
            }
            e.target.value = value;
        });
    }

    // Copy billing address to shipping address
    const billingDataBtn = document.getElementById('billing_data');
    if (billingDataBtn) {
        billingDataBtn.addEventListener('click', function(e) {
            e.preventDefault();
            const billingAddress = document.getElementById('billing_address').value;
            const billingCity = document.getElementById('billing_city').value;
            const billingState = document.getElementById('billing_state').value;
            const billingCountry = document.getElementById('billing_country').value;
            const billingPostalCode = document.getElementById('billing_postalcode').value;

            document.getElementById('shipping_address').value = billingAddress;
            document.getElementById('shipping_city').value = billingCity;
            document.getElementById('shipping_state').value = billingState;
            document.getElementById('shipping_country').value = billingCountry;
            document.getElementById('shipping_postalcode').value = billingPostalCode;
        });
    }
});

// Direct function called by onchange attribute
function toggleCardFieldsDirect() {
    console.log('Direct toggle function called');
    const paymentGateway = document.getElementById('payment_gateway');
    const cardInfo = document.getElementById('card_info');
    const cardNumber = document.getElementById('card_number');
    const expiration = document.getElementById('expiration');
    const cvv = document.getElementById('cvv');
    
    console.log('Payment gateway value:', paymentGateway.value);
    
    if (paymentGateway.value === 'card') {
        console.log('Showing card fields via direct function');
        cardInfo.style.display = 'block';
        cardNumber.style.display = 'block';
        expiration.style.display = 'block';
        cvv.style.display = 'block';
    } else {
        console.log('Hiding card fields via direct function');
        cardInfo.style.display = 'none';
        cardNumber.style.display = 'none';
        expiration.style.display = 'none';
        cvv.style.display = 'none';
    }
}

// Test function for debugging
function testCardToggle() {
    console.log('Test button clicked!');
    const paymentGateway = document.getElementById('payment_gateway');
    const cardInfo = document.getElementById('card_info');
    const cardNumber = document.getElementById('card_number');
    const expiration = document.getElementById('expiration');
    const cvv = document.getElementById('cvv');
    
    console.log('Current payment gateway value:', paymentGateway.value);
    console.log('Card info display:', cardInfo.style.display);
    
    // Force show card fields for testing
    cardInfo.style.display = 'block';
    cardNumber.style.display = 'block';
    expiration.style.display = 'block';
    cvv.style.display = 'block';
    
    console.log('Card fields should now be visible');
}
</script><?php /**PATH D:\xampp\htdocs\AS_CRM\resources\views/salesorder/create.blade.php ENDPATH**/ ?>