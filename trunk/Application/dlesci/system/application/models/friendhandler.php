<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Description of FriendHandler
 *
 * @author Faraj
 */
class Friendhandler extends Model
{
    function FriendRequest($user_request,$user_target)
    {
        $this->db->set('user_id1', $user_request);
        $this->db->set('user1_confirmed',true);
        $this->db->set('user_id2', $user_target);
        $this->db->set('user2_confirmed',false);
        $this->db->insert('friend');

        $this->db->where('user_id1', $user_request);
        $result = $this->db->get('friend');
        return $result->last_row();
    }

    function FriendApprove($user_request,$user_target)
    {
        $this->db->where('user_id1', $user_request);
        $this->db->where('user_id2', $user_target);
        $this->db->set('user2_confirmed',true);
        $this->db->update('friend');

        $this->db->where('user_id1', $user_request);
        $result = $this->db->get('friend');
        return $result->last_row();
    }

    function FriendReject($user_request,$user_target)
    {
        $this->db->where('user_id1', $user_request);
        $this->db->where('user_id2', $user_target);
        $this->db->delete('friend');

        $this->db->where('user_id2', $user_request);
        $this->db->where('user_id1', $user_target);
        $this->db->delete('friend');

        return array($user_request,$user_target);
    }

    function GetRecievedFriendRequestPending($user_target,$start=0,$limit=10)
    {
        $this->db->where('user_id2', $user_target);
        $this->db->where('user2_confirmed',false);
        $this->db->limit($limit,$start);
        $result = $this->db->get('friend');
        return $result;
    }

    function GetSentFriendRequestPending($user_request,$start=0,$limit=10)
    {
        $this->db->where('user_id1', $user_request);
        $this->db->where('user2_confirmed',false);
        $this->db->limit($limit,$start);
        $result = $this->db->get('friend');
        return $result;
    }


    function GetFriendList($user_id,$start=0,$limit=10)
    {
        $sql = "SELECT DISTINCT user.*
                FROM user, friend
                WHERE friend.user1_confirmed = 1
                      AND friend.user2_confirmed = 1
                      AND (
                            (friend.user_id1 = user.ID AND friend.user_id2 = $user_id)
                          OR
                            (friend.user_id2 = user.ID AND friend.user_id1 = $user_id)
                           )
                LIMIT $start,$limit
                ;";

        return $this->db->query($sql);
    }

    function IsFriendRequested($user_id1,$user_id2)
    {
        $this->db->where('user_id1', $user_id1);
        $this->db->where('user_id2', $user_id2);
        $result = $this->db->get('friend');
        if(($result->num_rows())>0)
                return true;
        $this->db->where('user_id1', $user_id1);
        $this->db->where('user_id2', $user_id2);
        $result = $this->db->get('friend');
        return ($result->num_rows()>0);
    }

    function IsFriend($user_id1,$user_id2)
    {
        $this->db->where('user_id1', $user_id1);
        $this->db->where('user_id2', $user_id2);
        $this->db->where('user2_confirmed',true);
        $this->db->where('user1_confirmed',true);
        $result = $this->db->get('friend');
        if(($result->num_rows())>0)
                return true;
        $this->db->where('user_id2', $user_id1);
        $this->db->where('user_id1', $user_id2);
        $this->db->where('user2_confirmed',true);
        $this->db->where('user1_confirmed',true);
        $result = $this->db->get('friend');
        return ($result->num_rows()>0);
    }

    function search($name,$user_id, $start=0, $limit = 10)
    {
        $sql = "SELECT *
                FROM user
                WHERE (ID != $user_id)
                   AND( first_name LIKE '%$name%'
                     OR last_name LIKE '%$name%')
                LIMIT $start, $limit;";
        return $this->db->query($sql);
    }
}
?>
