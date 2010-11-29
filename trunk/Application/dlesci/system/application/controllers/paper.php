<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of paper
 *
 * @author Faraj
 */
class Paper extends Controller{
    function Paper()
    {
        parent::Controller();
    }

    function enroll()
    {
        $user_id = $this->session->userdata('user_id');
        if(!$user_id)
        {
            $vars['msg'] = "you should login to view your friends";
            $this->load->view('alert/alert',$vars);
            return;
        }
        $eid = $this->uri->segment(3);
        $this->paperhandler->generate($user_id, $eid);
        $vars['exam'] = $this->examhandler->getByID($eid);
        $this->load->view('exam/view/confirm', $vars);
    }

    function question()
    {
        $user_id = $this->session->userdata('user_id');
        if(!$user_id)
        {
            $vars['msg'] = "you should login";
            $this->load->view('alert/alert',$vars);
            return;
        }
        $eid = $this->uri->segment(3);
        $paper = $this->paperhandler->getNextPaper($user_id, $eid);
        if(!$paper)
        {
            $vars['exam'] = $this->examhandler->getByID($eid);
            $this->load->view('exam/view/finish',$vars);
            return;
        }
        $vars['user_id'] = $user_id;
        $vars['question'] = $this->examhandler->getQuestionByID($paper->question_id);
        $vars['answers'] = $this->examhandler->getAnswers($vars['question']->id);
        $vars['exam'] = $this->examhandler->getByID($eid);
        $this->load->view('exam/view/question', $vars);
    }

    function answer()
    {
        $user_id = $this->session->userdata('user_id');
        if(!$user_id)
        {
            $vars['msg'] = "you should login";
            $this->load->view('alert/alert',$vars);
            return;
        }
        $aid = $this->uri->segment(3);
        $qid = $this->examhandler->getAnswerByID($aid)->question_id;
        $eid = $this->examhandler->getQuestionByID($qid)->exam_id;
        
        $this->paperhandler->setAnswer($user_id,$qid,$aid,$eid);
        $vars['user_id'] = $user_id;
        $vars['question'] = $this->examhandler->getQuestionByID($qid);
        $vars['answers'] = $this->examhandler->getAnswers($vars['question']->id);
        $vars['exam'] = $this->examhandler->getByID($eid);
        $this->load->view('exam/view/question', $vars);
    }

    function answeremove()
    {
        $user_id = $this->session->userdata('user_id');
        if(!$user_id)
        {
            $vars['msg'] = "you should login";
            $this->load->view('alert/alert',$vars);
            return;
        }
        $aid = $this->uri->segment(3);
        $qid = $this->examhandler->getAnswerByID($aid)->question_id;
        $eid = $this->examhandler->getQuestionByID($qid)->exam_id;

        $this->paperhandler->remAnswer($user_id,$qid,$aid,$eid);
        
        $vars['user_id'] = $user_id;
        $vars['question'] = $this->examhandler->getQuestionByID($qid);
        $vars['answers'] = $this->examhandler->getAnswers($vars['question']->id);
        $vars['exam'] = $this->examhandler->getByID($eid);
        $this->load->view('exam/view/question', $vars);
    }

    function result()
    {
        $user_id = $this->session->userdata('user_id');
        if(!$user_id)
        {
            $vars['msg'] = "you should login";
            $this->load->view('alert/alert',$vars);
            return;
        }
        $eid = $this->uri->segment(3);
        $answers = $this->paperhandler->getAllAnswers($user_id, $eid);
        $count = 0;
        $tcount = 0;
        foreach ($answers->result() as $paper_answer) {
            $qanswers = $this->examhandler->getAnswers($paper_answer->paper_question_id);
            foreach ($qanswers->result() as $qanswer)
            {
                 if($qanswer->is_answer)
                 {
                     $tcount++;
                     if($qanswer->id==$paper_answer->answer_id)
                     {
                         $count++;
                     }
                 }
            }
        }
        $vars["total"] = $tcount;
        $vars["correct"] = $count;
        $this->load->view('exam/view/result',$vars);
    }
}
?>
