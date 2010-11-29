<table border="0" width="100%">
<tr>
<td valign="top">
    <div class="userhome_localdisplay" id="localdisplay">
        <script>
            loadLocal('feed/view');
        </script>
    </div>
</td>
<td width="150" valign="top">
    <div class="userhome_buttonlist">
<input style="background-image:url(<?php echo base_url();?>image/rss.png)" type="button" value="News" class="userhome_button" onclick="loadLocal('feed/view')"/>
<input style="background-image:url(<?php echo base_url();?>image/education.png)" type="button" value="Class" class="userhome_button" onclick="loadLocal('classroom')"/>
<input style="background-image:url(<?php echo base_url();?>image/friend.png)" type="button" value="Friends" class="userhome_button" onclick="loadLocal('friend')"/>
</div>
</td>
</tr>
</table>

