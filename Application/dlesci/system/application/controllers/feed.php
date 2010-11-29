<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of feed
 *
 * @author Faraj
 */
class Feed extends Controller
{
    function Feed()
    {
        parent::Controller();
    }

    function rss()
    {
        $vars['data'] = $this->feedhandler->getfeed();
        $this->load->view('feed/rss',$vars);
    }

    function view()
    {
        $this->load->view('feed/index');
    }
}
?>
