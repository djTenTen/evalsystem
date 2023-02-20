<?php 
class Student_model extends CI_Model{


    public function __construct(){
        $this->load->database();
    }




    public function getTeachers(){


        $userID = $_SESSION['UserID'];
        
        $sec = $_SESSION['Section'];
        $section = $this->db->query("select SectioniD from section where Section = '$sec'");

        foreach($section->result_array() as $secs){
            $sid = $secs['SectioniD'];
        }

        $teach = $this->db->query("select DISTINCT assign_section.teacherID,Fullname,SectionID
        from assign_section,teachers,evaluation_transaction
        where SectionID = '$sid'
        and assign_section.teacherID = teachers.TeacherID
        and assign_section.teacherID not in (select teacher from evaluation_transaction where evaluator = $userID and section = $sid)
        ");

        return $teach->result_array();

    }


    public function getTeacherName($teacherID){
        $query = $this->db->query("select Fullname from teachers where TeacherID = $teacherID");
        return $query->row_array();
    }

    public function getEvaluationQuestion($teacherID,$sectionID){

        $query = $this->db->query("select resultID,Question,sdisagree,disagree,agree,sagree
        from questions,evaluations
        where evaluations.QuestionID = questions.QuestionID
        and Teacher = $teacherID
        and Section = $sectionID");

        return $query->result_array();

    }



    public function logAnswer($teacherID,$sectionID){

        $userID = $_SESSION['UserID'];
        
        $count = count($_POST['rid']);

        // registering answers
        foreach($_POST['rid'] as $rid){

            $ressd = "ressd".$rid;
            $resd = "resd".$rid;

            $resa = "resa".$rid;
            $ressa = "ressa".$rid;
            
            $sdisagree = (int)$this->input->post($ressd); 
            $disagree = (int)$this->input->post($resd);
            $agree = (int)$this->input->post($resa);
            $sagree = (int)$this->input->post($ressa);

            $this->db->query("update evaluations set 
            sdisagree = sdisagree + $sdisagree,
            disagree =  disagree + $disagree,
            agree = agree + $agree,
            sagree = sagree + $sagree
            where resultID = $rid");

        }


        //Evaluation History
        $data = array(
            'evaluator' => $userID,
            'section' => $sectionID,
            'pos' => 'Student',
            'teacher' => $teacherID
        );

        $this->db->insert("evaluation_transaction", $data);

        


    }



}