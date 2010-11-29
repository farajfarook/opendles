<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MaterialHandler
 *
 * @author Faraj
 */

class Materialhandler extends Model
{
    function Create($user_id, $name, $resource = null)
    {
        $this->db->set('content_name',$name);
        $this->db->set('user_id',$user_id);
        if($resource != null) $this->db->set('resource',$resource);
        $this->db->insert('material');

        $this->db->where('user_id',$user_id);
        $result = $this->db->get('material');
        return $result->last_row();
    }

    function Update($material_id, $name = null, $resource = null)
    {
        if($resource != null) $this->db->set('resource',$resource);
        if($name != null) $this->db->set('content_name',$name);
        $this->db->where('id',$material_id);
        $this->db->update('material');

        $this->db->where('id',$material_id);
        $result = $this->db->get('material');
        return $result->first_row();
    }

    function Remove($material_id)
    {
        $this->db->where('id',$material_id);
        $this->db->delete('material');

        return $material_id;
    }

    function GetByUser($user_id)
    {
        $this->db->where('user_id',$user_id);
        return $this->db->get('material');
    }

    function GetByCourseWeb($cw_id)
    {
        $this->db->select('material.*');
        $this->db->from('material,courseweb_material');
        $this->db->where('`courseweb_material`.`material_id`', '`material`.`id`',false);
        $this->db->where('courseweb_material.courseweb_id', $cw_id);
        return $this->db->get();
    }

    function IsOwnedBy($mid,$uid)
    {
        $this->db->where('user_id', $uid);
        $this->db->where('id',$mid);
        $result = $this->db->get('material');
        return $result->num_rows() > 0;
    }
}
?>
