<div class="notification_all">
    <div class="notification_all_heading">
        All Notifications
    </div>
    <?php foreach ($data->result() as $datum): ?>
    <div class="<?php echo (($datum->is_read)?"notification_all_old":"notification_all_new"); ?>">
        <i><?php echo mysqldatetime_to_date(($datum->date)); ?></i> : 
        <?php if($datum->link != ""): ?>
        <a href="#" onclick="loadLocal('<?php echo $datum->link;?>')" class="notification_all_link"><?php echo $datum->notification; ?></a>
        <?php else: ?>
        <span class="notification_all_link"><?php echo $datum->notification; ?></span>
        <?php endif ?>
    </div>
    <?php endforeach ?>
</div>