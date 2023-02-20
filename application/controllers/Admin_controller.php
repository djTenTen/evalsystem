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

                $data['teachershs'] = $this->Admin_model->getRankingSHS();
                $data['teacherjhs'] = $this->Admin_model->getRankingJHS();
                $data['teachergs'] = $this->Admin_model->getRankingGS();
                

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

        $this->Admin_model->saveTeacher();
        $this->session->set_flashdata('Added','Added');
        redirect('teacher');

    }


    public function updateTeacher($teacherID){

        $this->Admin_model->updateTeacher($teacherID);
        $this->session->set_flashdata('Updated','Updated');
        redirect('teacher');

    }


    public function deleteTeacher($teacherID){

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
        if(count($dup) > 0){
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
                

                $data['sections'] = $this->Admin_model->getSections();
                $data['mysections'] = $this->Admin_model->getAssignedSection($teacherID);
                $this->load->view('templates/header', $data);
                $this->load->view('admin/'.$page, $data);
                $this->load->view('templates/footer');
            }
            
        }

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
        if(count($dup) > 0){
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









    














    


    


    

    



    



    

}