<table cellspacing="2" cellpadding="0" id="fsearchtable">
 <?php foreach ($data->result() as $datum): ?>
    <tr id="searchitem<?php echo $datum->id; ?>" class="friend_listitem">
        <td valign="middle">
             <img class="friend_thumb" src="<?php echo base_url()."index.php/user/thumb/$datum->id";?>" />
        </td><td valign="middle">
            <span class="friend_label"> <?php echo $datum->first_name." ".$datum->last_name; ?> </span>
        </td>
        <td>-</td>
        <td valign="middle">
            <span class="friend_label">
            <input type="button" value="open profile" class="profile_button" onclick="loadPop('profile/view/<?php echo $datum->id; ?>')" />
            <?php
            $user_id = $this->session->userdata('user_id');
            if($this->friendhandler->IsFriend($user_id, $datum->id))
            {
             
            }
            else if($this->friendhandler->IsFriendRequested($user_id, $datum->id))
            {
                echo "(friend requested)";
            }
            else
            {
                $opts = array(
                             'url' => base_url().'index.php/friend/request/'.$datum->id
                            ,'update'=>'searchitem'.$datum->id);
                
                ?>

                <input type="button" value="add friend" class="profile_button" onClick="<?php echo $this->ajax->remote_function($opts);?>" />
                <?php
            }
            ?>
            </span>
        </td>
</tr>
<?php endforeach ?>
</table>