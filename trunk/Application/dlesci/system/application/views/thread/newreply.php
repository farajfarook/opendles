<div>
<form action="<?php echo base_url()?>index.php/thread/newreply/<?php echo $data->id;?>"
          onsubmit="new Ajax.Updater('reply_container'
                                    ,'<?php echo base_url()?>index.php/thread/newreply/<?php echo $data->id;?>'
                                    ,{evalScripts:true, parameters:Form.serialize(this)}); return false;"
                                    method="post">
    <input type="text" name="thread_message" id="thread_message"/>
    <input type="submit" value="reply"/>
 </form>
</div>