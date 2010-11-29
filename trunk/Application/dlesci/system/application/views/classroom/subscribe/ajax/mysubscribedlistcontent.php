<div class="friend_listitem">
<input type="button" <?php if($page==0) echo 'style="visibility: hidden"'; ?> class="profile_button" value="previous" onclick="loadPage('classroom/mysubscribedlistcontent/<?php echo ($page-1); ?>', 'list')"/>
            <span class="profile_label"><?php echo $page; ?></span>
            <input type="button" <?php if($page!=0) echo 'style="visibility: hidden"'; ?> class="profile_button" value="next" onclick="loadPage('classroom/mysubscribedlistcontent/<?php echo ($page+1); ?>', 'list')"/>
</div>
<table cellspacing="2" cellpadding="0">

<tr>
        <td class="profile_heading">major</td>
        <td class="profile_heading">title</td>

        <td></td>
        
    </tr>
                 <?php foreach ($list->result() as $datum):?>

                    <tr id="mysubscribeclass<?php echo $datum->id; ?>" class="friend_listitem">
                        <td valign="middle">
                            <span class="friend_label">
                            <?php
                            $cm = $this->classmajorhandler->GetByID($datum->class_major_id);
                            echo $cm->title;
                            ?> </span>
                        </td>
                        <td valign="middle">
                            <span class="friend_label"> <?php echo $datum->class_name; ?> </span>
                        </td>

                         <td>
                             <?php
                                     $opts = array(
                                                 'url' => base_url().'index.php/classroom/deleterecieve/'.$datum->id.'/'.$user_id
                                                ,'update'=>'mysubscriptionsentclass'.$datum->id
                                                ,'loading'=>'setLoading(\'mysubscriptionsentclass'.$datum->id.'\',\''.
                                                             base_url().'image/icons/load.gif\')');

                                     ?>
                            <input type="button" value="delete" class="profile_button" onClick="<?php echo $this->ajax->remote_function($opts);?>" />
                            <input type="button" value="open" class="profile_button" onClick="loadPage('classroom/view/<?php echo $datum->id; ?>','localdisplay');" />
                        </td>
                    </tr>
                <?php endforeach ?>
                 </table>