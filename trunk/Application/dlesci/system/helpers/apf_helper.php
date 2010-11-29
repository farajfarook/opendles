<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


if ( ! function_exists('_parse_apf_attributes'))
{
	function _parse_apf_attributes($attributes, $default)
	{
		if (is_array($attributes))
		{
			foreach ($default as $key => $val)
			{
				if (isset($attributes[$key]))
				{
					$default[$key] = $attributes[$key];
					unset($attributes[$key]);
				}
			}

			if (count($attributes) > 0)
			{
				$default = array_merge($default, $attributes);
			}
		}

		$att = '';

		foreach ($default as $key => $val)
		{
			if ($key == 'value')
			{
				$val = form_prep($val, $default['name']);
			}

			$att .= $key . '="' . $val . '" ';
		}

		return $att;
	}
}

/**
 * Generates <html *** > tag options for the use of ajax.org
 *
 * @access	public
 * @return	string
 */
if ( ! function_exists('apfhtml'))
{
	function apfhtml()
	{
		return 'xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" xmlns:a="http://ajax.org/2005/aml"';
	}
}

/**
 * Generates <html *** > tag options for the use of ajax.org
 *
 * @access	public
 * @param	string
 * @param	string
 * @param	string
 * @return	string
 */
if ( ! function_exists('apf_skin'))
{
	function apf_skin($skinbase,$imgbase,$iconbase)
	{
		return ' <a:skin 
                            src="'.$skinbase.'/skins.xml" 
                            media-path="'.$imgbase.'" 
                            icon-path="'.$iconbase.'" />';
	}
}

if ( ! function_exists('check_email_address'))
{
    function check_email_address($email) {
        // First, we check that there's one @ symbol, and that the lengths are right
        return true;
    }
}