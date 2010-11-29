<?php

/**
 * Description of CourseWebHandler
 *
 *
 * @author user
 */
class Coursewebhandler extends Model
{
    function Create($discription = null, $news = null, $events = null)
    {
        if($discription != null) $this->db->set('discription', $discription);
        if($news != null) $this->db->set('news', $news);
        if($events != null) $this->db->set('events', $events);
        $this->db->insert('courseweb');

        $result = $this->db->get('courseweb');
        return $result->last_row();
    }

    function Update($cw_id,$discription = null, $news = null, $events = null)
    {
        $this->db->where('id',$cw_id);
        if($discription != null) $this->db->set('discription', $discription);
        if($news != null) $this->db->set('news', $news);
        if($events != null) $this->db->set('events', $events);
        $this->db->update('courseweb');

        $this->db->where('id',$cw_id);
        $result = $this->db->get('courseweb');
        return $result->first_row();
    }

    function Remove($cw_id)
    {
        $this->db->where('id',$cw_id);
        $this->db->delete('courseweb');

        return $cw_id;
    }

    function GetByClass($class_id)
    {
        $this->db->select('courseweb.*');
        $this->db->from('courseweb, class');
        $this->db->where('`courseweb`.`id`', '`class`.`courseweb_id`',false);
        $this->db->where('class.ID', $class_id);
        $result = $this->db->get();
        return $result->first_row();
    }
    
    function GetByUser($user_id)
    {
        $this->db->select('courseweb.*');
        $this->db->from('courseweb, class');
        $this->db->where('courseweb.id', 'class.courseweb_id');
        $this->db->where('class.class_owner_id', $user_id);
        return $this->db->get();
    }

    function LinkMaterial($cw_id,$material_id)
    {
        $this->db->set('courseweb_id',$cw_id);
        $this->db->set('material_id',$material_id);
        $this->db->insert('courseweb_material');

        $result = $this->db->get('courseweb_material');
        return $result->last_row();
    }

    function UnLinkMaterial($coureseweb_material_id)
    {
        $this->db->where('id', $coureseweb_material_id);
        $this->db->delete('courseweb_material');
        return $coureseweb_material_id;
    }
}
?>
