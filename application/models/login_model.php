<?php
class Login_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
        public function validate_login($username,$password,$account_type){
             if($account_type=='1'){
                 return $this->validate_login_by_table('students',$username,$password);
             }
             else if($account_type=='2'){
                  return $this->validate_login_by_table('teachers',$username,$password);
             }
             else if($account_type=='3'){
                 return $this->validate_login_by_table('hods',$username,$password);
             }
             else if($account_type=='4'){
                 return $this->validate_login_by_table('director',$username,$password);
             }
        }
        public function validate_login_by_table($tablename,$username,$password){
            $this->db->where(array(
                'username'=>$username,
                'password'=>md5($password)
            ));
            $query = $this->db->get($tablename);
           if($query->num_rows==1){
               return true;
           }else
               return false;
               
            
        }
        
        
        
        public function getinfo($username){
           if($this->get_info_by_table('students', $username)){
               return $this->get_info_by_table('students', $username);
           }
            else if($this->get_info_by_table('teachers', $username)){
               return $this->get_info_by_table('teachers', $username);
           }
            else if($this->get_info_by_table('hod', $username)){
               return $this->get_info_by_table('hod', $username);
           }
            else if($this->get_info_by_table('director', $username)){
               return $this->get_info_by_table('director', $username);
           }
           else return false;
        }
        public function get_info_by_table($tablename,$username){
             $this->db->where(array(
                'username'=>$username
            ));
            $query=$this->db->get($tablename);
            if($query->num_rows==1){
                return array(
                    'username'=>$query->row_array['username'],
                    'account_type'=>'s',
                    'username'=>$query->row_array['username'],
                );
            }
        }
        
       

}
