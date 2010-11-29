<?php
/**
 * Description of ClassMajorHandler
 *
 * @author user
 */
class Classmajorhandler extends Model
{
    
    function Create($title)
    {
        $this->db->set('title', $title);
        $this->db->insert('class_major');

        $result = $this->db->get('class_major');
        return $result->last_row();
    }

    function Update($major_id,$title)
    {
        $this->db->where('id', $major_id);
        $this->db->set('title', $title);
        $this->db->insert('class_major');

        $this->db->where('id', $major_id);
        $result = $this->db->get('class_major');
        return $result->first_row();
    }
    
    function Remove($major_id)
    {
        $this->db->where('id', $major_id);
        $this->db->delete('class_major');
        return $major_id;
    }
    
    function Get()
    {
        return $this->db->get('class_major');
    }

    function GetByID($id)
    {
        $this->db->where('id', $id);
        $result = $this->db->get('class_major');
        return $result->first_row();
    }
}
?>
