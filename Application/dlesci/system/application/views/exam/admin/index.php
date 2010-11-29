<div id="exam_local">

<table>
<?php foreach($exams->result() as $datum):?>
<tr id="examlist<?php echo $datum->id; ?>">
    <td>
        <span class="profile_label"><?php echo $datum->name; ?></span>
    </td>
    <td>
       <?php
                 $opts = array(
                             'url' => base_url().'index.php/exam/deleteexam/'.$classroom->id.'/'.$datum->id
                            ,'update'=>'examlist'.$datum->id);

                 ?>
        <input type="button" value="open exam" class="profile_button" onclick="loadPage('exam/openexam/<?php echo $datum->id; ?>','exam_local')" />
        <input type="button" value="remove" class="profile_button" onClick="<?php echo $this->ajax->remote_function($opts);?>" />
        <?php if($this->examhandler->isExamValid($datum->id)): ?>
        <?php else:?>
        <span class="profile_label">(insufficient questions)</span>
        <?php endif ?>
    </td>
</tr>
<?php endforeach?>
</table>
    <hr/>
<div>
    <input type="button" class="profile_button" value="create exam"
           onclick="loadPage('exam/showcreateexam/<?php echo $classroom->id;?>','exam_local')"/>
</div>
</div>