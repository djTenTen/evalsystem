<?php 
class Login_model extends CI_Model{

    protected $users = "users";
    protected $un = "Username";
    protected $pss = "Password";

    public function __construct(){
        $this->load->database();
    }

    public function authenticateAdmin($u,$p){
        //$array = array('Username' => $u, 'Password' => $p);
        // $this->db->where("Username = '$u' and Password = '$p'");
        $login = "select * from users where BINARY un = ? and BINARY pss = ?";
        $result = $this->db->query($login, array($u,$p));
        return $result;
    }

    public function authenticateStudent($u,$p){
        //$array = array('Username' => $u, 'Password' => $p);
        // $this->db->where("Username = '$u' and Password = '$p'");
        $login = "select * from students where BINARY email = ? and BINARY pass = ?";
        $result = $this->db->query($login, array($u,$p));
        return $result;
    }


    public function authenticateTeacher($u,$p){
        //$array = array('Username' => $u, 'Password' => $p);
        // $this->db->where("Username = '$u' and Password = '$p'");
        $login = "select * from teachers where BINARY email = ? and BINARY pass = ?";
        $result = $this->db->query($login, array($u,$p));
        return $result;
    }



}