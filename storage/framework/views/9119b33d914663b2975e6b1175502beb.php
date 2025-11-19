<div class="favorite-list-item">
    <?php if($user): ?>
        

        <?php if(!empty($user->avatar)): ?>
            <div data-id="<?php echo e($user->id); ?>" data-action="0" class="avatar av-m"
                style="background: round;background-image: url('<?php echo e(asset('/storage/'.config('chatify.user_avatar.folder').'/'.$user->avatar)); ?>');">
            </div>
        <?php else: ?>
            <div data-id="<?php echo e($user->id); ?>" data-action="0" class="avatar av-m"
                style="background: round;background-image: url('<?php echo e(asset('/storage/'.config('chatify.user_avatar.folder').'/avatar.png')); ?>');">
            </div>
        <?php endif; ?>
        <p><?php echo e(strlen($user->name) > 5 ? substr($user->name,0,6).'..' : $user->name); ?></p>
    <?php endif; ?>
</div>
<?php /**PATH E:\xampp2\htdocs\AS_CRM\resources\views/vendor/Chatify/layouts/favorite.blade.php ENDPATH**/ ?>