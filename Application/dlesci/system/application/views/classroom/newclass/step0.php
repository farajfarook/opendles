<?php

  $opts = array(
         'url' => base_url().'index.php/classroom/newclass/1'
        ,'update'=>'newclasscontent'
        ,'loading'=>'setLoading(\'newclasscontent\',\''.
                     base_url().'image/icons/load.gif\')');
?>
<input type="button" value="new class" class="profile_button" onClick="<?php echo $this->ajax->remote_function($opts);?>" />
<hr>