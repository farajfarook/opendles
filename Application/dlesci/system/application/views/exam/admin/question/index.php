<input type="button" value="new question" class="profile_button"
       onclick="loadPage('question/showcreatequestion/<?php echo $exam->id;?>','question_local')"/>
<span class="profile_heading"><?php echo $questions->num_rows()." questions excist";?></span>
<hr/>
<div id="answer_local" class="answer_local">
<div style="overflow: auto; height: 200px">
    <table>
    <?php foreach ($questions->result() as $datum): ?>
        <tr id="questionlist<?php echo $datum->id; ?>">
            <td>
                <input type="button" value="open" class="profile_button"
                       onclick="loadPage('question/viewquestion/<?php echo $datum->id;?>','answer_local')" />
            </td>
            <td>
                <span class="profile_label">
                    <?php echo $datum->question; ?>
                </span>
            </td>
        </tr>
    <?php endforeach?>
    </table>
</div>
</div>