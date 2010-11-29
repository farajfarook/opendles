<div class="thread_user_container">
    <?php foreach ($data->result() as $datum):?>
        <table>
        <tr>
        <td valign="middle">
             <img class="friend_thumb" src="<?php echo base_url()."index.php/user/thumb/$datum->id";?>" />
        </td><td valign="middle">
            <span class="friend_label"> <?php echo $datum->first_name." ".$datum->last_name; ?> </span>
        </td>
        <td valign="middle">
            <?php if(!$this->threadhandler->IsOwnedBy($thread->id,$datum->id)):?>
            <span class="friend_label">
            <?php
                $opts = array(
                             'url' => base_url().'index.php/thread/removeuser/'.$datum->id."/".$thread->id
                            ,'update'=>'threadusers');

                ?>
                <a href="#" class="friend_link" onClick="<?php echo $this->ajax->remote_function($opts);?>">
                        <img alt="request" src="<?php echo base_url()."image/icons/removefriend.gif" ?>" /></a>
            </span>
            <?php else: ?>
            <span class="friend_label">(creator)</span>
            <?php endif ?>
        </td>
        </tr>
        </table>
    <?php endforeach ?>
</div>