<?php
class Login_controller extends CI_Controller{

    public function login(){

        $page = 'login';

        if(!file_exists(APPPATH.'views/login/'.$page.'.php')){
            show_404();
        }else{
            $data['title'] = "Login";
            $this->load->view('login/'.$page, $data);
        }
       
    }
    
    public function authenticate(){

        $u = $this->input->post('un');
        $p = $this->input->post('pss');

        $res1 = $this->Login_model->authenticateAdmin($u,$p);
        $result1 = $res1->row_array();
        $cres1 = $res1->num_rows();
        $res2 = $this->Login_model->authenticateStudent($u,$p);
        $result2 = $res2->row_array();
        $cres2 = $res2->num_rows();
        $res3 = $this->Login_model->authenticateTeacher($u,$p);
        $result3 = $res3->row_array();
        $cres3 = $res3->num_rows();

        if ($cres1 > 0){

            $data['UserID'] = $result1['UserID'];
            $data['Fullname'] = $result1['Lname'] .', '.$result1['Fname'].' '.$result1['Mname'];
            $data['Position'] = $result1['Position'];
            $data['College'] = $result1['College'];
            $data['Seniorhigh'] = $result1['Seniorhigh'];
            $data['Juniorhigh'] = $result1['Juniorhigh'];
            $data['Gradeschool'] = $result1['Gradeschool'];
            
            // DATA ON ARRAY
            $sess_data = array('Authentication' => 1,
            'FullName' => $data['Fullname'],
            'Position' =>  $data['Position'],
            'College' => $data['College'],
            'Seniorhigh' => $data['Seniorhigh'],
            'Juniorhigh' => $data['Juniorhigh'],
            'Gradeschool' => $data['Gradeschool'],
            'UserID' => $data['UserID']
            );

            $this->session->set_userdata($sess_data);
            redirect('dashboard');    

        }elseif( $cres2> 0){


            $data['studentID'] = $result2['studentID'];
            $data['FullName'] = $result2['FullName'];
            $data['Level'] = $result2['Level'];
            $data['Course'] = $result2['Course'];
            $data['Section'] = $result2['Section'];
            
            // DATA ON ARRAY
            $sess_data = array('Authentication' => 1,
            'FullName' => $data['FullName'],
            'Level' => $data['Level'],
            'Course' => $data['Course'],
            'Section' => $data['Section'],
            'UserID' => $data['studentID']
            );

            $this->session->set_userdata($sess_data);
            redirect('studentdash');    

        }elseif($cres3 > 0){

            $data['TeacherID'] = $result3['TeacherID'];
            $data['FullName'] = $result3['Fullname'];
            $data['dpt'] = $result3['dpt'];
            $data['Position'] = $result3['Position'];
            $data['College'] = $result3['College'];
            $data['Seniorhigh'] = $result3['Seniorhigh'];
            $data['Juniorhigh'] = $result3['Juniorhigh'];
            $data['Gradeschool'] = $result3['Gradeschool'];
            
            // DATA ON ARRAY
            $sess_data = array('Authentication' => 1,
                'FullName' => $data['FullName'],
                'College' => $data['College'],
                'dpt' => $data['dpt'],
                'Position' => $data['Position'],
                'Seniorhigh' => $data['Seniorhigh'],
                'Juniorhigh' => $data['Juniorhigh'],
                'Gradeschool' => $data['Gradeschool'],
                'UserID' => $data['TeacherID']
            );

            $this->session->set_userdata($sess_data);
            redirect('teacherdash');    

        }else{

            $this->session->set_flashdata('Login_Failed','login failed');
            redirect(base_url());

        }

    
    }




}