<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class login extends CI_Controller{
    public function __construct() {
      parent::__construct();
     $this->load->library('session');
     $this->load->helper('url');
    }
    public function index(){
        if($this->session->userdata('logged_in')){
            switch ($this->session->userdata('account_type')){
                  case '1':redirect(URL.'index.php/student');break;
                  case '2':redirect(URL.'index.php/teacher');break;
                  case '3':redirect(URL.'index.php/hod');break;
                  case '4':redirect(URL.'index.php/director');break;
              }
        }else{
        $this->load->helper('form');
       // $this->load->view('student/template/header');
        $this->load->view('login/loginpage');
       // $this->load->view('student/template/footer');
        }
    
    }
    public function validate_login(){
        $this->load->helper('form');
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('username','Username','trim|required|xss_clean');
        $this->form_validation->set_rules('password','Password','trim|required|xss_clean');
        $this->form_validation->set_rules('account_type','Account Type','greater_than[0]|less_than[5]');
        
        $this->form_validation->set_message('greater_than', 'You Must Choose a valid Account Type.');
        
        if($this->form_validation->run()==FALSE){
            $this->index();
        }else{
            $this->load->model('login_model');
            $query = $this->login_model->validate_login(
                    $this->input->post('username'),
                    $this->input->post('password'),
                    $this->input->post('account_type')
                    );
            if($query){
               $newdata = array(
                   'username'  => $this->input->post('username'),
                   'password'     => md5($this->input->post('password')),
                   'account_type'=>$this->input->post('account_type'),
                   'logged_in' => TRUE
               );
              $this->session->set_userdata($newdata); 
              
              switch ($this->session->userdata('account_type')){
                  case '1':redirect(URL.'index.php/student');break;
                  case '2':redirect(URL.'index.php/teacher');break;
                  case '3':redirect(URL.'index.php/hod');break;
                  case '4':redirect(URL.'index.php/director');break;
              }
                
            }else{
                  $this->session->set_flashdata('message','Wrong Username/Password');
                  $this->index();
            }
        }
    }
    public function logout(){
        $this->session->sess_destroy();
        redirect(URL);
    }
    
}

?>
