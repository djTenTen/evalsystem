<?php 
class Admin_model extends CI_Model{


    public function __construct(){
        $this->load->database();
    }


    public function getTeachers(){ 

        $query = $this->db->get('teachers');
        return $query->result_array();

    }




    public function saveTeacher(){

        $data = array(
            'Fullname' => strtoupper($this->input->post('lname')).', '.strtoupper($this->input->post('fname')).' '.strtoupper($this->input->post('mname')),
            'email' => $this->input->post('email'),
            'pass' => strtoupper($this->input->post('lname')),
            'Position' => $this->input->post('position'),
            'dpt' => $this->input->post('area'),
            'Seniorhigh' => $this->input->post('shs'),
            'Juniorhigh' => $this->input->post('jhs'),
            'Gradeschool' => $this->input->post('gs')
        );

        $this->db->insert('teachers', $data);

    }




    public function updateTeacher($teacherID){

        $data = array(
            'Fullname' => strtoupper($this->input->post('name')),
            'email' => $this->input->post('email'),
            'pass' => $this->input->post('pass'),
            'Seniorhigh' => $this->input->post('shs'),
            'Juniorhigh' => $this->input->post('jhs'),
            'Gradeschool' => $this->input->post('gs')
        );

        $this->db->where('TeacherID',$teacherID);
        $this->db->update('teachers', $data);

    }



    public function deleteTeacher($teacherID){

        $this->db->where('TeacherID',$teacherID);
        $this->db->delete('teachers');

    }













    public function getQuestions(){

        $query = $this->db->get('questions');
        return $query->result_array();

    }

    public function saveQuestion(){
        $data = array(
            'QuestionName' => $this->input->post('qname'),
            'Question' => $this->input->post('question')
        );

        $this->db->insert('questions', $data);
    }



    public function updateQuestion($questionID){
        $data = array(
            'QuestionName' => $this->input->post('qname'),
            'Question' => $this->input->post('question')
        );

        $this->db->where('questionID',$questionID);
        $this->db->update('questions', $data);
    }

    public function deleteQuestion($QuestionID){

        $this->db->where('questionID',$QuestionID);
        $this->db->delete('questions');

    }














    public function getSections(){
        $query = $this->db->query("select * from section where Department != 'College'");
        return $query->result_array();
    }


    public function addTempSection($sectionID){

        $userID = $_SESSION['UserID'];
        
        $query = $this->db->query("select count(UserID) as cuser 
        from temp_section
        where Section = '$sectionID'
        and UserID = '$userID'");
        $count = $query->row_array();
        if($count['cuser'] > 0){
            return $count;
        }else{
            $data = array(
                'Section' => $sectionID,
                'UserID' => $userID
            );
    
            $this->db->insert('temp_section', $data);
        }
       
       

    }

    public function getTempSection(){
        
        $userID = $_SESSION['UserID'];
        $query = $this->db->query("select section.SectionID as ssi, temp_section.SectionID as ssid, Year,section.Section,Department 
        from section,temp_section
        where temp_section.Section = section.SectionID
        and UserID = '$userID'");

        return $query->result_array();
    }


    public function removeTempSection($sectionID){

        $this->db->where("SectionID",$sectionID);
        $this->db->delete("temp_section");

    }

    public function assignSections(){

        $userID = $_SESSION['UserID'];
        $query = $this->db->query("select * from temp_section where UserID = '$userID'");
        foreach($query->result_array() as $row){
            $data = array(
                'TeacherID' => $this->input->post('teacher'),
                'SectionID' => $row['Section'],
                'SY' => $this->input->post('sy')
            );
            $this->db->insert("assign_section", $data);
        }

        $this->db->where("UserID", $userID);
        $this->db->delete("temp_section");

    }
    public function removeTeacherSection($teacherID, $sectionID){

        $this->db->query("delete from assign_section where teacherID = $teacherID and SectionID = $sectionID");
    }


    public function getAssignedSection($teacherID){

        $query = $this->db->query("select section.SectionID,Year,Section,Department
        from section,assign_section
        where section.SectionID = assign_section.SectionID
        and teacherID = '$teacherID'");

        return $query->result_array();


    }


   
    public function getTempQuestion(){

        $userID = $_SESSION['UserID'];
        $query = $this->db->query("select QuestionID,q.QuestionName,q.Question,tempquestionID
        from questions as q,temp_question as tq
        where tq.Question = q.QuestionID
        and userID = $userID");

        return $query->result_array();


    }

    public function addTempQuestion($questionID){

        $userID = $_SESSION['UserID'];

        $query = $this->db->query("select * from temp_question where Question = $questionID and userID = $userID");
        $count = $query->num_rows();
        if($count > 0){
            return $count;
        }else{
            $data = array(
                'Question' => $questionID,
                'userID' => $userID
            );
    
            $this->db->insert('temp_question', $data);
        }
        


    }


    public function removeTempQuestion($tqID){

        $this->db->where('tempquestionID', $tqID);
        $this->db->delete('temp_question');

    }

    public function registerSetQuestion(){

        $userID = $_SESSION['UserID'];
        
        $query = $this->db->query("select * from temp_question where userID = $userID");

        foreach($query->result_array() as $row){
            $data = array(
                'Setname' => strtoupper($this->input->post('setname')),
                'Question' => $row['Question'],
                'dpt' => $this->input->post('dpt'),
                'sy' => $this->input->post('sy')

            );
            $this->db->insert("setquestions", $data);
        }

        $this->db->where("userID", $userID);
        $this->db->delete('temp_question');


    }




    public function getSets(){

        $query = $this->db->query("select distinct Setname from setquestions");
        return $query->result_array();

    }



    public function sendQuestions(){

        $setname = $this->input->post('setname');
        $dpt = $this->input->post('dpt');
        $sy = $this->input->post('sy');

        if($dpt == 'Seniorhigh' || $dpt == 'Juniorhigh'){
            // selecting teachers
            $teach = $this->db->query("select TeacherID from teachers where $dpt = 'Yes'");

            // selecting questions
            $set = $this->db->query("select Question from setquestions where Setname = '$setname'");
            

            foreach($teach->result_array() as $t){//fetching the teachers
                $tid = $t['TeacherID'];
                // selecting of section
                $sec = $this->db->query("select SectionID from assign_section where TeacherID = $tid");

                foreach($sec->result_array() as $section){

                    foreach($set->result_array() as $sn){//fetching the questions via set name

                        // merging data of questions and teachers
                        $data = array(
                            'QuestionID' => $sn['Question'], //data from set of questions
                            'Section' => $section['SectionID'], // data from assigned section
                            'Teacher' => $t['TeacherID'], // data from teachers
                            'Department' => $dpt,
                            'Set' => $setname
                        );
        
                        $this->db->insert("evaluations", $data);
        
                    }

                }

            } 
        }
        
        
        if($dpt == 'SHSTeacher'){

            // selecting teachers
            $teach = $this->db->query("select TeacherID from teachers where Seniorhigh = 'Yes' and Position = 'Teacher'");

            // selecting questions
            $set = $this->db->query("select Question from setquestions where Setname = '$setname'");


            foreach($teach->result_array() as $t){//fetching the teachers
                $tid = $t['TeacherID'];

                    foreach($set->result_array() as $sn){//fetching the questions via set name

                        // merging data of questions and teachers
                        $data = array(
                            'QuestionID' => $sn['Question'], //data from set of questions
                            'Teacher' => $t['TeacherID'], // data from teachers
                            'Department' => $dpt,
                            'Set' => $setname
                        );

                        $this->db->insert("evaluations", $data);

                    }
            } 


        }


        if($dpt == 'JHSTeacher'){

            // selecting teachers
            $teach = $this->db->query("select TeacherID from teachers where Juniorhigh = 'Yes' and Position = 'Teacher'");

            // selecting questions
            $set = $this->db->query("select Question from setquestions where Setname = '$setname'");


            foreach($teach->result_array() as $t){//fetching the teachers
                $tid = $t['TeacherID'];

                    foreach($set->result_array() as $sn){//fetching the questions via set name

                        // merging data of questions and teachers
                        $data = array(
                            'QuestionID' => $sn['Question'], //data from set of questions
                            'Teacher' => $t['TeacherID'], // data from teachers
                            'Department' => $dpt,
                            'Set' => $setname
                        );

                        $this->db->insert("evaluations", $data);

                    }
            } 


        }



        if($dpt == 'GSTeacher'){

            // selecting teachers
            $teach = $this->db->query("select TeacherID from teachers where Gradeschool = 'Yes' and Position = 'Teacher'");

            // selecting questions
            $set = $this->db->query("select Question from setquestions where Setname = '$setname'");


            foreach($teach->result_array() as $t){//fetching the teachers
                $tid = $t['TeacherID'];

                    foreach($set->result_array() as $sn){//fetching the questions via set name

                        // merging data of questions and teachers
                        $data = array(
                            'QuestionID' => $sn['Question'], //data from set of questions
                            'Teacher' => $t['TeacherID'], // data from teachers
                            'Department' => $dpt,
                            'Set' => $setname
                        );

                        $this->db->insert("evaluations", $data);

                    }
            } 


        }
        

        if($dpt == 'SHSSupervisor'){

            // selecting teachers
            $teach = $this->db->query("select TeacherID from teachers where Seniorhigh = 'Yes' and Position = 'Teacher'");

            // selecting questions
            $set = $this->db->query("select Question from setquestions where Setname = '$setname'");


            foreach($teach->result_array() as $t){//fetching the teachers
                $tid = $t['TeacherID'];

                    foreach($set->result_array() as $sn){//fetching the questions via set name

                        // merging data of questions and teachers
                        $data = array(
                            'QuestionID' => $sn['Question'], //data from set of questions
                            'Teacher' => $t['TeacherID'], // data from teachers
                            'Department' => $dpt,
                            'Set' => $setname
                        );

                        $this->db->insert("evaluations", $data);

                    }
            }

        }


        if($dpt == 'JHSSupervisor'){

            // selecting teachers
            $teach = $this->db->query("select TeacherID from teachers where Juniorhigh = 'Yes' and Position = 'Teacher'");

            // selecting questions
            $set = $this->db->query("select Question from setquestions where Setname = '$setname'");


            foreach($teach->result_array() as $t){//fetching the teachers
                $tid = $t['TeacherID'];

                    foreach($set->result_array() as $sn){//fetching the questions via set name

                        // merging data of questions and teachers
                        $data = array(
                            'QuestionID' => $sn['Question'], //data from set of questions
                            'Teacher' => $t['TeacherID'], // data from teachers
                            'Department' => $dpt,
                            'Set' => $setname
                        );

                        $this->db->insert("evaluations", $data);

                    }
            }

        }



        if($dpt == 'GSSupervisor'){

            // selecting teachers
            $teach = $this->db->query("select TeacherID from teachers where Gradeschool = 'Yes' and Position = 'Teacher'");

            // selecting questions
            $set = $this->db->query("select Question from setquestions where Setname = '$setname'");


            foreach($teach->result_array() as $t){//fetching the teachers
                $tid = $t['TeacherID'];

                    foreach($set->result_array() as $sn){//fetching the questions via set name

                        // merging data of questions and teachers
                        $data = array(
                            'QuestionID' => $sn['Question'], //data from set of questions
                            'Teacher' => $t['TeacherID'], // data from teachers
                            'Department' => $dpt,
                            'Set' => $setname
                        );

                        $this->db->insert("evaluations", $data);

                    }
            }

        }
        
        




    }





    public function getSHSteacher(){

        $query = $this->db->query("select * from teachers where Seniorhigh = 'Yes' and dpt = 'Teacher'");
        return $query->result_array();

    }

    public function getJHSteacher(){

        $query = $this->db->query("select * from teachers where Juniorhigh = 'Yes' and dpt = 'Teacher'");
        return $query->result_array();

    }

    public function getGSteacher(){

        $query = $this->db->query("select * from teachers where Gradeschool = 'Yes' and dpt = 'Teacher'");
        return $query->result_array();

    }


















    //dashboard data PERFORMANCE
    public function getRankingSHSPerformance(){
        $query = $this->db->query("select Fullname,SummPerformance
        from teachers,summary
        where Teacher = TeacherID
        and Seniorhigh = 'Yes'
        and summary.dpt = 'shs'
        order by SummPerformance desc
        ");

        return $query->result_array();
    }



    public function getRankingJHSPerformance(){
        $query = $this->db->query("select Fullname,SummPerformance
        from teachers,summary
        where Teacher = TeacherID
        and Juniorhigh = 'Yes'
        and summary.dpt = 'jhs'
        order by SummPerformance desc
        ");

        return $query->result_array();
    }


    public function getRankingGSPerformance(){
        $query = $this->db->query("select Fullname,SummPerformance
        from teachers,summary
        where Teacher = TeacherID
        and Gradeschool = 'Yes'
        and summary.dpt = 'gs'
        order by SummPerformance desc
        ");

        return $query->result_array();
    }

    //dashboard data CREDENTIALS
    public function getRankingSHSCredentials(){
        $query = $this->db->query("select Fullname,SummCredentials
        from teachers,summary
        where Teacher = TeacherID
        and Seniorhigh = 'Yes'
        and summary.dpt = 'shs'
        order by SummCredentials desc
        ");

        return $query->result_array();
    }



    public function getRankingJHSCredentials(){
        $query = $this->db->query("select Fullname,SummCredentials
        from teachers,summary
        where Teacher = TeacherID
        and Juniorhigh = 'Yes'
        and summary.dpt = 'jhs'
        order by SummCredentials desc
        ");

        return $query->result_array();
    }


    public function getRankingGSCredentials(){
        $query = $this->db->query("select Fullname,SummCredentials
        from teachers,summary
        where Teacher = TeacherID
        and Gradeschool = 'Yes'
        and summary.dpt = 'gs'
        order by SummCredentials desc
        ");

        return $query->result_array();
    }



    public function getCredentials($teacherID){

        $query = $this->db->query("select * 
        from teacher_credentials
        where TeacherID = $teacherID");

        return $query->result_array();

    }


    public function saveCredentialScore($credentialID){

        $data = array(
            'Points' => $this->input->post("score")
        );
        $this->db->where("CredentialID", $credentialID);
        $this->db->update("teacher_credentials", $data);

    }











































}


