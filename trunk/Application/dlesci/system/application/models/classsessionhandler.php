<?php

/**
 * Description of ClassSessionHandler
 *
 * @author user
 */
class Classsessionhandler extends Model{
    
    function GetOf($class_id)
    {
        $this->db->where('class_id', $class_id);
        return $this->db->get('class_session');
    }
    
    function Create($class_id,$start_date,$finish_date,$actual_start_date,$actual_finish_date)
    {
        $this->db->set('class_id', $class_id);
        $this->db->set('start_date_time', $start_date);
        $this->db->set('finish_date_time', $finish_date);
        $this->db->set('actual_start_time', $actual_start_date);
        $this->db->set('actual_finish_time', $actual_finish_date);
        $this->db->insert('class_session');

        $result = $this->GetOf($class_id);
        return $result->last_row();
    }
    
    function Update($session_id,$start_date = null
            ,$finish_date = null,$actual_start_date = null
            ,$actual_finish_date = null, $session_video_loc = null)
    {
        $this->db->where('id', $session_id);
        if($start_date != null) $this->db->set('start_date_time', $start_date);
        if($finish_date != null) $this->db->set('finish_date_time', $finish_date);
        if($actual_start_date != null) $this->db->set('actual_start_time', $actual_start_date);
        if($actual_finish_date != null) $this->db->set('actual_finish_time', $actual_finish_date);
        if($session_video_loc != null) $this->db->set('session_video_location', $session_video_loc);
        $this->db->update('class_session');

        $this->db->where('id', $session_id);
        $result = $this->db->get('class_session');
        return $result->first_row();
    }
    
    function Remove($session_id)
    {
        $this->db->where('id', $session_id);
        $this->db->delete('class_session');
        return $session_id;
    }
}
?>
