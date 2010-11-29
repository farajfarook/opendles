<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of userhome
 *
 * @author Faraj
 */
class Userhome extends Controller
{
    function Userhome()
    {
        parent::Controller();
    }

    function index()
    {
        $this->load->view('userhome/index');
    }
}
?>
