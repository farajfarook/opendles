<span class="profile_heading">new exam</span>
<hr/>
<form action="<?php echo base_url()?>index.php/exam/editexam"
          onsubmit="new Ajax.Updater('exam_local'
                                    ,'<?php echo base_url()?>index.php/exam/editexam'
                                    ,{evalScripts:true, parameters:Form.serialize(this)}); return false;"
          method="post">
    <div>
        <span class="profile_label">exam name </span><br/>
        <input name="name" type="text" value="<?php echo $exam->name;?>" class="profile_textbox"/>
    </div>
    <br/>
    <div>
        <span class="profile_label">questions per paper</span><br/>
        <input type="text" class="profile_textbox" name="qcount"
               value="<?php echo $exam->questions_per_paper;?>"/>
    </div>
    <hr/>
    <input type="hidden" value="<?php echo $exam->class_id;?>" name="cid"/>
    <input type="hidden" value="<?php echo $exam->id;?>" name="eid"/>
    <input type="submit" value="update" class="profile_button"/>
</form>
