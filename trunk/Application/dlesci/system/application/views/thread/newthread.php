<div>
<form action="<?php echo base_url()?>index.php/thread/create "
          onsubmit="new Ajax.Updater('newthreadform'
                                    ,'<?php echo base_url()?>index.php/thread/create '
                                    ,{evalScripts:true, parameters:Form.serialize(this)}); return false;"
                                    method="post">
    <input class="thread_subject_textbox" type="text" name="thread_subject" id="thread_subject"/>
    <input class="profile_button" type="submit" value="create"/>
 </form>
</div>
