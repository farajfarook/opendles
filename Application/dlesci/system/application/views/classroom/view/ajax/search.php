<table cellspacing="2" cellpadding="0" id="fsearchtable">
 <?php foreach ($data->result() as $datum): ?>
    <?php if($this->classhandler->IsSubscribed($cid,$datum->id))         continue; ?>
    <?php if($this->classhandler->IsClassOwnedBy($cid, $datum->id))         continue; ?>
    <tr id="classroomsearchitem<?php echo $datum->id; ?>" class="friend_listitem">
        <td valign="middle">
             <img class="friend_thumb" src="<?php echo base_url()."index.php/user/thumb/$datum->id";?>" />
        </td><td valign="middle">
            <span class="friend_label"> <?php echo $datum->first_name." ".$datum->last_name; ?> </span>
        </td>
        <td valign="middle">
            <span class="friend_label">
            <?php
            $user_id = $this->session->userdata('user_id');
            
            
                $opts = array(
                             'url' => base_url().'index.php/classroom/requeststudent/'.$datum->id.'/'.$cid
                            ,'update'=>'classroomsearchitem'.$datum->id
                            ,'loading'=>'setLoading(\'classroomsearchitem'.$datum->id.'\',\''.
                                         base_url().'image/icons/load.gif\')');
                
                ?>
                <a href="#" class="friend_link" onClick="<?php echo $this->ajax->remote_function($opts);?>">
                        <img alt="request" src="<?php echo base_url()."image/icons/request.gif" ?>" /></a>
       
            </span>
        </td>
</tr>
<?php endforeach ?>
</table>