<table cellspacing="2" cellpadding="0" border="0">
    <tr>
        <td class="profile_heading">class title</td>
        <td class="profile_heading">class major</td>
        <td class="profile_heading"></td>
        <td class="profile_heading"></td>
    </tr>
 <?php foreach ($data->result() as $datum): ?>
    <tr id="ownclasslist<?php echo $datum->id; ?>">
        <td valign="middle" class="profile_label"><?php echo $datum->class_name;?></td>
        <td valign="middle" class="profile_label">
        <?php
        $cm = $this->classmajorhandler->GetByID($datum->class_major_id);
        echo $cm->Title;
        ?>
        </td>
        <td>
        <?php
            if($this->classhandler->IsLecturerConfirmed($datum->id,$user_id))
            {
                ?>
            <input type="button" value="reject" class="profile_button"
                   onClick="loadLocal('<?php echo 'classroom/view/'.$datum->id; ?>');"/>
            <span class="profile_label">Lecturing</span>
            <?php
            }else{
        ?>
            <input type="button" value="approve" class="profile_button"
                   onClick="loadLocal('<?php echo 'classroom/view/'.$datum->id; ?>');"/>
            <?php } ?>
        </td>
        <td>
            <input type="button" value="open" class="profile_button"
                   onClick="loadLocal('<?php echo 'classroom/view/'.$datum->id; ?>');"/>
        </td>
    </tr>
<?php endforeach ?>
</table>