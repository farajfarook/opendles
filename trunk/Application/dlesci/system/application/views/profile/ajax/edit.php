<?php
$date = explode('-', $data->birthday);
?>
<?php
switch ($type)
{
    case 'fname':
        ?>
<input class="profile_textbox" type="text" name="fname" value="<?php echo $data->first_name ?>" id="textfield" />
<?php
    break;

    case 'lname':
         ?><input class="profile_textbox" type="text" name="lname" value="<?php echo $data->last_name ?>" id="textfield2" />
<?php
    break;
    case 'phone':
         ?><input class="profile_textbox" type="text" name="phone" value="<?php echo $data->phone_number ?>" id="textfield4" />
<?php
    break;
    case 'sex':
         ?>
         <label class="profile_label">
          male
          <input type="radio" name="sex" id="radio" value="m" <?php if($data->sex == "m") echo "checked"; ?> />
          </label>
          <label class="profile_label"> female
            <input type="radio" name="sex" id="radio2" value="f" <?php if($data->sex == "f") echo "checked"; ?> />
          </label>
<?php
    break;
    case 'birthday':
         ?>
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
                   <?php if($day == $date[2]) echo "selected";?>> <?php echo $day; ?></option>
            <?php endfor ?>
          </select>
<?php
    break;
}
?>

         <span class='profile_alertlabel'><?php echo $msg; ?></span>