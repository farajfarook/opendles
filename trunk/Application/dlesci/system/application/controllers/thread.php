<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of thread
 *
 * @author Faraj
 */
class Thread extends Controller
{
    function index()
    {
        $user_id = $this->session->userdata('user_id');
        if(!$user_id) {
            $vars['msg'] = "you should login";
            $this->load->view('alert/alert',$vars);
            return;
        }
        $vars['user'] = $this->userhandler->get($user_id);
        $this->load->view('thread/inbox', $vars);
    }

    function inboxlist()
    {
        $user_id = $this->session->userdata('user_id');
        if(!$user_id) {
            $vars['msg'] = "you should login";
            $this->load->view('alert/alert',$vars);
            return;
        }
        $vars['data'] = $this->threadhandler->GetThreads($user_id);
        $vars['user'] = $this->userhandler->get($user_id);

         $this->load->view('thread/ajax/inboxlist', $vars);
    }

    function newform()
    {
        $user_id = $this->session->userdata('user_id');
        if(!$user_id) {
            $vars['msg'] = "you should login";
            $this->load->view('alert/alert',$vars);
            return;
        }
        $vars['user'] = $this->userhandler->get($user_id);
        $this->load->view('thread/newthread', $vars);
    }

    function create()
    {
        $user_id = $this->session->userdata('user_id');
        if(!$user_id) {
            $vars['msg'] = "you should login";
            $this->load->view('alert/alert',$vars);
            return;
        }
        $subject = $this->input->post('thread_subject');
        if(!$subject) $subject = "(no subject)";
        $vars['data'] = $this->threadhandler->CreateThread($user_id, $subject);
        //NOTIFY
        $this->notificationhandler->notify_user_about_thread_creation($user_id, $vars['data']);
        //ENDNOTIFY
        $this->load->view('thread/adduser',$vars);
    }

    function showadduser()
    {
        $user_id = $this->session->userdata('user_id');
        if(!$user_id) {
            $vars['msg'] = "you should login";
            $this->load->view('alert/alert',$vars);
            return;
        }
        $thread_id = $this->uri->segment(3);
        $vars['data'] = $this->threadhandler->Get($thread_id);
        $this->load->view('thread/adduser',$vars);
    }

    function newreply()
    {
        $user_id = $this->session->userdata('user_id');
        if(!$user_id) {
            $vars['msg'] = "you should login";
            $this->load->view('alert/alert',$vars);
            return;
        }
        $thread_id = $this->uri->segment(3);
        $msg = $this->input->post('thread_message');
        if(!$msg) $msg = "(blank message)";
        $this->threadhandler->CreateThreadReply($thread_id, $user_id, $msg);
        $this->show();
    }

    function showreply()
    {
        $thread_id = $this->uri->segment(3);
        $vars['data'] = $this->threadhandler->GetThreadReply($thread_id);
        $vars['thread'] = $this->threadhandler->Get($thread_id);
        $this->load->view('thread/reply', $vars);
    }

    function show()
    {
        $user_id = $this->session->userdata('user_id');
        if(!$user_id) {
            $vars['msg'] = "you should login";
            $this->load->view('alert/alert',$vars);
            return;
        }
        $thread_id = $this->uri->segment(3);
        $vars['data'] = $this->threadhandler->Get($thread_id);
        $vars['replydata'] = $this->threadhandler->GetThreadReply($thread_id);
        $this->load->view('thread/thread', $vars);
    }

    function adduser()
    {
        $user_id = $this->session->userdata('user_id');
        if(!$user_id) {
            $vars['msg'] = "you should login";
            $this->load->view('alert/alert',$vars);
            return;
        }
        $thread_id = $this->uri->segment(4);
        $thread = $this->threadhandler->get($thread_id);
        $userid = $this->uri->segment(3);

        if($user_id==$thread->started_user_id||$userid==$user_id)
        {
            if(!$this->threadhandler->IsFollowing($thread_id, $userid))
            {
                $this->threadhandler->FollowThread($thread_id, $userid);
                //NOTIFY
                $this->notificationhandler->notify_user_about_thread_follow($userid, $this->userhandler->get($user_id), $thread);
                //END NOTIFY
            }
            $vars['data'] = $this->threadhandler->GetFollowers($thread_id);
            $vars['thread'] = $this->threadhandler->get($thread_id);
            $this->load->view('thread/users', $vars);
            return;
        }
        else
        {
            $vars['msg'] = "you are not autherized to add users to thread";
            $this->load->view('alert/alert',$vars);
            return;
        }
    }

    function removeuser()
    {
        $user_id = $this->session->userdata('user_id');
        if(!$user_id) {
            $vars['msg'] = "you should login";
            $this->load->view('alert/alert',$vars);
            return;
        }
        $thread_id = $this->uri->segment(4);
        $thread = $this->threadhandler->get($thread_id);
        $userid = $this->uri->segment(3);

        if($user_id==$thread->started_user_id||$userid==$user_id)
        {
            if($this->threadhandler->IsFollowing($thread_id, $userid))
            {
                $this->threadhandler->UnfollowThread($thread_id, $userid);
            }
            $vars['thread'] = $thread;
            $vars['data'] = $this->threadhandler->GetFollowers($thread_id);
            $this->load->view('thread/users', $vars);
            return;
        }
        else
        {
            $vars['msg'] = "you are not autherized to remove users to thread";
            $this->load->view('alert/alert',$vars);
            return;
        }
    }

    function showusers()
    {
        $user_id = $this->session->userdata('user_id');
        if(!$user_id) {
            $vars['msg'] = "you should login";
            $this->load->view('alert/alert',$vars);
            return;
        }
        $thread_id = $this->uri->segment(3);
        $vars['thread'] = $this->threadhandler->get($thread_id);
        $vars['data'] = $this->threadhandler->GetFollowers($thread_id);
        $this->load->view('thread/users', $vars);
    }

    function listusers()
    {
        $user_id = $this->session->userdata('user_id');
        if(!$user_id) {
            $vars['msg'] = "you should login";
            $this->load->view('alert/alert',$vars);
            return;
        }
        $thread_id = $this->uri->segment(3);
        $vars['thread'] = $this->threadhandler->get($thread_id);
        $vars['data'] = $this->threadhandler->GetFollowers($thread_id);
        $this->load->view('thread/listusers', $vars);
    }

    function usersearch()
    {
        $user_id = $this->session->userdata('user_id');
        if(!$user_id) {
            $vars['msg'] = "you should login";
            $this->load->view('alert/alert',$vars);
            return;
        }
        $thread_id = $this->uri->segment(3);
        $search = $this->input->post('search');
        $vars['thread'] = $this->threadhandler->Get($thread_id);
        $vars['data'] = $this->userhandler->Search($search);
        $this->load->view('thread/ajax/searchuser', $vars);
    }

    function markread()
    {
        $user_id = $this->session->userdata('user_id');
        if(!$user_id) {
            $vars['msg'] = "you should login";
            $this->load->view('alert/alert',$vars);
            return;
        }
        $thread_id = $this->uri->segment(3);
        $this->threadhandler->markAsRead($thread_id, $user_id);
    }
}
?>
