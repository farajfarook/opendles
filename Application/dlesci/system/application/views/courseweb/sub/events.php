<?php if($isOwner): ?>
<a href="#" onclick="loadPage('courseweb/eventsedit/<?php echo $class->id; ?>','cwle');" class="home_link">edit</a>
<?php endif ?>
<div class="profile_textbox" style="width: auto">
    <?php echo $data->events; ?>
</div>
