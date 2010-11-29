<?php
            $user_id = $this->session->userdata('user_id');
           
?>
<table cellspacing="2" cellpadding="0" id="lecture_select">
 <?php foreach ($data->result() as $datum):?>
    <tr id="searchuser<?php echo $datum->id; ?>" class="class_lecturerList">
        <td valign="middle">
             <img class="friend_thumb" src="<?php echo base_url()."index.php/user/thumb/$datum->ID";?>" />
        </td><td valign="middle">
            <span class="friend_label"> <?php echo $datum->first_name." ".$datum->last_name; ?> </span>
        </td>
        <td valign="middle">
            <span class="friend_label">
            <?php
                $opts = array(
                             'url' => base_url().'index.php/classroom/addlecturer/'.$datum->id.'/'
                            ,'update'=>'searchuser'.$datum->id
                            ,'loading'=>'setLoading(\'searchuser'.$datum->id.'\',\''.
                                         base_url().'image/icons/load.gif\')');

                ?>
                <a href="#" class="friend_link" onClick="<?php echo $this->ajax->remote_function($opts);?>">
                        <img alt="add" src="<?php echo base_url()."image/icons/add.png"; ?>" />
                </a>
            </span>
        </td>
</tr>
<?php endforeach ?>
</table>