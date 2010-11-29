<div style="padding-left: 10px;">
<span class="profile_label" style="padding-left: 2px;">
    Enter your doubts below and submit to the lecturer
</span>
    <br>
<?php

            echo $this->ajax->form_remote_tag( array('url'=>base_url().'index.php/doubt/ask/'.$cid
                                                    ,'complete'=>'document.getElementById(\'studentclassroomcontent\').innerHTML=request.responseText'
                                                    ));
?>
<textarea cols="50" rows="10" class="profile_textbox" style="padding-left: 2px;" name="doubt"></textarea>
<br>
<input type="submit" style="padding-left: 2px;" value="send doubt" class="profile_button"/>
</form>
</div>