<span class="profile_label">
    <?php echo $question->question; ?>
</span>
<hr/>
<?php foreach ($answers->result() as $datum):?>
<?php
    $checked = false;
    $ans = $this->paperhandler->getAnswer($user_id,$question->id);
    if($ans)
    {
        foreach ($ans->result() as $an) {
            if($datum->id == $an->answer_id)
            {
                $checked = true;
            }
        }
    }
?>
    <li>
        <input type="checkbox" <?php if($checked) echo "checked";?>
               onchange="QuestionSendResponse(this,<?php echo $datum->id; ?>)"/>
        <span class="profile_label"><?php echo $datum->answer;?></span>
    </li>
<?php endforeach ?>
<hr/>
<br/>
<input type="button" value="next" class="profile_button"
       onclick="loadPage('/paper/question/<?php echo $exam->id;?>','exam_field')"/>