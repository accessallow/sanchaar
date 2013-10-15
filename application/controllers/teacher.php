<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class teacher extends CI_Controller{
    public function __construct() {
      parent::__construct();
     
    }
    public function index(){
        $this->load->view('teacher/template/header');
        $this->load->view('teacher/template/footer');
    }
    public function register(){
        $this->load->helper('form');
        $this->load->model('teacher_model');
        $data['departments']=$this->teacher_model->get_departments();
        
        $this->load->view('teacher/template/header');
        $this->load->view('teacher/register',$data);
        $this->load->view('teacher/template/footer');
    }
    public function inbox(){
        $this->load->view('teacher/template/header');
        $this->load->view('teacher/inbox');
        $this->load->view('teacher/template/footer');
    }
    public function sentbox(){
        $this->load->view('teacher/template/header');
        $this->load->view('teacher/sentbox');
        $this->load->view('teacher/template/footer');
    }
    public function complaint(){
        $this->load->view('teacher/template/header');
        $this->load->view('teacher/complaint');
        $this->load->view('teacher/template/footer');
    }
    public function noticeboard(){
        $this->load->view('teacher/template/header');
        $this->load->view('teacher/notice_board');
        $this->load->view('teacher/template/footer');
    }
    public function profile(){
        $this->load->view('teacher/template/header');
        $this->load->view('teacher/profile');
        $this->load->view('teacher/template/footer');
    }
     public function directory(){
        $this->load->view('teacher/template/header');
        $this->load->view('teacher/directory');
        $this->load->view('teacher/template/footer');
    }
     public function settings(){
        $this->load->view('teacher/template/header');
        $this->load->view('teacher/settings');
        $this->load->view('teacher/template/footer');
    }
    
    public function validate_signup(){
      $this->load->helper('form');
      $this->load->library('form_validation');
      
      $this->form_validation->set_rules('username','Username','trim|required|callback_check_username|xss_clean');
      $this->form_validation->set_rules('password','Password','trim|required');
      $this->form_validation->set_rules('confirm_password','Confirm Password','trim|required|matches[password]');
      $this->form_validation->set_rules('name','Name','trim|required|xss_clean');
     
      $this->form_validation->set_rules('qualification','Qualification','trim|required|xss_clean');
      $this->form_validation->set_rules('personal_contact','Personal Contact','trim|required');     
    
  
      $this->form_validation->set_rules('department','Department','trim|required|greater_than[0]');
      $this->form_validation->set_rules('joining_year','Joining Year','required|greater_than[0]');
    
       $this->form_validation->set_message('greater_than', 'You Must Choose a valid option for Department/Year.');
       $this->form_validation->set_message('check_username', 'Username not available');
      
      if($this->form_validation->run()==FALSE){
        $this->load->helper('form');
        $this->load->view('teacher/template/header');
        $this->load->view('teacher/register');
        $this->load->view('teacher/template/footer');
      }else{
          
          
      }
    }
    public function check_username($username){
        $this->load->model('teacher_model');
        $query = $this->teacher_model->check_username($username);
        return $query;
    }
}

?>
