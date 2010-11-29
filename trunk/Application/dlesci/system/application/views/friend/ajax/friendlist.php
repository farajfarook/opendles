<div class="friend_listitem">
<input type="button" <?php if($page==0) echo 'style="visibility: hidden"'; ?> class="profile_button" value="previous" onclick="loadPage('friend/friendlist/<?php echo ($page-1); ?>', 'list')"/>
            <span class="profile_label"><?php echo $page; ?></span>
            <input type="button" <?php if($page!=0) echo 'style="visibility: hidden"'; ?> class="profile_button" value="next" onclick="loadPage('friend/friendlist/<?php echo ($page+1); ?>', 'list')"/>
</div>
<table cellspacing="2" cellpadding="0">
    <?php if($list->num_rows()<=0): ?>
    <tr><td>
<span class="profile_label">empty</span>
        </td></tr>
<?php else: ?>
 <?php foreach ($list->result() as $datum): ?>
    <tr id="list<?php echo $datum->id; ?>">
        <td valign="middle">
             <img class="friend_thumb" src="<?php echo base_url()."index.php/user/thumb/$datum->id";?>" />
        </td><td valign="middle">
            <span class="friend_label"> <?php echo $datum->first_name." ".$datum->last_name; ?> </span>
        </td>
<td>-</td>
        <td>
             <?php
                     $opts = array(
                                 'url' => base_url().'index.php/friend/deletelist/'.$datum->id
                                ,'update'=>'list'.$datum->id);

                     ?>
            <input type="button" value="open profile" class="profile_button" onclick="loadPop('profile/view/<?php echo $datum->id; ?>')" />
            <input type="button" value="remove" class="profile_button" onClick="<?php echo $this->ajax->remote_function($opts);?>" />
        </td>
    </tr>
<?php endforeach ?>
<?php endif ?>
</table>