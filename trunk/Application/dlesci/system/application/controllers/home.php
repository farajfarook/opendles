<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of home
 *
 * @author Faraj
 */
class Home extends Controller
{
    function Home()
    {
        parent::Controller();
        $this->configdles->set('class_resource', 'resource/class/');
        $this->configdles->set('red5_server', $_SERVER['HTTP_HOST']);
        $this->configdles->set('red5_port', "443");
        $this->configdles->set('red5_application', "dlesma");
        $this->configdles->set('red5_protocol', "rtmp");
    }

    function index()
    {
        $user_id = $this->session->userdata('user_id');
        if(!$user_id)
        {
            $this->load->view('main');
            return;
        }
        $vars['user_id'] = $user_id;
        $vars['data'] = $this->userhandler->get($user_id);
        $vars['red5arr'] = array (
                                'protocol'=> $this->configdles->get('red5_protocol'),
                                'host'=>$this->configdles->get('red5_server'),
                                'port'=>$this->configdles->get('red5_port'),
                                'app'=>$this->configdles->get('red5_application'),
                                'user_id'=>$user_id,
                                'auth_str'=>$this->mediaapplication->putcam($user_id)
                            );

        $this->load->view('home',$vars);
    }
}
?>
