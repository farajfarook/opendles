<span class="profile_label"> <?php echo $msg ?></span>
<?php

  $opts = array(
         'url' => base_url().'index.php/classroom/newclass/1'
        ,'update'=>'newclasscontent'
        ,'loading'=>'setLoading(\'newclasscontent\',\''.
                     base_url().'image/icons/load.gif\')');
?>
<input type="button" value="new class" class="profile_button" onClick="<?php echo $this->ajax->remote_function($opts);?>" />
<hr>
 <?php
              $opts = array(
                     'url' => base_url().'index.php/classroom/ownlist'
                    ,'update'=>'ownclasslist'
                    ,'loading'=>'setLoading(\'ownclasslist\',\''.
                                 base_url().'image/icons/load.gif\')');
            ?>
                <script>
                <?php echo $this->ajax->remote_function($opts);?>
                </script>