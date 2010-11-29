 <?php foreach ($data->result() as $datum):?>
<span>
            <span class="friend_label"> <?php echo $datum->first_name." ".$datum->last_name; ?>
                            <?php if($this->threadhandler->IsOwnedBy($thread->id,$datum->id)):?>
                              (creator)
                            <?php endif ?>
            </span>,
</span>
    <?php endforeach ?>
<a href="#" class="thread_add_Link" onclick="loadPage('thread/showadduser/<?php echo $thread->id;?>', 'newthreadform')">(add)</a>