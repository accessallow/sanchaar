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
}

?>
