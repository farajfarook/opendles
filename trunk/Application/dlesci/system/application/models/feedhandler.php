<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of feedhandler
 *
 * @author Faraj
 */
class Feedhandler extends Model
{
    function AddFeed($title,$content,$link)
    {
        $this->db->set('title', $title);
        $this->db->set('content', $content);
        $this->db->set('link',$link);
        $this->db->insert('feed');
        $result = $this->db->get('feed');
        return $result->last_row();
    }

    function GetFeed($count = 10)
    {
        $this->db->order_by('id', 'DESC');
        return $this->db->get('feed', $count);
    }

    function AddClassFeed($class_id)
    {
        $item = $this->classhandler->GetByID($class_id);
        $user = $this->userhandler->get($item->class_owner_id);
        $classmajor = $this->classmajorhandler->GetByID($item->class_major_id);

        $title = "new class $item->class_name added";
        $link = "classroom/view/".$item->id;
        $content = "$user->first_name $user->last_name created a new class $item->class_name in the field of $classmajor->title";
        $this->addfeed($title, $content, $link);
    }
}
?>
