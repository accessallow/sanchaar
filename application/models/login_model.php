<?php
class Login_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
        public function validate_login(){
             if($this->input->post('account_type')=='1'){
                 return $this->validate_student_login();
             }
        }
        public function validate_student_login(){
            $this->db->where(array(
                'roll_number'=>$this->input->post('username'),
                'password'=>md5($this->input->post('password'))
            ));
            $query = $this->db->get('students');
           if($query->num_rows==1){
               return true;
           }else
               return false;
               
            
        }
        public function validate_teacher_login(){
              $this->db->where(array(
                'username'=>$this->input->post('username'),
                'password'=>$this->input->post('password')
            ));
            $query = $this->db->get('teachers');
           if($query->num_rows==1){
               return true;
           }
        }
        public function validate_hod_login(){
              $this->db->where(array(
                'username'=>$this->input->post('username'),
                'password'=>$this->input->post('password')
            ));
            $query = $this->db->get('hod');
           if($query->num_rows==1){
               return true;
           }
        }
        public function validate_director_login(){
              $this->db->where(array(
                'username'=>$this->input->post('username'),
                'password'=>$this->input->post('password')
            ));
            $query = $this->db->get('director');
           if($query->num_rows==1){
               return true;
           }
        }
        
       

}
