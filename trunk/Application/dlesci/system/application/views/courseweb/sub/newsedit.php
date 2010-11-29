<?php

            echo $this->ajax->form_remote_tag( array('url'=>base_url().'index.php/courseweb/newssave/'.$class->id
                                                    ,'complete'=>'document.getElementById(\'cwln\').innerHTML=request.responseText'
                                                    ));
?>
<textarea cols="50" class="profile_textbox" style="padding-left: 2px;" name="data"> <?php echo $data-news; ?></textarea>
<br>
<input type="submit" style="padding-left: 2px;" value="save" class="profile_button"/>
</form>