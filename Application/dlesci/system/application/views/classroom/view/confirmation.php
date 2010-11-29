
    <table width="100%" border="0" cellspacing="2">
      <tr>
        <td colspan="4"><div class="class_heading" id="classheading">DLES Classroom (Student portal) : <?php echo $data->class_name; ?><br />
        <hr /></div></td>
      </tr>
      <tr>
        <td width="12%" valign="top">
            
        <p>&nbsp;</p></td>
        <td width="88%" height="331" colspan="3">
        <table width="100%" height="100%" border="0" cellspacing="2">
          <tr>
            <td valign="middle">
                <span class="profile_label" id="updator">
            <?php
                echo $msg;
                if(!$pending):
                    $opts = array(
                                 'url' => base_url().'index.php/classroom/studentapprove/'.$data->id
                                ,'update'=>'updator'
                                ,'loading'=>'setLoading(\'updator\',\''.
                                             base_url().'image/icons/load.gif\')');

                     ?>
                <input type="button" value="Approve invitation" class="class_button" onClick="<?php echo $this->ajax->remote_function($opts);?>">
                <?php endif ?>
                <?php if($requestable):
                    $opts = array(
                                 'url' => base_url().'index.php/classroom/studentrequest/'.$data->id
                                ,'update'=>'updator'
                                ,'loading'=>'setLoading(\'updator\',\''.
                                             base_url().'image/icons/load.gif\')');

                     ?>

                                <input type="button" value="Subscribe Request" class="class_button" onClick="<?php echo $this->ajax->remote_function($opts);?>">
                <?php endif ?>
            </span>
            </td>
          </tr>
        </table>

        </td>
      </tr>
      <tr>
        <td width="12%" valign="top">&nbsp;</td>
        <td height="21" colspan="3" valign="top">&nbsp;</td>
      </tr>
    </table>
