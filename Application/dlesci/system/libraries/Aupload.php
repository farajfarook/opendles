<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Aupload
 *
 * @author Faraj
 */
class Upload
{

    function open_form($options)//startUpload, index, target,
    {
        echo '<iframe id="upload_target'.$options['index'].'" name="upload_target'.$options['index'].'" src="" style="width:0;height:0;border:0px solid #fff;"></iframe>';
        echo '<form action="'.$options['target'].'" method="post" enctype="multipart/form-data" target="upload_target'.$options['index'].'" onsubmit="'.$options['startUpload'].'" >';
    }

    function close_form()
    {
        echo '</form>';
    }

    function getResponse($options)//endUpload
    {       
        echo '<script language="javascript" type="text/javascript">';
        echo 'window.top.window.'.$options['endUpload'];
        echo '</script>';
    }
}

Class Aupload extends Upload
{
    
}
?>
