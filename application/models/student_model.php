<?php
class Student_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
        public function check_username($username){
            $this->db->where(array('username'=>$username));
           // $this->db->get
        }
        public function get_branches(){
            $query = $this->db->get('branches');
            return $query->result_array();
        }
       

}
