<?php
class Teacher_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
        public function check_username($username){
            $this->db->where(array('username'=>$username));
            $query = $this->db->get('teachers');
            if($query->num_rows==1){
                return false;
            }else{
                return true;
            }
        }
         public function check_password($username,$password){
            $this->db->where(array(
                'password'=>$password,
                'username'=>$username
            ));
            $query = $this->db->get('teachers');
            if($query->num_rows==1){
                return false;
            }else{
                return true;
            }
        }
       
        public function get_departments(){
            $query = $this->db->get('branches');
            return $query->result_array();
        }
        public function create_teacher($username,$password,$name,$qualification,$personal_contact,
                $dept_id,$joining_year){
            
            $teacher =  array(
                'username'=>$username,
                'password'=>md5($password),
                'name'=>$name,
                'qualification'=>$qualification,
                'personal_contact'=>$personal_contact,
                'dept_id'=>$dept_id,
                'joining_year'=>$joining_year
            );
            $this->db->insert('teachers',$teacher);
          }
          
          public function update_teacher($username,$password,$name,$qualification,$personal_contact,
                $dept_id,$joining_year){
            
            $teacher =  array(
                'username'=>$username,
                'password'=>md5($password),
                'name'=>$name,
                'qualification'=>$qualification,
                'personal_contact'=>$personal_contact,
                'dept_id'=>$dept_id,
                'joining_year'=>$joining_year
            );
               $this->db->where('roll_number', $roll_number);
               $this->db->update('students', $student); 
          }
     
        public function set_password($username,$password){
            
           $data=array(
                'password'=>$password
                );
            $this->db->where('username', $username);
            $this->db->update('teachers', $data); 
            
       }

       

}
