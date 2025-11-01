 
 <?php $__env->startSection('page-title'); ?>
     <?php echo e(__('Invoice')); ?>

 <?php $__env->stopSection(); ?>
 <?php $__env->startSection('title'); ?>
     <?php echo e(__('Invoice')); ?>

 <?php $__env->stopSection(); ?>
 <?php $__env->startSection('breadcrumb'); ?>
     <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Home')); ?></a></li>
     <li class="breadcrumb-item"><a href="<?php echo e(route('invoice.index')); ?>"><?php echo e(__('Invoice')); ?></a></li>
     <li class="breadcrumb-item"><?php echo e(__('Show')); ?></li>
 <?php $__env->stopSection(); ?>
 <?php
     $total_storage = $user->storage_limit;

 ?>
 <?php $__env->startSection('action-btn'); ?>
     <div class="action-btn bg-warning ms-2">
         <a href="<?php echo e(route('invoice.pdf', \Crypt::encrypt($invoice->id))); ?>" target="_blank"
             class="btn btn-sm btn-primary btn-icon" data-bs-toggle="tooltip" title="<?php echo e(__('Print')); ?>">
             <span class="btn-inner--icon text-white"><i class="ti ti-printer"></i></span>
         </a>
     </div>

     <?php if(Auth::user()->type == 'owner'): ?>
         <div class="action-btn bg-warning ms-2">
             <a href="#" class="btn btn-sm btn-warning btn-icon m-1 cp_link"
                 data-link="<?php echo e(route('pay.invoice', \Illuminate\Support\Facades\Crypt::encrypt($invoice->id))); ?>"
                 data-bs-toggle="tooltip" data-title="<?php echo e(__('Click to copy invoice link')); ?>"
                 title="<?php echo e(__('Copy invoice')); ?>"><span class="btn-inner--icon text-white"><i
                         class="ti ti-file"></i></span></a>
         </div>
     <?php endif; ?>
     <div class="action-btn bg-success ms-2">
         <a href="#" data-size="md" data-url="<?php echo e(route('invoice.link', $invoice->id)); ?>" data-ajax-popup="true"
             data-bs-toggle="tooltip" data-title="<?php echo e(__('Send Invoice Link')); ?>" title="<?php echo e(__('Send Link')); ?>"
             class="btn btn-sm btn-secondary btn-icon m-1">
             <i class="ti ti-brand-telegram"></i>
         </a>
     </div>
     <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Edit Invoice')): ?>
         <div class="action-btn ms-2">
             <a href="<?php echo e(route('invoice.edit', $invoice->id)); ?>" class="btn btn-sm btn-info btn-icon m-1"
                 data-bs-toggle="tooltip" data-title="<?php echo e(__('invoice Edit')); ?>" title="<?php echo e(__('Edit')); ?>"><i
                     class="ti ti-edit"></i>
             </a>
         </div>
     <?php endif; ?>
     <div class="action-btn ms-2">
         <a href="#" data-size="md" data-url="<?php echo e(route('invoice.invoiceitem', $invoice->id)); ?>"
             data-ajax-popup="true" data-title="<?php echo e(__('Create New Invoice Item')); ?>" title="<?php echo e(__('Create')); ?>"
             data-bs-toggle="tooltip" class="btn btn-sm btn-primary btn-icon m-1">
             <i class="ti ti-plus"></i>
         </a>
     </div>
 <?php $__env->stopSection(); ?>
 <?php $__env->startSection('content'); ?>
     <div class="row">

         <div class="col-lg-10">
             <!-- [ Invoice ] start -->
             <div class="container">
                 <div>
                     <div class="card" id="printTable">
                         <div class="card-body">
                             <div class="row align-items-center mb-4">
                                 <div class="col-sm-6 mb-3 mb-sm-0">
                                     <div class="col-lg-6 col-md-8">
                                         <h6 class="d-inline-block m-0 d-print-none"><?php echo e(__('Invoice ID')); ?></h6>
                                         <span class="col-sm-8"><span
                                                 class="text-sm"><?php echo e(\Auth::user()->invoiceNumberFormat($invoice->id)); ?></span></span>
                                     </div>
                                     <div class="col-lg-6 col-md-8 mt-3">
                                         <h6 class="d-inline-block m-0 d-print-none"><?php echo e(__('Invoice Date')); ?></h6>
                                         <span class="col-sm-8"><span
                                                 class="text-sm"><?php echo e(\Auth::user()->dateFormat($invoice->created_at)); ?></span></span>
                                     </div>
                                     <h6 class="d-inline-block m-0 d-print-none mt-3"><?php echo e(__('Invoice')); ?></h6>
                                     <?php if($invoice->status == 0): ?>
                                         <span
                                             class="badge bg-primary p-2 px-3 rounded"><?php echo e(__(\App\Models\Invoice::$status[$invoice->status])); ?></span>
                                     <?php elseif($invoice->status == 1): ?>
                                         <span
                                             class="badge bg-danger p-2 px-3 rounded"><?php echo e(__(\App\Models\Invoice::$status[$invoice->status])); ?></span>
                                     <?php elseif($invoice->status == 2): ?>
                                         <span
                                             class="badge bg-warning p-2 px-3 rounded"><?php echo e(__(\App\Models\Invoice::$status[$invoice->status])); ?></span>
                                     <?php elseif($invoice->status == 3): ?>
                                         <span
                                             class="badge bg-success p-2 px-3 rounded"><?php echo e(__(\App\Models\Invoice::$status[$invoice->status])); ?></span>
                                     <?php elseif($invoice->status == 4): ?>
                                         <span
                                             class="badge bg-info p-2 px-3 rounded"><?php echo e(__(\App\Models\Invoice::$status[$invoice->status])); ?></span>
                                     <?php endif; ?>
                                 </div>
                                 <div class="col-sm-6 text-sm-end">
                                     <div>
                                         <div class="float-end mt-3">
                                             <?php echo DNS2D::getBarcodeHTML(
                                                 route('pay.invoice', \Illuminate\Support\Facades\Crypt::encrypt($invoice->id)),
                                                 'QRCODE',
                                                 2,
                                                 2,
                                             ); ?>

                                         </div>
                                     </div>
                                 </div>
                             </div>
                             <div class="row">
                                 <div class="col-sm-12 ">
                                     <h5 class="px-2 py-2"><b><?php echo e(__('Item List')); ?></b></h5>
                                     <div class="table-responsive mt-4">
                                         <table class="table invoice-detail-table">
                                             <thead>
                                                 <tr class="thead-default">
                                                     <th><?php echo e(__('Item')); ?></th>
                                                     <th><?php echo e(__('Quantity')); ?></th>
                                                     <th><?php echo e(__('Price')); ?></th>
                                                     <th><?php echo e(__('Tax')); ?></th>
                                                     <th><?php echo e(__('Discount')); ?></th>
                                                     <th><?php echo e(__('Description')); ?></th>
                                                     <th><?php echo e(__('Price')); ?></th>
                                                     <th>#</th>
                                                 </tr>
                                             </thead>
                                             <tbody>
                                                 <?php
                                                     $totalQuantity = 0;
                                                     $totalRate = 0;
                                                     $totalAmount = 0;
                                                     $totalTaxPrice = 0;
                                                     $totalDiscount = 0;
                                                     $taxesData = [];
                                                    $TaxPrice_array=[];

                                                 ?>
                                                 <?php $__currentLoopData = $invoice->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $invoiceitem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                     <?php
                                                         $taxes = \Utility::tax($invoiceitem->tax);
                                                         $totalQuantity += $invoiceitem->quantity;
                                                         $totalRate += $invoiceitem->price;
                                                         $totalDiscount += $invoiceitem->discount;
                                                         if (!empty($taxes[0])) {
                                                             foreach ($taxes as $taxe) {
                                                                 $taxDataPrice = \Utility::taxRate($taxe->rate, $invoiceitem->price, $invoiceitem->quantity);
                                                                 if (array_key_exists($taxe->tax_name, $taxesData)) {
                                                                     $taxesData[$taxe->tax_name] = $taxesData[$taxe->tax_name] + $taxDataPrice;
                                                                 } else {
                                                                     $taxesData[$taxe->tax_name] = $taxDataPrice;
                                                                 }
                                                             }
                                                         }
                                                     ?>
                                                     <tr>
                                                         <td><?php echo e($invoiceitem->items->name ?? ''); ?> </td>
                                                         <td><?php echo e($invoiceitem->quantity); ?> </td>
                                                         <td><?php echo e(\Auth::user()->priceFormat($invoiceitem->price)); ?> </td>
                                                         <td>
                                                             <div class="col">
                                                                    <?php
                                                                        $totalTaxPrice = 0;
                                                                        $data = 0;
                                                                    ?>
                                                                 <?php if(!empty($invoiceitem->tax)): ?>
                                                                     <?php $__currentLoopData = $invoiceitem->tax($invoiceitem->tax); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tax): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                         <?php
                                                                             $taxPrice = \Utility::taxRate($tax->rate, $invoiceitem->price, $invoiceitem->quantity);
                                                                             $totalTaxPrice += $taxPrice;
                                                                            $data+=$taxPrice;
                                                                         ?>
                                                                         <a href="#!"
                                                                             class="d-block text-sm text-muted"><?php echo e($tax->tax_name . ' (' . $tax->rate . '%)'); ?>

                                                                             &nbsp;&nbsp;<?php echo e(\Auth::user()->priceFormat($taxPrice)); ?></a>
                                                                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                     <?php
                                                                     array_push($TaxPrice_array,$data);
                                                                 ?>
                                                                 <?php else: ?>
                                                                     <a href="#!"
                                                                         class="d-block text-sm text-muted"><?php echo e(__('No Tax')); ?></a>
                                                                 <?php endif; ?>
                                                             </div>
                                                         </td>
                                                         <td><?php echo e(\Auth::user()->priceFormat($invoiceitem->discount)); ?> </td>
                                                         <td><?php echo e($invoiceitem->description); ?> </td>
                                                         <td class="text-right">
                                                            <?php
                                                            $tr_tex = (array_key_exists($key,$TaxPrice_array) == true) ? $TaxPrice_array[$key] : 0;
                                                        ?>
                                                             <?php echo e(\Auth::user()->priceFormat($invoiceitem->price * $invoiceitem->quantity- $invoiceitem->discount + $tr_tex)); ?>

                                                         </td>
                                                         <td class="text-right">
                                                             <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Edit Invoice')): ?>
                                                                 <div class="action-btn bg-info ms-2">
                                                                     <a href="#"
                                                                         data-url="<?php echo e(route('invoice.item.edit', $invoiceitem->id)); ?>"
                                                                         data-ajax-popup="true"
                                                                         class="mx-3 btn btn-sm d-inline-flex align-items-center text-white "
                                                                         data-bs-toggle="tooltip" title="<?php echo e(__('Edit')); ?>"
                                                                         data-title="<?php echo e(__('Edit Item')); ?>"><i
                                                                             class="ti ti-edit"></i></a>
                                                                 </div>
                                                             <?php endif; ?>
                                                             <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Delete Invoice')): ?>
                                                                 <div class="action-btn bg-danger ms-2">
                                                                     <?php echo Form::open(['method' => 'DELETE', 'route' => ['invoice.items.delete', $invoiceitem->id]]); ?>

                                                                     <a href="#!"
                                                                         class="mx-3 btn btn-sm  align-items-center text-white show_confirm"
                                                                         data-bs-toggle="tooltip" title='Delete'>
                                                                         <i class="ti ti-trash"></i>
                                                                     </a>
                                                                     <?php echo Form::close(); ?>

                                                                 </div>
                                                             <?php endif; ?>
                                                         </td>
                                                         <?php
                                                             $totalQuantity += $invoiceitem->quantity;
                                                             $totalRate += $invoiceitem->price;
                                                             $totalDiscount += $invoiceitem->discount;
                                                             $totalAmount += $invoiceitem->price * $invoiceitem->quantity;
                                                         ?>
                                                     </tr>
                                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                             </tbody>
                                         </table>
                                     </div>
                                 </div>
                             </div>

                             <div class="row">
                                 <div class="col-sm-12">
                                     <div class="invoice-total">
                                         <table class="table invoice-table ">
                                             <tbody>
                                                 <tr>
                                                     <th>Sub Total :</th>
                                                     <td><?php echo e(\Auth::user()->priceFormat($invoice->getSubTotal())); ?></td>
                                                 </tr>
                                                 
                                            <?php if(!empty($taxesData)): ?>
                                                    <?php $__currentLoopData = $taxesData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <tr>
                                                            <th><?php echo e($key); ?></th>
                                                            <td><?php echo e(\Auth::user()->priceFormat($item)); ?></td>
                                                        </tr>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                                 <tr>
                                                     <th>Discount :</th>
                                                     <td><?php echo e(\Auth::user()->priceFormat($invoice->getTotalDiscount())); ?>

                                                     </td>
                                                 </tr>
                                                 <tr>
                                                     <td>
                                                         <hr />
                                                         <h5 class="text-primary m-r-10">Total :</h5>
                                                     </td>

                                                     <td>
                                                         <hr />
                                                         <h5 class="text-primary subTotal">
                                                             <?php echo e(\Auth::user()->priceFormat($invoice->getTotal())); ?></h5>
                                                     </td>
                                                 </tr>
                                             </tbody>
                                         </table>
                                     </div>
                                 </div>
                             </div>
                             <div class="row">
                                 <div class="col-12 col-md-4">
                                     <h5><?php echo e(__('From')); ?></h5>
                                     <dl class="row mt-4 align-items-center">
                                         <dt class="col-sm-6"><span
                                                 class="h6 text-sm mb-0"><?php echo e(__('Company Address')); ?></span></dt>
                                         <dd class="col-sm-6"><span
                                                 class="text-sm"><?php echo e($company_setting['company_address']); ?></span></dd>

                                         <dt class="col-sm-6"><span
                                                 class="h6 text-sm mb-0"><?php echo e(__('Company City')); ?></span></dt>
                                         <dd class="col-sm-6"><span
                                                 class="text-sm"><?php echo e($company_setting['company_city']); ?></span></dd>

                                         <dt class="col-sm-6"><span class="h6 text-sm mb-0"><?php echo e(__('Zip Code')); ?></span>
                                         </dt>
                                         <dd class="col-sm-6"><span
                                                 class="text-sm"><?php echo e($company_setting['company_zipcode']); ?></span></dd>

                                         <dt class="col-sm-6"><span
                                                 class="h6 text-sm mb-0"><?php echo e(__('Company Country')); ?></span></dt>
                                         <dd class="col-sm-6"><span
                                                 class="text-sm"><?php echo e($company_setting['company_country']); ?></span></dd>

                                         <dt class="col-sm-6"><span
                                                 class="h6 text-sm mb-0"><?php echo e(__('Company Contact')); ?></span></dt>
                                         <dd class="col-sm-6"><span
                                                 class="text-sm"><?php echo e($company_setting['company_telephone']); ?></span></dd>
                                     </dl>
                                 </div>
                                 <div class="col-12 col-md-4">
                                     <h5><?php echo e(__('Billing Address')); ?></h5>
                                     <dl class="row mt-4 align-items-center">
                                         <dt class="col-sm-6"><span
                                                 class="h6 text-sm mb-0"><?php echo e(__('Billing Address')); ?></span></dt>
                                         <dd class="col-sm-6"><span
                                                 class="text-sm"><?php echo e($invoice->billing_address); ?></span></dd>

                                         <dt class="col-sm-6"><span
                                                 class="h6 text-sm mb-0"><?php echo e(__('Billing City')); ?></span></dt>
                                         <dd class="col-sm-6"><span class="text-sm"><?php echo e($invoice->billing_city); ?></span>
                                         </dd>

                                         <dt class="col-sm-6"><span class="h6 text-sm mb-0"><?php echo e(__('Zip Code')); ?></span>
                                         </dt>
                                         <dd class="col-sm-6"><span
                                                 class="text-sm"><?php echo e($invoice->billing_postalcode); ?></span></dd>

                                         <dt class="col-sm-6"><span
                                                 class="h6 text-sm mb-0"><?php echo e(__('Billing Country')); ?></span></dt>
                                         <dd class="col-sm-6"><span
                                                 class="text-sm"><?php echo e($invoice->billing_country); ?></span></dd>


                                         <dt class="col-sm-6"><span
                                                 class="h6 text-sm mb-0"><?php echo e(__('Billing Contact')); ?></span></dt>
                                         <dd class="col-sm-6"><span
                                                 class="text-sm"><?php echo e(!empty($invoice->contacts->name) ? $invoice->contacts->name : '--'); ?></span>
                                         </dd>
                                     </dl>
                                 </div>
                                 <div class="col-12 col-md-4">
                                     <h5><?php echo e(__('Shipping Address')); ?></h5>
                                     <dl class="row mt-4 align-items-center">
                                         <dt class="col-sm-6"><span
                                                 class="h6 text-sm mb-0"><?php echo e(__('Shipping Address')); ?></span></dt>
                                         <dd class="col-sm-6"><span
                                                 class="text-sm"><?php echo e($invoice->shipping_address); ?></span></dd>

                                         <dt class="col-sm-6"><span
                                                 class="h6 text-sm mb-0"><?php echo e(__('Shipping City')); ?></span></dt>
                                         <dd class="col-sm-6"><span class="text-sm"><?php echo e($invoice->shipping_city); ?></span>
                                         </dd>

                                         <dt class="col-sm-6"><span class="h6 text-sm mb-0"><?php echo e(__('Zip Code')); ?></span>
                                         </dt>
                                         <dd class="col-sm-6"><span
                                                 class="text-sm"><?php echo e($invoice->shipping_postalcode); ?></span></dd>

                                         <dt class="col-sm-6"><span
                                                 class="h6 text-sm mb-0"><?php echo e(__('Shipping Country')); ?></span></dt>
                                         <dd class="col-sm-6"><span
                                                 class="text-sm"><?php echo e($invoice->shipping_country); ?></span></dd>

                                         <dt class="col-sm-6"><span
                                                 class="h6 text-sm mb-0"><?php echo e(__('Shipping Contact')); ?></span></dt>
                                         <dd class="col-sm-6"><span
                                                 class="text-sm"><?php echo e(!empty($invoice->contacts->name) ? $invoice->contacts->name : '--'); ?></span>
                                         </dd>
                                     </dl>
                                 </div>
                             </div>



                             <div class="row mt-4">
                                 <div class="col-sm-12">
                                     <h3 class="px-2 py-2"><b><?php echo e(__('Payment History')); ?></b></h3>
                                     <div class="table-responsive mt-3">
                                         <table class="table invoice-detail-table">
                                             <thead>
                                                 <tr class="thead-default">
                                                     <th><?php echo e(__('Transaction ID')); ?></th>
                                                     <th><?php echo e(__('Payment Date')); ?></th>
                                                     
                                                     <th><?php echo e(__('Payment Type')); ?></th>
                                                     <th><?php echo e(__('Note')); ?></th>
                                                     <th><?php echo e(__('Receipt')); ?></th>
                                                     <th class="text-right"><?php echo e(__('Amount')); ?></th>
                                                     <th><?php echo e(__('Action')); ?></th>
                                                 </tr>
                                             </thead>
                                             <tbody>
                                                 <?php $i=0; ?>
                                                 <?php if($invoice->payments->count() || $invoicepayments->count()): ?>

                                                 <?php $__currentLoopData = $invoice->payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                 
                                                             <tr>
                                                                 <td><?php echo e(sprintf('%05d', $payment->transaction_id)); ?></td>
                                                                 <td><?php echo e(Auth::user()->dateFormat($payment->date)); ?></td>
                                                                 
                                                                 <td><?php echo e($payment->payment_type); ?></td>
                                                                 <td><?php echo e(!empty($payment->notes) ? $payment->notes : '-'); ?>

                                                                 </td>
                                                                 <td>
                                                                    <?php if($payment->payment_type == 'Bank transfer' ): ?>
                                                                    <a href="<?php echo e(\App\Models\Utility::get_file($payment->receipt)); ?>"
                                                                    class="btn  btn-outline-primary" target="_blank"><i
                                                                        class="fas fa-file-invoice"></i>
                                                                    <?php echo e(__('Receipt')); ?></a>
                                                                    <?php else: ?>
                                                                    -
                                                                <?php endif; ?>
                                                                 </td>
                                                                 <td class="text-right">
                                                                     <?php echo e(\Auth::user()->priceFormat($payment->amount)); ?>

                                                                 </td>
                                                                 <td>
                                                                     <div class="action-btn bg-danger ms-2">
                                                                         <?php echo Form::open(['method' => 'DELETE', 'route' => ['invoice.payment.delete', $payment->id]]); ?>

                                                                         <a href="#!"
                                                                             class="mx-3 btn btn-sm  align-items-center text-white show_confirm"
                                                                             data-bs-toggle="tooltip" title='Delete'>
                                                                             <i class="ti ti-trash"></i>
                                                                         </a>
                                                                         <?php echo Form::close(); ?>

                                                                     </div>
                                                                 </td>
                                                                 
                                                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                     <?php $__currentLoopData = $invoicepayments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $invoicepayment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                         <tr>
                                                             <td><?php echo e(sprintf('%05d', $invoicepayment->order_id)); ?></td>
                                                             <td><?php echo e(Auth::user()->dateFormat($invoicepayment->date)); ?>

                                                             </td>
                                                             
                                                             <td><?php echo e('Bank Transfer'); ?></td>
                                                             <td><?php echo e(!empty($invoicepayment->notes) ? $invoicepayment->notes : '-'); ?>

                                                             </td>
                                                             <td>
                                                                <?php if(($plan->storage_limit <= $total_storage && $plan->storage_limit != -1)): ?>
                                                                -
                                                                    <?php else: ?>
                                                                    <a href="<?php echo e(\App\Models\Utility::get_file($invoicepayment->receipt)); ?>"
                                                                        class="btn  btn-outline-primary" target="_blank"><i
                                                                            class="fas fa-file-invoice"></i>
                                                                        <?php echo e(__('Receipt')); ?></a>
                                                                    <?php endif; ?>
                                                             </td>

                                                             <td class="text-right">
                                                                 <?php echo e(\Auth::user()->priceFormat($invoicepayment->amount)); ?>

                                                             </td>
                                                             <td>

                                                                 <?php if($invoicepayment->status == 'Pending'): ?>
                                                                     <div class="action-btn bg-warning ms-2">
                                                                         <a href="#" data-size="lg"
                                                                             data-url="<?php echo e(route('bankpayment.show', $invoicepayment->id)); ?>"
                                                                             data-bs-toggle="tooltip"
                                                                             title="<?php echo e(__('Details')); ?>"
                                                                             data-ajax-popup="true"
                                                                             data-title="<?php echo e(__('Payment Status')); ?>"
                                                                             class="mx-3 btn btn-sm d-inline-flex align-items-center text-white">
                                                                             <i class="ti ti-caret-right text-white"></i>
                                                                         </a>
                                                                     </div>
                                                                 <?php endif; ?>

                                                                 <div class="action-btn bg-danger ms-2">
                                                                     <?php echo Form::open(['method' => 'DELETE', 'route' => ['invoice.bankpayment.delete', $invoicepayment->id]]); ?>

                                                                     <a href="#!"
                                                                         class="mx-3 btn btn-sm  align-items-center text-white show_confirm"
                                                                         data-bs-toggle="tooltip" title='Delete'>
                                                                         <i class="ti ti-trash"></i>
                                                                     </a>
                                                                     <?php echo Form::close(); ?>

                                                                 </div>
                                                             </td>
                                                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                 <?php endif; ?>
                                             </tbody>
                                         </table>
                                     </div>
                                 </div>
                             </div>

                         </div>
                     </div>
                 </div>
             </div>
         </div>


         <div class="col-sm-2">
             <div class="card">
                 <div class="card-footer py-0">
                     <ul class="list-group list-group-flush">
                         <li class="list-group-item px-0">
                             <div class="row align-items-center">
                                 <dt class="col-sm-12"><span class="h6 text-sm mb-0"><?php echo e(__('Assigned User')); ?></span>
                                 </dt>
                                 <dd class="col-sm-12"><span
                                         class="text-sm"><?php echo e(!empty($invoice->assign_user) ? $invoice->assign_user->name : ''); ?></span>
                                 </dd>

                                 <dt class="col-sm-12"><span class="h6 text-sm mb-0"><?php echo e(__('Created')); ?></span></dt>
                                 <dd class="col-sm-12"><span
                                         class="text-sm"><?php echo e(\Auth::user()->dateFormat($invoice->created_at)); ?></span>
                                 </dd>
                             </div>
                         </li>
                     </ul>
                 </div>
             </div>
         </div>

         <!-- [ Invoice ] end -->
     </div>
 <?php $__env->stopSection(); ?>
 <?php $__env->startPush('script-page'); ?>
     <script>
         document.querySelector('.btn-print-invoice').addEventListener('click', function() {
             var link2 = document.createElement('link');
             link2.innerHTML =
                 '<style>@media print{*,::after,::before{text-shadow:none!important;box-shadow:none!important}a:not(.btn){text-decoration:none}abbr[title]::after{content:" ("attr(title) ")"}pre{white-space:pre-wrap!important}blockquote,pre{border:1px solid #adb5bd;page-break-inside:avoid}thead{display:table-header-group}img,tr{page-break-inside:avoid}table,thead,tr,td{background:transparent}h2,h3,p{orphans:3;widows:3}h2,h3{page-break-after:avoid}@page{size:a3}body{min-width:992px!important}.container{min-width:992px!important}.page-header,.pc-sidebar,.pc-mob-header,.pc-header,.pct-customizer,.modal,.navbar{display:none}.pc-container{top:0;}.invoice-contact{padding-top:0;}@page,.card-body,.card-header,body,.pcoded-content{padding:0;margin:0}.badge{border:1px solid #000}.table{border-collapse:collapse!important}.table td,.table th{background-color:#fff!important}.table-bordered td,.table-bordered th{border:1px solid #dee2e6!important}.table-dark{color:inherit}.table-dark tbody+tbody,.table-dark td,.table-dark th,.table-dark thead th{border-color:#dee2e6}.table .thead-dark th{color:inherit;border-color:#dee2e6}}</style>';

             document.getElementsByTagName('head')[0].appendChild(link2);
             window.print();
         })
     </script>
     <script>
         $(document).on('change', 'select[name=item]', function() {
             var item_id = $(this).val();
             $.ajax({
                 url: '<?php echo e(route('invoice.items')); ?>',
                 type: 'GET',
                 headers: {
                     'X-CSRF-TOKEN': jQuery('#token').val()
                 },
                 data: {
                     'item_id': item_id,
                 },
                 cache: false,
                 success: function(data) {
                     var invoiceItems = JSON.parse(data);
                     $('.price').val(invoiceItems.price);
                     $('.quantity').val(1);
                     $('.discount').val(0);
                     var taxes = '';
                     var tax = [];
                     for (var i = 0; i < invoiceItems.taxes.length; i++) {
                         taxes += '<span class="badge bg-primary ms-1 mt-1">' + invoiceItems.taxes[i]
                             .tax_name + ' ' + '(' + invoiceItems.taxes[i].rate + '%)' + '</span>';
                     }
                     $('.taxId').val(invoiceItems.tax);
                     $('.tax').html(taxes);
                 }
             });
         });

         $('.cp_link').on('click', function() {
             var value = $(this).attr('data-link');
             var $temp = $("<input>");
             $("body").append($temp);
             $temp.val(value).select();
             document.execCommand("copy");
             $temp.remove();
             show_toastr('Success', '<?php echo e(__('Link Copy on Clipboard')); ?>', 'success')
         });
     </script>
 <?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\CRM\resources\views/invoice/view.blade.php ENDPATH**/ ?>