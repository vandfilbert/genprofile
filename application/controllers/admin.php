<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//===========================================================================================================================
class Admin extends CI_Controller{
	public function __construct(){
		parent::__construct();
		checksignin();
		//$data['user'] = $this->db->get_where('user',['email'=>$this->session->userdata('email')])->row_array();
	}
//===========================================================================================================================
	public function index(){
		$data['title'] = 'GENTA Dashboard';
		$data['user'] = $this->db->get_where('user',['email'=>$this->session->userdata('email')])->row_array();
		//echo "Percobaan".$data['user']['name'];
		$this->load->view('include/header_view', $data);
		$this->load->view('include/sidebar_view', $data);
		$this->load->view('include/navbar_view', $data);
		$this->load->view('dashboard/dashboard_view', $data);
		$this->load->view('include/footer_view', $data);   	
	}
//===========================================================================================================================
	public function signout(){
		$this->session->sess_destroy();
		redirect('/');
	}
//===========================================================================================================================
	public function userRole(){
		$data['title'] = 'Role Management';
		//echo "Percobaan".$data['user']['name'];
		$data['user'] = $this->db->get_where('user',['email'=>$this->session->userdata('email')])->row_array();
		$data['role'] = $this->db->get('user_role')->result_array();

		$this->form_validation->set_rules('newrole','New Role','required');

		if($this->form_validation->run()==false){
			$this->load->view('include/header_view', $data);
			$this->load->view('include/sidebar_view', $data);
			$this->load->view('include/navbar_view', $data);
			$this->load->view('dashboard/userRole_view', $data);
			$this->load->view('include/footer_view', $data); 
		}else{
			$data =[
				'role'=>$this->input->post('newrole')
			];
			$this->db->insert('user_role',$data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Role Added!</div>');
			redirect('admin/userRole');
		}	
	}
//===========================================================================================================================
	public function registration(){
		$data['title'] = 'Registration';
		//echo "Percobaan".$data['user']['name'];
		$data['user'] = $this->db->get_where('user',['email'=>$this->session->userdata('email')])->row_array();
		$data['role'] = $this->db->get('user_role')->result_array();

		$this->form_validation->set_rules('name', 'Full Name', 'required|trim');
		$this->form_validation->set_rules('email_address', 'Email', 'required|trim|valid_email|is_unique[user.email]',[
			'is_unique' => 'This email is already register !'
		]);
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[6]|matches[password2]',[
			'matches' => 'Please enter the correct password!',
			'min_length' => 'Password is to short!'
		]);
		$this->form_validation->set_rules('password2', 'Confirm Password', 'required|trim|min_length[6]|matches[password1]',[
			'matches' => 'Please enter the correct password!',
			'min_length' => 'Password is to short!'
		]);

		if($this->form_validation->run()==false){
			$this->load->view('include/header_view', $data);
			$this->load->view('include/sidebar_view', $data);
			$this->load->view('include/navbar_view', $data);
			$this->load->view('dashboard/registration_view', $data);
			$this->load->view('include/footer_view', $data);
		}else{
			$data =[
				'name' => htmlspecialchars($this->input->post('name')),
				'email' => htmlspecialchars($this->input->post('email_address')),
				'picture' => 'bongoCat.png',
				'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
				'role_id' => 2,
				'active' => 1
			];

			$this->db->insert('user', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You Have Add New User!</div>');
			redirect('admin/registration');
		} 
	}
//====================================================================================================================================
	public function userRoleAccess($role_id){
		$data['title'] = 'Role Management Access';
		//echo "Percobaan".$data['user']['name'];
		$data['user'] = $this->db->get_where('user',['email'=>$this->session->userdata('email')])->row_array();
		
		$data['role'] = $this->db->get_where('user_role',['id'=>$role_id])->row_array();

		$this->db->where('id!=',1);
		$data['menu'] = $this->db->get('user_menu')->result_array();
		
		$this->load->view('include/header_view', $data);
		$this->load->view('include/sidebar_view', $data);
		$this->load->view('include/navbar_view', $data);
		$this->load->view('dashboard/userRoleAccess_view', $data);
		$this->load->view('include/footer_view', $data); 	
	}
//====================================================================================================================================
	public function changeAccess(){
		$menu_id = $this->input->post('menuId');
		$role_id =$this->input->post('roleId');

		$data=[
			'role_id' => $role_id,
			'menu_id' => $menu_id
		];

		$result = $this->db->get_where('access_menu',$data);

		if($result->num_rows()<1){
			$this->db->insert('access_menu', $data);
		} else{
			$this->db->delete('access_menu', $data);
		}

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You Have Change the Access!</div>');
	}
//===================================================================================================================================
	public function editRole(){
		$idrole = $this->input->post('id');
		$data['title'] = 'Role Management';
		$data['user'] = $this->db->get_where('user',['email'=>$this->session->userdata('email')])->row_array();
		$data['role'] = $this->db->get('user_role')->result_array();

		$this->form_validation->set_rules('edit_role','Edit Role','required');

		if($this->form_validation->run()==false){
			$this->load->view('include/header_view', $data);
			$this->load->view('include/sidebar_view', $data);
			$this->load->view('include/navbar_view', $data);
			$this->load->view('dashboard/userRole_view', $data);
			$this->load->view('include/footer_view', $data); 
		}else{
			$new_role = $this->input->post('edit_role');

			$this->db->set('role',$new_role);
			$this->db->where('id',$idrole);
			$this->db->update('user_role');

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Role Edited!</div>');
			redirect('admin/editRole');
		}		
	}
//===================================================================================================================================
	public function getDataEdit(){
		$this->load->model('user_model');
		echo json_encode($this->user_model->getDataRole($_POST['id']));
	}
//===================================================================================================================================
	public function deleteRole($id){
		$this->load->model('user_model');
		$this->user_model->deleteDataRole($id);
		redirect('admin/userRole');
	}
//===================================================================================================================================
}