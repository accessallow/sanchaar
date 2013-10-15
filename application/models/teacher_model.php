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
       
        public function get_departments(){
            $query = $this->db->get('branches');
            return $query->result_array();
        }
       

}
