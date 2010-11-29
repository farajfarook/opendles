<div class="friend_listitem">
<input type="button" <?php if($page==0) echo 'style="visibility: hidden"'; ?> class="profile_button" value="previous" onclick="loadPage('friend/recievedlist/<?php echo ($page-1); ?>', 'recieve')"/>
            <span class="profile_label"><?php echo $page; ?></span>
            <input type="button" <?php if($page!=0) echo 'style="visibility: hidden"'; ?> class="profile_button" value="next" onclick="loadPage('friend/recievedlist/<?php echo ($page+1); ?>', 'recieve')"/>
</div>
<table cellspacing="2" cellpadding="0">
 <?php if($recieve->num_rows()<=0): ?>
    <tr><td>
<span class="profile_label">no friends request received</span>
        </td></tr>
<?php else: ?>
<?php foreach ($recieve->result() as $datumx):
     $datum = $this->userhandler->get($datumx->user_id1); ?>
<tr id="recieve<?php echo $datum->id; ?>" class="friend_listitem">
    
    <td valign="middle">
         <img class="friend_thumb" src="<?php echo base_url()."index.php/user/thumb/$datum->id";?>" />
    </td><td valign="middle">
        <span class="friend_label"> <?php echo $datum->first_name." ".$datum->last_name; ?> </span>
    </td>
    <td>-</td>
    <td>
         <?php
                 $opts = array(
                             'url' => base_url().'index.php/friend/deleterecieve/'.$datum->id
                            ,'update'=>'recieve'.$datum->id);

                 ?>

            <input type="button" value="open profile" class="profile_button" onclick="loadPop('profile/view/<?php echo $datum->id; ?>')" />
            <input type="button" value="remove" class="profile_button" onClick="<?php echo $this->ajax->remote_function($opts);?>" />
         <?php
                 $opts = array(
                             'url' => base_url().'index.php/friend/accept/'.$datum->id
                            ,'update'=>'recieve'.$datum->id);
                 ?>
            <input type="button" value="approve" class="profile_button" onClick="<?php echo $this->ajax->remote_function($opts);?>" />
    </td>
</tr>

<?php endforeach ?>
<?php endif ?>
</table>