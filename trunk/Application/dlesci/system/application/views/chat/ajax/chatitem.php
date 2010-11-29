<td class="chat_item" id="chat<?php echo $chatitem['ruser_id'];?>">
<table>
    <tr><td>
<?php
    red5_subscriber($chatitem);
?>
        </td>
    </tr>
    <tr><td class="chat_item_head">
<a href="#" class="chat_link" onClick="deleteElement('chat<?php echo $chatitem['ruser_id'];?>','chatcontent')" >
                        -X-</a><?php echo "$data->first_name $data->last_name"; ?>
        </td>
    </tr>
</table>
    
</td>