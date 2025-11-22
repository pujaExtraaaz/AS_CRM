<div class="table-responsive">
	<table class="table table-striped mb-0">
		<thead>
			<tr>
				<th><?php echo e(__('Date/Time')); ?></th>
				<th><?php echo e(__('Disposition')); ?></th>
				<th><?php echo e(__('Sales User')); ?></th>
				<th><?php echo e(__('Followup Note')); ?></th>
			</tr>
		</thead>
		<tbody>
			<?php $__empty_1 = true; $__currentLoopData = $logs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $log): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
				<tr>
					<td><?php echo e(optional($log->created_at)->format('Y-m-d H:i')); ?></td>
					<td><?php echo e($status[$log->lead_status]); ?></td>
					<td><?php echo e(optional($log->creator)->name ?? '-'); ?></td>
					<td><?php echo e($log->followup_note); ?></td>
				</tr>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
				<tr>
					<td colspan="4" class="text-center text-muted"><?php echo e(__("No Follow Up's found.")); ?></td>
				</tr>
			<?php endif; ?>
		</tbody>
	</table>
</div><?php /**PATH D:\xampp\htdocs\AS_CRM\resources\views/lead/lead_status.blade.php ENDPATH**/ ?>