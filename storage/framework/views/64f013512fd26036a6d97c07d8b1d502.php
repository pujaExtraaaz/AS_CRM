    <div class="row">
    <?php $__currentLoopData = $response; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $que => $ans): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-12 text-xs">
            <h6 class="text-small"><?php echo e($que); ?></h6>
            <p><?php echo e($ans); ?></p>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</div>
<?php /**PATH /home/u766425373/domains/extraaaz.com/public_html/live/resources/views/form_builder/response_detail.blade.php ENDPATH**/ ?>