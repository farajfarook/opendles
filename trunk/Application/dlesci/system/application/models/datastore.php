<?php
/**
 * Description of config
 *
 * @author Faraj
 *
 */
class Datastore extends Model
{
    function get($user,$property)
    {
        $this->db->where('property',$property);
        $this->db->where('user_id', $user);
        $result = $this->db->get('data_store');
        if($result->num_rows() > 0)
        {
            $data = $result->first_row();
            return $data->value;
        }
        else
        {
            return null;
        }
    }

    function set($user,$property,$value)
    {
        $this->db->where('property',$property);
        $this->db->where('user_id', $user);
        $result = $this->db->get('data_store');
        if($result->num_rows() > 0)
        {
            $this->db->where('property',$property);
            $this->db->where('user_id', $user);
            $this->db->set('value', $value);
            $this->db->update('data_store');
        }
        else
        {
            $this->db->set('property',$property);
            $this->db->set('user_id', $user);
            $this->db->set('value', $value);
            $this->db->insert('data_store');
        }
    }
}
?>
