<?php if($isOwner): ?>
<a href="#" onclick="loadPage('courseweb/newsedit/<?php echo $class->id; ?>','cwln');" class="home_link">edit</a>
<?php endif ?>
<div class="profile_textbox" style="width: auto">
    <?php echo $data->news; ?>
</div>
