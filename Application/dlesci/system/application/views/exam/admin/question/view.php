<span class="profile_heading">Question : </span>
<span class="profile_label"> <?php echo $question->question;?></span>
<br/><br/>
<input type="button" class="profile_button" value="enter answers"
       onclick="loadPage('question/viewanswer/<?php echo $question->id;?>','mini_local')"/>
<input type="button" value="edit" class="profile_button"
       onclick="loadPage('question/showeditquestion/<?php echo $question->id;?>','question_local')"/>
<input type="button" value="delete" class="profile_button"
       onclick="loadPage('question/deletequestion/<?php echo $question->id;?>','question_local')"/>
<hr/>
<div id="mini_local"></div>