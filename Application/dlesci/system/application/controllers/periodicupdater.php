<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PeriodicUpdater
 *
 * @author Faraj
 */
class Periodicupdater extends Controller
{
    function index()
    {
        $user_id = $this->session->userdata('user_id');
        if(!$user_id)
        {
            $vars['msg'] = "you should login to view your friends";
            $this->load->view('alert/alert',$vars);
            return;
        }
        $this->chathandler->UpdateOnline($user_id);

        $vars['friends'] = $this->friendhandler->GetFriendList($user_id);
        $vars['notifications'] = $this->notificationhandler->GetUnRead($user_id);
        $vars['inbox'] = $this->threadhandler->HasNew($user_id);

        $vars['container'] = array('friend'=>($this->datastore->get($user_id,'friend')=="true")
                                  ,'thread'=>($this->datastore->get($user_id,'thread')=="true")
                                  ,'classinfo'=>false);
        $this->datastore->set($user_id, 'friend', 'false');
        $this->datastore->set($user_id, 'thread', 'false');
        $this->load->view('updator/index', $vars);
    }
}
?>
