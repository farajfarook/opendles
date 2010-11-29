<span class="profile_heading">new exam</span>
<hr/>
<form action="<?php echo base_url()?>index.php/exam/createexam"
          onsubmit="new Ajax.Updater('exam_local'
                                    ,'<?php echo base_url()?>index.php/exam/createexam'
                                    ,{evalScripts:true, parameters:Form.serialize(this)}); return false;"
          method="post">
    <div>
        <span class="profile_label">exam name </span><br/>
        <input name="name" type="text" class="profile_textbox"/>
    </div>
    <br/>
    <div>
        <span class="profile_label">questions per paper</span><br/>
        <input type="text" class="profile_textbox" name="qcount"/>
    </div>
    <hr/>
    <input type="hidden" value="<?php echo $cid;?>" name="cid"/>
    <input type="submit" value="create" class="profile_button"/>
</form>
