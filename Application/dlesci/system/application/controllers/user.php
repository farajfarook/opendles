<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of user
 *
 * @author Faraj
 */
class User extends Controller
{
    function User()
    {
        parent::Controller();
    }

    function login()
    {
        $email = $this->input->post('username');
        $password = $this->input->post('password');
        if($email&&$password)
        {
            $data = $this->userhandler->Login($email, $password);
            if(!$data)
            {
                $vars['msg'] = "login failed";
                $this->load->view('main',$vars);
                return;
            }
            else
            {
                $this->session->set_userdata('user_id', $data->id);
            }
        }
        redirect('home');
    }


    function logout()
    {
        $this->session->unset_userdata('user_id');
        redirect('home');
    }

    function availability()
    {
        $email = $this->input->post('email');
        if($email)
        {
            $vars['available'] = !$this->userhandler->IsAlreadyRegistered($email);
            $this->load->view('user/ajax/availability', $vars);
        }
    }

    function register()
    {
        $fname = $this->input->post('fname');
        $lname = $this->input->post('lname');
        $sex = $this->input->post('sex');
        $day = $this->input->post('day');
        $month = $this->input->post('month');
        $year = $this->input->post('year');
        $phone = $this->input->post('pnumber');
        $email = $this->input->post('email');
        $password = $this->input->post('pass');
        $cpassword = $this->input->post('cpass');

        if($fname&&$lname&&$sex&&$day&&$month&&$year&&$phone&&$email&&$password&&$cpassword)
        {
            if($this->userhandler->IsAlreadyRegistered($email))
            {
                $vars['msg'] = "email already registered";
                $this->load->view('user/registration/msg', $vars);
                return;
            }
            else
            {
                $birthday = "$year-$month-$day";
                $data = $this->userhandler->Register($email, $fname, $lname, $sex, $password,$phone,$birthday);
                $this->session->set_userdata('user_id', $data->id);
                $this->login();
            }
        }
        else
        {

           $vars['msg'] = "required field not filled ".$fname."_".$lname."_".$sex."_".$day."_".$month."_".$year."_".$phone."_".$email."_".$password."_".$cpassword;
           $this->load->view('user/registermsg', $vars);
           return;
        }
    }

    function photo()
    {
        $user_id = $this->uri->segment(3);
        $user = $this->userhandler->get($user_id);
        $vars['type'] = 'image/png';
        $vars['image'] = $user->profile_pic;
        $this->load->view('image', $vars);
    }

    function thumb()
    {
        $user_id = $this->uri->segment(3);
        $user = $this->userhandler->get($user_id);
        $vars['type'] = 'image/png';
        $vars['image'] = $user->thumb;
        $this->load->view('image', $vars);
    }
}
?>
