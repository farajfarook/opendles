<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
*/

/**
 * Description of class
 *
 * @author Faraj
 */
class Classroom extends Controller {
    //put your code here
    function Classroom() {
        parent::Controller();
    }

    function index() {

        $user_id = $this->session->userdata('user_id');
        if(!$user_id) {
            $vars['msg'] = "you should login";
            $this->load->view('alert/alert',$vars);
            return;
        }
        $this->load->view('classroom/index');
    }

    function newclass() {
        $user_id = $this->session->userdata('user_id');
        if(!$user_id) {
            $vars['msg'] = "you should login";
            $this->load->view('alert/alert',$vars);
            return;
        }
        $step = $this->uri->segment(3);
        switch ($step) {
            case 0:
                $this->load->view('classroom/newclass/step'.$step);
                break;
            case 1:
                $vars['data'] = $this->classmajorhandler->Get();
                $this->load->view('classroom/newclass/step'.$step,$vars);
                break;
            case 2:
                $title = $this->input->post('title');
                $classmajor = $this->input->post('classmajor');
                if($title&&$classmajor) {
                    $cw = $this->coursewebhandler->Create('no discription', 'no news', 'no events');
                    $cls = $this->classhandler->CreateClass($title, $classmajor, $user_id, $cw->id);
                    //feed/////////////////////////////////////////////////////
                    $this->feedhandler->addclassfeed($cls->id);
                    //////////////////////////////////////////////////////////
                    $vars['msg'] = 'class created successfully';
                    $this->load->view('classroom/newclass/step'.$step,$vars);
                }
                else {
                    $vars['msg'] = 'class creation error!';
                    $this->load->view('classroom/newclass/step2',$vars);
                }
                break;
        }
    }

    function ownlist() {
        $user_id = $this->session->userdata('user_id');
        if(!$user_id) {
            $vars['msg'] = "you should login";
            $this->load->view('alert/alert',$vars);
            return;
        }
        $page = $this->uri->segment(3);
        if(!$page) $page = 0;
        if($page<0) $page = 0;
        $vars['myclasslist'] = $this->classhandler->GetClassesOwnBy($user_id,10*$page);
        $this->load->view('classroom/newclass/list', $vars);
    }

    function view() {
        $user_id = $this->session->userdata('user_id');
        if(!$user_id) {
            $vars['msg'] = "you should login";
            $this->load->view('alert/alert',$vars);
            return;
        }

        $cid = $this->uri->segment(3);
        $vars['data'] = $this->classhandler->GetByID($cid);
        if($this->classhandler->IsClassOwnedBy($cid,$user_id))
        {
            $this->load->view('classroom/view/lecturerportal', $vars);
            return;
        }
        if(!$this->classhandler->IsSubscribedConfirmed($cid, $user_id))
        {
            $vars['requestable'] = false;
            $vars['pending'] = false;
            if($this->classhandler->IsStudentApprovalPending($cid, $user_id))
            {
                $vars['msg'] = "Your havn't approve the invitation sent to you";
            }
            else if($this->classhandler->IsLecturerApprovalPending($cid, $user_id))
            {
                $vars['msg'] = "Your subcription is pending for approval";
                $vars['pending'] = true;
            }
            else
            {
                $vars['msg'] = "Your havent subscribed for this class";
                $vars['requestable'] = true;
                $vars['pending'] = true;
            }
            $this->load->view('classroom/view/confirmation', $vars);
            return;
        }

        $vars['lecturer_cam'] = array (
                'protocol'=>$this->configdles->get('red5_protocol'),
                'host'=>$this->configdles->get('red5_server'),
                'port'=>$this->configdles->get('red5_port'),
                'app'=>$this->configdles->get('red5_application'),
                'user_id'=>$user_id,
                'auth_str'=>$this->mediaapplication->getcam($user_id, $vars['data']->class_owner_id),
                'ruser_id'=>$vars['data']->class_owner_id
        );

        $vars['lecturer'] = $this->userhandler->get($vars['data']->class_owner_id);
        $this->load->view('classroom/view/studentportal', $vars);
    }

    function featuringlistcontainer() {
        $vars['data'] = $this->classmajorhandler->Get();
        $this->load->view('classroom/featuring/listcol', $vars);
    }

    function featuringlist() {
        $major_id = $this->uri->segment(3);
        $vars['data'] = $this->classhandler->GetByMajor($major_id);
        $this->load->view('classroom/featuring/list', $vars);
    }

    function whiteboard()
    {
        $user_id = $this->session->userdata('user_id');
        if(!$user_id) {
            $vars['msg'] = "you should login";
            $this->load->view('alert/alert',$vars);
            return;
        }
        $cid = $this->uri->segment(3);
        $cls = $this->classhandler->GetByID($cid);

        $vars['data'] = array (
                    'protocol'=>$this->configdles->get('red5_protocol'),
                    'host'=>$this->configdles->get('red5_server'),
                    'port'=>$this->configdles->get('red5_port'),
                    'app'=>$this->configdles->get('red5_application'),
                    'user_id'=>$user_id,
                    'auth_str'=>$this->mediaapplication->enWB($user_id, $cid),
                    'class_id'=>$cid
        );
        $vars['isOwner'] = $this->classhandler->IsClassOwnedBy($cid, $user_id);
        $vars['cid'] = $cid;
        $this->load->view('classroom/view/sub/whiteboard', $vars);
    }

    function students()
    {
        $user_id = $this->session->userdata('user_id');
        if(!$user_id) {
            $vars['msg'] = "you should login";
            $this->load->view('alert/alert',$vars);
            return;
        }
        $cid = $this->uri->segment(3);
        $vars['cid'] = $cid;
        $this->load->view('classroom/view/sub/students',$vars);
    }

    function studentsearch()
    {
        $user_id = $this->session->userdata('user_id');
        if(!$user_id)
        {
            $vars['msg'] = "you should login to search friends";
            $this->load->view('alert/alert',$vars);
            return;
        }
        $cid = $this->uri->segment(3);
        $name = $this->input->post('search');
        $vars['data'] = $this->userhandler->Search($name);
        $vars['cid'] = $cid;
        $this->load->view('classroom/view/ajax/search', $vars);
    }

    function requeststudent()
    {
        $user_id = $this->session->userdata('user_id');
        if(!$user_id)
        {
            $vars['msg'] = "you should login to search friends";
            $this->load->view('alert/alert',$vars);
            return;
        }

        $cid = $this->uri->segment(4);
        $userid = $this->uri->segment(3);
        $this->classhandler->EnrollUser($cid, $userid);
        $this->classhandler->ConfirmEnroll($cid, $userid, 0, 1);
        $this->load->view('alert/msg',array("msg"=>"added"));
    }

    function classsubscribe()
    {
        $user_id = $this->session->userdata('user_id');
        if(!$user_id)
        {
            $vars['msg'] = "you should login to search friends";
            $this->load->view('alert/alert',$vars);
            return;
        }
        $this->load->view('classroom/subscribe/index');
    }

    function searchclassroom()
    {

        $user_id = $this->session->userdata('user_id');
        if(!$user_id)
        {
            $vars['msg'] = "you should login to search class";
            $this->load->view('alert/alert',$vars);
            return;
        }
        $name = $this->input->post('search');
        $vars['data'] = $this->classhandler->Search($name);
        $this->load->view('classroom/subscribe/ajax/search',$vars);
    }

    function studentapprove()
    {
        $user_id = $this->session->userdata('user_id');
        if(!$user_id)
        {
            $vars['msg'] = "you should login to search class";
            $this->load->view('alert/alert',$vars);
            return;
        }
        $cid = $this->uri->segment(3);
        $this->classhandler->ConfirmEnroll($cid, $user_id,true,true);

        //NOTIFICATION/////////////////////////////////////////////////////////////
        $class = $this->classhandler->GetByID($cid);
        $student = $this->userhandler->get($user_id);
        $this->notificationhandler->notify_student_about_class_subscribe($user_id, $class);
        $this->notificationhandler->notify_lecturer_about_student_subscribe($class->class_owner_id, $student, $class);
        ///////////////////////////////////////////////////////////////////////////
        $vars['cid'] = $cid;
        $this->load->view('classroom/view/ajax/loadclass',$vars);
    }

    function studentrequest()
    {
        $user_id = $this->session->userdata('user_id');
        if(!$user_id)
        {
            $vars['msg'] = "you should login to search class";
            $this->load->view('alert/alert',$vars);
            return;
        }
        $cid = $this->uri->segment(3);
        $this->classhandler->EnrollUser($cid, $user_id);
        $this->classhandler->ConfirmEnroll($cid, $user_id,true,false);
        //NOTIFICATION/////////////////////////////////////////////////////////////
        $class = $this->classhandler->GetByID($cid);
        $student = $this->userhandler->get($user_id);
        $this->notificationhandler->notify_lecturer_about_student_request($class->class_owner_id, $student, $class);
        ///////////////////////////////////////////////////////////////////////////
        $vars['cid'] = $cid;
        $this->load->view('classroom/view/ajax/loadclass',$vars);
    }

    function requestremove()
    {
        $user_id = $this->session->userdata('user_id');
        if(!$user_id) {
            $vars['msg'] = "you should login";
            $this->load->view('alert/alert',$vars);
            return;
        }
        $cid = $this->uri->segment(3);
        $userid = $this->uri->segment(4);
        $this->classhandler->RemoveSubscription($userid, $cid);
        $this->load->view('classroom/subscribe/ajax/delete');
    }

    function deleterecieve()
    {
        $this->requestremove();
    }

    function deletesent()
    {
        $this->requestremove();
    }


    function deletelist()
    {
        $this->requestremove();
    }

    function requestaccept()
    {
        $user_id = $this->session->userdata('user_id');
        if(!$user_id) {
            $vars['msg'] = "you should login";
            $this->load->view('alert/alert',$vars);
            return;
        }
        $cid = $this->uri->segment(3);
        $userid = $this->uri->segment(4);
        $vars['list'] = $this->classhandler->ConfirmEnroll($cid,$userid,true,true);
        //NOTIFICATION/////////////////////////////////////////////////////////////
        $class = $this->classhandler->GetByID($cid);
        $student = $this->userhandler->get($userid);
        $this->notificationhandler->notify_student_about_class_subscribe($userid, $class);
        $this->notificationhandler->notify_lecturer_about_student_subscribe($class->class_owner_id, $student, $class);
        ///////////////////////////////////////////////////////////////////////////
        $this->load->view('alert/msg',array("msg"=>"Approved"),$vars);
    }

    function studentclassmain()
    {
        $user_id = $this->session->userdata('user_id');
        if(!$user_id) {
            $vars['msg'] = "you should login";
            $this->load->view('alert/alert',$vars);
            return;
        }

        $cid = $this->uri->segment(3);
        $vars['data'] = $this->classhandler->GetByID($cid);
        
        $vars['scr_data'] = array (
                'protocol'=>$this->configdles->get('red5_protocol'),
                'host'=>$this->configdles->get('red5_server'),
                'port'=>$this->configdles->get('red5_port'),
                'app'=>$this->configdles->get('red5_application'),
                'user_id'=>$user_id,
                'auth_str'=>$this->mediaapplication->getscr($user_id,$vars['data']->id),
                'class_id'=>$vars['data']->id
        );

        $vars['wb_data'] = array (
                'protocol'=>$this->configdles->get('red5_protocol'),
                'host'=>$this->configdles->get('red5_server'),
                'port'=>$this->configdles->get('red5_port'),
                'app'=>$this->configdles->get('red5_application'),
                'user_id'=>$user_id,
                'auth_str'=>$this->mediaapplication->enWB($user_id, $vars['data']->id),
                'class_id'=>$vars['data']->id
        );

        $vars['lecturer'] = $this->userhandler->get($vars['data']->class_owner_id);

        $this->load->view('classroom/view/ajax/studentclassmain', $vars);
    }

    function setting()
    {
        $user_id = $this->session->userdata('user_id');
        if(!$user_id) {
            $vars['msg'] = "you should login";
            $this->load->view('alert/alert',$vars);
            return;
        }
        $cid = $this->uri->segment(3);
        $vars['data'] = $this->classhandler->GetByID($cid);
        
        $vars['scr_pub'] = array (
                'protocol'=>$this->configdles->get('red5_protocol'),
                'host'=>$this->configdles->get('red5_server'),
                'port'=>$this->configdles->get('red5_port'),
                'app'=>$this->configdles->get('red5_application'),
                'user_id'=>$user_id,
                'auth_str'=>$this->mediaapplication->putscr($user_id, $vars['data']->id),
                'class_id'=>$vars['data']->id
                );
        $this->load->view('classroom/setting/index',$vars);
    }

    function archivevideo()
    {
        $user_id = $this->session->userdata('user_id');
        if(!$user_id) {
            $vars['msg'] = "you should login";
            $this->load->view('alert/alert',$vars);
            return;
        }
        $cid = $this->uri->segment(3);
        $vars['data'] = $this->classhandler->GetByID($cid);
        $vars['scr_sub'] = array (
                'protocol'=>$this->configdles->get('red5_protocol'),
                'host'=>$this->configdles->get('red5_server'),
                'port'=>$this->configdles->get('red5_port'),
                'app'=>$this->configdles->get('red5_application'),
                'user_id'=>$user_id,
                'auth_str'=>$this->mediaapplication->getscr($user_id, $vars['data']->id),
                'class_id'=>$vars['data']->id
                );
        $this->load->view('classroom/ajax/video',$vars);
    }


    function mysubscribedlistcontent()
    {
        $user_id = $this->session->userdata('user_id');
        if(!$user_id) {
            $vars['msg'] = "you should login";
            $this->load->view('alert/alert',$vars);
            return;
        }
        $page = $this->uri->segment(3);
        if(!$page) $page = 0;
        if($page<0) $page = 0;
        $vars['user_id'] =$user_id;
        $vars['list'] = $this->classhandler->GetEnrolledBy($user_id,1,1,10*$page);
        $vars['page'] = $page;
        $this->load->view('classroom/subscribe/ajax/mysubscribedlistcontent',$vars);
    }

    function mysubscriptionsentcontent()
    {
        $user_id = $this->session->userdata('user_id');
        if(!$user_id) {
            $vars['msg'] = "you should login";
            $this->load->view('alert/alert',$vars);
            return;
        }
        $page = $this->uri->segment(3);
        if(!$page) $page = 0;
        if($page<0) $page = 0;
        $vars['user_id'] =$user_id;
        $vars['sent'] = $this->classhandler->GetEnrolledBy($user_id,1,0,10*$page);
        $vars['page'] = $page;
        $this->load->view('classroom/subscribe/ajax/mysubscriptionsentcontent',$vars);
    }

    function myinvitationrecievedcontent()
    {
        $user_id = $this->session->userdata('user_id');
        if(!$user_id) {
            $vars['msg'] = "you should login";
            $this->load->view('alert/alert',$vars);
            return;
        }
        $page = $this->uri->segment(3);
        if(!$page) $page = 0;
        if($page<0) $page = 0;
        $vars['user_id'] =$user_id;
        $vars['recieve'] = $this->classhandler->GetEnrolledBy($user_id,0,1,10*$page);
        $vars['page'] = $page;
        $this->load->view('classroom/subscribe/ajax/myinvitationrecievedcontent',$vars);
    }

    function classroomlist()
    {
        $user_id = $this->session->userdata('user_id');
        if(!$user_id) {
            $vars['msg'] = "you should login";
            $this->load->view('alert/alert',$vars);
            return;
        }
        $cid = $this->uri->segment(3);
        $page = $this->uri->segment(4);
        if(!$page) $page = 0;
        if($page<0) $page = 0;
        $vars['cid'] = $cid;
        $vars['page'] = $page;
        $vars['list'] = $this->classhandler->GetClassStudentsApproved($cid,10*$page);
        $this->load->view('classroom/view/sub/student/classroomlist',$vars);
    }

    function classroomrecieved()
    {
        $user_id = $this->session->userdata('user_id');
        if(!$user_id) {
            $vars['msg'] = "you should login";
            $this->load->view('alert/alert',$vars);
            return;
        }
        $cid = $this->uri->segment(3);
        $page = $this->uri->segment(4);
        if(!$page) $page = 0;
        if($page<0) $page = 0;
        $vars['cid'] = $cid;
        $vars['page'] = $page;
        $vars['recieve'] = $this->classhandler->GetClassRequestRecieved($cid,10*$page);
        $this->load->view('classroom/view/sub/student/classroomrecieved',$vars);
    }

    function classroomsent()
    {
        $user_id = $this->session->userdata('user_id');
        if(!$user_id) {
            $vars['msg'] = "you should login";
            $this->load->view('alert/alert',$vars);
            return;
        }
        $cid = $this->uri->segment(3);
        $page = $this->uri->segment(4);
        if(!$page) $page = 0;
        if($page<0) $page = 0;
        $vars['cid'] = $cid;
        $vars['page'] = $page;
        $vars['sent'] = $this->classhandler->GetClassRequestSent($cid,10*$page);
        $this->load->view('classroom/view/sub/student/classroomsent',$vars);
    }
}
?>
