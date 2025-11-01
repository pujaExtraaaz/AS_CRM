<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Opportunities Edit')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
    <?php echo e(__('Edit Opportunities')); ?> <?php echo e('(' . $opportunities->name . ')'); ?>

<?php $__env->stopSection(); ?>
<?php
    $plansettings = App\Models\Utility::plansettings();
?>
<?php $__env->startSection('action-btn'); ?>
    <div class="btn-group" role="group">
        <?php if(!empty($previous)): ?>
            <div class="action-btn  ms-2">
                <a href="<?php echo e(route('opportunities.edit', $previous)); ?>" class="btn btn-sm btn-primary btn-icon m-1"
                    data-bs-toggle="tooltip" title="<?php echo e(__('Previous')); ?>">
                    <i class="ti ti-chevron-left"></i>
                </a>
            </div>
        <?php else: ?>
            <div class="action-btn ms-2">
                <a href="#" class="btn btn-sm btn-primary btn-icon m-1 disabled" data-bs-toggle="tooltip"
                    title="<?php echo e(__('Previous')); ?>">
                    <i class="ti ti-chevron-left"></i>
                </a>
            </div>
        <?php endif; ?>
        <?php if(!empty($next)): ?>
            <div class="action-btn ms-2">
                <a href="<?php echo e(route('opportunities.edit', $next)); ?>" class="btn btn-sm btn-primary btn-icon m-1"
                    data-bs-toggle="tooltip" title="<?php echo e(__('Next')); ?>">
                    <i class="ti ti-chevron-right"></i>
                </a>
            </div>
        <?php else: ?>
            <div class="action-btn ms-2">
                <a href="#" class="btn btn-sm btn-primary btn-icon m-1 disabled" data-bs-toggle="tooltip"
                    title="<?php echo e(__('Next')); ?>">
                    <i class="ti ti-chevron-right"></i>
                </a>
            </div>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Home')); ?></a></li>
    <li class="breadcrumb-item"><a href="<?php echo e(route('opportunities.index')); ?>"><?php echo e(__('Opportunities')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e(__('Edit')); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <!-- [ sample-page ] start -->
        <div class="col-sm-12">
            <div class="row">
                <div class="col-xl-3">
                    <div class="card sticky-top" style="top:30px">
                        <div class="list-group list-group-flush" id="useradd-sidenav">
                            <a href="#useradd-1"
                                class="list-group-item list-group-item-action border-0"><?php echo e(__('Overview')); ?> <div
                                    class="float-end"><i class="ti ti-chevron-right"></i></div></a>
                            <a href="#useradd-2"
                                class="list-group-item list-group-item-action border-0"><?php echo e(__('Stream')); ?> <div
                                    class="float-end"><i class="ti ti-chevron-right"></i></div></a>
                            <a href="#useradd-3"
                                class="list-group-item list-group-item-action border-0"><?php echo e(__('Documents')); ?> <div
                                    class="float-end"><i class="ti ti-chevron-right"></i></div></a>
                            <a href="#useradd-4"
                                class="list-group-item list-group-item-action border-0"><?php echo e(__('Tasks')); ?> <div
                                    class="float-end"><i class="ti ti-chevron-right"></i></div></a>
                            <a href="#useradd-5"
                                class="list-group-item list-group-item-action border-0"><?php echo e(__('Quotes')); ?> <div
                                    class="float-end"><i class="ti ti-chevron-right"></i></div></a>
                            <a href="#useradd-6"
                                class="list-group-item list-group-item-action border-0"><?php echo e(__('Sales Orders')); ?> <div
                                    class="float-end"><i class="ti ti-chevron-right"></i></div></a>
                            <a href="#useradd-7"
                                class="list-group-item list-group-item-action border-0"><?php echo e(__('Invoices')); ?> <div
                                    class="float-end"><i class="ti ti-chevron-right"></i></div></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-9">
                    <div id="useradd-1" class="card">
                        <?php echo e(Form::model($opportunities, ['route' => ['opportunities.update', $opportunities->id], 'method' => 'PUT'])); ?>

                        <div class="card-header">
                            <?php if(isset($plansettings['enable_chatgpt']) && $plansettings['enable_chatgpt'] == 'on'): ?>
                                <div class="float-end">
                                    <a href="#" data-size="md" class="btn btn-sm btn-primary "
                                        data-ajax-popup-over="true" data-size="md"
                                        data-title="<?php echo e(__('Generate content with AI')); ?>"
                                        data-url="<?php echo e(route('generate', ['opportunities'])); ?>" data-toggle="tooltip"
                                        title="<?php echo e(__('Generate')); ?>">
                                        <i class="fas fa-robot"></span><span
                                                class="robot"><?php echo e(__('Generate With AI')); ?></span></i>
                                    </a>
                                </div>
                            <?php endif; ?>
                            <h5><?php echo e(__('Overview')); ?></h5>
                            <small class="text-muted"><?php echo e(__('Edit about your opportunities information')); ?></small>
                        </div>

                        <div class="card-body">
                            <form>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <?php echo e(Form::label('name', __('Name'), ['class' => 'form-label'])); ?>

                                            <?php echo e(Form::text('name', null, ['class' => 'form-control', 'placeholder' => __('Enter Name'), 'required' => 'required'])); ?>

                                            <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="invalid-name" role="alert">
                                                    <strong class="text-danger"><?php echo e($message); ?></strong>
                                                </span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>                                    
                                    <div class="col-6">
                                        <div class="form-group">
                                            <?php echo e(Form::label('contact', __('Contact'), ['class' => 'form-label'])); ?>

                                            <?php echo Form::select('contact', $contact, null, ['class' => 'form-control ']); ?>

                                            <?php $__errorArgs = ['contacts'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="invalid-contacts" role="alert">
                                                    <strong class="text-danger"><?php echo e($message); ?></strong>
                                                </span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <?php echo e(Form::label('amount', __('Amount'), ['class' => 'form-label'])); ?>

                                            <?php echo e(Form::number('amount', null, ['class' => 'form-control', 'placeholder' => __('Enter Phone'), 'required' => 'required'])); ?>

                                            <?php $__errorArgs = ['amount'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="invalid-amount" role="alert">
                                                    <strong class="text-danger"><?php echo e($message); ?></strong>
                                                </span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                     <div class="col-6">
                                        <div class="form-group">
                                            <?php echo e(Form::label('stage', __('Stage'), ['class' => 'form-label'])); ?>

                                            <?php echo Form::select('stage', $stages, null, ['class' => 'form-control ', 'required' => 'required']); ?>

                                        </div>
                                        <?php $__errorArgs = ['stage'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="invalid-stage" role="alert">
                                                <strong class="text-danger"><?php echo e($message); ?></strong>
                                            </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <?php echo e(Form::label('probability', __('Probability'), ['class' => 'form-label'])); ?>

                                            <?php echo e(Form::number('probability', null, ['class' => 'form-control', 'placeholder' => __('Enter Phone'), 'required' => 'required'])); ?>

                                            <?php $__errorArgs = ['probability'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="invalid-probability" role="alert">
                                                    <strong class="text-danger"><?php echo e($message); ?></strong>
                                                </span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <?php echo e(Form::label('close_date', __('Close Date'), ['class' => 'form-label'])); ?>

                                            <?php echo e(Form::date('close_date', date('Y-m-d'), ['class' => 'form-control datepicker', 'placeholder' => __('Enter Phone'), 'required' => 'required'])); ?>

                                            <?php $__errorArgs = ['close_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="invalid-close_date" role="alert">
                                                    <strong class="text-danger"><?php echo e($message); ?></strong>
                                                </span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <?php echo e(Form::label('account', __('Account'), ['class' => 'form-label'])); ?>

                                            <?php echo Form::select('account', $account_name, null, ['class' => 'form-control ']); ?>

                                        </div>
                                        <?php $__errorArgs = ['account'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="invalid-account" role="alert">
                                                <strong class="text-danger"><?php echo e($message); ?></strong>
                                            </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <?php echo e(Form::label('campaign', __('Campaign'), ['class' => 'form-label'])); ?>

                                            <?php echo Form::select('campaign', $campaign_id, null, ['class' => 'form-control ']); ?>

                                        </div>
                                        <?php $__errorArgs = ['campaign_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="invalid-campaign_id" role="alert">
                                                <strong class="text-danger"><?php echo e($message); ?></strong>
                                            </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>                                                                                                      
                                    <div class="col-6">
                                        <div class="form-group">
                                            <?php echo e(Form::label('lead_source', __('Lead Source'), ['class' => 'form-label'])); ?>

                                            <?php echo Form::select('lead_source', $lead_source, null, ['class' => 'form-control ', 'required' => 'required']); ?>

                                            <?php $__errorArgs = ['lead_source'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="invalid-lead_source" role="alert">
                                                    <strong class="text-danger"><?php echo e($message); ?></strong>
                                                </span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <?php echo e(Form::label('user', __(' Assigned User'), ['class' => 'form-label'])); ?>

                                            <?php echo Form::select('user', $user, $opportunities->user_id, ['class' => 'form-control ']); ?>

                                        </div>
                                        <?php $__errorArgs = ['user'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="invalid-user" role="alert">
                                                <strong class="text-danger"><?php echo e($message); ?></strong>
                                            </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <?php echo e(Form::label('description', __('Description'), ['class' => 'form-label'])); ?>

                                            <?php echo Form::textarea('description', null, ['class' => 'form-control ', 'rows' => 3]); ?>

                                            <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="invalid-description" role="alert">
                                                    <strong class="text-danger"><?php echo e($message); ?></strong>
                                                </span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                    </div>


                                    <div class="text-end">
                                        <?php echo e(Form::submit(__('Update'), ['class' => 'btn-submit btn btn-primary'])); ?>

                                    </div>



                                </div>
                            </form>
                        </div>
                        <?php echo e(Form::close()); ?>

                    </div>

                    <div id="useradd-2" class="card">
                        <?php echo e(Form::open(['route' => ['streamstore', ['opportunities', $opportunities->name, $opportunities->id]], 'method' => 'post', 'enctype' => 'multipart/form-data'])); ?>

                        <div class="card-header">
                            <h5><?php echo e(__('Stream')); ?></h5>
                            <small class="text-muted"><?php echo e(__('Add stream comment')); ?></small>
                        </div>
                        <div class="card-body">
                            <form>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <?php echo e(Form::label('stream', __('Stream'), ['class' => 'form-label'])); ?>

                                            <?php echo e(Form::text('stream_comment', null, ['class' => 'form-control', 'placeholder' => __('Enter Stream Comment'), 'required' => 'required'])); ?>

                                        </div>
                                    </div>
                                    <input type="hidden" name="log_type" value="opportunities comment">

                                    <div class="col-12 mb-3 field" data-name="attachments">
                                        <div class="attachment-upload">
                                            <div class="attachment-button">
                                                <div class="pull-left">
                                                    <div class="form-group">
                                                        <?php echo e(Form::label('attachment', __('Attachment'), ['class' => 'form-label'])); ?>

                                                        
                                                        <input type="file"name="attachment" class="form-control mb-3"
                                                            onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                                                        <img id="blah" width="20%" height="20%" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="attachments"></div>
                                        </div>
                                    </div>
                                    <div class="text-end">
                                        <?php echo e(Form::submit(__('Save'), ['class' => 'btn-submit btn btn-primary'])); ?>

                                    </div>

                                </div>
                            </form>
                        </div>

                        <div class="col-12">
                            <div class="card-header">
                                <h5><?php echo e(__('Latest comments')); ?></h5>
                            </div>
                            <?php $__currentLoopData = $streams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stream): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $remark = json_decode($stream->remark);
                                ?>
                                <?php if($remark->data_id == $opportunities->id): ?>
                                    <div class="card-body">
                                        <div class="row">

                                            <div class="col-xl-12">
                                                <ul class="list-group team-msg">
                                                    <li class="list-group-item border-0 d-flex align-items-start mb-2">
                                                        <div class="avatar me-3">
                                                            <?php
                                                                $profile = \App\Models\Utility::get_file('upload/profile/');
                                                            ?>
                                                            <a href="<?php echo e(!empty($stream->file_upload) ? $profile . $stream->file_upload : asset(url('./assets/images/user/avatar-5.jpg'))); ?>"
                                                                target="_blank">
                                                                <img alt="" class="rounded-circle"
                                                                    <?php if(!empty($stream->file_upload)): ?> src="<?php echo e(!empty($stream->file_upload) ? $profile . $stream->file_upload : asset(url('./assets/images/user/avatar-5.jpg'))); ?>" <?php else: ?>  avatar="<?php echo e($remark->user_name); ?>" <?php endif; ?>>
                                                            </a>
                                                        </div>
                                                        <div class="d-block d-sm-flex align-items-center right-side">
                                                            <div
                                                                class="d-flex align-items-start flex-column justify-content-center mb-3 mb-sm-0">
                                                                <div class="h6 mb-1"><?php echo e($remark->user_name); ?>

                                                                </div>
                                                                <span class="text-sm lh-140 mb-0">
                                                                    posted to <a href="#"><?php echo e($remark->title); ?></a> ,
                                                                    <?php echo e($stream->log_type); ?> <a
                                                                        href="#"><?php echo e($remark->stream_comment); ?></a>
                                                                </span>
                                                            </div>
                                                            <div class=" ms-2  d-flex align-items-center ">
                                                                <small
                                                                    class="float-end "><?php echo e($stream->created_at); ?></small>
                                                            </div>
                                                        </div>

                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        <?php echo e(Form::close()); ?>

                    </div>

                    <div id="useradd-3" class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col">
                                    <h5><?php echo e(__('Documents')); ?></h5>
                                    <small class="text-muted"><?php echo e(__('Assigned document for this opportunities')); ?></small>
                                </div>
                                <div class="col">
                                    <div class="text-end">
                                        <a href="#" data-size="lg"
                                            data-url="<?php echo e(route('document.create', ['opportunities', $opportunities->id])); ?>"
                                            data-ajax-popup="true" data-bs-toggle="tooltip"
                                            data-title="<?php echo e(__('Create New Documents')); ?>"title="<?php echo e(__('Create')); ?>"
                                            class="btn btn-sm btn-primary btn-icon-only   ">
                                            <i class="ti ti-plus"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table datatable" id="datatable">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="sort" data-sort="name"><?php echo e(__('Name')); ?></th>
                                            <th scope="col" class="sort" data-sort="budget"><?php echo e(__('File')); ?>

                                            </th>
                                            <th scope="col" class="sort" data-sort="status"><?php echo e(__('Status')); ?>

                                            </th>
                                            <th scope="col" class="sort" data-sort="completion">
                                                <?php echo e(__('Created At')); ?></th>
                                            <th scope="col" class="text-end"><?php echo e(__('Action')); ?></th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $documents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $document): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td>
                                                    <a href="<?php echo e(route('document.edit', $document->id)); ?>" data-size="md"
                                                        data-title="<?php echo e(__('Document Details')); ?>"
                                                        class="action-item text-primary">
                                                        <?php echo e($document->name); ?></a>
                                                </td>
                                                <td class="budget">
                                                    <?php if(!empty($document->attachment)): ?>
                                                        <a href="<?php echo e(asset(Storage::url('upload/profile')) . '/' . $document->attachment); ?>"
                                                            download=""><i class="ti ti-download"></i></a>
                                                    <?php else: ?>
                                                        <span>
                                                            <?php echo e(__('No File')); ?>

                                                        </span>
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <?php if($document->status == 0): ?>
                                                        <span
                                                            class="badge bg-success p-2 px-3 rounded"><?php echo e(__(\App\Models\Document::$status[$document->status])); ?></span>
                                                    <?php elseif($document->status == 1): ?>
                                                        <span
                                                            class="badge bg-warning p-2 px-3 rounded"><?php echo e(__(\App\Models\Document::$status[$document->status])); ?></span>
                                                    <?php elseif($document->status == 2): ?>
                                                        <span
                                                            class="badge bg-danger p-2 px-3 rounded"><?php echo e(__(\App\Models\Document::$status[$document->status])); ?></span>
                                                    <?php elseif($document->status == 3): ?>
                                                        <span
                                                            class="badge bg-danger p-2 px-3 rounded"><?php echo e(__(\App\Models\Document::$status[$document->status])); ?></span>
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <span
                                                        class="budget"><?php echo e(\Auth::user()->dateFormat($document->created_at)); ?></span>
                                                </td>
                                                <?php if(Gate::check('Show Document') || Gate::check('Edit Document') || Gate::check('Delete Document')): ?>
                                                    <td class="text-end">

                                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Show Document')): ?>
                                                            <div class="action-btn bg-warning ms-2">
                                                                <a href="#" data-size="md"
                                                                    data-url="<?php echo e(route('document.show', $document->id)); ?>"
                                                                    data-ajax-popup="true" data-bs-toggle="tooltip"
                                                                    title="<?php echo e(__('Quick View')); ?>"
                                                                    data-title="<?php echo e(__('Document Details')); ?>"
                                                                    class="mx-3 btn btn-sm d-inline-flex align-items-center text-white">
                                                                    <i class="ti ti-eye"></i>
                                                                </a>
                                                            </div>
                                                        <?php endif; ?>
                                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Edit Document')): ?>
                                                            <div class="action-btn bg-info ms-2">
                                                                <a href="<?php echo e(route('document.edit', $document->id)); ?>"
                                                                    class="mx-3 btn btn-sm d-inline-flex align-items-center text-white"
                                                                    data-bs-toggle="tooltip" title="<?php echo e(__('Details')); ?>"
                                                                    data-title="<?php echo e(__('Document Edit')); ?>"><i
                                                                        class="ti ti-edit"></i></a>
                                                            </div>
                                                        <?php endif; ?>
                                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Delete Document')): ?>
                                                            <div class="action-btn bg-danger ms-2">
                                                                <?php echo Form::open(['method' => 'DELETE', 'route' => ['document.destroy', $document->id]]); ?>

                                                                <a href="#!"
                                                                    class="mx-3 btn btn-sm  align-items-center text-white show_confirm"
                                                                    data-bs-toggle="tooltip" title='Delete'>
                                                                    <i class="ti ti-trash"></i>
                                                                </a>
                                                                <?php echo Form::close(); ?>

                                                            </div>
                                                        <?php endif; ?>
                                                    </td>
                                                <?php endif; ?>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>

                    <div id="useradd-4" class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col">
                                    <h5><?php echo e(__('Tasks')); ?></h5>
                                    <small class="text-muted"><?php echo e(__('Assigned Tasks for this opportunities')); ?></small>
                                </div>
                                <div class="col">
                                    <div class="text-end">
                                        <a href="#" data-size="lg" data-url="<?php echo e(route('task.create',['task',0])); ?>"
                                            data-ajax-popup="true" data-bs-toggle="tooltip"
                                            title="<?php echo e(__('Create')); ?>"data-title="<?php echo e(__('Create New Task')); ?>"
                                            class="btn btn-sm btn-primary btn-icon-only ">
                                            <i class="ti ti-plus"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table datatable" id="datatable1">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="sort" data-sort="name"><?php echo e(__('Name')); ?></th>
                                            <th scope="col" class="sort" data-sort="budget"><?php echo e(__('Parent')); ?>

                                            </th>
                                            <th scope="col" class="sort" data-sort="status"><?php echo e(__('Stage')); ?>

                                            </th>
                                            <th scope="col" class="sort" data-sort="completion">
                                                <?php echo e(__('Date Start')); ?></th>
                                            <th scope="col" class="sort" data-sort="completion">
                                                <?php echo e(__('Assigned User')); ?></th>
                                            <?php if(Gate::check('Show Task') || Gate::check('Edit Task') || Gate::check('Delete Task')): ?>
                                                <th scope="col"><?php echo e(__('Action')); ?></th>
                                            <?php endif; ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td>
                                                    <a href="<?php echo e(route('task.edit', $task->id)); ?>" data-size="md"
                                                        data-title="<?php echo e(__('Task Details')); ?>"
                                                        class="action-item text-primary">
                                                        <?php echo e($task->name); ?>

                                                    </a>
                                                </td>
                                                <td class="budget">
                                                    <?php echo e($task->parent); ?>

                                                </td>
                                                <td>
                                                    <span
                                                        class="budget"><?php echo e(!empty($task->stages) ? $task->stages->name : ''); ?></span>
                                                </td>
                                                <td>
                                                    <span
                                                        class="budget"><?php echo e(\Auth::user()->dateFormat($task->start_date)); ?></span>
                                                </td>
                                                <td>
                                                    <span
                                                        class="budget"><?php echo e(!empty($task->assign_user) ? $task->assign_user->name : '-'); ?></span>
                                                </td>
                                                <?php if(Gate::check('Show Task') || Gate::check('Edit Task') || Gate::check('Delete Task')): ?>
                                                    <td>
                                                        <div class="d-flex">
                                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Show Task')): ?>
                                                                <div class="action-btn bg-warning ms-2">
                                                                    <a href="#" data-size="md"
                                                                        data-url="<?php echo e(route('task.show', $task->id)); ?>"
                                                                        data-ajax-popup="true" data-bs-toggle="tooltip"
                                                                        title="<?php echo e(__('Quick View')); ?>"
                                                                        data-title="<?php echo e(__('Task Details')); ?>"
                                                                        class="mx-3 btn btn-sm d-inline-flex align-items-center text-white">
                                                                        <i class="ti ti-eye"></i>
                                                                    </a>
                                                                </div>
                                                            <?php endif; ?>
                                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Edit Task')): ?>
                                                                <div class="action-btn bg-info ms-2">
                                                                    <a href="<?php echo e(route('task.edit', $task->id)); ?>"
                                                                        class="mx-3 btn btn-sm d-inline-flex align-items-center text-white"
                                                                        data-bs-toggle="tooltip" title="<?php echo e(__('Details')); ?>"
                                                                        data-title="<?php echo e(__('Edit Task')); ?>"><i
                                                                            class="ti ti-edit"></i></a>
                                                                </div>
                                                            <?php endif; ?>
                                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Delete Task')): ?>
                                                                <div class="action-btn bg-danger ms-2">
                                                                    <?php echo Form::open(['method' => 'DELETE', 'route' => ['task.destroy', $task->id]]); ?>

                                                                    <a href="#!"
                                                                        class="mx-3 btn btn-sm  align-items-center text-white show_confirm"
                                                                        data-bs-toggle="tooltip" title='Delete'>
                                                                        <i class="ti ti-trash"></i>
                                                                    </a>
                                                                    <?php echo Form::close(); ?>

                                                                </div>
                                                            <?php endif; ?>
                                                        </div>
                                                    </td>
                                                <?php endif; ?>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>

                    <div id="useradd-5" class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col">
                                    <h5><?php echo e(__('Quotes')); ?></h5>
                                    <small class="text-muted"><?php echo e(__('Assigned Quotes for this opportunities')); ?></small>
                                </div>
                                <div class="col">
                                    <div class="text-end">
                                        <a href="#" data-size="lg"
                                            data-url="<?php echo e(route('quote.create', ['opportunity', $opportunities->id])); ?>"
                                            data-ajax-popup="true" data-bs-toggle="tooltip"
                                            data-title="<?php echo e(__('Create New Quote')); ?>" title="<?php echo e(__('Create')); ?>"
                                            class="btn btn-sm btn-primary btn-icon-only ">
                                            <i class="ti ti-plus"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table datatable" id="datatable4">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="sort" data-sort="name"><?php echo e(__('Name')); ?></th>
                                            <th scope="col" class="sort" data-sort="status"><?php echo e(__('Status')); ?>

                                            </th>
                                            <th scope="col" class="sort" data-sort="completion">
                                                <?php echo e(__('Created At')); ?>

                                            </th>
                                            <th scope="col" class="sort" data-sort="completion">
                                                <?php echo e(__('Amount')); ?></th>
                                            <th scope="col" class="sort" data-sort="completion">
                                                <?php echo e(__('Assign User')); ?>

                                            </th>
                                            <?php if(Gate::check('Show Quote') || Gate::check('Edit Quote') || Gate::check('Delete Quote')): ?>
                                                <th scope="col" class="text-end"><?php echo e(__('Action')); ?></th>
                                            <?php endif; ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $quotes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $quote): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td>
                                                    <a href="<?php echo e(route('quote.edit', $quote->id)); ?>" data-size="md"
                                                        data-title="<?php echo e(__('Quote Details')); ?>"
                                                        class="action-item text-primary">
                                                        <?php echo e($quote->name); ?>

                                                    </a>
                                                </td>
                                                <td>
                                                    <?php if($quote->status == 0): ?>
                                                        <span class="badge bg-secondary p-2 px-3 rounded"
                                                            style="width: 79px;"><?php echo e(__(\App\Models\Quote::$status[$quote->status])); ?></span>
                                                    <?php elseif($quote->status == 1): ?>
                                                        <span class="badge bg-info p-2 px-3 rounded"
                                                            style="width: 79px;"><?php echo e(__(\App\Models\Quote::$status[$quote->status])); ?></span>
                                                    <?php endif; ?>
                                                </td>

                                                <td>
                                                    <span
                                                        class="budget"><?php echo e(\Auth::user()->dateFormat($quote->created_at)); ?></span>
                                                </td>
                                                <td>
                                                    <span
                                                        class="budget"><?php echo e(\Auth::user()->priceFormat($quote->getTotal())); ?></span>
                                                </td>
                                                <td>
                                                    <span class="col-sm-12"><span
                                                            class="text-sm"><?php echo e(ucfirst(!empty($quote->assign_user) ? $quote->assign_user->name : '-')); ?></span></span>
                                                </td>
                                                <?php if(Gate::check('Show Quote') || Gate::check('Edit Quote') || Gate::check('Delete Quote')): ?>
                                                    <td class="text-end">
                                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Show Quote')): ?>
                                                            <div class="action-btn bg-warning ms-2">
                                                                <a href="<?php echo e(route('quote.show', $quote->id)); ?>"
                                                                    data-size="md"class="mx-3 btn btn-sm align-items-center text-white "
                                                                    data-bs-toggle="tooltip" title="<?php echo e(__('Quick View')); ?>"
                                                                    data-title="<?php echo e(__('Quote Details')); ?>">
                                                                    <i class="ti ti-eye"></i>
                                                                </a>
                                                            </div>
                                                        <?php endif; ?>
                                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Edit Quote')): ?>
                                                            <div class="action-btn bg-info ms-2">
                                                                <a href="<?php echo e(route('quote.edit', $quote->id)); ?>"
                                                                    class="mx-3 btn btn-sm align-items-center text-white"
                                                                    data-bs-toggle="tooltip" title="<?php echo e(__('Details')); ?>"
                                                                    data-title="<?php echo e(__('Edit Quote')); ?>"><i
                                                                        class="ti ti-edit"></i></a>
                                                            </div>
                                                        <?php endif; ?>
                                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Delete Quote')): ?>
                                                            <div class="action-btn bg-danger ms-2">
                                                                <?php echo Form::open(['method' => 'DELETE', 'route' => ['quote.destroy', $quote->id]]); ?>

                                                                <a href="#!"
                                                                    class="mx-3 btn btn-sm   align-items-center text-white show_confirm"
                                                                    data-bs-toggle="tooltip" title='Delete'>
                                                                    <i class="ti ti-trash"></i>
                                                                </a>
                                                                <?php echo Form::close(); ?>

                                                            </div>
                                                        <?php endif; ?>
                                                    </td>
                                                <?php endif; ?>

                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>

                    <div id="useradd-6" class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col">
                                    <h5><?php echo e(__('Sales Orders')); ?></h5>
                                    <small
                                        class="text-muted"><?php echo e(__('Assigned SalesOrder for this opportunities')); ?></small>
                                </div>
                                <div class="col">
                                    <div class="text-end">
                                        <a href="#" data-size="lg"
                                            data-url="<?php echo e(route('salesorder.create', ['opportunity', $opportunities->id])); ?>"
                                            data-ajax-popup="true" data-bs-toggle="tooltip"
                                            data-title="<?php echo e(__('Create New SalesOrder')); ?>" title="<?php echo e(__('Create')); ?>"
                                            class="btn btn-sm btn-primary btn-icon-only ">
                                            <i class="ti ti-plus"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table datatable" id="datatable3">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="sort" data-sort="name"><?php echo e(__('Name')); ?></th>
                                            <th scope="col" class="sort" data-sort="status"><?php echo e(__('Status')); ?>

                                            </th>
                                            <th scope="col" class="sort" data-sort="completion">
                                                <?php echo e(__('Created At')); ?> </th>
                                            <th scope="col" class="sort" data-sort="completion">
                                                <?php echo e(__('Amount')); ?></th>
                                            <th scope="col" class="sort" data-sort="completion">
                                                <?php echo e(__('Assigned User')); ?></th>
                                            <?php if(Gate::check('Show SalesOrder') || Gate::check('Edit SalesOrder') || Gate::check('Delete SalesOrder')): ?>
                                                <th scope="col" class="text-end"><?php echo e(__('Action')); ?></th>
                                            <?php endif; ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $salesorders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $salesorder): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td>
                                                    <a href="<?php echo e(route('salesorder.edit', $salesorder->id)); ?>"
                                                        data-size="md" data-title="<?php echo e(__('SalesOrder')); ?>"
                                                        class="action-item text-primary">
                                                        <?php echo e($salesorder->name); ?></a>
                                                </td>
                                                <td>
                                                    <?php if($salesorder->status == 0): ?>
                                                        <span class="badge bg-secondary p-2 px-3 rounded"
                                                            style="width: 79px;"><?php echo e(__(\App\Models\SalesOrder::$status[$salesorder->status])); ?></span>
                                                    <?php elseif($salesorder->status == 1): ?>
                                                        <span class="badge bg-info p-2 px-3 rounded"
                                                            style="width: 79px;"><?php echo e(__(\App\Models\SalesOrder::$status[$salesorder->status])); ?></span>
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <span
                                                        class="budget"><?php echo e(\Auth::user()->dateFormat($salesorder->created_at)); ?></span>
                                                </td>
                                                <td>
                                                    <span
                                                        class="budget"><?php echo e(\Auth::user()->priceFormat($salesorder->getTotal())); ?></span>
                                                </td>
                                                <td>
                                                    <span
                                                        class="budget"><?php echo e(ucfirst(!empty($salesorder->assign_user) ? $salesorder->assign_user->name : '-')); ?></span>
                                                </td>
                                                <?php if(Gate::check('Show SalesOrder') || Gate::check('Edit SalesOrder') || Gate::check('Delete SalesOrder')): ?>
                                                    <td class="text-end">
                                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Show SalesOrder')): ?>
                                                            <div class="action-btn bg-warning ms-2">
                                                                <a href="<?php echo e(route('salesorder.show', $salesorder->id)); ?>"
                                                                    data-size="md"
                                                                    class="mx-3 btn btn-sm d-inline-flex align-items-center text-white"
                                                                    data-bs-toggle="tooltip" title="<?php echo e(__('Quick View')); ?>"
                                                                    data-title="<?php echo e(__('SalesOrders Details')); ?>">
                                                                    <i class="ti ti-eye"></i>
                                                                </a>
                                                            </div>
                                                        <?php endif; ?>
                                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Edit SalesOrder')): ?>
                                                            <div class="action-btn bg-info ms-2">
                                                                <a href="<?php echo e(route('salesorder.edit', $salesorder->id)); ?>"
                                                                    class="mx-3 btn btn-sm d-inline-flex align-items-center text-white"
                                                                    data-bs-toggle="tooltip" title="<?php echo e(__('Details')); ?>"
                                                                    data-title="<?php echo e(__('Edit SalesOrders')); ?>"><i
                                                                        class="ti ti-edit"></i></a>
                                                            </div>
                                                        <?php endif; ?>
                                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Delete SalesOrder')): ?>
                                                            <div class="action-btn bg-danger ms-2">
                                                                <?php echo Form::open(['method' => 'DELETE', 'route' => ['salesorder.destroy', $salesorder->id]]); ?>

                                                                <a href="#!"
                                                                    class="mx-3 btn btn-sm   align-items-center text-white show_confirm"
                                                                    data-bs-toggle="tooltip" title='Delete'>
                                                                    <i class="ti ti-trash"></i>
                                                                </a>
                                                                <?php echo Form::close(); ?>

                                                            </div>
                                                        <?php endif; ?>
                                                    </td>
                                                <?php endif; ?>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>

                    <div id="useradd-7" class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col">
                                    <h5><?php echo e(__('Invoices')); ?></h5>
                                    <small class="text-muted"><?php echo e(__('Assigned SalesInvoice for this opportunities')); ?></small>
                                </div>
                                <div class="col">
                                    <div class="text-end">
                                        <a href="#" data-size="lg"
                                            data-url="<?php echo e(route('invoice.create', ['opportunity', $opportunities->id])); ?>"
                                            data-ajax-popup="true" data-bs-toggle="tooltip"
                                            data-title="<?php echo e(__('Create New SalesInvoice')); ?>"
                                            title="<?php echo e(__('Create')); ?>" class="btn btn-sm btn-primary btn-icon-only ">
                                            <i class="ti ti-plus"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table datatable" id="datatable3">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="sort" data-sort="name"><?php echo e(__('Name')); ?></th>
                                            <th scope="col" class="sort" data-sort="status"><?php echo e(__('Status')); ?>

                                            </th>
                                            <th scope="col" class="sort" data-sort="completion">
                                                <?php echo e(__('Created At')); ?>

                                            </th>
                                            <th scope="col" class="sort" data-sort="completion">
                                                <?php echo e(__('Amount')); ?></th>
                                            <th scope="col" class="sort" data-sort="completion">
                                                <?php echo e(__('Assigned User')); ?>

                                            </th>
                                            <?php if(Gate::check('Show Invoice') || Gate::check('Edit Invoice') || Gate::check('Delete Invoice')): ?>
                                                <th scope="col" class="text-end"><?php echo e(__('Action')); ?></th>
                                            <?php endif; ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $salesinvoices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $salesinvoice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td>
                                                    <a href="<?php echo e(route('invoice.edit', $salesinvoice->id)); ?>"
                                                        data-size="md" data-title="<?php echo e(__('SalesInvoice')); ?>"
                                                        class="action-item text-primary">
                                                        <?php echo e($salesinvoice->name); ?></a>
                                                </td>
                                                <td>
                                                    <?php if($salesinvoice->status == 0): ?>
                                                        <span class="badge bg-secondary p-2 px-3 rounded"
                                                            style="width: 91px;"><?php echo e(__(\App\Models\Invoice::$status[$salesinvoice->status])); ?></span>
                                                    <?php elseif($salesinvoice->status == 1): ?>
                                                        <span class="badge bg-danger p-2 px-3 rounded"
                                                            style="width: 91px;"><?php echo e(__(\App\Models\Invoice::$status[$salesinvoice->status])); ?></span>
                                                    <?php elseif($salesinvoice->status == 2): ?>
                                                        <span class="badge bg-warning p-2 px-3 rounded"
                                                            style="width: 91px;"><?php echo e(__(\App\Models\Invoice::$status[$salesinvoice->status])); ?></span>
                                                    <?php elseif($salesinvoice->status == 3): ?>
                                                        <span class="badge bg-success p-2 px-3 rounded"
                                                            style="width: 91px;"><?php echo e(__(\App\Models\Invoice::$status[$salesinvoice->status])); ?></span>
                                                    <?php elseif($salesinvoice->status == 4): ?>
                                                        <span class="badge bg-info p-2 px-3 rounded"
                                                            style="width: 91px;"><?php echo e(__(\App\Models\Invoice::$status[$salesinvoice->status])); ?></span>
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <span
                                                        class="budget"><?php echo e(\Auth::user()->dateFormat($salesinvoice->created_at)); ?></span>
                                                </td>
                                                <td>
                                                    <span
                                                        class="budget"><?php echo e(\Auth::user()->priceFormat($salesinvoice->getTotal())); ?></span>
                                                </td>
                                                <td>
                                                    <span
                                                        class="budget"><?php echo e(ucfirst(!empty($salesinvoice->assign_user) ? $salesinvoice->assign_user->name : '-')); ?></span>
                                                </td>
                                                <?php if(Gate::check('Show Invoice') || Gate::check('Edit Invoice') || Gate::check('Delete Invoice')): ?>
                                                    <td class="text-end">
                                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Show Invoice')): ?>
                                                            <div class="action-btn bg-warning ms-2">
                                                                <a href="<?php echo e(route('invoice.show', $salesinvoice->id)); ?>"
                                                                    data-bs-toggle="tooltip" title="<?php echo e(__('Quick View')); ?>"
                                                                    class="mx-3 btn btn-sm align-items-center text-white "
                                                                    data-title="<?php echo e(__('Invoice Details')); ?>">
                                                                    <i class="ti ti-eye"></i>
                                                                </a>
                                                            </div>
                                                        <?php endif; ?>
                                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Edit Invoice')): ?>
                                                            <div class="action-btn bg-info ms-2">
                                                                <a href="<?php echo e(route('invoice.edit', $salesinvoice->id)); ?>"
                                                                    data-bs-toggle="tooltip" title="<?php echo e(__('Details')); ?>"
                                                                    class="mx-3 btn btn-sm align-items-center text-white "
                                                                    data-title="<?php echo e(__('Edit Invoice')); ?>"><i
                                                                        class="ti ti-edit"></i></a>
                                                            </div>
                                                        <?php endif; ?>
                                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Delete Invoice')): ?>
                                                            <div class="action-btn bg-danger ms-2">
                                                                <?php echo Form::open(['method' => 'DELETE', 'route' => ['invoice.destroy', $salesinvoice->id]]); ?>

                                                                <a href="#!"
                                                                    class="mx-3 btn btn-sm   align-items-center text-white show_confirm"
                                                                    data-bs-toggle="tooltip" title='Delete'>
                                                                    <i class="ti ti-trash"></i>
                                                                </a>
                                                                <?php echo Form::close(); ?>

                                                            </div>
                                                        <?php endif; ?>

                                                    </td>
                                                <?php endif; ?>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ sample-page ] end -->
        </div>
        <!-- [ Main Content ] end -->
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script-page'); ?>
    <script>
        var scrollSpy = new bootstrap.ScrollSpy(document.body, {
            target: '#useradd-sidenav',
            offset: 300
        })
    </script>
    <script>
        $(document).on('change', 'select[name=parent]', function() {
            console.log('click');
            var parent = $(this).val();
            getparent(parent);
        });

        function getparent(bid) {
            console.log('getparent', bid);
            $.ajax({
                url: '<?php echo e(route('task.getparent')); ?>',
                type: 'POST',
                data: {
                    "parent": bid,
                    "_token": "<?php echo e(csrf_token()); ?>",
                },
                success: function(data) {
                    console.log('get data');
                    console.log(data);
                    $('#parent_id').empty();
                    

                    $.each(data, function(key, value) {
                        $('#parent_id').append('<option value="' + key + '">' + value + '</option>');
                    });
                    if (data == '') {
                        $('#parent_id').empty();
                    }
                }
            });
        }
    </script>

    <script>
        $(document).on('click', '#billing_data', function() {
            $("[name='shipping_address']").val($("[name='billing_address']").val());
            $("[name='shipping_city']").val($("[name='billing_city']").val());
            $("[name='shipping_state']").val($("[name='billing_state']").val());
            $("[name='shipping_country']").val($("[name='billing_country']").val());
            $("[name='shipping_postalcode']").val($("[name='billing_postalcode']").val());
        })

        $(document).on('change', 'select[name=opportunity]', function() {

            var opportunities = $(this).val();
            console.log(opportunities);
            getaccount(opportunities);
        });

        function getaccount(opportunities_id) {
            $.ajax({
                url: '<?php echo e(route('quote.getaccount')); ?>',
                type: 'POST',
                data: {
                    "opportunities_id": opportunities_id,
                    "_token": "<?php echo e(csrf_token()); ?>",
                },
                success: function(data) {
                    console.log(data);
                    $('#amount').val(data.opportunitie.amount);
                    $('#name').val(data.opportunitie.name);
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
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\CRM\resources\views/opportunities/edit.blade.php ENDPATH**/ ?>