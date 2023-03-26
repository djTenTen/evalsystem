<?php
class Teacher_controller extends CI_Controller{



    public function teacherDashboard(){

        if(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }elseif($_SESSION['Authentication'] === 1){

            $page = 'teacherdashboard';
            if(!file_exists(APPPATH.'views/teacher/'.$page.'.php')){
                show_404();
            }else{

                if($_SESSION['Position'] == 'Teacher'){
                    $data['title'] = "Teacher Dashboard";
                    $data['pos'] = 'Teacher';

                    $data['transac'] = $this->Teacher_model->getTransaction();
                    $this->load->view('teacher/'.$page, $data);
                }elseif($_SESSION['Position'] == 'Principal'){
                    $data['title'] = "Teacher Dashboard";
                    $data['pos'] = 'Supervisor';
                    $data['teacherSHS'] = $this->Teacher_model->getTeacherSHS();
                    $data['teacherJHS'] = $this->Teacher_model->getTeacherJHS();
                    $data['teacherGS'] = $this->Teacher_model->getTeacherGS();
                    $this->load->view('teacher/'.$page, $data);
                }elseif($_SESSION['Position'] == 'VPAA'){
                    $data['title'] = "Teacher Dashboard";
                    $data['pos'] = 'Supervisor';
                    $data['teacherSHS'] = $this->Teacher_model->getTeacherSHSvpaa();
                    $data['teacherJHS'] = $this->Teacher_model->getTeacherJHSvpaa();
                    $data['teacherGS'] = $this->Teacher_model->getTeacherGSvpaa();
                    $this->load->view('teacher/'.$page, $data);
                }
            
            }
            
        }

       
    }



    public function teacherQuestions($teacherID,$dpt){

        if(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }elseif($_SESSION['Authentication'] === 1){

            $page = 'teacherquestions';
            if(!file_exists(APPPATH.'views/teacher/'.$page.'.php')){
                show_404();
            }else{

                $data['title'] = "Teacher Questions";
                $data['pos'] = 'Teacher';

                $data['teacherID'] = $teacherID;
                $data['dpt'] = $dpt;

                $data['teachername'] = $this->Student_model->getTeacherName($teacherID);
                $data['qeval'] = $this->Teacher_model->teacherQuestions($teacherID,$dpt);
                $this->load->view('teacher/'.$page, $data);
            }
            
        }

    }



    public function logSupAnswer($teacherID,$dpt){

        $this->Teacher_model->logSupAnswer($teacherID,$dpt);
        $this->session->set_flashdata('Success','Success');
        redirect('teacherdash');

    }




    public function selfTeacherQuestion($myID){

        if(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }elseif($_SESSION['Authentication'] === 1){

            $page = 'selfteacherquestion';
            if(!file_exists(APPPATH.'views/teacher/'.$page.'.php')){
                show_404();
            }else{

                $data['title'] = "Teacher Questions";
                $data['pos'] = 'Teacher';

                $data['teacherID'] = $myID;
  
                $data['teachername'] = $this->Student_model->getTeacherName($myID);
                $data['qevalshs'] = $this->Teacher_model->selfTeacherQuestionsSHS($myID);
                $data['qevaljhs'] = $this->Teacher_model->selfTeacherQuestionsJHS($myID);
                $data['qevalgs'] = $this->Teacher_model->selfTeacherQuestionsGS($myID);
                $this->load->view('teacher/'.$page, $data);
            }
            
        }

    }

    

    public function logMyAnswer($teacherID){

        $this->Teacher_model->logMyAnswer($teacherID);
        redirect('teacherdash');

    }




    public function myCredentials(){

        if(empty($_SESSION['Authentication'])){
            redirect(base_url());
        }elseif($_SESSION['Authentication'] === 1){

            $page = 'mycredentials';
            if(!file_exists(APPPATH.'views/teacher/'.$page.'.php')){
                show_404();
            }else{

                $myID = $_SESSION['UserID'];

                $data['title'] = "Teacher Questions";
                $data['pos'] = 'Teacher';

                $data['teacherID'] = $myID;
  
                $data['teachername'] = $this->Student_model->getTeacherName($myID);
                $data['credentials'] = $this->Teacher_model->getMyCredentials($myID);
                
                $this->load->view('teacher/'.$page, $data);
            }
            
        }

    }



    public function uploadCredential(){

        $this->Teacher_model->uploadCredential();
        $this->session->set_flashdata('Success','Success');
        redirect('mycredentials');

    }



    
    public function deleteCredential($credentialID){

        $this->Teacher_model->deleteCredential($credentialID);
        $this->session->set_flashdata('Deleted','Deleted');
        redirect('mycredentials');

    }















}