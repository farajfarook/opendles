<table cellspacing="2" cellpadding="0" border="0">   
 <?php foreach ($data->result() as $datum): ?>
    <tr id="ownclasslist<?php echo $datum->id; ?>">
        <td>
            <input type="button" value="<?php echo $datum->class_name;?>" class="profile_button"
                   onClick="loadLocal('<?php echo 'classroom/view/'.$datum->id; ?>');"/>
        </td>
    </tr>
<?php endforeach ?>
</table>