<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of mediaapplication
 *
 * @author Faraj
 */
class Mediaapplication extends Model
{
    function enableUserAuthentication($userId)
    {
        $this->db->where('user_id', $userId);
        $result = $this->db->get('user_authenticate');
        if($result->num_rows() > 0)
        {
            $data = $result->first_row();
            return $data->key;
        }
        $key = random_string('unique');
        $this->db->set('user_id', $userId);
        $this->db->set('key',$key);
        $this->db->insert('user_authenticate');
        return $key;
    }

    function setACL($userID,$name,$aclType)
    {
	$this->db->where('name', $name);
        $this->db->where('user_id', $userID);
        $this->db->where('acl_type', $aclType);
        $results = $this->db->get('media_acl');
        if($results->num_rows()>0)
        {
            return $this->enableUserAuthentication($userID);
        }
        $this->db->set('name', $name);
        $this->db->set('user_id', $userID);
        $this->db->set('acl_type', $aclType);
        $this->db->insert('media_acl');
        return $this->enableUserAuthentication($userID);
    }

    function setPublishACL($userID,$name)
    {
    	return $this->setACL($userID,$name,0);
    }

    function setPlayACL($userID,$name)
    {
    	return $this->setACL($userID,$name,1);
    }

    function setSharedObjectACL($userID,$name)
    {
    	return $this->setACL($userID,$name,2);
    }

     function getcam($userID,$remoteUserID)
    {
            $name = CAM_LIVE_PRE.$remoteUserID;
            return $this->setPlayACL($userID, $name);
    }

    function putcam($userid)
    {
            $name = CAM_LIVE_PRE.$userid;
            return $this->setPublishACL($userid,$name);
    }

    function enchat($userid1,$userid2)
    {
            $name = CHAT_PRE.min($userid1,$userid2).max($userid1,$userid2);
            return $this->setSharedObjectACL($userid1, $name);
    }

    function putscr($userid,$classid)
    {
        $name = CLS_SCR_PRE.$classid;
        return $this->setPublishACL($userid, $name);
    }

    function getscr($userid,$classid)
    {
        $name = CLS_SCR_PRE.$classid;
        return $this->setPlayACL($userid, $name);
    }

    function enWB($userid,$classid)
    {
        $name = WB_PRE.$classid;
        return $this->setSharedObjectACL($userid, $name);
    }
}
?>
