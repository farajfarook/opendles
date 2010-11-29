<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of chat
 *
 * @author Faraj
 */
class Chat extends Controller
{
    function Chat()
    {
        parent::Controller();
    }

    function index()
    {
        
    }

    function chatitem()
    {
        $user_id = $this->session->userdata('user_id');
        if(!$user_id)
        {
            $vars['msg'] = "you should login to view your friends";
            $this->load->view('alert/alert',$vars);
            return;
        }
        $ruser_id = $this->uri->segment(3);
        if($this->friendhandler->IsFriend($user_id, $ruser_id))
        {
            $vars['chatitem'] = array (
                                'protocol'=>$this->configdles->get('red5_protocol'),
                                'host'=>$this->configdles->get('red5_server'),
                                'port'=>$this->configdles->get('red5_port'),
                                'app'=>$this->configdles->get('red5_application'),
                                'user_id'=>$user_id,
                                'auth_str'=>$this->mediaapplication->getcam($user_id, $ruser_id),
                                'ruser_id'=>$ruser_id
                            );
            $vars['data'] = $this->userhandler->get($ruser_id);
            $this->load->view('chat/ajax/chatitem', $vars);
        }
    }

    function chatlist()
    {
        $user_id = $this->session->userdata('user_id');
        if(!$user_id)
        {
            $vars['msg'] = "you should login to view your friends";
            $this->load->view('alert/alert',$vars);
            return;
        }
        $vars['list'] = $this->friendhandler->GetFriendList($user_id);
        $this->load->view('chat/ajax/chatlist',$vars);
    }

    function text()
    {
        $user_id = $this->session->userdata('user_id');
        if(!$user_id)
        {
            $vars['msg'] = "you should login to view your friends";
            $this->load->view('alert/alert',$vars);
            return;
        }
        echo "data on off";
    }
}
?>
