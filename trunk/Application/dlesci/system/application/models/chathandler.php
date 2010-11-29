<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of chathandler
 *
 * @author Faraj
 */
class Chathandler extends  Model
{
    function UpdateOnline($user_id)
    {
        $this->db->where('user_id', $user_id);
        $result = $this->db->get('online');
        if($result->num_rows()<=0)
        {
            $this->db->set('user_id', $user_id);
            $this->db->set('time_stamp', date());
            $this->db->insert('online');
        }
        else
        {
            $this->db->set('time_stamp', time());
            $this->db->where('user_id', $user_id);
            $this->db->update('online');
        }
    }

    function IsOnline($user_id)
    {
        $this->db->where('user_id', $user_id);
        $result = $this->db->get('online');
        if($result->num_rows()>0)
        {
            $ts = $result->first_row()->time_stamp;
            return (time()-$ts)<5;
        }
        else
        {
            return false;
        }
    }
}
?>
