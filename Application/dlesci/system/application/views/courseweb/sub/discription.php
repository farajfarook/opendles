<?php if($isOwner): ?>
<a href="#" onclick="loadPage('courseweb/discriptionedit/<?php echo $class->id; ?>','cwld');" class="home_link">edit</a>
<?php  endif ?>
<div class="profile_textbox" style="width: auto">
    <?php echo $data->discription; ?>
</div>
