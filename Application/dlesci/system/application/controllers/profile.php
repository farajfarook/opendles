<?php
/**
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of profile
 *
 * @author Faraj
 */
class Profile extends Controller
{
    function Profile()
    {
        parent::Controller();
    }

    function index()
    {
        $user_id = $this->session->userdata('user_id');
        if(!$user_id)
        {
            $vars['msg'] = "you should login to view your profile";
            $this->load->view('alert/alert',$vars);
            return;
        }
        $vars['isme'] = true;
        $vars['data'] = $this->userhandler->get($user_id);
        $this->load->view('profile/index',$vars);       
    }

    function show()
    {
        $user_id = $this->session->userdata('user_id');
        if(!$user_id)
        {
            $vars['msg'] = "you should login to view profile";
            $this->load->view('alert/alert',$vars);
            return;
        }

        $user = $this->uri->segment(3);
        $vars['isfriend'] = $this->friendhandler->IsFriend($user, $user_id);
        $vars['isme'] = false;
        if($vars['isfriend'])
            $vars['friendrequestpending'] = false;
        else
            $vars['friendrequestpending'] = $this->friendhandler->IsFriendRequested($user, $user_id);
        $vars['data'] = $this->userhandler->get($user);
        $this->load->view('profile/index',$vars);
    }
    function view()
    {
        $user_id = $this->session->userdata('user_id');
        if(!$user_id)
        {
            $vars['msg'] = "you should login to view profile";
            $this->load->view('alert/alert',$vars);
            return;
        }

        $user = $this->uri->segment(3);
        $vars['data'] = $this->userhandler->get($user);
        $this->load->view('profile/quickview',$vars);
    }

    function edit()
    {
        $user_id = $this->session->userdata('user_id');
        if(!$user_id)
        {
            $vars['msg'] = "you should login to view your profile";
            $this->load->view('alert/alert',$vars);
            return;
        }
        $vars['data'] = $this->userhandler->get($user_id);
        $this->load->view('profile/edit', $vars);
    }

    function updateall()
    {
        $type =$this->uri->segment(3);
        $user_id = $this->session->userdata('user_id');
        if(!$user_id)
        {
            $vars['msg'] = "you should login to view your profile";
            $this->load->view('alert/alert',$vars);
            return;
        }
        $data = $this->userhandler->get($user_id); 
        $fname = $this->input->post('fname');
        $lname = $this->input->post('lname');
        $sex = $this->input->post('sex');
        $day = $this->input->post('day');
        $month = $this->input->post('month');
        $year = $this->input->post('year');
        $phone = $this->input->post('phone');
        
        if(!$fname) $fname = null;
        if(!$lname) $lname = null;
        if(!$sex) $sex = null;
        if($day&&$month&&$year)
            $date = "$year-$month-$day";
        else
            $date = null;
        if(!$phone) $phone = null;
        $vars['data'] = $this->userhandler->Update($user_id, $fname, $lname, $sex
                                    , $date, $phone, null);
        $vars['type'] = $type;
        $vars['msg'] = "changed!";
        $this->load->view('profile/ajax/edit', $vars);
    }

    function profilepic()
    {
        $user_id = $this->session->userdata('user_id');
        if(!$user_id)
        {
            $vars['msg'] = "you should login to view your profile";
            $this->load->view('alert/alert',$vars);
            return;
        }
        $userid = $this->uri->segment(3);
        $user = $this->userhandler->get($userid);
        $vars['type'] = 'image/png';
        $vars['image'] = $user->profile_pic;
        $this->load->view('image', $vars);
    }

    function updatepassword()
    {
        $user_id = $this->session->userdata('user_id');
        if(!$user_id)
        {
            $vars['msg'] = "you should login to view your profile";
            $this->load->view('alert/alert',$vars);
            return;
        }
        $pass= $this->input->post('password');
        $cpass= $this->input->post('cpassword');
        if($cpass&&$pass)
        {
            if($pass == $cpass)
            {
                $vars['msg'] = "password changed!";
                $vars['data'] = $this->userhandler->PasswordChange($user_id, $pass);
                $this->load->view('profile/ajax/passedit', $vars);
                return;
            }
            else
            {
                $vars['msg'] = "password mismatch";
                $vars['data'] = $this->userhandler->get($user_id);
                $this->load->view('profile/ajax/passedit', $vars);
                return;
            }
        }
        else
        {
                $vars['msg'] = "";
                $vars['data'] = $this->userhandler->get($user_id);
                $this->load->view('profile/ajax/passedit', $vars);
                return;
        }
    }

    function updateemail()
    {
        $user_id = $this->session->userdata('user_id');
        if(!$user_id)
        {
            $vars['msg'] = "you should login to view your profile";
            $this->load->view('alert/alert',$vars);
            return;
        }
        
        $email = $this->input->post('email');
  
        if($email)
        {
            if(!check_email_address($email))
            {
                $vars['msg'] = "email format error";
                $vars['data'] = $this->userhandler->get($user_id);
                $this->load->view('profile/ajax/emailedit', $vars);
                return;
            }

            $vars['data'] = $this->userhandler->EmailChange($user_id, $email);

            if($vars['data'])
            {
                $vars['msg'] = "successfully updated!";
                $this->load->view('profile/ajax/emailedit', $vars);
            }
            else
            {
                $vars['msg'] = "email already excist";
                $vars['data'] = $this->userhandler->get($user_id);
                $this->load->view('profile/ajax/emailedit', $vars);
            }
        }
    }

    function updateprofilepic()
    {
        $user_id = $this->session->userdata('user_id');
        if(!$user_id)
        {
            $vars['msg'] = "you should login to view your profile";
            $this->load->view('alert/alert',$vars);
            return;
        }

        if(get_file_info($_FILES['propic']['tmp_name'], 'size') > 0)
        {
            $name = $this->uri->segment(3);

            move_uploaded_file($_FILES['propic']['tmp_name'], "temp.jpg");

            $config['image_library'] = 'gd2';
            $config['source_image'] = "temp.jpg";
            $config['create_thumb'] = TRUE;
            $config['maintain_ratio'] = TRUE;
            $config['width']	= 300;
            $config['height']	= 300;
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();
            $picdata = chunk_split(base64_encode(file_get_contents('temp_thumb.jpg')));       
            unlink('temp_thumb.jpg');

            $config1['image_library'] = 'gd2';
            $config1['source_image'] = "temp.jpg";
            $config1['create_thumb'] = TRUE;
            $config1['maintain_ratio'] = TRUE;
            $config1['width']	= 20;
            $config1['height']	= 20;
            $this->load->library('image_lib', $config1);
            $this->image_lib->resize();
            $thumbdata = chunk_split(base64_encode(file_get_contents('temp_thumb.jpg')));
            
            unlink('temp_thumb.jpg');
            unlink('temp.jpg');

            $vars['data'] = $this->userhandler->Update($user_id
                                                       , null
                                                       , null
                                                       , null
                                                       , null
                                                       , null
                                                       , $picdata
                                                       , $thumbdata);
            $vars['msg'] = $vars['msg']."changed!";
        }
        else
        {
            $vars['msg'] = "null file";
            $vars['data'] = $this->userhandler->get($user_id);
        }
        $this->load->view('profile/ajax/photoupload', $vars);
    }
}
?>
