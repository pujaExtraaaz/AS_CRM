<?php echo e(Form::open(['route' => ['lead.import'], 'method' => 'post', 'enctype' => 'multipart/form-data'])); ?>

<div class="modal-body">
    <div class="row">

        <div class="col-md-12 mb-6">
            <?php echo e(Form::label('file', __('Download sample client CSV file'), ['class' => 'col-form-label'])); ?>

            <a href="<?php echo e(asset(Storage::url('uploads/sample')) . '/sample-client.xlsx'); ?>"
                class="btn btn-sm btn-primary btn-icon">
                <i class="fa fa-download"></i>
            </a>
        </div>
        <div class="col-md-12">

            <?php echo e(Form::label('file', __('Select CSV File'), ['class' => 'form-label'])); ?>

            <div class="choose-file form-group">
                <label for="file" class="form-control-label">
                    <div class='form-label'><?php echo e(__('Choose file here')); ?></div>
                    <input type="file" class="form-control" name="file" id="file" data-filename="upload_file"
                        required>
                </label>
                <p class="upload_file"></p>
            </div>
        </div>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn  btn-light" data-bs-dismiss="modal"><?php echo e(__('Close')); ?></button>
    <button type="submit" class="btn  btn-primary"><?php echo e(__('Update')); ?></button>
</div>

<?php echo e(Form::close()); ?>

<?php /**PATH /home/u766425373/domains/extraaaz.com/public_html/live/resources/views/lead/import.blade.php ENDPATH**/ ?>