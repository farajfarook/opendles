<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


if ( ! function_exists('slider_init'))
{
	function slider_init($id,$start_on = 1)
	{
		?>
                <script type="text/javascript">
		slider.init('<?php echo $id;?>',<?php echo $start_on;?>);
                </script>
                <?php
	}
}

if ( ! function_exists('slider_head_start'))
{
	function slider_head_start($tab_index,$class="heading")
	{
		?>
                <div class="<?php echo $class;?>" id="tab<?php echo $tab_index;?>-header">
                <?php
	}
}

if ( ! function_exists('slider_head_end'))
{
	function slider_head_end()
	{
		?>
                </div>
                <?php
	}
}

if ( ! function_exists('slider_content_start'))
{
	function slider_content_start($tab_index,$class="content")
	{
		?>
                <div class="<?php echo $class;?>" id="tab<?php echo $tab_index;?>-content">
                <?php
	}
}

if ( ! function_exists('slider_content_end'))
{
	function slider_content_end()
	{
		?>
                </div>
                <?php
	}
}

if ( ! function_exists('slider_content_end'))
{
	function slider_content_end()
	{
		?>
                
                <?php
	}
}

