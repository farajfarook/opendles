<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of friend
 *
 * @author Faraj
 */
class Friend extends Controller
{
    function Friend()
    {
        parent::Controller();
    }

    function index()
    {
        $user_id = $this->session->userdata('user_id');
        if(!$user_id)
        {
            $vars['msg'] = "you should login to view your friends";
            $this->load->view('alert/alert',$vars);
            return;
        }
        $this->load->view('friend/index');
    }

    function search()
    {
        $user_id = $this->session->userdata('user_id');
        if(!$user_id)
        {
            $vars['msg'] = "you should login to search friends";
            $this->load->view('alert/alert',$vars);
            return;
        }
        $name = $this->input->post('search');
        if($name)
        {
            $vars['data'] = $this->friendhandler->Search($name,$user_id,0,5);
            $this->load->view('friend/ajax/search', $vars);
        }
    }

    function deletelist()
    {
        $user_id = $this->session->userdata('user_id');
        if(!$user_id)
        {
            $vars['msg'] = "you should login to view your friends";
            $this->load->view('alert/alert',$vars);
            return;
        }
        $user = $this->uri->segment(3);
        $this->friendhandler->FriendReject($user,$user_id);
        $this->datastore->set($user_id, 'FRIEND', 'true');
        $this->load->view('friend/ajax/delete');
    }

    function deleterecieve()
    {
        $user_id = $this->session->userdata('user_id');
        if(!$user_id)
        {
            $vars['msg'] = "you should login to view your friends";
            $this->load->view('alert/alert',$vars);
            return;
        }
        $user = $this->uri->segment(3);
        $this->friendhandler->FriendReject($user,$user_id);
        $this->datastore->set($user_id, 'FRIEND', 'true');
        $this->load->view('friend/ajax/delete');
    }

    function deletesent()
    {
        $user_id = $this->session->userdata('user_id');
        if(!$user_id)
        {
            $vars['msg'] = "you should login to view your friends";
            $this->load->view('alert/alert',$vars);
            return;
        }
        $user = $this->uri->segment(3);
        $this->friendhandler->FriendReject($user,$user_id);
        $this->datastore->set($user_id, 'FRIEND', 'true');
        $this->load->view('friend/ajax/delete');
    }

    function accept()
    {
        $user_id = $this->session->userdata('user_id');
        if(!$user_id)
        {
            $vars['msg'] = "you should login to view your friends";
            $this->load->view('alert/alert',$vars);
            return;
        }
        
        $user = $this->uri->segment(3);

        //NOTIFICATION
        $requester = $this->userhandler->get($user);
        $acceptor = $this->userhandler->get($user_id);
        $this->notificationhandler->notify_friend_accept_to_acceptor($user_id,$requester);
        $this->notificationhandler->notify_friend_accept_to_requestor($user, $acceptor);
        $this->datastore->set($requester->id, 'FRIEND', 'true');
        $this->datastore->set($acceptor->id, 'FRIEND', 'true');
        //END NOTIFICATION

        $vars['data'] = $this->friendhandler->FriendApprove($user, $user_id);
        $vars['list'] = $this->friendhandler->GetFriendList($user_id);
        $this->load->view('friend/ajax/accept', $vars);
    }

    function request()
    {
        $user_id = $this->session->userdata('user_id');
        if(!$user_id)
        {
            $vars['msg'] = "you should login to view your friends";
            $this->load->view('alert/alert',$vars);
            return;
        }
        $user = $this->uri->segment(3);
        if(!$this->friendhandler->IsFriendRequested($user_id, $user))
        {
            $this->friendhandler->FriendRequest($user_id, $user);

            //NOTIFICATION
            $requester = $this->userhandler->get($user_id);
            $this->notificationhandler->notify_friend_request_to_acceptor($user, $requester);
            //END NOTIFICATION
        }
        else
        {
            //NOTIFICATION
            $acceptor = $this->userhandler->get($user);
            $this->notificationhandler->notify_friend_request_already_sent_to_requestor($user_id, $acceptor);
            //END NOTIFICATION
        }
        $this->datastore->set($user_id, 'FRIEND', 'true');
        $this->datastore->set($user, 'FRIEND', 'true');
        
        $vars['user_id'] = $user;
        $this->load->view('friend/ajax/request', $vars);
    }

    function recievedlist()
    {
        $user_id = $this->session->userdata('user_id');
        if(!$user_id)
        {
            $vars['msg'] = "you should login to view your friends";
            $this->load->view('alert/alert',$vars);
            return;
        }
        $page = $this->uri->segment(3);
        if(!$page) $page = 0;
        $value = (10*$page)-1;
        if($value<0) $value = 0;
        $vars['recieve'] = $this->friendhandler->GetRecievedFriendRequestPending($user_id,$value);
        $vars['page'] = $page;
        $this->load->view('friend/ajax/recievedlist',$vars);
    }

    function sentlist()
    {
        $user_id = $this->session->userdata('user_id');
        if(!$user_id)
        {
            $vars['msg'] = "you should login to view your friends";
            $this->load->view('alert/alert',$vars);
            return;
        }
        $page = $this->uri->segment(3);
        if(!$page) $page = 0;
        $value = (10*$page)-1;
        if($value<0) $value = 0;
        $vars['sent'] = $this->friendhandler->GetSentFriendRequestPending($user_id,$value);
        $vars['page'] = $page;
        $this->load->view('friend/ajax/sentlist',$vars);
    }


    function friendlist()
    {
        $user_id = $this->session->userdata('user_id');
        if(!$user_id)
        {
            $vars['msg'] = "you should login to view your friends";
            $this->load->view('alert/alert',$vars);
            return;
        }
        $page = $this->uri->segment(3);
        if(!$page) $page = 0;
                $value = (10*$page)-1;
        if($value<0) $value = 0;
        $vars['list'] = $this->friendhandler->GetFriendList($user_id,$value);
        $vars['page'] = $page;
        $this->load->view('friend/ajax/friendlist',$vars);
    }
}
?>
