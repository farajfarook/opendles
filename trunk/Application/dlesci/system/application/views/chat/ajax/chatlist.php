<table border="0">
 <?php foreach ($list->result() as $datum): ?>
    <?php if(!$this->chathandler->IsOnline($datum->id)) continue; ?>
    <tr id="list<?php echo $datum->ID; ?>" class="chat_listitem">
        <td valign="middle">
             <img class="chat_thumb" src="<?php echo base_url()."index.php/user/thumb/$datum->id";?>" />
        </td><td valign="middle">
            <div class="chat_label" name="chatusername"> <?php echo $datum->first_name." ".$datum->last_name; ?> </div>
        </td>
        <td>

             <?php
                     $opts = array(
                                 'url' => base_url().'index.php/chat/chatitem/'.$datum->id
                                ,'complete'=>'loadTable(request,\'chatcontent\')');
                     ?>
                <a href="#" class="chat_link" onClick="<?php echo $this->ajax->remote_function($opts);?>" >
                <img alt="delete" src="<?php echo base_url()."image/icons/online.gif" ?>" /></a>
                
        </td>
    </tr>
<?php endforeach ?>
</table>