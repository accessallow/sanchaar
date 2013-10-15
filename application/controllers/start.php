<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class start extends CI_Controller{
    public function __construct() {
      parent::__construct();
     $this->load->library('session');
    }
    public function index(){
        $this->load->helper('form');
        $this->load->view('student/template/header');
        $this->load->view('start/startpage');
        $this->load->view('student/template/footer');
    
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
            $query = $this->login_model->validate_login();
            if($query){
               $newdata = array(
                   'username'  => $this->input->post('username'),
                   'password'     => md5($this->input->post('password')),
                   'account_type'=>$this->input->post('account_type'),
                   'logged_in' => TRUE
               );
              $this->session->set_userdata($newdata); 
             echo 'success';
                
            }else{
                  $this->session->set_flashdata('message','Wrong Username/Password');
                  $this->index();
            }
        }
    }
    
}

?>
