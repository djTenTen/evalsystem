<?php
class Admin_controller extends CI_Controller{

    public function dashboard(){

        if(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }elseif($_SESSION['Authentication'] === 1){

            $page = 'dashboard';
            if(!file_exists(APPPATH.'views/admin/'.$page.'.php')){
                show_404();
            }else{
                $data['title'] = "Dashboard";

                $data['shs'] = $this->Admin_model->getSHSteacher();
                $data['jhs'] = $this->Admin_model->getJHSteacher();
                $data['gs'] = $this->Admin_model->getGSteacher();

                $this->load->view('templates/header', $data);
                $this->load->view('admin/'.$page, $data);
                $this->load->view('templates/footer');
            }
            
        }

    }



    public function teacher(){
    
        if(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }elseif($_SESSION['Authentication'] === 1){

            $page = 'teachers';
            if(!file_exists(APPPATH.'views/admin/'.$page.'.php')){
                show_404();
            }else{
                $data['title'] = "Teacher Management";
                $data['teacher'] = $this->Admin_model->getTeachers();
                $this->load->view('templates/header', $data);
                $this->load->view('admin/'.$page, $data);
                $this->load->view('templates/footer');
            }
            
        }


    }



    public function saveTeacher(){

        $this->session->set_flashdata('teachername', strtoupper($this->input->post('lname')).', '.strtoupper($this->input->post('fname')).' '.strtoupper($this->input->post('mname')));
        $this->Admin_model->saveTeacher();
        $this->session->set_flashdata('Added','Added');
        redirect('teacher');

    }


    public function updateTeacher($teacherID){

        $this->session->set_flashdata('teachername', strtoupper($this->input->post('name')));
        $this->Admin_model->updateTeacher($teacherID);
        $this->session->set_flashdata('Updated','Updated');
        redirect('teacher');

    }


    public function deleteTeacher($teacherID){

        $query=$this->db->query("select Fullname from teachers where TeacherID = $teacherID");
        $t = $query->row_array();
        $this->session->set_flashdata('dteachername',$t['Fullname']);
        $this->Admin_model->deleteTeacher($teacherID);
        $this->session->set_flashdata('Deleted','Deleted');
        redirect('teacher');

    }















    public function questions(){
    

        if(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }elseif($_SESSION['Authentication'] === 1){

            $page = 'questions';
            if(!file_exists(APPPATH.'views/admin/'.$page.'.php')){
                show_404();
            }else{
                $data['title'] = "Question Management";
                $data['question'] = $this->Admin_model->getQuestions();
                $this->load->view('templates/header', $data);
                $this->load->view('admin/'.$page, $data);
                $this->load->view('templates/footer');
            }
            
        }


    }





    public function saveQuestion(){

        $this->Admin_model->saveQuestion();
        $this->session->set_flashdata('Added','Added');
        redirect('questions');

    }

    public function updateQuestion($QuestionID){

        $this->Admin_model->updateQuestion($QuestionID);
        $this->session->set_flashdata('Updated','Updated');
        redirect('questions');

    }

    
    public function deleteQuestion($QuestionID){

        $this->Admin_model->deleteQuestion($QuestionID);
        $this->session->set_flashdata('Deleted','Deleted');
        redirect('questions');

    }







    public function sectionAssignment(){
    

        if(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }elseif($_SESSION['Authentication'] === 1){

            $page = 'sectionassignment';
            if(!file_exists(APPPATH.'views/admin/'.$page.'.php')){
                show_404();
            }else{
                $data['title'] = "Section Assignment Management";
                $data['sec'] = $this->Admin_model->getSections();
                $data['teacher'] = $this->Admin_model->getTeachers();
                $data['tempsec'] = $this->Admin_model->getTempSection();
                $this->load->view('templates/header', $data);
                $this->load->view('admin/'.$page, $data);
                $this->load->view('templates/footer');
            }
            
        }


    }


    public function addTempSection($sectionID){

        $dup = $this->Admin_model->addTempSection($sectionID);
        if($dup['cuser'] > 0){
            $this->session->set_flashdata('Duplicate','Duplicate');
            redirect('sectionassignment');
        }else{
            redirect('sectionassignment');
        }
    }

    public function removeTempSection($sectionID){

        $this->Admin_model->removeTempSection($sectionID);
        redirect('sectionassignment');

    }


    public function assignSections(){

        $this->Admin_model->assignSections();
        $this->session->set_flashdata('Added','Added');
        redirect('sectionassignment');

    }


    public function editSectionAssignment($teacherID){

        if(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }elseif($_SESSION['Authentication'] === 1){

            $page = 'editsectionassignment';
            if(!file_exists(APPPATH.'views/admin/'.$page.'.php')){
                show_404();
            }else{
                $data['title'] = "Edit tSection Assignment Management";
                $data['TeacherID'] = $teacherID;
                

                $data['sections'] = $this->Admin_model->getSections();
                $data['mysections'] = $this->Admin_model->getAssignedSection($teacherID);
                $this->load->view('templates/header', $data);
                $this->load->view('admin/'.$page, $data);
                $this->load->view('templates/footer');
            }
            
        }

    }

    public function removeTeacherSection($teacherID, $sectionID){

        $this->Admin_model->removeTeacherSection($teacherID, $sectionID);
        $this->session->set_flashdata('Remove','Remove');
        redirect('editsectionassignment/'.$teacherID);
        
    }
















    public function setQuestions(){

        if(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }elseif($_SESSION['Authentication'] === 1){

            $page = 'setquestions';
            if(!file_exists(APPPATH.'views/admin/'.$page.'.php')){
                show_404();
            }else{
                $data['title'] = "Set Questions";
                
                
                $data['quest'] = $this->Admin_model->getQuestions();
                $data['tempquest'] = $this->Admin_model->getTempQuestion();
                $this->load->view('templates/header', $data);
                $this->load->view('admin/'.$page, $data);
                $this->load->view('templates/footer');

            }
            
        }

    }


    public function addTempQuestion($questionID){

        $dup = $this->Admin_model->addTempQuestion($questionID);
        if($dup> 0){
            $this->session->set_flashdata('Duplicate','Duplicate');
            redirect('setquestions');
        }else{
            redirect('setquestions');
        }

    }   





    

    public function removeTempQuestion($tqID){

        $this->Admin_model->removeTempQuestion($tqID);
        redirect('setquestions');

    }



    public function registerSetQuestion(){

        $this->Admin_model->registerSetQuestion();
        $this->session->set_flashdata('Added','Added');
        redirect('setquestions');

    }



    public function sets(){

        if(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }elseif($_SESSION['Authentication'] === 1){

            $page = 'set';
            if(!file_exists(APPPATH.'views/admin/'.$page.'.php')){
                show_404();
            }else{
                $data['title'] = "Set of Questions";

                $data['sets'] = $this->Admin_model->getSets();
                $this->load->view('templates/header', $data);
                $this->load->view('admin/'.$page, $data);
                $this->load->view('templates/footer');

            }
            
        }

    }



    public function sendQuestions(){

        $this->Admin_model->sendQuestions();
        $this->session->set_flashdata('Send','Send');
        redirect('sets');

    }


















    //results

    public function Results(){

        if(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }elseif($_SESSION['Authentication'] === 1){

            $page = 'results';
            if(!file_exists(APPPATH.'views/admin/'.$page.'.php')){
                show_404();
            }else{
                $data['title'] = "Evaluation Results";
 
                $data['shs'] = $this->Admin_model->getSHSteacher();
                $data['jhs'] = $this->Admin_model->getJHSteacher();
                $data['gs'] = $this->Admin_model->getGSteacher();
                $this->load->view('templates/header', $data);
                $this->load->view('admin/'.$page, $data);
                $this->load->view('templates/footer');

            }
            
        }
        
    }



    public function resultsCredentials(){

        if(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }elseif($_SESSION['Authentication'] === 1){

            $page = 'resultscredentials';
            if(!file_exists(APPPATH.'views/admin/'.$page.'.php')){
                show_404();
            }else{
                $data['title'] = "Evaluation Results";

                $this->Admin_model->getcredentialresult();

                $data['shs'] = $this->Admin_model->getTeachersRankSHS();
                $data['jhs'] = $this->Admin_model->getTeachersRankJHS();
                $data['gs'] = $this->Admin_model->getTeachersRankGS();

                
                $this->load->view('templates/header', $data);
                $this->load->view('admin/'.$page, $data);
                $this->load->view('templates/footer');

            }
            
        }
        
    }

    



    public function teacherCredentials(){

        if(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }elseif($_SESSION['Authentication'] === 1){

            $page = 'teachercredentials';
            if(!file_exists(APPPATH.'views/admin/'.$page.'.php')){
                show_404();
            }else{
                $data['title'] = "Evaluation Results";

                $data['teacher'] = $this->Admin_model->getTeachers();
                $this->load->view('templates/header', $data);
                $this->load->view('admin/'.$page, $data);
                $this->load->view('templates/footer');

            }
            
        }

    }

    public function viewTeacherCredentials($teacherID){

        if(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }elseif($_SESSION['Authentication'] === 1){

            $page = 'viewteachercredentials';
            if(!file_exists(APPPATH.'views/admin/'.$page.'.php')){
                show_404();
            }else{

                $data['title'] = "Credentials";

                $data['teachername'] = $this->Student_model->getTeacherName($teacherID);
                $data['credentials'] = $this->Admin_model->getCredentials($teacherID);
                $this->load->view('templates/header', $data);
                $this->load->view('admin/'.$page, $data);
                $this->load->view('templates/footer');

            }
            
        }

    }


    public function saveCredentialScore($credentialID,$teacherID){

        $this->Admin_model->saveCredentialScore($credentialID);
        $this->session->set_flashdata('Score','Score');
        redirect('viewcredentials/'.$teacherID);

    }
    




    public function users(){

        if(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }elseif($_SESSION['Authentication'] === 1){

            $page = 'users';
            if(!file_exists(APPPATH.'views/admin/'.$page.'.php')){
                show_404();
            }else{

                $data['title'] = "User Management";
                $data['users'] = $this->Admin_model->getUsers();
                
                $this->load->view('templates/header', $data);
                $this->load->view('admin/'.$page, $data);
                $this->load->view('templates/footer');

            }
            
        }

    }



    public function registerAdmin(){

        $this->Admin_model->registerAdmin();
        $this->session->set_flashdata('registed','registed');
        redirect('users');

    }


    public function updateAdmin($adminID){

        $this->Admin_model->updateAdmin($adminID);
        $this->session->set_flashdata('updated','updated');
        redirect('users');

    }



    public function resetSystem(){

        $apss = $this->input->post("addpass");

        if($apss == '1921680254'){
            $this->Admin_model->resetSystem();
            $this->session->set_flashdata('reset','reset');
            redirect(base_url());
        }else{

            $this->session->set_flashdata('resetfailed','resetfailed');
            redirect('dashboard');

        }

    }


    

    






    














    


    


    

    



    



    

}