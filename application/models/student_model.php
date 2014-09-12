<?php
class Student_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
        
        public function check_username($username){
            $this->db->where(array('username'=>$username));
            $query = $this->db->get('students');
            if($query->num_rows==1){
                return false;
            }else{
                return true;
            }
        }
        
         public function check_rollno($roll_number){
            $this->db->where(array('roll_number'=>$roll_number));
            $query = $this->db->get('students');
            if($query->num_rows==1){
                return false;
            }else{
                return true;
            }
        }
        
        public function get_branches(){
            $query = $this->db->get('branches');
            return $query->result_array();
        }
        
        public function create_student($roll_number,$username,$password,$student_name,
                $semester,$branch,$personal_contact,$parental_contact,
                $living_town,$postal_address){
            
            $student =  array(
                'roll_number'=>$roll_number,
                'username'=>$username,
                'password'=>md5($password),
                'student_name'=>$student_name,
                'semester'=>$semester,
                'branch'=>$branch,
                'personal_contact'=>$personal_contact,
                'parental_contact'=>$parental_contact,
                'living_town'=>$living_town,
                'postal_address'=>$postal_address
            );
            $this->db->insert('students',$student);
          }
          
        public function set_tg($roll_number,$tg_id){
         $data=array(
                'tg_id'=>$tg_id
                );
            $this->db->where('roll_number', $roll_number);
            $this->db->update('students', $data); 
          }
       public function set_photograph($roll_number,$photograph){
           $data=array(
                'photograph'=>$photograph
                );
            $this->db->where('roll_number', $roll_number);
            $this->db->update('students', $data); 
       }
       public function get_photograph($roll_number){
           $this->db->select('photograph');
           $this->db->where(array('roll_number'=>$roll_number));
           $query = $this->db->get('students');
           return $query->row_array();
       }
       public function update_student($roll_number,$username,$password,$student_name,
                $semester,$branch,$personal_contact,$parental_contact,
                $living_town,$postal_address){
            
            $student =  array(
                'roll_number'=>$roll_number,
                'username'=>$username,
                'password'=>md5($password),
                'student_name'=>$student_name,
                'semester'=>$semester,
                'branch'=>$branch,
                'personal_contact'=>$personal_contact,
                'parental_contact'=>$parental_contact,
                'living_town'=>$living_town,
                'postal_address'=>$postal_address
            );
            $this->db->where('roll_number', $roll_number);
            $this->db->update('students', $student); 
          }
        public function set_password($username,$password){
            
           $data=array(
                'password'=>$password
                );
            $this->db->where('username', $username);
            $this->db->update('students', $data); 
            
       }
      
       public function get_students_where($array){
           $this->db->where($array);
           $query = $this->db->get('students');
           
           return $query->result_array();
       }
       public function get_branch_by_id($id){
           $this->db->where(array(
                   'branch_id'=>$id
                   ));
           $query = $this->db->get('branches');
           return $query->row_array();
       }
       public function set_img($roll_number,$img){
           $img = array(
               'photograph'=>$img
           );
           $this->db->where(array(
               'roll_number'=>$roll_number
           ));
           $this->db->update('students',$img);
         
       }
       public function get_roll_number($username){
           $this->db->select('roll_number');
           $this->db->where(array(
               'username'=>$username
           ));
           $query = $this->db->get('students');
           $row=$query->row_array();
           return $row['roll_number'];
           
       }
       

}
