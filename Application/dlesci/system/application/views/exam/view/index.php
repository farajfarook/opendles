<div id="exam_local">
    <span class="profile_heading">Available Exams</span>
    <hr/>
    <?php foreach ($exams->result() as $datum): ?>
        <?php if($this->examhandler->isExamValid($datum->id)): ?>
        <input type="button" value="open" class="profile_button"
               onclick="loadPage('paper/enroll/<?php echo $datum->id;?>','exam_local')"/>
        <span class="profile_label"><?php echo $datum->name; ?></span>
        <?php endif ?>
    <?php endforeach ?>
</div>