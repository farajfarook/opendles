<div>
<span class="profile_heading">exam name : </span>
<span class="profile_label"><?php echo $exam->name;?></span>, 
<span class="profile_heading">number of questions per paper : </span>
<span class="profile_label"><?php echo $exam->questions_per_paper;?></span>
</div>
<hr/>
<input type="button" class="profile_button" value="enter question"
       onclick="loadPage('question/index/<?php echo $exam->id;?>','question_local')"/>
<input type="button" class="profile_button" value="edit exam"
       onclick="loadPage('exam/showeditexam/<?php echo $exam->id;?>','exam_local')"/>
<hr/>
<div id="question_local" class="question_local"></div>

