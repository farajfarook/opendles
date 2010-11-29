<table border="0" cellspacing="0">
<tr>
<td width="312" valign="top" id="profilepic">
    <img src="<?php echo base_url().'index.php/profile/profilepic/'.$data->id; ?>" class="profile_pic"/>
</td>
<td width="400" valign="top">
    <table cellspacing="0">
    <tr>
      <td class="profile_subtitle">name</td>
      <td class="profile_data" id="namewrap">
      <?php echo "$data->first_name $data->last_name"; ?>
      </td>
    </tr>
    <tr>
        <td class="profile_subtitle">email</td><td class="profile_data" id="emailwrap"><?php echo $data->email; ?></td>
    </tr>
    <tr>
        <td class="profile_subtitle">sex</td>
        <td class="profile_data" id="sexwrap">
        <?php
            switch($data->sex)
            {
                case 'm': case 'M': echo "male"; break;
                case 'f': case 'F': echo "female"; break;
            }
        ?>
        </td>
    </tr>
    <tr>
        <td class="profile_subtitle">birthday</td><td class="profile_data" id="birthdaywrap"><?php echo $data->birthday; ?></td>
    </tr>
    <tr>
        <td class="profile_subtitle">phone</td><td class="profile_data" id="phonewrap"><?php echo $data->phone_number; ?></td>
    </tr>
    </table>
</td>
</tr>
</table>