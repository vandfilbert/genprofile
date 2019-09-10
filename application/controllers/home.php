<?php

class Home extends CI_Controller{
//===========================================================================================================================
	public function index(){
		if($this->session->userdata('email')){
			redirect('member');
		}

		$this->form_validation->set_rules('email','Email','trim|required|valid_email');
		$this->form_validation->set_rules('password','Password','trim|required');
		if($this->form_validation->run()==false)
		{
			$this->load->view('home/inc/header_view');
			$this->load->view('home/home_view');
			$this->load->view('home/inc/footer_view');
		} else{
			$this->_signin();
		}   
	}
//===========================================================================================================================
	public function _signin(){
		$email = $this->input->post('email');
		$password=$this->input->post('password');

		$user = $this->db->get_where('user',['email'=>$email])->row_array();
		
		if($user){
			if($user['active']==1){
				//if($password==$user['password']){
				if(password_verify($password,$user['password'])){
					$data = [
						'email'=>$user['email'],
						'role_id'=>$user['role_id'],
					];
					$this->session->set_userdata($data);
					if($user['role_id']==1){
						redirect('admin');
					} else{
						redirect('member');
					}
				}else{
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Wrong!</div>');
					redirect('home');	
				}
			}else{
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">User not active!</div>');
				redirect('home');
			}
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Your email not exist!</div>');
			redirect('home');
		}
	}
//===========================================================================================================================
	public function signout(){
		$this->session->sess_destroy();
		redirect('/');
	}
//===========================================================================================================================
	public function blocked(){
		$this->load->view('home/blocked_view');
	}  
}