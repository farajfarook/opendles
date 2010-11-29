 <?php    foreach ($data->result() as $datum):?>
<div
    class="<?php if($this->threadhandler->IsNew($datum->id, $user->id)) echo 'thread_inbox_subject_new'; else echo 'thread_inbox_subject'; ?>"
    onclick="loadPage('thread/show/<?php echo $datum->id; ?>','newthreadform')">
    <?php echo $datum->subject; ?>
    <br>
    <i style="font-size: 10px">(<?php echo $datum->start_date_time; ?>)</i>
</div>
<?php    endforeach?>