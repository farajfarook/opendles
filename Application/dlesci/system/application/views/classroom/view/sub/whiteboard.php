<div class="class_whiteboard_name">white board</div>
<div class="class_whiteboard" id="classwhiteboard">
<?php if($isOwner): ?>
    <?php red5_wboard_server($data); ?>
<?php else: ?>
    <?php red5_wboard_client($data); ?>
<?php endif ?>
</div>