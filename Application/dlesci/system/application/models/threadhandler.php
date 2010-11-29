<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ThreadHandler
 *
 * @author Faraj
 */

class Threadhandler extends Model
{
    function CreateThread($user_id,$subject)
    {
        $date = timestamp_to_mysqldatetime();
        $this->db->set('started_user_id',$user_id);
        $this->db->set('start_date_time',$date);
        $this->db->set('subject',$subject);
        $this->db->insert('thread');
        $this->db->where('started_user_id',$user_id);
        $result = $this->db->get('thread');
        $data = $result->last_row();
        $this->FollowThread($data->id, $user_id);
        return $data;
    }
    
    function GetThreadByStartedUser($user_id)
    {
        $this->db->where('started_user_id', $user_id);
        $this->db->order_by('start_date_time', "DESC");
        return $this->db->get('thread');
    }

    function IsFollowing($thread_id,$user_id)
    {
        $this->db->where('thread_id', $thread_id);
        $this->db->where('user_id', $user_id);
        $result = $this->db->get('thread_follow');
        return $result->num_rows()>0;
    }

    function IsOwnedBy($thread_id,$user_id)
    {
        $this->db->where('id', $thread_id);
        $this->db->where('started_user_id', $user_id);
        $result = $this->db->get('thread');
        return $result->num_rows()>0;
    }

    function FollowThread($thread_id,$user_id)
    {
        $this->db->set('user_id', $user_id);
        $this->db->set('thread_id', $thread_id);
        $this->db->insert('thread_follow');

        $this->db->where('user_id', $user_id);
        $this->db->where('thread_id', $thread_id);
        $result = $this->db->get('thread_follow');
        return $result->first_row();
    }

    function UnfollowThread($thread_id,$user_id)
    {
        $this->db->where('user_id', $user_id);
        $this->db->where('thread_id', $thread_id);
        $this->db->delete('thread_follow');
        return array('user_id' => $user_id,'thread_id' => $thread_id);
    }

    function GetThreads($user_id)
    {
        $this->db->select('thread.*');
        $this->db->from('thread, thread_follow');
        $this->db->where('`thread`.`id`', '`thread_follow`.`thread_id`',false);
        $this->db->where('thread_follow.user_id',$user_id);
        $this->db->order_by('start_date_time', "DESC");
        return $this->db->get();
    }

    function CreateThreadReply($thread_id,$user_id,$message)
    {
        $date = timestamp_to_mysqldatetime();
        $this->db->set('date_of_post',$date);
        $this->db->set('user_id', $user_id);
        $this->db->set('message', $message);
        $this->db->set('thread_id', $thread_id);
        $this->db->insert('thread_reply');

        $this->db->set('is_new',true);
        $this->db->where('thread_id', $thread_id);
        $this->db->where_not_in('user_id', $user_id);
        $this->db->update('thread_follow');

        $this->db->where('thread_id', $thread_id);
        $this->db->where('user_id', $user_id);
        $result = $this->db->get('thread_reply');
        return $result->last_row();
    }
    
    function markAsRead($thread_id,$user_id)
    {
        $this->db->set('is_new',false);
        $this->db->where('thread_id', $thread_id);
        $this->db->where('user_id', $user_id);
        $this->db->update('thread_follow');
    }

    function GetThreadReply($thread_id)
    {
        $this->db->where('thread_id', $thread_id);
        return $this->db->get('thread_reply');
    }

    function GetReply($reply_id)
    {
        $this->db->where('id', $reply_id);
        $result = $this->db->get('thread_reply');
        return $result->last_row();
    }

    function Get($thread_id)
    {
        $this->db->where('id', $thread_id);
        $result = $this->db->get('thread');
        return $result->last_row();
    }

    function GetFollowers($thread_id)
    {
        $this->db->select('user.*');
        $this->db->where('`thread_follow`.`user_id`', '`user`.`id`',false);
        $this->db->where('thread_follow.thread_id', $thread_id);
        $this->db->from('thread_follow,user');
        return $this->db->get();
    }

    function IsNew($thread_id,$user_id)
    {
        $this->db->where('thread_id', $thread_id);
        $this->db->where('user_id', $user_id);
        $this->db->where('is_new', true);
        return $this->db->get('thread_follow')->num_rows() > 0;
    }

    function HasNew($user_id)
    {
        $this->db->where('user_id', $user_id);
        $this->db->where('is_new', true);
        return $this->db->get('thread_follow')->num_rows() > 0;
    }
}
?>
