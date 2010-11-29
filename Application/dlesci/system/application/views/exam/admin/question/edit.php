<form action="<?php echo base_url()?>index.php/question/editquestion"
          onsubmit="new Ajax.Updater('question_local'
                                    ,'<?php echo base_url()?>index.php/question/editquestion'
                                    ,{evalScripts:true, parameters:Form.serialize(this)}); return false;"
          method="post">
    <div>
        <span class="profile_label">question </span><br/>
        <textarea rows="2" cols="50" name="question" class="profile_textbox"><?php echo $question->question;?></textarea>
    </div>
    <hr/>
    <input type="hidden" value="<?php echo $question->id;?>" name="qid"/>
    <input type="submit" value="save" class="profile_button"/>
</form>
