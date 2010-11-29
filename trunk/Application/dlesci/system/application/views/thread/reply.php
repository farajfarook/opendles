<?php if($data->num_rows()==0):?>
       <div class="thread_reply">
        (be first to reply to this thread)
       </div>
    <?php endif ?>
    <?php foreach ($data->result() as $datum):?>
    <?php $user = $this->userhandler->get($datum->user_id); ?>
    <div class="thread_reply">
        <span style="font-weight: bold"><?php echo $user->first_name." ".$user->last_name;?></span> :
        <?php echo $datum->message; ?>
    </div>
    <?php endforeach ?>