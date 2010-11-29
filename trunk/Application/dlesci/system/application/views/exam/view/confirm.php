<span class="profile_heading"><?php echo $exam->name;?></span>
<hr/>
<div id="exam_field">
<span class="profile_heading">Number of questions : </span>
<span class="profile_heading"><?php echo $exam->questions_per_paper;?></span>
<br/>
<br/>
<input type="button" value="next" class="profile_button"
       onclick="loadPage('/paper/question/<?php echo $exam->id;?>','exam_field')"/>
</div>