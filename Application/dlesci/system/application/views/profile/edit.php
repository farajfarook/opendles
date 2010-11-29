<?php
$date = explode('-', $data->birthday);
?>
<table width="100%" border="0" cellspacing="2">
      
      <tr>
          <td width="14%" valign="top" class="profile_label">First Name          </td>
        <td width="86%">
         <form action="<?php echo base_url()?>index.php/profile/updateall/fname "
          onsubmit="new Ajax.Updater('fnamebox'
                                    ,'<?php echo base_url()?>index.php/profile/updateall/fname '
                                    ,{onLoading:function(request){setLoading('fnamebox '
                                                                            ,'<?php echo base_url()?>image/icons/load.gif')}
                                    , evalScripts:true, parameters:Form.serialize(this)}); return false;"
          method="post">
        <input type="submit" value="change" class="profile_button"/>
        <span id='fnamebox'><input class="profile_textbox" type="text" name="fname" value="<?php echo $data->first_name ?>" id="textfield" /></span>
        </form>
        </td>
      </tr>
      <tr>
        <td valign="top" class="profile_label">Last Name</td>
        <td>
         <form action="<?php echo base_url()?>index.php/profile/updateall/lname "
          onsubmit="new Ajax.Updater('lnamebox'
                                    ,'<?php echo base_url()?>index.php/profile/updateall/lname '
                                    ,{onLoading:function(request){setLoading('lnamebox '
                                                                            ,'<?php echo base_url()?>image/icons/load.gif')}
                                    , evalScripts:true, parameters:Form.serialize(this)}); return false;"
          method="post">
        <input type="submit" value="change" class="profile_button"/>
        <span id='lnamebox'><input class="profile_textbox" type="text" name="lname" value="<?php echo $data->last_name ?>" id="textfield2" /></span>
        </form>
        </td>
      </tr>
      <tr>
        <td valign="top" class="profile_label">Phone        </td>
        <td>
         <form action="<?php echo base_url()?>index.php/profile/updateall/phone "
          onsubmit="new Ajax.Updater('phonebox'
                                    ,'<?php echo base_url()?>index.php/profile/updateall/phone '
                                    ,{onLoading:function(request){setLoading('phonebox '
                                                                            ,'<?php echo base_url()?>image/icons/load.gif')}
                                    , evalScripts:true, parameters:Form.serialize(this)}); return false;"
          method="post">
        <input type="submit" value="change" class="profile_button"/>
        <span id='phonebox'><input class="profile_textbox" type="text" name="phone" value="<?php echo $data->phone_number ?>" id="textfield4" />
        </span>
        </form></td>
      </tr>
      <tr>
        <td valign="top" class="profile_label">Sex</td>
        <td>
         <form action="<?php echo base_url()?>index.php/profile/updateall/sex "
          onsubmit="new Ajax.Updater('sexbox'
                                    ,'<?php echo base_url()?>index.php/profile/updateall/sex '
                                    ,{onLoading:function(request){setLoading('sexbox '
                                                                            ,'<?php echo base_url()?>image/icons/load.gif')}
                                    , evalScripts:true, parameters:Form.serialize(this)}); return false;"
          method="post">
          <input type="submit" value="change" class="profile_button"/>
          <span id='sexbox'>
          <label class="profile_label">
          male
          <input type="radio" name="sex" id="radio" value="m" <?php if($data->sex == "m") echo "checked"; ?> />
          </label>
          <label class="profile_label"> female
            <input type="radio" name="sex" id="radio2" value="f" <?php if($data->sex == "f") echo "checked"; ?> />
          </label>
          </span>
          </form>
      </tr>
      <tr>
        <td valign="top" class="profile_label">Birthday</td>
        <td>
            <form action="<?php echo base_url()?>index.php/profile/updateall/birthday "
          onsubmit="new Ajax.Updater('birthdaybox'
                                    ,'<?php echo base_url()?>index.php/profile/updateall/birthday '
                                    ,{onLoading:function(request){setLoading('birthdaybox '
                                                                            ,'<?php echo base_url()?>image/icons/load.gif')}
                                    , evalScripts:true, parameters:Form.serialize(this)}); return false;"
          method="post">
               
          <input type="submit" value="change" class="profile_button"/>
          <span id='birthdaybox'>
          <select class="profile_textbox" name="year" id="select">
            <?php for($year=date('Y');$year>date('Y')-100;$year--):?>
            <option value="<?php echo $year; ?>"
                   <?php if($year == $date[0]) echo "selected";?>> <?php echo $year; ?></option>
            <?php endfor ?>
          </select>
          <select class="profile_textbox" name="month" id="select2">
            <?php for($month=1;$month<=12;$month++):?>
            <?php if(strlen($month)==1) $mstr = "0".$month; else $mstr = $month; ?>
            <option value="<?php echo $month; ?>"
                   <?php if($month == $date[1]) echo "selected";?>> <?php echo $this->calendar->get_month_name($mstr); ?></option>
            <?php endfor ?>
          </select>
          <select class="profile_textbox" name="day" id="select3">
            <?php for($day=1;$day<=31;$day++):?>
            <option value="<?php echo $day; ?>"
                   <?php if($day == $date[1]) echo "selected";?>> <?php echo $day; ?></option>
            <?php endfor ?>
          </select>
          
          </span>
          </form>
        </td>
      </tr>
      <tr>
        <td valign="top" class="profile_label">Email</td>
      
          <td>
              <form action="<?php echo base_url()?>index.php/profile/updateemail "
      onsubmit="new Ajax.Updater('emailbox'
                                ,'<?php echo base_url()?>index.php/profile/updateemail '
                                ,{onLoading:function(request){setLoading('emailbox '
                                                                        ,'<?php echo base_url()?>image/icons/load.gif')}
                                , evalScripts:true, parameters:Form.serialize(this)}); return false;"
      method="post"> 
                   <input type="submit" value="change" class="profile_button"/>
            <span  id="emailbox">
              <input name="email" type="textbox" class="profile_textbox" id="email" value="<?php echo $data->email; ?>"/></span>
              </form>
        </td>
      </tr>


      <tr>
        <td valign="top" class="profile_label">Password</td>
        <td>
              <form action="<?php echo base_url()?>index.php/profile/updatepassword "
      onsubmit="new Ajax.Updater('passbox'
                                ,'<?php echo base_url()?>index.php/profile/updatepassword '
                                ,{onLoading:function(request){setLoading('passbox '
                                                                        ,'<?php echo base_url()?>image/icons/load.gif')}
                                , evalScripts:true, parameters:Form.serialize(this)}); return false;"
      method="post">
        <input type="submit" value="change" class="profile_button"/>
        <span id="passbox">
        <input class="profile_textbox" type="password" name="password" id="textfield5">
        <span class="profile_label">confirm</span>
        <input class="profile_textbox" type="password" name="cpassword" id="textfield6">
        </span>
              </form>
        </td>
      </tr>

      <tr>
        <td valign="top" class="profile_label">Profile picture</td>
        <td>
       <?php
       $opts = array(
                'startUpload' => 'startUpload(\'picboxprogress\',\''.
                                    base_url().'image/icons/load.gif\',\'propic\');'
              , 'index' => '1'
              , 'target' => base_url().'index.php/profile/updateprofilepic');
       $this->aupload->open_form($opts);

       ?>
        <input type="submit" value="change" class="profile_button"/>
        <label class="profile_cabinet">
		<?php
                    $datax = array(
                      'name'        => 'propic',
                      'class'       => 'textbox',
                      'type'        => 'file'
                    );
                     echo form_upload($datax);
                     ?>
                     </label>
                        <span id="picboxprogress" class="profile_alertlabel"></span>
                     <?php
                     $this->aupload->close_form();
         ?>

       <?php
       echo form_close();
       ?>

                          </td>
      </tr>

</table>
<script type="text/javascript" language="javascript">
SI.Files.stylizeAll();
</script>