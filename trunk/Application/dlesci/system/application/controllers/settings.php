<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of settings
 *
 * @author Faraj
 */
class Settings extends Controller
{
    function Settings()
    {
        parent::Controller();
    }

    function index()
    {
        $this->load->view('settings/index.php');
        
    }
}
?>
