<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of doubt
 *
 * @author Faraj
 */
class Doubt extends Controller
{
    function Doubt()
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
        $vars['cid'] = $this->uri->segment(3);
        $this->load->view('classroom/doubt/index',$vars);
    }

    function ask()
    {
        $user_id = $this->session->userdata('user_id');
        if(!$user_id)
        {
            $vars['msg'] = "you should login to view your friends";
            $this->load->view('alert/alert',$vars);
            return;
        }   
        $cid = $this->uri->segment(3);
        $msg = $this->input->post('doubt');

        $vars['data'] = $this->doubthandler->ask($user_id, $cid, $msg);
        $this->load->view('classroom/doubt/ack', $vars);
    }

    function remove()
    {
        $user_id = $this->session->userdata('user_id');
        if(!$user_id)
        {
            $vars['msg'] = "you should login to view your friends";
            $this->load->view('alert/alert',$vars);
            return;
        }

        $did = $this->uri->segment(3);
        $this->doubthandler->remove($did);
        $this->load->view('alert/msg', array("msg"=>"removed"));
    }

    function review()
    {
        $user_id = $this->session->userdata('user_id');
        if(!$user_id)
        {
            $vars['msg'] = "you should login to view your friends";
            $this->load->view('alert/alert',$vars);
            return;
        }
        $cid = $this->uri->segment(3);
        $vars['data'] = $this->doubthandler->get($cid);
        $this->load->view('classroom/doubt/review', $vars);
        
    }
}
?>
