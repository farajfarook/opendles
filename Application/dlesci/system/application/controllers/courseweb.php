<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of courseweb
 *
 * @author Faraj
 */
class Courseweb extends Controller
{
    function index()
    {
        $user_id = $this->session->userdata('user_id');
        if(!$user_id) {
            $vars['msg'] = "you should login";
            $this->load->view('alert/alert',$vars);
            return;
        }
        $cid = $this->uri->segment(3);
        $vars['data'] = $this->coursewebhandler->GetByClass($cid);
        $vars['class'] = $this->classhandler->GetByID($cid);
        if($this->classhandler->IsClassOwnedBy($cid, $user_id))
        {
            $this->load->view('courseweb/lecturer',$vars);
        }
        else
        {
            $this->load->view('courseweb/student',$vars);
        }
    }

    function discription()
    {
        $user_id = $this->session->userdata('user_id');
        if(!$user_id) {
            $vars['msg'] = "you should login";
            $this->load->view('alert/alert',$vars);
            return;
        }
        $cid = $this->uri->segment(3);
        $vars['isOwner'] = $this->classhandler->IsClassOwnedBy($cid, $user_id);
        $vars['data'] = $this->coursewebhandler->GetByClass($cid);
        $vars['class'] = $this->classhandler->GetByID($cid);
        $this->load->view('courseweb/sub/discription',$vars);
    }

    function news()
    {
        $user_id = $this->session->userdata('user_id');
        if(!$user_id) {
            $vars['msg'] = "you should login";
            $this->load->view('alert/alert',$vars);
            return;
        }
        $cid = $this->uri->segment(3);
        $vars['isOwner'] = $this->classhandler->IsClassOwnedBy($cid, $user_id);
        $vars['data'] = $this->coursewebhandler->GetByClass($cid);
        $vars['class'] = $this->classhandler->GetByID($cid);
        $this->load->view('courseweb/sub/news',$vars);
    }

    function events()
    {
        $user_id = $this->session->userdata('user_id');
        if(!$user_id) {
            $vars['msg'] = "you should login";
            $this->load->view('alert/alert',$vars);
            return;
        }
        $cid = $this->uri->segment(3);
        $vars['isOwner'] = $this->classhandler->IsClassOwnedBy($cid, $user_id);
        $vars['data'] = $this->coursewebhandler->GetByClass($cid);
        $vars['class'] = $this->classhandler->GetByID($cid);
        $this->load->view('courseweb/sub/events',$vars);
    }


    function discriptionedit()
    {
        $user_id = $this->session->userdata('user_id');
        if(!$user_id) {
            $vars['msg'] = "you should login";
            $this->load->view('alert/alert',$vars);
            return;
        }
        $cid = $this->uri->segment(3);
        $vars['isOwner'] = $this->classhandler->IsClassOwnedBy($cid, $user_id);
        $vars['data'] = $this->coursewebhandler->GetByClass($cid);
        $vars['class'] = $this->classhandler->GetByID($cid);
        if($this->classhandler->IsClassOwnedBy($cid, $user_id))
            $this->load->view('courseweb/sub/discriptionedit',$vars);
        else
            $this->load->view('courseweb/sub/discription',$vars);
    }

    function newsedit()
    {
        $user_id = $this->session->userdata('user_id');
        if(!$user_id) {
            $vars['msg'] = "you should login";
            $this->load->view('alert/alert',$vars);
            return;
        }
        $cid = $this->uri->segment(3);
        $vars['isOwner'] = $this->classhandler->IsClassOwnedBy($cid, $user_id);
        $vars['data'] = $this->coursewebhandler->GetByClass($cid);
        $vars['class'] = $this->classhandler->GetByID($cid);
        if($this->classhandler->IsClassOwnedBy($cid, $user_id))
            $this->load->view('courseweb/sub/newsedit',$vars);
        else
            $this->load->view('courseweb/sub/news',$vars);
    }

    function eventsedit()
    {
        $user_id = $this->session->userdata('user_id');
        if(!$user_id) {
            $vars['msg'] = "you should login";
            $this->load->view('alert/alert',$vars);
            return;
        }
        $cid = $this->uri->segment(3);
        $vars['isOwner'] = $this->classhandler->IsClassOwnedBy($cid, $user_id);
        $vars['data'] = $this->coursewebhandler->GetByClass($cid);
        $vars['class'] = $this->classhandler->GetByID($cid);
        if($this->classhandler->IsClassOwnedBy($cid, $user_id))
            $this->load->view('courseweb/sub/eventsedit',$vars);
        else
            $this->load->view('courseweb/sub/events',$vars);
    }


    function discriptionsave()
    {
        $user_id = $this->session->userdata('user_id');
        if(!$user_id) {
            $vars['msg'] = "you should login";
            $this->load->view('alert/alert',$vars);
            return;
        }
        $cid = $this->uri->segment(3);
        $data = $this->input->post('data');
        
        $vars['isOwner'] = $this->classhandler->IsClassOwnedBy($cid, $user_id);
        $vars['data'] = $this->coursewebhandler->GetByClass($cid);
        $vars['class'] = $this->classhandler->GetByID($cid);
        if($data)
            $vars['data'] = $this->coursewebhandler->Update($vars['data']->id, $data, null, null);
        
        $this->load->view('courseweb/sub/discription',$vars);
    }

    function newssave()
    {
        $user_id = $this->session->userdata('user_id');
        if(!$user_id) {
            $vars['msg'] = "you should login";
            $this->load->view('alert/alert',$vars);
            return;
        }
         $cid = $this->uri->segment(3);
        $data = $this->input->post('data');
        $vars['isOwner'] = $this->classhandler->IsClassOwnedBy($cid, $user_id);
        $vars['data'] = $this->coursewebhandler->GetByClass($cid);
        $vars['class'] = $this->classhandler->GetByID($cid);
        if($data)
            $vars['data'] = $this->coursewebhandler->Update($vars['data']->id, null, $data, null);
        
        $this->load->view('courseweb/sub/news',$vars);
    }

    function eventssave()
    {
        $user_id = $this->session->userdata('user_id');
        if(!$user_id) {
            $vars['msg'] = "you should login";
            $this->load->view('alert/alert',$vars);
            return;
        }
        $cid = $this->uri->segment(3);
        $data = $this->input->post('data');
        $vars['isOwner'] = $this->classhandler->IsClassOwnedBy($cid, $user_id);
        $vars['data'] = $this->coursewebhandler->GetByClass($cid);
        $vars['class'] = $this->classhandler->GetByID($cid);
        $vars['data'] = $this->coursewebhandler->Update($vars['data']->id, null, null, $data);
        if($data)
            $this->load->view('courseweb/sub/events',$vars);
    }
}
?>
