<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of notification
 *
 * @author Faraj
 */
class Notification extends Controller
{
    function Notification()
    {
        parent::controller();
    }

    function index()
    {
        $user_id = $this->session->userdata('user_id');
        if(!$user_id)
        {
            $vars['msg'] = "you should login to view your notifications";
            $this->load->view('alert/alert',$vars);
            return;
        }
        $vars['data'] = $this->notificationhandler->GetUnRead($user_id);
        $this->load->view('notification/index',$vars);
    }

    function all()
    {
        $user_id = $this->session->userdata('user_id');
        if(!$user_id)
        {
            $vars['msg'] = "you should login to view your notifications";
            $this->load->view('alert/alert',$vars);
            return;
        }
        $vars['data'] = $this->notificationhandler->GetAll($user_id);
        $this->load->view('notification/all', $vars);
    }

    function markread()
    {
        $user_id = $this->session->userdata('user_id');
        if(!$user_id)
        {
            $vars['msg'] = "you should login to view your notifications";
            $this->load->view('alert/alert',$vars);
            return;
        }
        $this->notificationhandler->MarkAsRead($user_id);
    }
}
?>
