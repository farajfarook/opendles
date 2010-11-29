<?php
/**
 * Description of config
 *
 * @author Faraj
 *
 */
class Configdles extends Model
{
    function get($property)
    {
        $this->db->where('property',$property);
        $result = $this->db->get('config');
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

    function set($property,$value)
    {
        $this->db->where('property',$property);
        $result = $this->db->get('config');

        
        if($result->num_rows() > 0)
        {
            $this->db->where('property',$property);
            $this->db->set('value', $value);
            $this->db->update('config');
        }
        else
        {
            $this->db->set('property',$property);
            $this->db->set('value', $value);
            $this->db->insert('config');
        }
    }
}
?>
