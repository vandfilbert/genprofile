<?php

class User extends CI_Controller{
  
  public function __construct(){
    parent::__construct();
    $this->load->model('user_model');
  }
  //===========================================================================================================================
  public function test_get($user_id=null){
    $data= $this->user_model->get(1);
    print_r($data);
  }
  //===========================================================================================================================
  public function testsignin(){
    
    $email= $this->input->post('email');
    $password= $this->input->post('password');
    
    $this->load->model('user_model');
    $result = $this->user_model->get([
      'email'=>$email,
      'password'=>$password
      ]);
      
      $this->output->set_content_type('application_json');
      
      if($result){
        $this->session->set_userdata([
          'user_id'=> $result[0]['user_id']]);
          $this->output->set_content_type('application_json');
          $this->output->set_output(json_encode(['result'=>1]));
          return false;
        }
        $this->output->set_output(json_encode(['result'=>0]));
      }
      //===========================================================================================================================
}