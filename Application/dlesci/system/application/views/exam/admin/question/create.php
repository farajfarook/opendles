<form action="<?php echo base_url()?>index.php/question/createquestion"
          onsubmit="new Ajax.Updater('question_local'
                                    ,'<?php echo base_url()?>index.php/question/createquestion'
                                    ,{evalScripts:true, parameters:Form.serialize(this)}); return false;"
          method="post">
    <div>
        <span class="profile_label">question </span><br/>
        <textarea rows="2" cols="50" name="question" class="profile_textbox"></textarea>
    </div>
    <hr/>
    <input type="hidden" value="<?php echo $eid;?>" name="eid"/>
    <input type="submit" value="create" class="profile_button"/>
</form>
