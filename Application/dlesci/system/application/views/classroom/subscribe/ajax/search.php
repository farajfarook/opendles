<table cellspacing="2" cellpadding="0" id="fsearchtable">
    <tr>
        <td class="profile_heading">title</td>
        <td class="profile_heading">major</td>
        <td class="profile_heading"></td>
    </tr>
 <?php foreach ($data->result() as $datum): ?>
    <tr id="searchitem<?php echo $datum->id; ?>" class="friend_listitem">
        <td valign="middle">
            <span class="friend_label"> <?php echo $datum->class_name; ?> </span>
        </td>
        <td valign="middle">
            <span class="friend_label">
            <?php
            $cm = $this->classmajorhandler->GetByID($datum->class_major_id);
            echo $cm->title;
            ?> </span>
        </td>
        <td valign="middle">
                <input type="button" value="open" class="profile_button"
                   onClick="loadLocal('<?php echo 'classroom/view/'.$datum->id; ?>');"/>
        </td>
</tr>
<?php endforeach ?>
</table>