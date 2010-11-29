<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of question
 *
 * @author Faraj
 */
class Question extends Controller{
    function Question()
    {
        parent::Controller();
    }

    function index()
    {
        $eid = $this->uri->segment(3);
        $vars['questions'] = $this->examhandler->getQuestions($eid);
        $vars['exam'] = $this->examhandler->getByID($eid);
        $this->load->view('exam/admin/question/index',$vars);
    }
    
    function showcreatequestion()
    {
        $vars['eid'] = $this->uri->segment(3);
        $vars['qtypes'] = $this->examhandler->getQuestionTypes();
        $this->load->view('exam/admin/question/create', $vars);
    }

    function createquestion()
    {
        $question = $this->input->post('question');
        $eid = $this->input->post('eid');
        if($question && $eid)
        {
            $this->examhandler->createQuestion($eid, $question);
            $vars['questions'] = $this->examhandler->getQuestions($eid);
            $vars['exam'] = $this->examhandler->getByID($eid);
            $this->load->view('exam/admin/question/index', $vars);
        }
        else
        {
            $vars['eid'] = $this->uri->segment(3);
            $vars['qtypes'] = $this->examhandler->getQuestionTypes();
            $this->load->view('exam/admin/question/create', $vars);
        }
    }

    function showeditquestion()
    {
        $qid = $this->uri->segment(3);
        $vars['question'] = $this->examhandler->getQuestionByID($qid);
        $vars['qtypes'] = $this->examhandler->getQuestionTypes();
        $this->load->view('exam/admin/question/edit', $vars);
    }

    function editquestion()
    {
        $question = $this->input->post('question');
        $qid = $this->input->post('qid');
        if($question && $qid)
        {
            $this->examhandler->editQuestion($qid, $question);    
        }
        $vars['question'] = $this->examhandler->getQuestionByID($qid);
        $this->load->view('exam/admin/question/view', $vars);
    }

    function deletequestion()
    {
        $qid = $this->uri->segment(3);
        $this->examhandler->removeQuestion($qid);
        $vars['msg'] = "deleted";
        $this->load->view('alert/msg', $vars);
    }

    function viewquestion()
    {
        $qid = $this->uri->segment(3);
        $vars['question'] = $this->examhandler->getQuestionByID($qid);
        $this->load->view('exam/admin/question/view', $vars);
    }

    function viewanswer()
    {
        $qid = $this->uri->segment(3);
        $vars["answers"] = $this->examhandler->getAnswers($qid);
        $vars['question'] =$this->examhandler->getQuestionByID($qid);
        $this->load->view('exam/admin/answer/view', $vars);
    }

    function addanswer()
    {
        $answer = $this->input->post('answer');
        $qid = $this->input->post('qid');
        $is_answer = false;
        if($answer&&$qid)
        {
            $this->examhandler->createAnswer($qid, $answer, $is_answer);
        }
        $vars["answers"] = $this->examhandler->getAnswers($qid);
        $vars['question'] =$this->examhandler->getQuestionByID($qid);
        $this->load->view('exam/admin/answer/view', $vars);
    }

    function deleteanswer()
    {
        $aid = $this->uri->segment(3);
        $qid = $this->examhandler->getAnswerByID($aid)->question_id;
        $this->examhandler->removeAnswer($aid);
        $vars["answers"] = $this->examhandler->getAnswers($qid);
        $vars['question'] =$this->examhandler->getQuestionByID($qid);
        $this->load->view('exam/admin/answer/view', $vars);
    }

    function answertoggle()
    {
        $aid = $this->uri->segment(3);
        $qid = $this->examhandler->getAnswerByID($aid)->question_id;
        $this->examhandler->toggleIsAnswer($aid);
        $vars["answers"] = $this->examhandler->getAnswers($qid);
        $vars['question'] =$this->examhandler->getQuestionByID($qid);
        $this->load->view('exam/admin/answer/view', $vars);
    }
}
?>
