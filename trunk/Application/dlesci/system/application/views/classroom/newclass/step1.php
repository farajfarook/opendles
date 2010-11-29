 <form action="<?php echo base_url()?>index.php/classroom/newclass/2"
          onsubmit="new Ajax.Updater('newclasscontent'
                                    ,'<?php echo base_url()?>index.php/classroom/newclass/2'
                                    ,{onLoading:function(request){setLoading('newclasscontent'
                                                                            ,'<?php echo base_url()?>image/icons/load.gif')}
                                    , evalScripts:true, parameters:Form.serialize(this)}); return false;"
          method="post">
    <label>
      <span class="profile_label">      title  </span>
      <input type="text" class="profile_textbox" name="title" id="title" />
    </label>
    <label>
      <span class="profile_label">class major      </span>
      <select name="classmajor" class="profile_textbox">
        <?php foreach ($data->result() as $datum): ?>
        <option value="<?php echo $datum->id; ?>">
                       <?php echo $datum->title; ?></option>
        <?php endforeach; ?>
      </select>
    </label>
    <label>
      <input type="submit" name="button" id="button" value="Submit" class="profile_button" />
    </label>
    <label>
        <?php
         $opts = array(
                     'url' => base_url().'index.php/classroom/newclass/0'
                    ,'update'=>'newclasscontent'
                    ,'loading'=>'setLoading(\'newclasscontent\',\''.
                                 base_url().'image/icons/load.gif\')');
         ?>
      <input type="button" value="cancel" class="profile_button" onClick="<?php echo $this->ajax->remote_function($opts);?>" />
    </label>
</form>
<hr>