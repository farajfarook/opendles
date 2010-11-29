<div>
<?php foreach ($data->result() as $datum): ?>
    <?php if($this->threadhandler->IsOwnedBy($thread->id,$datum->id)) continue; ?>
    <?php if($this->threadhandler->IsFollowing($thread->id,$datum->id)) continue; ?>
 <div id="searchitem<?php echo $datum->id; ?>" class="friend_listitem">
        <table>
        <tr>
        <td valign="middle">
             <img class="friend_thumb" src="<?php echo base_url()."index.php/user/thumb/$datum->id";?>" />
        </td><td valign="middle">
            <span class="friend_label"> <?php echo $datum->first_name." ".$datum->last_name; ?> </span>
        </td>
        <td valign="middle">
            <span class="friend_label">
            <?php
                $opts = array(
                             'url' => base_url().'index.php/thread/adduser/'.$datum->id."/".$thread->id
                            ,'update'=>'threadusers');

                ?>
                <a href="#" class="friend_link" onClick="<?php echo $this->ajax->remote_function($opts);?>">
                        <img alt="request" src="<?php echo base_url()."image/icons/add.png" ?>" /></a>
            </span>
        </td>
        </tr>
        </table>
</div>
<?php endforeach ?>
</div>