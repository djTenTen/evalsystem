<?php
class Student_controller extends CI_Controller{


    public function studentDashboard(){

        if(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }elseif($_SESSION['Authentication'] === 1){

            $page = 'studentdashboard';
            if(!file_exists(APPPATH.'views/student/'.$page.'.php')){
                show_404();
            }else{

                $data['title'] = "Student Dashboard";

                $data['teach'] = $this->Student_model->getTeachers();
                $this->load->view('student/'.$page, $data);
            
            }
            
        }

       
    }


    public function viewQuestions($teacherID,$sectionID){

        if(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }elseif($_SESSION['Authentication'] === 1){

            $page = 'questions';
            if(!file_exists(APPPATH.'views/student/'.$page.'.php')){
                show_404();
            }else{

                $data['title'] = "Student Dashboard";

                $data['teacherID'] = $teacherID;
                $data['sectionID'] = $sectionID;

                $data['teachername'] = $this->Student_model->getTeacherName($teacherID);
                $data['qeval'] = $this->Student_model->getEvaluationQuestion($teacherID,$sectionID);          
                $this->load->view('student/'.$page, $data);
            
            }
            
        }
 
    }





    
    public function logAnswer($teacherID,$sectionID){

        $this->Student_model->logAnswer($teacherID,$sectionID);
    
        redirect('studentdash');

    }



















    
}