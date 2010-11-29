<?php
/**
 * Description of ClassHandler
 *
 * @author user
 */
class Classhandler extends Model {
    
    function CreateClass($name,$major_id,$user_id,$courseweb_id)
    {
        $this->db->set('class_name',$name);
        $this->db->set('class_major_id',$major_id);
        $this->db->set('class_owner_id',$user_id);
        $this->db->set('courseweb_id',$courseweb_id);
        $this->db->insert('class');
        $result = $this->db->get('class');
        return $result->last_row();
    }
    
    function RemoveClass($class_id)
    {
        $this->db->where('id',$class_id);
        $this->db->delete('class');
        return $class_id;
    }

    function UpdateClass($class_id,$name = null,$major_id = null)
    {
        $this->db->where('id',$class_id);
        if($name != null) $this->db->set('class_name',$name);
        if($major_id  != null) $this->db->set('class_major_id',$major_id);
        $this->db->update('class');

        $this->db->where('id',$class_id);
        $result = $this->db->get('class');
        return $result->first_row();
        
    }

    function IsClassOwnedBy($cid,$user_id)
    {
        $this->db->where('class_owner_id', $user_id);
        $this->db->where('id',$cid);
        $results = $this->db->get('class');
        return $results->num_rows() > 0;
    }

    function GetClassesOwnBy($user_id,$start=0,$limit=10)
    {
        $this->db->where('class_owner_id', $user_id);
        $this->db->limit($limit, $start);
        $this->db->order_by('id', "DESC");
        return $this->db->get('class');
    }
    
    function GetEnrolledBy($user_id,$user_confirm = 0,$lecturer_confirm = 0,$start=0,$limit=10)
    {
        $this->db->where('user_class_enrolment.student_confirmed',$user_confirm);
        $this->db->where('user_class_enrolment.lecturer_confirmed',$lecturer_confirm);
        $this->db->where('user_class_enrolment.user_id',$user_id);
        $this->db->where('`class`.`id`', '`user_class_enrolment`.`class_id`',false);
        $this->db->from('class,user_class_enrolment');
        $this->db->limit($limit, $start);
        $this->db->order_by('class.id', "DESC");
        $this->db->select('class.*');
        return $this->db->get();
    }

    function GetByMajor($major_id,$start=0,$limit=10)
    {
        $this->db->where('class_major_id', $major_id);
        $this->db->limit($limit, $start);
        $this->db->order_by('class.id', "DESC");
        return $this->db->get('class');
    }
    
    function GetByid($cid)
    {
        $this->db->where('id', $cid);
        $result = $this->db->get('class');
        return $result->last_row();
    }

    function EnrollUser($class_id,$user_id)
    {
        
        $this->db->where('class_id', $class_id);
        $this->db->where('user_id', $user_id);
        $result = $this->db->get('user_class_enrolment');
        if($result->num_rows()<=0)
        {
            $this->db->set('class_id', $class_id);
            $this->db->set('user_id', $user_id);
            $this->db->insert('user_class_enrolment');
            $result = $this->db->get('user_class_enrolment');
        }
        return $result->last_row();
    }

    function ConfirmEnroll($class_id,$user_id,$user_confirm = null,$lecturer_confirm = null)
    {
        $this->db->where('class_id',$class_id);
        $this->db->where('user_id',$user_id);
        if($user_confirm != null ) $this->db->set('student_confirmed',$user_confirm);
        if($lecturer_confirm != null ) $this->db->set('lecturer_confirmed',$lecturer_confirm);
        $this->db->update('user_class_enrolment');

        $this->db->where('class_id',$class_id);
        $this->db->where('user_id',$user_id);
        $result = $this->db->get('user_class_enrolment');
        return $result->last_row();
    }
    
    function DenrollUser($class_id,$user_id)
    {
        $this->db->where('class_id',$class_id);
        $this->db->where('user_id',$user_id);
        $this->db->delete('user_class_enrolment');
        return array('class_id' => $class_id, 'user_id' => $user_id);
    }

    function IsSubscribed($class_id,$user_id)
    {
        $this->db->where('class_id',$class_id);
        $this->db->where('user_id',$user_id);
        $results = $this->db->get('user_class_enrolment');
        return $results->num_rows()>0;
    }

    function IsSubscribedConfirmed($class_id,$user_id)
    {
        $this->db->where('class_id',$class_id);
        $this->db->where('user_id',$user_id);
        $this->db->where('student_confirmed', 1);
        $this->db->where('lecturer_confirmed', 1);
        $results = $this->db->get('user_class_enrolment');
        return $results->num_rows()>0;
    }

    function IsStudentApprovalPending($class_id,$user_id)
    {      
        $this->db->where('class_id',$class_id);
        $this->db->where('user_id',$user_id);
        $this->db->where('student_confirmed', 0);
        $this->db->where('lecturer_confirmed', 1);
        $results = $this->db->get('user_class_enrolment');
        return $results->num_rows()>0;
    }

    function IsLecturerApprovalPending($class_id,$user_id)
    {
        $this->db->where('class_id',$class_id);
        $this->db->where('user_id',$user_id);
        $this->db->where('student_confirmed', 1);
        $this->db->where('lecturer_confirmed', 0);
        $results = $this->db->get('user_class_enrolment');
        return $results->num_rows()>0;
    }

    function GetClassStudentsApproved($cid,$start=0,$limit=10)
    {
        $this->db->select('user.*');
        $this->db->from('user,user_class_enrolment');
        $this->db->where('user_class_enrolment.class_id',$cid);
        $this->db->where('user_class_enrolment.student_confirmed', 1);
        $this->db->where('user_class_enrolment.lecturer_confirmed', 1);
        $this->db->where('`user`.`id`','`user_class_enrolment`.`user_id`',false);
        $this->db->limit($limit, $start);
        return $this->db->get();
    }

    function GetClassRequestRecieved($cid,$start=0,$limit=10)
    {
        $this->db->select('user.*');
        $this->db->from('user,user_class_enrolment');
        $this->db->where('user_class_enrolment.class_id',$cid);
        $this->db->where('user_class_enrolment.student_confirmed', 1);
        $this->db->where('user_class_enrolment.lecturer_confirmed', 0);
        $this->db->where('`user`.`id`','`user_class_enrolment`.`user_id`',false);
        $this->db->limit($limit, $start);
        return $this->db->get();
    }

    function GetClassRequestSent($cid,$start=0,$limit=10)
    {
        $this->db->select('user.*');
        $this->db->from('user,user_class_enrolment');
        $this->db->where('user_class_enrolment.class_id',$cid);
        $this->db->where('user_class_enrolment.student_confirmed',0);
        $this->db->where('user_class_enrolment.lecturer_confirmed',1);
        $this->db->where('`user`.`id`','`user_class_enrolment`.`user_id`',false);
        $this->db->limit($limit, $start);
        return $this->db->get();
    }

    function Search($name,$start=0,$limit=10)
    {
        $this->db->like('class_name', $name);
        $this->db->limit($limit, $start);
        return $this->db->get('class');
    }

    function RemoveSubscription($user_id,$class_id)
    {
        $this->db->where('class_id', $class_id);
        $this->db->where('user_id', $user_id);
        $this->db->delete('user_class_enrolment');
    }
}
?>
