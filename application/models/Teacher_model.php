<?php 
class Teacher_model extends CI_Model{


    public function __construct(){
        $this->load->database();
    }

    public function getTeacherSHS(){

        $myid = $_SESSION['UserID'];

        $query = $this->db->query("select DISTINCT Fullname,Teacher,Department
        from teachers,evaluations
        where Teacher = TeacherID
        and Department = 'SHSSupervisor'
        and Seniorhigh = 'Yes'
        and Teacher not in (select teacher from evaluation_transaction where pos = 'Principal' and evaluator = '$myid')");
                
        return $query->result_array();

    }

    public function getTeacherJHS(){

        $myid = $_SESSION['UserID'];

        $query = $this->db->query("select DISTINCT Fullname,Teacher,Department
        from teachers,evaluations
        where Teacher = TeacherID
        and Department = 'JHSSupervisor'
        and Juniorhigh = 'Yes'
        and Teacher not in (select teacher from evaluation_transaction where pos = 'Principal' and evaluator = '$myid')");
     
        return $query->result_array();

    }

    public function getTeacherGS(){

        $myid = $_SESSION['UserID'];
    
        $query = $this->db->query("select DISTINCT Fullname,Teacher,Department
        from teachers,evaluations
        where Teacher = TeacherID
        and Department = 'GSSupervisor'
        and Gradeschool = 'Yes'
        and Teacher not in (select teacher from evaluation_transaction where pos = 'Principal' and evaluator = '$myid')");

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




    
    public function deleteCredential($credentialID){

        $this->db->query("delete from teacher_credentials where CredentialID = $credentialID");

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










    public function getMyCredentials($myID){

        $query = $this->db->query("select * from teacher_credentials where TeacherID = $myID");
        return $query->result_array();

    }




    public function uploadCredential(){

        $teacherID = $_SESSION['UserID'];
        $cn = $this->input->post("credential");
        $al = $this->input->post("alignment");
        $points = 0;

        switch ($cn) {

            // CASE PART 1 EDUCATIONAL DEVELOPMENT
        case "Bachelor Degree":

            $points = 15;
            break;

        case "Masters Degree":
            
            switch ($al) {
                case 'Aligned to Bachelors Degree':
                    $points = 30;
                    break;
                case 'Related to Specialization':
                    $points = 25;
                    break;
                case 'M Not aligned':
                    $points = 20;
                    break;        
                default:
                    $points = 0;
                    break;
            }

            break;

        case 'Doctorate Degree':
            switch ($al) {
                case 'All Degrees are aligned':
                    $points = 40;
                    break;
                case 'Two Degrees allied or related':
                    $points = 38;
                    break;
                case 'D Not aligned':
                    $points = 35;
                    break;        
                default:
                    $points = 0;
                    break;
            }

            break;

        // CASE 2 PROFESIONAL DEVELOPMENT 
        // Research Presentation / Review
        case 'Paper presentation in international research conference':
            $points = 2.0;
            break;
        case 'Paper presentation in national research conference':
            $points = 1.5;
            break;
        case 'Paper presentation in regional research conference':
            $points = 1.0;
            break;
        case 'Paper presentation in local research conference':
            $points = 0.50;
            break;
        case 'Journal Editorial Board Membership/Editing work':
            $points = 0.25;
            break;
        case 'Involvement in Research Peered Review':
            $points = 0.25;
            break;    



        // CASE 3 PROFESIONAL DEVELOPMENT 
        // Publication of Research, Instructional Materials / Creative Works
        case 'Published book, Journal, textbook, manual, etc.':
            $points = 5.0;
            break;
        case 'Published article in international journal -scopus index, web of science, clarivate analytic':
            $points = 5.0;
            break;
        case 'Published article in national journal and international -but not publish in scopus index, web of science, clarivate analytic':
            $points = 3.0;
            break;
        case 'Published article in regional journal':
            $points = 2.0;
            break;
        case 'Involvement in a commissioned internal or external funded research':
            $points = 1.0;
            break;
        case 'locally published article or at The HCC Research Journal':
            $points = 1.0;
            break;   


        // CASE 4 PROFESIONAL DEVELOPMENT 
        // Participation in training/workshop
        case 'Training/Workshop International':
            $points = 2.0;
            break;
        case 'Training/Workshop National':
            $points = 1.5;
            break;
        case 'Training/Workshop Regional':
            $points = 1.0;
            break;
        case 'Training/Workshop Provincial':
            $points = 0.50;
            break;
        case 'Training/Workshop Congressional':
            $points = 0.25;
            break;
        case 'Training/Workshop Local':
            $points = 0.10;
            break;   


        // CASE 5 PROFESIONAL DEVELOPMENT 
        // Speaker / Lecturer in Training, Workshop or Seminar
        case 'Speaker or Lecturer in Training and Workshop or Seminar International':
            $points = 4.0;
            break;
        case 'Speaker or Lecturer in Training and Workshop or Seminar National':
            $points = 3.0;
            break;
        case 'Speaker or Lecturer in Training and Workshop or Seminar Regional':
            $points = 2.0;
            break;
        case 'Speaker or Lecturer in Training and Workshop or Seminar Provincial/Local Professional Audience':
            $points = 1.0;
            break;
        case 'Speaker or Lecturer in Training and Workshop or Seminar Provincial/Local Student Audience':
            $points = 0.5;
            break;
        

        // CASE 6 PROFESIONAL DEVELOPMENT 
        // Awards, Coaching / Competition [Academics or Sports]
        case 'Awards Coaching  Competition Academics or Sports Internationaly':
            $points = 4.0;
            break;
        case 'Awards Coaching  Competition Academics or Sports National':
            $points = 3.0;
            break;
        case 'Awards Coaching  Competition Academics or Sports Regional':
            $points = 2.0;
            break;
        case 'Awards Coaching  Competition Academics or Sports Provincial':
            $points = 1.0;
            break;
        case 'Awards Coaching  Competition Academics or Sports Congretional':
            $points = 0.5;
            break;
        case 'Awards Coaching  Competition Academics or Sports Local':
            $points = 0.25;
            break;
    


         // CASE 6 PROFESIONAL DEVELOPMENT 
        // Professional Organizations
        case 'Holding a position in Professional Organization':
            $points = 2.0;
            break;
        case 'Membership in Professional Organization':
            $points = 1.0;
            break;
        case 'Academic Consultancy including Paneling orAdvising':
            $points = 0.5;
            break;
        case 'Research professional level consultancy':
            $points = 0.5;
            break;

         // CASE 7 PROFESIONAL DEVELOPMENT 
        // Professional Licensure / Certification
        case 'PRC Licensure Exam':
            $points = 5.0;
            break;
        case 'Certification Exam from Recognized Professional Organization':
            $points = 5.0;
            break;
        case 'Eligibility Exam from the Government (Civil Service)':
            $points = 3.0;
            break;
        case 'Industry-based Certification Exam / TESDA':
            $points = 1.0;
            break;



         // CASE 8 Community and Extension Service
        // FIDES
        case 'Coordinative service for Pastoral Activity':
            $points = 1.7;
            break;
        case 'Any Catholic Religious Works Activities':
            $points = 1.7;
            break;

        // CASE 9 Community and Extension Service
        // CARITAS
        case 'Community Outreach':
            $points = 1.7;
            break;
        case 'Any Charitable Works':
            $points = 1.7;
            break;

        // CASE 10 Community and Extension Service
        // LIBERTAS
        case 'Service Training':
            $points = 1.7;
            break;
        case 'Research Based Community Extension':
            $points = 1.7;
            break;           

        // CASE 11 Community and Extension Service
        // Services Outside
        case 'Services Outside HCC Community Leader / Facilitator / Coordinator':
            $points = 5.0;
            break;
        case 'Services Outside HCC Community Member / Participants':
            $points = 2.50;
            break;           


        // CASE 12 Community and Extension Service
        // Services within
        case 'Services within HCC Community Leader / Facilitator / Coordinator':
            $points = 2.50;
            break;
        case 'Services within HCC Community Member / Participants':
            $points = 1.25;
            break;   

        // CASE 13 WORK EXPERIENCE
        case 'Full-time teaching in Tertiary Level/ Graduate School  at HCC':
            $points = 1.0;
            break;
        case 'Full-time teaching in Basic Education Level at HCC':
            $points = 0.80;
            break;   
        case 'Part- time teaching in Tertiary Level/ Graduate School at HCC':
            $points = 0.50;
            break;
        case 'Part-time teaching in Basic Education Level at HCC':
            $points = 0.40;
            break;   
        case 'Full-time teaching in Tertiary Level/ Graduate School':
            $points = 0.50;
            break;
        case 'Full-time teaching in Basic Education Level':
            $points = 0.40;
            break;   
        case 'Part- time teaching in Tertiary Level/ Graduate School':
            $points = 0.25;
            break;
        case 'Part-time teaching in Basic Education Level':
            $points = 0.20;
            break;                  
        case 'Work Related to Profession but not teaching':
            $points = 0.25;
            break;
        case 'Work not Related to Profession':
            $points = 0.10;
            break;    

        default:
            $points = 0;
        }


        $data = array(
            'CredentialName' => $this->input->post("credential"),
            'Category' => $this->input->post("cate"),
            'TeacherID' => $teacherID,
            'Points' => $points,
            'Alignment' => $al
        );
        $this->db->insert('teacher_credentials', $data);

        $select = $this->db->query("select CredentialID from teacher_credentials order by CredentialID desc limit 1");
        foreach($select->result_array() as $row){
            $credentialID = $row['CredentialID'];
        }

        $config['allowed_types'] = 'pdf'; 
        $config['upload_path'] = './credential/';  
        $config['file_name'] = $credentialID;
        $this->load->library('upload',$config);

        if ($this->upload->do_upload('suppdoc')) {
            $this->upload->data();
        }else{
            return $this->upload->display_errors();
        }


    }



}