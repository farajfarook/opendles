<?php
/**
 * Description of HandleUser
 *
 * @author Faraj
 */
class Userhandler extends Model
{
    function Login($email,$password)
    {
        $this->db->where('email', $email);
        $this->db->where('password_hash', md5($password));
        $result = $this->db->get('user');
        if($result->num_rows()>0)
        {
            return $result->first_row();
        }
        return false;
    }

    function get($user_id)
    {
        $this->db->where('id', $user_id);
        $result = $this->db->get('user');
        if($result->num_rows()>0)
        {
            return $result->first_row();
        }
        return false;
    }

    function Register($email,$fname,$lname,$sex,$password, $phone, $birthday)
    {
        $this->db->set('email', $email);
        $this->db->set('first_name', $fname);
        $this->db->set('last_name', $lname);
        $this->db->set('sex', $sex);
        $this->db->set('password_hash', md5($password));
        $this->db->set('phone_number', $phone);
        $this->db->set('birthday', $birthday);
        $this->db->insert('user');
        $result = $this->db->get('user');
        return $result->last_row();
    }

    function Update($user_id, $fname = null, $lname = null, $sex = null,
            $birthday = null, $phone = null, $photo = null, $thumb = null)
    {
        $this->db->where('id',$user_id);
        if($fname != null) $this->db->set('first_name', $fname);
        if($lname != null) $this->db->set('last_name', $lname);
        if($sex != null) $this->db->set('sex', $sex);
        if($birthday != null) $this->db->set('birthday', $birthday);
        if($phone != null) $this->db->set('phone_number', $phone);
        if($photo != null) $this->db->set('profile_pic', $photo);
        if($thumb != null) $this->db->set('thumb', $thumb);
        $this->db->update('user');

        $this->db->where('id',$user_id);
        $result = $this->db->get('user');
        return $result->first_row();
    }

    function PasswordChange($user_id, $password)
    {
        $this->db->where('id',$user_id);
        $this->db->set('password_hash', md5($password));
        $this->db->update('user');

        $this->db->where('id',$user_id);
        $result = $this->db->get('user');
        return $result->first_row();
    }

    function EmailChange($user_id, $email)
    {
        if($this->IsAlreadyRegistered($email))
                return false;

        $this->db->where('id',$user_id);
        $this->db->set('email', $email);
        $this->db->update('user');

        $this->db->where('id',$user_id);
        $result = $this->db->get('user');
        return $result->first_row();
    }

    function Delete($user_id)
    {
        $this->db->where('id',$user_id);
        $this->db->delete('user');
        return $user_id;
    }

    function IsAlreadyRegistered($email)
    {
        $this->db->where('email',$email);
        $result = $this->db->get('user');
        return ($result->num_rows() > 0);
    }

    function Search($name)
    {
        $this->db->like('first_name', $name);
        $this->db->or_like('last_name', $name);
        return $this->db->get('user');
    }

    function Activate($user_id)
    {
        $this->db->set('activated',true);
        $this->db->where('id',$user_id);
        $this->db->update('user');

        $this->db->where('id',$user_id);
        $result = $this->db->get('user');
        return $result->first_row();
    }

    function Deactivate($user_id)
    {
        $this->db->set('activated',false);
        $this->db->where('id',$user_id);
        $this->db->update('user');

        $this->db->where('id',$user_id);
        $result = $this->db->get('user');
        return $result->first_row();
    }
}
?>
