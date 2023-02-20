<?php 
class Teacher_model extends CI_Model{


    public function __construct(){
        $this->load->database();
    }

    public function getTeacherSHS(){


        $query = $this->db->query("select DISTINCT Fullname,Teacher,Department
        from teachers,evaluations
        where Teacher = TeacherID
        and Department = 'SHSSupervisor'
        and Seniorhigh = 'Yes'
        and Teacher not in (select teacher from evaluation_transaction where pos = 'Principal')");
                
        return $query->result_array();

    }

    public function getTeacherJHS(){
    
        $query = $this->db->query("select DISTINCT Fullname,Teacher,Department
        from teachers,evaluations
        where Teacher = TeacherID
        and Department = 'JHSSupervisor'
        and Juniorhigh = 'Yes'
        and Teacher not in (select teacher from evaluation_transaction where pos = 'Principal')");
     
        return $query->result_array();

    }

    public function getTeacherGS(){
    
        $query = $this->db->query("select DISTINCT Fullname,Teacher,Department
        from teachers,evaluations
        where Teacher = TeacherID
        and Department = 'GSSupervisor'
        and Gradeschool = 'Yes'
        and Teacher not in (select teacher from evaluation_transaction where pos = 'Principal')");

        return $query->result_array();

    }









    public function getTeacherSHSvpaa(){


        $query = $this->db->query("select DISTINCT Fullname,Teacher,Department
        from teachers,evaluations
        where Teacher = TeacherID
        and Department = 'SHSSupervisor'
        and Seniorhigh = 'Yes'
        and Teacher not in (select teacher from evaluation_transaction where pos = 'VPAA')");
                
        return $query->result_array();

    }

    public function getTeacherJHSvpaa(){
    
        $query = $this->db->query("select DISTINCT Fullname,Teacher,Department
        from teachers,evaluations
        where Teacher = TeacherID
        and Department = 'JHSSupervisor'
        and Juniorhigh = 'Yes'
        and Teacher not in (select teacher from evaluation_transaction where pos = 'VPAA')");
     
        return $query->result_array();

    }

    public function getTeacherGSvpaa(){
    
        $query = $this->db->query("select DISTINCT Fullname,Teacher,Department
        from teachers,evaluations
        where Teacher = TeacherID
        and Department = 'GSSupervisor'
        and Gradeschool = 'Yes'
        and Teacher not in (select teacher from evaluation_transaction where pos = 'VPAA')");

        return $query->result_array();

    }












    
    
    public function getTransaction(){

        $UID = $_SESSION['UserID'];

        $query = $this->db->query("select * from evaluation_transaction where evaluator = $UID and teacher = $UID");
        return $query->result_array();
    }


    public function teacherQuestions($teacherID,$dpt){

        $query = $this->db->query("select resultID,Question,sdisagree,disagree,agree,sagree
        from questions,evaluations
        where evaluations.QuestionID = questions.QuestionID
        and Teacher = $teacherID
        and Department = '$dpt'");

        return $query->result_array();



    }



    


    public function logSupAnswer($teacherID,$dpt){

        $userID = $_SESSION['UserID'];
        $Position = $_SESSION['Position'];
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
            'pos' => $Position,
            'teacher' => $teacherID
        );

        $this->db->insert("evaluation_transaction", $data);

    }













    public function selfTeacherQuestionsSHS($teacherID){

        $query = $this->db->query("select resultID,Question,sdisagree,disagree,agree,sagree
        from questions,evaluations
        where evaluations.QuestionID = questions.QuestionID
        and Teacher = $teacherID
        and Department = 'SHSTeacher'");
        return $query->result_array();

    }


    public function selfTeacherQuestionsJHS($teacherID){

        $query = $this->db->query("select resultID,Question,sdisagree,disagree,agree,sagree
        from questions,evaluations
        where evaluations.QuestionID = questions.QuestionID
        and Teacher = $teacherID
        and Department = 'JHSTeacher'");
        return $query->result_array();

    }


    public function selfTeacherQuestionsGS($teacherID){

        $query = $this->db->query("select resultID,Question,sdisagree,disagree,agree,sagree
        from questions,evaluations
        where evaluations.QuestionID = questions.QuestionID
        and Teacher = $teacherID
        and Department = 'GSTeacher'");
        return $query->result_array();

    }








    public function logMyAnswer($teacherID){

        $userID = $_SESSION['UserID'];
        $Position = $_SESSION['Position'];
        
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
            'pos' => $Position,
            'teacher' => $teacherID
        );

        $this->db->insert("evaluation_transaction", $data);

    }



}