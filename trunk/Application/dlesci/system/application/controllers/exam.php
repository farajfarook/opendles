<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of exam
 *
 * @author Faraj
 */
class Exam extends Controller
{
    function Exam()
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
        $cid = $this->uri->segment(3);
        $classroom = $this->classhandler->GetByID($cid);
        $vars['classroom'] = $classroom;
        $vars['exams'] = $this->examhandler->get($cid);
        $this->load->view('exam/view/index',$vars);
    }

    function admin()
    {
        $user_id = $this->session->userdata('user_id');
        if(!$user_id)
        {
            $vars['msg'] = "you should login to view your friends";
            $this->load->view('alert/alert',$vars);
            return;
        }
        $cid = $this->uri->segment(3);
        $classroom = $this->classhandler->GetByID($cid);
        if($classroom->class_owner_id == $user_id)
        {
            $vars['classroom'] = $classroom;
            $vars['exams'] = $this->examhandler->get($cid);
            $this->load->view('exam/admin/index',$vars);
        }
    }

     function showcreateexam(){
        $user_id = $this->session->userdata('user_id');
        if(!$user_id)
        {
            $vars['msg'] = "you should login to view your friends";
            $this->load->view('alert/alert',$vars);
            return;
        }
        $vars['cid'] = $this->uri->segment(3);
        $this->load->view("exam/admin/createexam",$vars);
    }

    function createexam(){
       $name = $this->input->post('name');
       $qcount = $this->input->post('qcount');
       $cid = $this->input->post('cid');
       if($name&&$qcount&&$cid&&is_numeric($qcount))
       {
           $vars['exam'] = $this->examhandler->createExam($name, $qcount, $cid);
           $this->load->view('exam/admin/createresponse', $vars);
           return;
       }
       else
       {
           $vars['cid'] = $cid;
           $this->load->view('exam/admin/createexam',$vars);
           return;
       }
    }

    function showexam()
    {
        $user_id = $this->session->userdata('user_id');
        if(!$user_id)
        {
            $vars['msg'] = "you should login";
            $this->load->view('alert/alert',$vars);
            return;
        }
        $eid = $this->uri->segment(3);
        $vars['exam'] = $this->examhandler->getByID($eid);
        $this->load->view('exam/admin/createresponse',$vars);
    }

    function deleteexam()
    {
        $user_id = $this->session->userdata('user_id');
        if(!$user_id)
        {
            $vars['msg'] = "you should login";
            $this->load->view('alert/alert',$vars);
            return;
        }
        $eid = $this->uri->segment(4);
        $this->examhandler->removeExam($eid);
        $vars['msg'] = "removed";
        $this->load->view('alert/msg',$vars);
    }

    function showeditexam()
    {
        $user_id = $this->session->userdata('user_id');
        if(!$user_id)
        {
            $vars['msg'] = "you should login";
            $this->load->view('alert/alert',$vars);
            return;
        }
        $eid = $this->uri->segment(3);
        $vars['exam'] = $this->examhandler->getByID($eid);
        $this->load->view('exam/admin/editexam',$vars);
    }

    function editexam()
    {
       $name = $this->input->post('name');
       $qcount = $this->input->post('qcount');
       $cid = $this->input->post('cid');
       $eid = $this->input->post('eid');
       if($name&&$qcount&&$cid&&$eid&&is_numeric($qcount))
       {
           $this->examhandler->editExam($eid,$name,$qcount);
       }
       $vars['exam'] = $this->examhandler->getByID($eid);
       $this->load->view('exam/admin/createresponse', $vars);
    }

    function openexam()
    {
       $eid = $this->uri->segment(3);
       $vars['exam'] = $this->examhandler->getByID($eid);
       $this->load->view('exam/admin/createresponse', $vars);
    }
}
?>
