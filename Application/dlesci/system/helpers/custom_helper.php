<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of custom_helper
 *
 * @author Faraj
 */
if ( ! function_exists('red5_publisher'))
{
    function red5_publisher($data)
    {
?>
<object name="red5pub" width="300" height="140">
      <param name="movie" value="<?php echo base_url()?>flash/publisher.swf" />
      <param name="quality" value="high" />
      <param name="allowFullScreen" value="false" />
      <param name="FlashVars" value="protocol=<?php echo $data['protocol'];?>&amp;host=<?php echo $data['host'];?>:<?php echo $data['port'];?>&amp;app=<?php echo $data['app'];?>&amp;user=<?php echo $data['user_id'];?>&amp;auth=<?php echo $data['auth_str'];?>" />
      <embed src="<?php echo base_url();?>flash/publisher.swf?protocol=<?php echo $data['protocol'];?>&amp;host=<?php echo $data['host'];?>:<?php echo $data['port'];?>&amp;app=<?php echo $data['app'];?>&amp;user=<?php echo $data['user_id'];?>&amp;auth=<?php echo $data['auth_str'];?>"
		quality="high" bgcolor="#ffffff" width="300" height="140" name="httpTest" align="middle" allowscriptaccess="sameDomain" allowfullscreen="false" type="application/x-shockwave-flash" pluginspage="http://www.adobe.com/go/getflashplayer"/>
</object>
<?php
    }
}

if ( ! function_exists('red5_subscriber'))
{
    function red5_subscriber($data)
    {
?>

<object name="red5sub" width="200" height="350">
      <param name="movie" value="<?php echo base_url()?>flash/subscriber.swf" />
      <param name="quality" value="high" />
      <param name="allowFullScreen" value="true" />
      <param name="FlashVars" value="protocol=<?php echo $data['protocol'];?>&amp;host=<?php echo $data['host'];?>:<?php echo $data['port'];?>&amp;app=<?php echo $data['app'];?>&amp;user=<?php echo $data['user_id'];?>&amp;auth=<?php echo $data['auth_str'];?>&amp;ruser=<?php echo $data['ruser_id'];?>" />
      <embed src="<?php echo base_url()?>flash/subscriber.swf?protocol=<?php echo $data['protocol'];?>&amp;host=<?php echo $data['host'];?>:<?php echo $data['port'];?>&amp;app=<?php echo $data['app'];?>&amp;user=<?php echo $data['user_id'];?>&amp;auth=<?php echo $data['auth_str'];?>&amp;ruser=<?php echo $data['ruser_id'];?>"
		quality="high" bgcolor="#ffffff" width="200" height="350" name="httpTest" align="middle" allowscriptaccess="sameDomain" allowfullscreen="false" type="application/x-shockwave-flash" pluginspage="http://www.adobe.com/go/getflashplayer"/>
</object>
<?php
    }
}

if ( ! function_exists('red5_lecturer'))
{
    function red5_lecturer($data)
    {
    ?>

<object name="red5sub" width="150" height="250">
      <param name="movie" value="<?php echo base_url()?>flash/lecturer.swf" />
      <param name="quality" value="high" />
      <param name="allowFullScreen" value="true" />
      <param name="FlashVars" value="protocol=<?php echo $data['protocol'];?>&amp;host=<?php echo $data['host'];?>:<?php echo $data['port'];?>&amp;app=<?php echo $data['app'];?>&amp;user=<?php echo $data['user_id'];?>&amp;auth=<?php echo $data['auth_str'];?>&amp;ruser=<?php echo $data['ruser_id'];?>" />
      <embed src="<?php echo base_url()?>flash/lecturer.swf?protocol=<?php echo $data['protocol'];?>&amp;host=<?php echo $data['host'];?>:<?php echo $data['port'];?>&amp;app=<?php echo $data['app'];?>&amp;user=<?php echo $data['user_id'];?>&amp;auth=<?php echo $data['auth_str'];?>&amp;ruser=<?php echo $data['ruser_id'];?>"
                quality="high" bgcolor="#ffffff" width="150" height="250" name="httpTest" align="middle" allowscriptaccess="sameDomain" allowfullscreen="false" type="application/x-shockwave-flash" pluginspage="http://www.adobe.com/go/getflashplayer"/>
</object>
    <?php
    }
}

if ( ! function_exists('red5_screen'))
{
    function red5_screen($data)
    {
    ?>
<object name="red5sub" width="400" height="300">
      <param name="movie" value="<?php echo base_url()?>flash/subscribescr.swf" />
      <param name="quality" value="high" />
      <param name="allowFullScreen" value="true" />
      <param name="FlashVars" value="protocol=<?php echo $data['protocol'];?>&amp;host=<?php echo $data['host'];?>:<?php echo $data['port'];?>&amp;app=<?php echo $data['app'];?>&amp;user=<?php echo $data['user_id'];?>&amp;auth=<?php echo $data['auth_str'];?>&amp;classid=<?php echo $data['class_id'];?>" />
      <embed src="<?php echo base_url()?>flash/subscribescr.swf?protocol=<?php echo $data['protocol'];?>&amp;host=<?php echo $data['host'];?>:<?php echo $data['port'];?>&amp;app=<?php echo $data['app'];?>&amp;user=<?php echo $data['user_id'];?>&amp;auth=<?php echo $data['auth_str'];?>&amp;classid=<?php echo $data['class_id'];?>"
             quality="high" bgcolor="#ffffff" width="400" height="300" name="httpTest" align="middle" allowscriptaccess="sameDomain" allowfullscreen="false" type="application/x-shockwave-flash" pluginspage="http://www.adobe.com/go/getflashplayer"/>
</object>
    <?php
    }
}

if ( ! function_exists('red5_wboard_client'))
{
    function red5_wboard_client($data)
    {
    ?>
<object name="red5sub" width="400" height="300">
      <param name="movie" value="<?php echo base_url()?>flash/dlesstudentwb.swf" />
      <param name="quality" value="high" />
      <param name="allowFullScreen" value="true" />
      <param name="FlashVars" value="protocol=<?php echo $data['protocol'];?>&amp;host=<?php echo $data['host'];?>:<?php echo $data['port'];?>&amp;app=<?php echo $data['app'];?>&amp;user=<?php echo $data['user_id'];?>&amp;auth=<?php echo $data['auth_str'];?>&amp;classid=<?php echo $data['class_id'];?>" />
      <embed src="<?php echo base_url()?>flash/dlesstudentwb.swf?protocol=<?php echo $data['protocol'];?>&amp;host=<?php echo $data['host'];?>:<?php echo $data['port'];?>&amp;app=<?php echo $data['app'];?>&amp;user=<?php echo $data['user_id'];?>&amp;auth=<?php echo $data['auth_str'];?>&amp;classid=<?php echo $data['class_id'];?>"
             quality="high" bgcolor="#ffffff" width="400" height="300" name="httpTest" align="middle" allowscriptaccess="sameDomain" allowfullscreen="false" type="application/x-shockwave-flash" pluginspage="http://www.adobe.com/go/getflashplayer"/>
</object>
    <?php
    }
}


if ( ! function_exists('red5_wboard_server'))
{
    function red5_wboard_server($data)
    {
    ?>
<object name="red5sub" width="400" height="300">
      <param name="movie" value="<?php echo base_url()?>flash/dleslecturerwb.swf" />
      <param name="quality" value="high" />
      <param name="allowFullScreen" value="true" />
      <param name="FlashVars" value="protocol=<?php echo $data['protocol'];?>&amp;host=<?php echo $data['host'];?>:<?php echo $data['port'];?>&amp;app=<?php echo $data['app'];?>&amp;user=<?php echo $data['user_id'];?>&amp;auth=<?php echo $data['auth_str'];?>&amp;classid=<?php echo $data['class_id'];?>" />
      <embed src="<?php echo base_url()?>flash/dleslecturerwb.swf?protocol=<?php echo $data['protocol'];?>&amp;host=<?php echo $data['host'];?>:<?php echo $data['port'];?>&amp;app=<?php echo $data['app'];?>&amp;user=<?php echo $data['user_id'];?>&amp;auth=<?php echo $data['auth_str'];?>&amp;classid=<?php echo $data['class_id'];?>"
             quality="high" bgcolor="#ffffff" width="400" height="300" name="httpTest" align="middle" allowscriptaccess="sameDomain" allowfullscreen="false" type="application/x-shockwave-flash" pluginspage="http://www.adobe.com/go/getflashplayer"/>
</object>
    <?php
    }
}

if ( ! function_exists('screen_publisher'))
{
    function screen_publisher($data)
    {
    ?>
<object name="red5sub" width="250" height="250">
      <param name="movie" value="<?php echo base_url()?>flash/screenpublisher.swf" />
      <param name="quality" value="high" />
      <param name="allowFullScreen" value="true" />
      <param name="FlashVars" value="protocol=<?php echo $data['protocol'];?>&amp;host=<?php echo $data['host'];?>:<?php echo $data['port'];?>&amp;app=<?php echo $data['app'];?>&amp;user=<?php echo $data['user_id'];?>&amp;auth=<?php echo $data['auth_str'];?>&amp;classid=<?php echo $data['class_id'];?>" />
      <embed src="<?php echo base_url()?>flash/screenpublisher.swf?protocol=<?php echo $data['protocol'];?>&amp;host=<?php echo $data['host'];?>:<?php echo $data['port'];?>&amp;app=<?php echo $data['app'];?>&amp;user=<?php echo $data['user_id'];?>&amp;auth=<?php echo $data['auth_str'];?>&amp;classid=<?php echo $data['class_id'];?>"
             quality="high" bgcolor="#ffffff" width="250" height="250" name="httpTest" align="middle" allowscriptaccess="sameDomain" allowfullscreen="false" type="application/x-shockwave-flash" pluginspage="http://www.adobe.com/go/getflashplayer"/>
</object>
    <?php
    }
}


if ( ! function_exists('screen_playback'))
{
    function screen_playback($data)
    {
    ?>
<object name="red5sub" width="400" height="300">
      <param name="movie" value="<?php echo base_url()?>flash/scrplayer.swf" />
      <param name="quality" value="high" />
      <param name="allowFullScreen" value="true" />
      <param name="FlashVars" value="protocol=<?php echo $data['protocol'];?>&amp;host=<?php echo $data['host'];?>:<?php echo $data['port'];?>&amp;app=<?php echo $data['app'];?>&amp;user=<?php echo $data['user_id'];?>&amp;auth=<?php echo $data['auth_str'];?>&amp;classid=<?php echo $data['class_id'];?>" />
      <embed src="<?php echo base_url()?>flash/scrplayer.swf?protocol=<?php echo $data['protocol'];?>&amp;host=<?php echo $data['host'];?>:<?php echo $data['port'];?>&amp;app=<?php echo $data['app'];?>&amp;user=<?php echo $data['user_id'];?>&amp;auth=<?php echo $data['auth_str'];?>&amp;classid=<?php echo $data['class_id'];?>"
             quality="high" bgcolor="#ffffff" width="400" height="300" name="httpTest" align="middle" allowscriptaccess="sameDomain" allowfullscreen="false" type="application/x-shockwave-flash" pluginspage="http://www.adobe.com/go/getflashplayer"/>
</object>
    <?php
    }
}