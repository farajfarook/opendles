<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of material
 *
 * @author Faraj
 */
class Material extends Controller
{
    function Material()
    {
        parent::Controller();
    }

    function index()
    {
        $user_id = $this->session->userdata('user_id');
        if(!$user_id) {
            $vars['msg'] = "you should login";
            $this->load->view('alert/alert',$vars);
            return;
        }
        $cid = $this->uri->segment(3);
        $path = $this->configdles->get('class_resource').$cid;
        $vars['data'] = array();
        $vars['path'] = $path."/";
        $vars['isOwner'] = $this->classhandler->IsClassOwnedBy($cid, $user_id);
        $vars['cid'] = $cid;
        if(file_exists($path)&&is_dir($path))
            $vars['data'] = directory_map($path);
        $this->load->view('courseweb/sub/material', $vars);
    }

    function upload()
    {
        $user_id = $this->session->userdata('user_id');
        if(!$user_id) {
            $vars['msg'] = "you should login";
            $this->load->view('alert/alert',$vars);
            return;
        }
        $cid =  $this->uri->segment(3);

        if(get_file_info($_FILES['propic']['tmp_name'], 'size') > 0)
        {
            $name = $this->uri->segment(3);
            $folderpath = $this->configdles->get('class_resource').$cid;
            if(!(file_exists($folderpath)&&is_dir($folderpath)))
            {
                mkdir($folderpath);
            }
            $file = $folderpath."/".$_FILES['propic']['name'];
            
            for($count = 0; file_exists($file); $count++)
                $file = $folderpath."/".$count."_".$_FILES['propic']['name'];

            move_uploaded_file($_FILES['propic']['tmp_name'], $file);
        }
        
        $vars['cid'] = $this->uri->segment(3);
        $this->load->view('courseweb/sub/uploadcomplete', $vars);
    }

    function remove()
    {
        $user_id = $this->session->userdata('user_id');
        if(!$user_id) {
            $vars['msg'] = "you should login";
            $this->load->view('alert/alert',$vars);
            return;
        }
        $cid = $this->uri->segment(3);
        $filename = $this->uri->segment(4);
        $filepath = $this->configdles->get('class_resource').$cid."/".$filename;
        unlink($filepath);
        $this->load->view('alert/msg', array("msg"=>"removed"));
    }

    function download()
    {
        $user_id = $this->session->userdata('user_id');
        if(!$user_id) {
            $vars['msg'] = "you should login";
            $this->load->view('alert/alert',$vars);
            return;
        }
        $cid = $this->uri->segment(3);
        $filename = $this->uri->segment(4);
        $vars['filename'] = $filename;
        $filepath = $this->configdles->get('class_resource').$cid."/".$filename;
        if(file_exists($filepath)&&is_file($filepath))
        {
            $vars['data'] = file_get_contents($filepath);
            $this->load->view('alert/download', $vars);
        }
        else
        {
            $this->load->view('alert/msg', array("msg"=>"file ".$filepath." not found"));
        }
    }
}
?>
