<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class student extends CI_Controller{
    public function __construct() {
      parent::__construct();
     
    }
    public function index(){
        $this->load->view('student/template/header');
        $this->load->view('student/template/footer');
    }
    public function register(){
        $this->load->helper('form');
        $this->load->view('student/template/header');
        $this->load->view('student/register');
        $this->load->view('student/template/footer');
    }
    public function inbox(){
        $this->load->view('student/template/header');
        $this->load->view('student/inbox');
        $this->load->view('student/template/footer');
    }
    public function sentbox(){
        $this->load->view('student/template/header');
        $this->load->view('student/sentbox');
        $this->load->view('student/template/footer');
    }
    public function complaint(){
        $this->load->view('student/template/header');
        $this->load->view('student/complaint');
        $this->load->view('student/template/footer');
    }
    public function noticeboard(){
        $this->load->view('student/template/header');
        $this->load->view('student/notice_board');
        $this->load->view('student/template/footer');
    }
    public function profile(){
        $this->load->view('student/template/header');
        $this->load->view('student/profile');
        $this->load->view('student/template/footer');
    }
     public function directory(){
        $this->load->view('student/template/header');
        $this->load->view('student/directory');
        $this->load->view('student/template/footer');
    }
     public function settings(){
        $this->load->view('student/template/header');
        $this->load->view('student/settings');
        $this->load->view('student/template/footer');
    }
    
    public function validate_signup(){
      $this->load->helper('form');
      $this->load->library('form_validation');
      
      $this->form_validation->set_rules('roll_number','Roll Number','trim|required');
      $this->form_validation->set_rules('student_name','Student Name','trim|required');
      $this->form_validation->set_rules('semester','Semester','trim|required');
      $this->form_validation->set_rules('branch','Branch','trim|required');
      $this->form_validation->set_rules('personal_contact','Personal Contact','trim|required');
      $this->form_validation->set_rules('parental_contact','Parental Contact','trim|required');
      $this->form_validation->set_rules('living_town','Living Town','trim|required');
      $this->form_validation->set_rules('postal_address','Postal Address','trim|required');
      
      $this->form_validation->set_rules('username','Username','trim|required|callback_check_username');
      $this->form_validation->set_rules('password','Password','trim|required');
      $this->form_validation->set_rules('confirm_password','Confirm Password','trim|required|matches[password]');
      $this->form_validation->set_rules('captcha','Captcha','trim|required');
      
      if($this->form_validation->run()==FALSE){
        $this->load->helper('form');
        $this->load->view('student/template/header');
        $this->load->view('student/register');
        $this->load->view('student/template/footer');
      }else{
          
      }
    }
    public function check_username($username){
        
    }
}

?>
