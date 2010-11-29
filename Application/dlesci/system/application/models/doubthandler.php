<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of doubthandler
 *
 * @author Faraj
 */
class Doubthandler extends Model
{
    //put your code here
    function ask($user_id,$class_id,$msg)
    {
        $this->db->set('user_id', $user_id);
        $this->db->set('class_id', $class_id);
        $this->db->set('msg', $msg);
        $this->db->insert('doubt');

        $result = $this->db->get('doubt');
        return $result->last_row();
    }

    function remove($did)
    {
        $this->db->where('id', $did);
        $this->db->delete('doubt');
    }

    function get($class_id)
    {
        $this->db->where("class_id", $class_id);
        return $this->db->get('doubt');
    }
}
?>
