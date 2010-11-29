<form action="<?php echo base_url()?>index.php/question/addanswer"
          onsubmit="new Ajax.Updater('mini_local'
                                    ,'<?php echo base_url()?>index.php/question/addanswer'
                                    ,{evalScripts:true, parameters:Form.serialize(this)}); return false;"
                                    method="post">
    <input type="text" name="answer" class="profile_textbox"/>
    <input type="hidden" name="qid" value="<?php echo $question->id;?>"/>
    <input type="submit" value="add" class="profile_button"/>
</form>
<ul>
    <?php foreach ($answers->result() as $datum):?>
        <li>
            <input type="button" class="profile_button" value="delete"
                   onclick="loadPage('question/deleteanswer/<?php echo $datum->id; ?>','mini_local')"/>
            <input type="checkbox" <?php if($datum->is_answer) echo "checked";?>
                   onchange="loadPage('question/answertoggle/<?php echo $datum->id; ?>','mini_local')"/>
            <span class="profile_label"><?php echo $datum->answer;?></span>
        </li>
    <?php endforeach ?>
</ul>