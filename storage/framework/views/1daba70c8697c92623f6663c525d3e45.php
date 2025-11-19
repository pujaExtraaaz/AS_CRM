
<?php if($get == 'saved'): ?>
<table class="messenger-list-item mt-2" data-contact="<?php echo e(Auth::user()->id); ?>">
    <tr data-action="0">
        
        <td>
            <div class="avatar av-m" style="background-color: #D9EFFF; text-align: center;">
                <span class="ti ti-bookmark" style="font-size: 22px; color: #6FD943;"></span>
            </div>
        </td>
        
        <td>
            <p data-id="<?php echo e(Auth::user()->id); ?>" data-type="user">Saved Messages <span>You</span></p>
            <span>Save messages secretly</span>
        </td>
    </tr>
</table>
<?php endif; ?>


<?php if($get == 'users' && !!$lastMessage): ?>
<?php
    $lastMessageBody = mb_convert_encoding($lastMessage->body, 'UTF-8', 'UTF-8');
    $lastMessageBody = strlen($lastMessageBody) > 30 ? mb_substr($lastMessageBody, 0, 30, 'UTF-8').'..' : $lastMessageBody;
?>
<table class="messenger-list-item" data-contact="<?php echo e($user->id); ?>">
    <tr data-action="0">
        
        <td style="position: relative">
            <?php if($user->active_status): ?>
            <span class="activeStatus"></span>
            <?php endif; ?>
            <?php if(!empty($user->avatar)): ?>
                <div class="avatar av-m"
                    style="background-image: url('<?php echo e(asset('/storage/'.config('chatify.user_avatar.folder').'/'.$user->avatar)); ?>');">
                </div>
            <?php else: ?>
                <div class="avatar av-m"
                    style="background-image: url('<?php echo e(asset('/storage/'.config('chatify.user_avatar.folder').'/avatar.png')); ?>');">
                </div>
            <?php endif; ?>

        </td>
        
        <td>
            <p data-id="<?php echo e($user->id); ?>" data-type="user">
                <?php echo e(strlen($user->name) > 12 ? trim(substr($user->name,0,12)).'..' : $user->name); ?>

                <span class="contact-item-time" data-time="<?php echo e($lastMessage->created_at); ?>"><?php echo e($lastMessage->timeAgo); ?></span>
            </p>
            <span>
                
                <?php echo $lastMessage->from_id == Auth::user()->id
                ? '<span class="lastMessageIndicator">You :</span>'
                : ''; ?>

                
                <?php if($lastMessage->attachment == null): ?>
                <?php echo $lastMessageBody; ?>

                <?php else: ?>
                <span class="fas fa-file"></span> Attachment
                <?php endif; ?>
            </span>
            
            <?php echo $unseenCounter > 0 ? "<b>".$unseenCounter."</b>" : ''; ?>

        </td>
    </tr>
</table>
<?php endif; ?>


<?php if($get == 'search_item'): ?>
    <table class="messenger-list-item" data-contact="<?php echo e($user->id); ?>">
        <tr data-action="0">
            
            <td>
                <?php if(!empty($user->avatar)): ?>
            <div class="avatar av-m"
                style="background-image: url('<?php echo e(asset('/storage/'.config('chatify.user_avatar.folder').'/'.$user->avatar)); ?>');">
            </div>
            <?php else: ?>
            <div class="avatar av-m"
                style="background-image: url('<?php echo e(asset('/storage/'.config('chatify.user_avatar.folder').'/avatar.png')); ?>');">
            </div>
            <?php endif; ?>
            </td>
            
            <td>
                <p data-id="<?php echo e($user->id); ?>" data-type="user">
                    <?php echo e(strlen($user->name) > 12 ? trim(substr($user->name,0,12)).'..' : $user->name); ?>

            </td>

        </tr>
    </table>
<?php endif; ?>
<?php if($get == 'all_members'): ?>

<table class="messenger-list-item" data-contact="<?php echo e($user->id); ?>">
    <tr data-action="0">
        
        <td style="position: relative">
            <?php if($user->active_status): ?>
            <span class="activeStatus"></span>
            <?php endif; ?>
            <?php if(!empty($user->avatar)): ?>
            <div class="avatar av-m"
                style="background-image: url('<?php echo e(asset('/storage/'.config('chatify.user_avatar.folder').'/'.$user->avatar)); ?>');">
            </div>
            <?php else: ?>
            <div class="avatar av-m"
                style="background-image: url('<?php echo e(asset('/storage/'.config('chatify.user_avatar.folder').'/avatar.png')); ?>');">
            </div>
            <?php endif; ?>
        </td>
        
        <td>
            <p data-id="<?php echo e($user->id); ?>">
                <?php echo e(strlen($user->name) > 12 ? trim(substr($user->name,0,12)).'..' : $user->name); ?>

        </td>

    </tr>
</table>
<?php endif; ?>


<?php if($get == 'sharedPhoto'): ?>
<div class="shared-photo chat-image" style="background-image: url('<?php echo e($image); ?>')"></div>
<?php endif; ?>
<?php /**PATH D:\xampp\htdocs\AS_CRM\resources\views/vendor/Chatify/layouts/listItem.blade.php ENDPATH**/ ?>