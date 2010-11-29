<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of examhandler
 *
 * @author Faraj
 */
class Examhandler extends Model
{
    function getQuestionTypes()
    {
        return $this->db->get('question_type');
    }

    function getType($tid)
    {
        $this->db->where('id',$tid);
        $result = $this->db->get('question_type');
        return $result->last_row();
    }

    function createExam($name,$qcount,$cid)
    {
        $this->db->set("class_id", $cid);
        $this->db->set("name", $name);
        $this->db->set("questions_per_paper", $qcount);
        $this->db->insert('exam');
        return $this->db->get('exam')->last_row();
    }

    function removeExam($eid)
    {
        $this->removeQuestionsByExam($eid);
        $this->db->where('id', $eid);
        $this->db->delete('exam');
    }

    function editExam($eid,$name,$qcount)
    {
        $this->db->set("name", $name);
        $this->db->set("questions_per_paper", $qcount);
        $this->db->where('id', $eid);
        $this->db->update('exam');
        return $this->getByID($eid);
    }

    function removeQuestionsByExam($eid)
    {
        $questions = $this->getQuestions($eid);
        foreach($questions->result() as $que)
        {
            $this->removeQuestion($que->id);
        }
    }

    function getByID($eid)
    {
        $this->db->where("id", $eid);
        $result = $this->db->get('exam');
        return $result->last_row();
    }

    function get($cid)
    {
        $this->db->where('class_id', $cid);
        return $this->db->get('exam');
    }

    function isExamValid($eid)
    {
        $exam = $this->getByID($eid);
        $this->db->select('count(*) as count');
        $this->db->from('exam,question');
        $this->db->where('`exam`.`id`', '`question`.`exam_id`', false);
        $result = $this->db->get();
        $count = $result->last_row();
        return ($count->count >= $exam->questions_per_paper);
    }

    function getQuestions($eid)
    {
        $this->db->where('exam_id', $eid);
        return $this->db->get('question');
    }

    function getQuestionByID($qid)
    {
        $this->db->where('id', $qid);
        $result = $this->db->get('question');
        return $result->last_row();
    }

    function createQuestion($eid,$question)
    {
        $this->db->set('exam_id',$eid);
        $this->db->set('question',$question);
        $this->db->insert('question');
        return $this->db->get('question')->last_row();
    }

    function editQuestion($qid,$question)
    {
        $this->db->set('question',$question);
        $this->db->where('id', $qid);
        $this->db->update('question');
    }

    function removeQuestion($qid)
    {
        $this->removeAnswerByQuestion($qid);
        $this->db->where('id', $qid);
        $this->db->delete('question');
    }

    function createAnswer($qid,$answer,$istrue)
    {
        $this->db->set('question_id', $qid);
        $this->db->set('answer',$answer);
        $this->db->set('is_answer', $istrue);
        $this->db->insert('answer');
        return $this->db->get('answer')->last_row();
    }

    function removeAnswer($aid)
    {
        $this->db->where('id', $aid);
        $this->db->delete('answer');
    }

    function removeAnswerByQuestion($qid)
    {
        $this->db->where('question_id', $qid);
        $this->db->delete('answer');
    }

    function getAnswers($qid)
    {
        $this->db->where('question_id', $qid);
        return $this->db->get('answer');
    }

    function getAnswerByID($aid)
    {
        $this->db->where('id', $aid);
        return $this->db->get('answer')->last_row();
    }

    function toggleIsAnswer($aid)
    {
        $answer = $this->getAnswerByID($aid);
        $this->db->set('is_answer', !$answer->is_answer);
        $this->db->where('id',$aid);
        $this->db->update('answer');
    }
}
?>
