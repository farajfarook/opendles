   <table width="100%" border="0" cellspacing="2">
      <tr>
        <td width="200" valign="top">
            <?php
             $opts = array(
                                         'url' => base_url().'index.php/profile/edit'
                                        ,'update'=>'display'
                                        ,'loading'=>'setLoading(\'display\',\''.
                                                     base_url().'image/ajax/bigload.gif\')');
                             ?>
            <input type="button" class="settings_bigbutton"  value="profile settings"
                   onclick="<?php echo $this->ajax->remote_function($opts);?>" />
        </td>
        <td valign="top" style="border-left:solid 1px #2999ca">
            <div id='display'>
                <span class="profile_label">
                <p>This section will allow you to configure and change the settings of DLES. </p>
                <p>Click the button to continue.</p>
                </span>
            </div>
        </td>
      </tr>
    </table>
