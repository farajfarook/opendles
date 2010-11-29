<div class="friend_listitem">
<input type="button" <?php if($page==0) echo 'style="visibility: hidden"'; ?> class="profile_button" value="previous" onclick="loadPage('classroom/classroomsent/<?php echo $cid; ?>/<?php echo ($page-1); ?>', 'classroomsent')"/>
            <span class="profile_label"><?php echo $page; ?></span>
            <input type="button" <?php if($page!=0) echo 'style="visibility: hidden"'; ?> class="profile_button" value="next" onclick="loadPage('classroom/classroomsent/<?php echo $cid; ?>/<?php echo ($page+1); ?>', 'classroomsent')"/>
</div>
<table cellspacing="2" cellpadding="0">
                     <?php foreach ($sent->result() as $datum): ?>
                <tr id="classroomsent<?php echo $datum->id; ?>" class="friend_listitem">
                    <td valign="middle">
                         <img class="friend_thumb" src="<?php echo base_url()."index.php/user/thumb/$datum->id";?>" />
                    </td><td valign="middle">
                        <span class="friend_label"> <?php echo $datum->first_name." ".$datum->last_name; ?> </span>
                    </td>
                    <td>-</td>
                    <td>
                         <?php
                                 $opts = array(
                                             'url' => base_url().'index.php/classroom/deletesent/'.$cid.'/'.$datum->id
                                            ,'update'=>'classroomsent'.$datum->id
                                            ,'loading'=>'setLoading(\'classroomsent'.$datum->id.'\',\''.
                                                         base_url().'image/icons/load.gif\')');

                                 ?>
                            <input type="button" value="open profile" class="profile_button" onclick="loadPop('profile/view/<?php echo $datum->id; ?>')" />
                            <input type="button" value="remove" class="profile_button" onClick="<?php echo $this->ajax->remote_function($opts);?>" />
                    </td>
                </tr>

            <?php endforeach ?>
           </table>