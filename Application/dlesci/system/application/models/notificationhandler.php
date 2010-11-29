<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of notificationhanlder
 *
 * @author Faraj
 */
class Notificationhandler extends Model
{
    private $FRIEND = 'friend';
    private $THREAD = 'thread';
    private $CLASS = 'class';
    function Add($user_id,$type,$message,$link="")
    {
        $this->db->set('user_id', $user_id);
        $this->db->set('notification',$message);
        $this->db->set('is_read',false);
        $this->db->set('link',$link);
        $this->db->set('date',  timestamp_to_mysqldatetime());
        $this->db->set('type',$type);
        $this->db->insert('notifications');
    }

    function MarkAsRead($user_id)
    {
        $this->db->set('is_read',true);
        $this->db->where('user_id', $user_id);
        $this->db->update('notifications');
    }

    function Clear($user_id)
    {
        $this->db->where('user_id', $user_id);
        $this->db->where('is_read', true);
        $this->db->delete('notifications');
    }

    function GetUnRead($user_id)
    {
        $this->db->where('user_id', $user_id);
        $this->db->where('is_read', false);
        $this->db->order_by('date', 'DESC');
        return $this->db->get('notifications');
    }

    function GetAll($user_id)
    {
        $this->db->where('user_id', $user_id);
        $this->db->order_by('date', 'DESC');
        return $this->db->get('notifications');
    }

    function notify_friend_accept_to_acceptor($acceptor_id,$requester)
    {
        $string = "You have accept the friend request from $requester->first_name $requester->last_name";
        $link = "profile/show/".$requester->id;
        $this->Add($acceptor_id,$this->FRIEND,$string,$link);
    }

    function notify_friend_accept_to_requestor($requester_id, $acceptor)
    {
        $string = "Your friend request has been accepted by $acceptor->first_name $acceptor->last_name";
        $link = "profile/show/".$acceptor->id;
        $this->Add($requester_id,$this->FRIEND,$string,$link);
    }

    function notify_friend_request_to_acceptor($acceptor_id,$requester)
    {
        $string = "You have a pending friend request from $requester->first_name $requester->last_name";
        $link = "profile/show/".$requester->id;
        $this->Add($acceptor_id,$this->FRIEND, $string,$link);
    }

    function notify_friend_request_to_requestor($requestor_id,$acceptor)
    {
        $string = "You have a friend requested to $acceptor->first_name $acceptor->last_name";
        $link = "profile/show/".$acceptor->id;
        $this->Add($requestor_id,$this->FRIEND, $string,$link);
    }

    function notify_friend_request_already_sent_to_requestor($requestor_id,$acceptor)
    {
        $string = "Your have been already friends or requested to $acceptor->first_name $acceptor->last_name";
        $link = "profile/show/".$acceptor->id;
        $this->Add($requester_id,$this->FRIEND,$string,$link);
    }

    function notify_user_about_thread_follow($user_id,$user_set_follow,$thread)
    {
        $string = "$user_set_follow->first_name $user_set_follow->last_name add you to his thread $thread->subject";
        $link = "thread/show/$thread->id";
        $this->Add($user_id,  $this->THREAD, $string, $link);
    }

    function notify_user_about_thread_creation($user_id,$thread)
    {
        $string = "You created a new thread $thread->subject";
        $link = "thread/show/$thread->id";
        $this->Add($user_id, $this->THREAD, $string, $link);
    }

    function notify_student_about_class_subscribe($user_id, $class)
    {
        $string = "you have sucessfully subscribed to class '$class->class_name'";
        $link = "classroom/view/$class->id";
        $this->Add($user_id,  $this->CLASS, $string, $link);
    }

    function notify_lecturer_about_student_subscribe($user_id,$student,$class)
    {
        $string = "$student->first_name $student->last_name has successfully subscribed to your class '$class->class_name'";
        $link = "classroom/view/$class->id";
        $this->Add($user_id,  $this->CLASS, $string, $link);
    }

    function notify_lecturer_about_student_request($user_id,$student,$class)
    {
        $string = "$student->first_name $student->last_name has request to subscribed to your class '$class->class_name'";
        $link = "classroom/view/$class->id";
        $this->Add($user_id,  $this->CLASS, $string, $link);
    }


    function notify_student_about_lecturer_request($user_id,$class)
    {
        $string = "you have request to subscribed to class '$class->class_name'";
        $link = "classroom/view/$class->id";
        $this->Add($user_id,  $this->CLASS, $string, $link);
    }
}
?>
