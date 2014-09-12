<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class teacher extends CI_Controller{
    public function __construct() {
      parent::__construct();
     $this->load->library('session');
     $this->load->helper('url');
    }
     public function login_filter(){
        if($this->session->userdata('logged_in')&&$this->session->userdata('account_type')=='2'){
            
        }else{
            $this->setFlash('error', 'Error', 'You are not logged in.');
            redirect(URL);
        }
    }
    public function index(){
        $this->login_filter();
        $this->load->view('teacher/template/header');
        $this->load->view('teacher/template/footer');
    }
    public function register(){
         $this->login_filter();
        $this->load->helper('form');
        $this->load->model('teacher_model');
        $data['departments']=$this->teacher_model->get_departments();
        
        $this->load->view('teacher/template/header');
        $this->load->view('teacher/register',$data);
        $this->load->view('teacher/template/footer');
    }
    public function inbox(){
         $this->login_filter();
        $this->load->view('teacher/template/header');
        $this->load->view('teacher/inbox');
        $this->load->view('teacher/template/footer');
    }
    public function sentbox(){
         $this->login_filter();
        $this->load->view('teacher/template/header');
        $this->load->view('teacher/sentbox');
        $this->load->view('teacher/template/footer');
    }
    public function complaint(){
         $this->login_filter();
        $this->load->view('teacher/template/header');
        $this->load->view('teacher/complaint');
        $this->load->view('teacher/template/footer');
    }
    public function noticeboard(){
         $this->login_filter();
        $this->load->view('teacher/template/header');
        $this->load->view('teacher/notice_board');
        $this->load->view('teacher/template/footer');
    }
    public function profile(){
         $this->login_filter();
        $this->load->view('teacher/template/header');
        $this->load->view('teacher/profile');
        $this->load->view('teacher/template/footer');
    }
     public function directory(){
         // $this->login_filter();
        $this->load->view('teacher/template/header');
        $this->load->view('teacher/directory');
        $this->load->view('teacher/template/footer');
    }
     public function settings(){
          $this->login_filter();
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
          $this->load->model('teacher_model');
          $this->teacher_model->create_teacher(
                  $this->input->post('username'),
                  $this->input->post('password'),
                  $this->input->post('name'),
                  $this->input->post('qualification'),
                  $this->input->post('personal_contact'),
                  $this->input->post('department'),
                  $this->input->post('joining_year')
                );
            $this->session->set_flashdata('message','Account Created Successfully');
            $this->load->helper('url');
            redirect(URL);
      }
    }
    public function check_username($username){
        $this->load->model('teacher_model');
        $query = $this->teacher_model->check_username($username);
        return $query;
    }
    public function check_password($password){
        $this->load->model('teacher_model');
        $username = $this->session->userdata('username');
        $query = $this->teacher_model->check_password($username,$password);
        return $query;
    }
     public function search(){
        $this->load->model('student_model');
        
        if($this->input->post('student_name')&&$this->input->post('student_sem')=='0'
                &&$this->input->post('student_branch')=='0'){
           // echo 'only name recieved';
            $where=array('student_name like'=>'%'.$this->input->post('student_name').'%');
        }elseif($this->input->post('student_name')&&$this->input->post('student_sem')!='0'
                &&$this->input->post('student_branch')=='0') {
           // echo 'name and sem recieved';
              $where=array(
                  'semester'=>$this->input->post('student_sem'),
                  'student_name'=>$this->input->post('student_name')
                      );
        }elseif($this->input->post('student_name')&&$this->input->post('student_sem')=='0'
                &&$this->input->post('student_branch')!='0') {
           // echo 'name and branch recieved';
             $where=array(
                  'student_name'=>$this->input->post('student_name'),
                  'branch'=>$this->input->post('student_branch')
                      );
        }elseif(trim($this->input->post('student_name'))==''&&$this->input->post('student_sem')!='0'
                &&$this->input->post('student_branch')!='0') {
           //echo 'sem and branch recieved';
             $where=array(
                  'semester'=>$this->input->post('student_sem'),
                  'branch'=>$this->input->post('student_branch')
                      );
        }elseif(trim($this->input->post('student_name'))==''&&$this->input->post('student_sem')=='0'
                &&$this->input->post('student_branch')!='0') {
          //echo ' branch recieved';
           $where=array(
                 'branch'=>$this->input->post('student_branch')
                      );
        }elseif(trim($this->input->post('student_name'))==''&&$this->input->post('student_sem')!='0'
                &&$this->input->post('student_branch')=='0') {
          //echo ' sem recieved';
            $where=array(
                'semester'=>$this->input->post('student_sem')
                    );
        }else{
            redirect(URL.'index.php/teacher/directory');
        }
         $data['students'] = $this->student_model->get_students_where($where);
         $this->load->model('student_model');
         $data['branches']=$this->student_model->get_branches();
        
        $this->load->view('teacher/template/header');
        $this->load->view('teacher/directory',$data);
        $this->load->view('teacher/template/footer');
         
    }
    public function adopt($roll_number=null){
        $this->load->model('student_model');
        $this->student_model->set_tg($roll_number,$this->session->userdata('username'));
        $this->show_my_students();
    }
    public function show_my_students(){
         $this->login_filter();
        $this->load->model('student_model');
        $query=$this->student_model->get_students_where(array(
            'tg_id'=>$this->session->userdata('username')
        ));
        $data['students']=$query;
        $this->load->view('teacher/template/header');
        $this->load->view('teacher/my_students',$data);
        $this->load->view('teacher/template/footer');
    }
    public function setFlash($type,$caption,$message){
         $this->session->set_flashdata('type',$type);
         $this->session->set_flashdata('caption',$caption);
         $this->session->set_flashdata('message',$message);
    }
    public function process_notice(){
        $this->load->helper('date');
        if($this->input->post('notice_subject')&&$this->input->post('notice_link')){
            $this->load->model('notice_model');
            $this->notice_model->_insert(array(
                'notice_uploader'=>$this->session->userdata('username'),
                'notice_subject'=>$this->input->post('notice_subject'),
                'notice_link'=>$this->input->post('notice_link'),
                
            ));
        }
        $this->setFlash('success', 'Success', 'notice uploded successfully');
        $this->upload_notice();
    }
    public function upload_notice(){
        $this->load->view('teacher/template/header');
        $this->load->view('teacher/upload_notice');
        $this->load->view('teacher/template/footer');
    }
}

?>
