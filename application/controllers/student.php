<?php
 if ( ! defined('BASEPATH')) {exit('No direct script access allowed');}

class Student extends CI_Controller{
    public function __construct() {
      parent::__construct();
     $this->load->library('session');
     $this->load->helper('url');
    }
    public function login_filter(){
        if($this->session->userdata('logged_in')&&$this->session->userdata('account_type')=='1'){
            
        }else{
            $this->setFlash('error', 'Error', 'You are not logged in.');
            redirect(URL);
        }
    }
    public function index(){
        $this->login_filter();
        
        $this->load->view('student/template/header');
        $this->load->view('student/template/footer');
    }
    public function register(){
        $this->load->helper('form');
        $this->load->model('student_model');
        $data['branches']=$this->student_model->get_branches();
        
        $this->load->view('student/template/header');
        $this->load->view('student/register',$data);
        $this->load->view('student/template/footer');
    }
    public function inbox($msg_id=null){
           $this->login_filter();
        $this->load->model('message_model');
        $data['messages']=$this->message_model->get_messages_inbox($this->session->userdata('username'));
        
       
        if($msg_id){
            $query = $this->message_model->read_message($msg_id);
            $data['msg']=$query;
        }
       
        if($this->input->post('sender')&&$this->input->post('message')){
            $this->message_model->write_message($this->session->userdata('username'),
                    $this->input->post('sender'),$this->input->post('message'));
            
        }
        $this->load->view('student/template/header');
        $this->load->view('student/inbox',$data);
        $this->load->view('student/template/footer');
    }
    public function sentbox($msg_id=null){
           $this->login_filter();
        $this->load->model('message_model');
        $data['messages']=$this->message_model->get_messages_sentbox($this->session->userdata('username'));
        
       
        if($msg_id){
            $query = $this->message_model->read_message($msg_id);
            $data['msg']=$query;
        }
       
       
        $this->load->view('student/template/header');
        $this->load->view('student/sentbox',$data);
        $this->load->view('student/template/footer');
    }
    public function send_message_from_inbox(){
         $this->send_message();
         $this->inbox();
    }
    public function send_message_from_sentbox(){
        $this->send_message();
         $this->sentbox();
    }
    public function send_message(){
        $this->login_filter();
        $this->load->model('message_model');
        
         if($this->input->post('sender')&&$this->input->post('message')){
            $this->message_model->write_message($this->session->userdata('username'),
                    $this->input->post('sender'),$this->input->post('message'));
            
        }
    }
    public function complaint($complaint_id=null){
           $this->login_filter();
           $this->load->model('complaint_model');
        if($this->input->post('complainer_username')&&$this->input->post('c_text')){
            $array=array(
                'complainer_username'=>$this->session->userdata('username'),
                'c_text'=>$this->input->post('c_text'),
                'subject'=>$this->input->post('subject')
            );
            $this->complaint_model->_insert($array);
            
        }elseif($complaint_id){
            
            $query = $this->complaint_model->get_where_custom(array(
                'complaint_id'=>$complaint_id,
                'complainer_username'=>$this->session->userdata('username')
            ));
            $r = $query->row_array();
            $data['complaint_id']=$r['complaint_id'];
            $data['complainer_username']=$r['complainer_username']; 
            $data['c_text']=$r['c_text'];
        }
        
        
        $query = $this->complaint_model->get_where_custom(array('complainer_username'=>$this->session->userdata('username')));    
        $data['complaints']=$query->result_array();
        $this->load->view('student/template/header');
        $this->load->view('student/complaint',$data);
        $this->load->view('student/template/footer');
    }
    public function noticeboard(){
           $this->login_filter();
        
        $this->load->view('student/template/header');
        $this->load->view('student/notice_board');
        $this->load->view('student/template/footer');
    }
    public function profile($profile_id){
           //$this->login_filter();
           
        if($profile_id){
            $this->load->model('student_model');
            $q = $this->student_model->get_students_where(array(
                'roll_number'=>$profile_id
            ));
            foreach ($q as $query){
            $data['student_name']=$query['student_name'];
            $data['semester']=$query['semester'];
            $b = $this->student_model->get_branch_by_id($query['branch']);
            $data['branch']=$b['branch_name'];
            $data['roll_number']=$query['roll_number'];
            }
            
        $this->load->view('student/template/header');
        $this->load->view('student/profile',$data);
        $this->load->view('student/template/footer');
        }else{
            echo "nothing";
        }
       
    }
    public function edit_profile(){
        
    }
    public function change_image(){
        $config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '100';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';
                $config['file_name']    = date_format(date_create(),"U");

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
                    $this->setFlash('eror','Error', $this->upload->display_errors());
		}
		else
		{
                    $data = array('upload_data' => $this->upload->data());
                    $tmpName = URL.'uploads/'.$data['file_name'];

                    // Read the file
                    $fp = fopen($tmpName, 'r');
                    $img = fread($fp, filesize($tmpName));
                    $img = addslashes($data);
                    fclose($fp);
                    $this->load->model('student_model');
                    $query=$this->student_model->set_image(
                            $this->student_model->get_roll_number($this->session->userdata('username')),
                            $img);

                    $this->setFlash('success','Success','Image uploded successfully.');
		}
                $this->settings();
    }
    
    public function get_image($roll_number){
        $this->load->model('student_model');
        $data['image']=$this->student_model->get_photograph($roll_number);
        
        $this->load->view('student/getimage',$data);
    }
     public function directory(){
            $this->login_filter();
            
        $this->load->model('student_model');
        $data['branches']=$this->student_model->get_branches();
        
        $this->load->view('student/template/header');
        $this->load->view('student/directory',$data);
        $this->load->view('student/template/footer');
    }
     public function settings(){
            $this->login_filter();
        $this->load->model('student_model');
        $data['roll_number']=$this->student_model->get_roll_number($this->session->userdata('username'));
        $this->load->helper('form');
        $this->load->view('student/template/header');
        $this->load->view('student/settings',$data);
        $this->load->view('student/template/footer');
    }
    
    public function validate_signup(){
      $this->load->helper('form');
      $this->load->library('form_validation');
      
      $this->form_validation->set_rules('roll_number','Roll Number','trim|required|callback_check_roll_number');
      $this->form_validation->set_rules('student_name','Student Name','trim|required');
      $this->form_validation->set_rules('semester','Semester','trim|required');
      $this->form_validation->set_rules('branch','Branch','trim|required|greater_than[0]');
      $this->form_validation->set_rules('personal_contact','Personal Contact','trim|required');
      $this->form_validation->set_rules('parental_contact','Parental Contact','trim|required');
      $this->form_validation->set_rules('living_town','Living Town','trim|required');
      $this->form_validation->set_rules('postal_address','Postal Address','trim|required');
      
      $this->form_validation->set_rules('username','Username','trim|required|callback_check_username');
      $this->form_validation->set_rules('password','Password','trim|required');
      $this->form_validation->set_rules('confirm_password','Confirm Password','trim|required|matches[password]');
      $this->form_validation->set_rules('captcha','Captcha','trim|required');
      
      $this->form_validation->set_message('greater_than', 'You Must Choose a valid Branch Name');
      $this->form_validation->set_message('check_username', 'Username already exist.');
      $this->form_validation->set_message('check_roll_number', 'Roll Number already exist.');
      
      if($this->form_validation->run()==FALSE){
          $this->register();
      }else{
          $this->load->model('student_model');
          $this->student_model->create_student(
                  $this->input->post('roll_number'),
                  $this->input->post('username'),
                  $this->input->post('password'),
                  $this->input->post('student_name'),
                  $this->input->post('semester'),
                  $this->input->post('branch'),
                  $this->input->post('personal_contact'),
                  $this->input->post('parental_contact'),
                  $this->input->post('living_town'),
                  $this->input->post('postal_address')
                  );
            $this->session->set_flashdata('message','Account Created Successfully');
            $this->load->helper('url');
            redirect(URL.'index.php/student/');
          
      }
    }
    public function check_username($username){
        
        
        $this->load->model('student_model');
        $query = $this->student_model->check_username($username);
        return $query;
    }
    public function check_roll_number($roll_number){
        $this->load->model('student_model');
        $query = $this->student_model->check_rollno($roll_number);
        return $query;
    }
    
    public function setFlash($type,$caption,$message){
         $this->session->set_flashdata('type',$type);
         $this->session->set_flashdata('caption',$caption);
         $this->session->set_flashdata('message',$message);
    }
    
    public function change_password(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('old_password','Current Account Password','trim|required|xss_clean|callback_check_password');
        $this->form_validation->set_rules('new_password','New Password','trim|required|xss_clean');
        $this->form_validation->set_rules('confirm_new_password','Confirmation Password','trim|required|xss_clean|matches[new_password]');
    
    $this->form_validation->set_message('check_password', 'Current Password could\'nt match.'); 
    
    if($this->form_validation->run()==false){
        $this->setFlash('error','Error!',  validation_errors());
        $this->settings();
    }else{
         $this->setFlash('success','Success!',"Password Changed");
        $this->settings();
    }
}
    
    public function check_password($password){
        $this->load->model('login_model');
         return $this->login_model->validate_login_by_table('students',
                 $this->session->userdata('username'),$password);
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
            redirect(URL.'index.php/student/directory');
        }
         $data['students'] = $this->student_model->get_students_where($where);
         $this->load->model('student_model');
         $data['branches']=$this->student_model->get_branches();
        
        $this->load->view('student/template/header');
        $this->load->view('student/directory',$data);
        $this->load->view('student/template/footer');
         
    }
}


?>
