<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of paperhanlder
 *
 * @author Faraj
 */
class Paperhandler extends Model
{
    function isGenerated($user_id,$eid)
    {
        $this->db->where('exam_id',$eid);
        $this->db->where('user_id',$user_id);
        return ($this->db->get('paper')->num_rows())>0;
    }

    function generate($user_id,$eid)
    {
        if($this->isGenerated($user_id, $eid)) 
                return;

        $this->db->where('id', $eid);
        $exam = $this->db->get('exam')->last_row();
        $this->db->where('exam_id', $eid);
        $questions = $this->db->get('question');
        $count = 0;
        $qs  = null;
        foreach ($questions->result() as $value) {
            $qs[$count++] = $value;
        }
        $genKeys = array_rand($qs, $exam->questions_per_paper);

        $count = 0;
        foreach ($genKeys as $key) {
            $question = $qs[$key];
            $this->db->set('question_id', $question->id);
            $this->db->set('user_id', $user_id);
            $this->db->set('exam_id', $eid);
            $this->db->insert('paper');
        }
    }

    function getPaper($user_id,$qid)
    {
        $this->db->where('question_id', $qid);
        $this->db->where('user_id', $user_id);
        return $this->db->get('paper')->last_row();
    }

    function isNewQuestion($user_id,$qid)
    {
        $this->db->where('paper_question_id', $qid);
        $this->db->where('paper_user_id', $user_id);
        return $this->db->get('paper_answer')->num_rows() == 0;
    }

    function isNewQuestionAnswered($user_id,$qid,$aid)
    {
        $this->db->where('paper_question_id', $qid);
        $this->db->where('paper_user_id', $user_id);
        $this->db->where('answer_id', $aid);
        return $this->db->get('paper_answer')->num_rows() == 0;
    }

    function setAnswer($user_id,$qid,$aid,$eid)
    {
        if($this->isNewQuestionAnswered($user_id, $qid, $aid))
        {
            $this->db->set('answer_id',$aid);
            $this->db->set('paper_exam_id',$eid);
            $this->db->set('paper_user_id',$user_id);
            $this->db->set('paper_question_id',$qid);
            $this->db->insert('paper_answer');
        }
        else
        {
            $this->db->set('answer_id',$aid);
            $this->db->where('paper_exam_id',$eid);
            $this->db->where('paper_user_id',$user_id);
            $this->db->where('paper_question_id',$qid);
            $this->db->update('paper_answer');
        }
    }

    function remAnswer($user_id,$qid,$aid,$eid)
    {
        if(!$this->isNewQuestionAnswered($user_id, $qid, $aid))
        {
            $this->db->where('answer_id',$aid);
            $this->db->where('paper_exam_id',$eid);
            $this->db->where('paper_user_id',$user_id);
            $this->db->where('paper_question_id',$qid);
            $this->db->delete('paper_answer');
        }
    }

    function getNextPaper($user_id,$eid)
    {
        $this->db->where('user_id', $user_id);
        $this->db->where('exam_id', $eid);
        $papers = $this->db->get('paper');
        foreach ($papers->result() as $paper) {
            if($this->isNewQuestion($user_id, $paper->question_id))
            {

                return $paper;
            }
        }
        return false;
    }

    function getAnswer($user_id,$qid)
    {
        $this->db->where('paper_user_id', $user_id);
        $this->db->where('paper_question_id',$qid);
        $result = $this->db->get('paper_answer');

        if($result->num_rows()<=0) return false;
        return $result;
    }

    function getPapers($user_id,$eid)
    {
        $this->db->where('user_id', $user_id);
        $this->db->where('exam_id', $eid);
        return $this->db->get("paper");
    }

    function getAllAnswers($user_id,$eid)
    {
        $this->db->where('paper_user_id', $user_id);
        $this->db->where('paper_exam_id',$eid);
        $result = $this->db->get('paper_answer');

        if($result->num_rows()<=0) return false;
        return $result;
    }
}
?>
