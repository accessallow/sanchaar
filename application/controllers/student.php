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
}

?>
