<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//====================================================================================================================================
class AddMenu extends CI_Controller{
//====================================================================================================================================
	public function __construct(){
		parent::__construct();
		checksignin();
	}
//====================================================================================================================================
	public function index(){
		$data['title'] = 'Manage Menu';
		$data['user'] = $this->db->get_where('user',['email'=>$this->session->userdata('email')])->row_array();
		$data['menu'] = $this->db->get('user_menu')->result_array();

		$this->form_validation->set_rules('menu','Menu','required');

		if($this->form_validation->run()==false){
			$this->load->view('include/header_view', $data);
			$this->load->view('include/sidebar_view', $data);
			$this->load->view('include/navbar_view', $data);
			$this->load->view('menu/menu_view', $data);
			$this->load->view('include/footer_view', $data);   
		}else{
			$this->db->insert('user_menu', ['menu'=> $this->input->post('menu')]);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Menu Added</div>');
			redirect('addMenu');
		}
	}
//====================================================================================================================================
	public function editMenu(){
		$data['title'] = 'Manage Submenu';
		$data['user'] = $this->db->get_where('user',['email'=>$this->session->userdata('email')])->row_array();
		$data['menu'] = $this->db->get('user_menu')->result_array();
		$data['menu'] = $this->db->get('user_menu')->result_array();

		//$this->load->model('manage_model','menu');
		//$data['submenu'] = $this->menu->getSubmenu();

		$this->form_validation->set_rules('editmenu2','Edit Menu','required');

		if($this->form_validation->run()==false){
			$this->load->view('include/header_view', $data);
			$this->load->view('include/sidebar_view', $data);
			$this->load->view('include/navbar_view', $data);
			$this->load->view('menu/menu_view', $data);
			$this->load->view('include/footer_view', $data);   
		}else{
			$editMenuid =  $this->input->post('menu2id');
			$editMenuname = $this->input->post('editmenu2');
			$this->db->set('menu',$editMenuname);
			$this->db->where('id',$editMenuid);
			$this->db->update('user_menu');
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Menu Edited!</div>');
			redirect('addMenu');
		}
	}
//====================================================================================================================================
	public function getDataAdminMenu(){
		$this->load->model('user_model');
		//echo $_POST['id'];
		echo json_encode($this->user_model->getDataMenuAdmin($_POST['id']));
	}
//====================================================================================================================================
	public function subMenu(){
		$data['title'] = 'Manage Submenu';
		$data['user'] = $this->db->get_where('user',['email'=>$this->session->userdata('email')])->row_array();
		$data['menu'] = $this->db->get('user_menu')->result_array();
		$data['menu'] = $this->db->get('user_menu')->result_array();

		$this->load->model('manage_model','menu');
		$data['submenu'] = $this->menu->getSubmenu();


		$this->form_validation->set_rules('title','Title','required');
		$this->form_validation->set_rules('menu_id','Menu','required');
		$this->form_validation->set_rules('url','URL','required');
		$this->form_validation->set_rules('icon','Icon','required');

		if($this->form_validation->run()==false){
			$this->load->view('include/header_view', $data);
			$this->load->view('include/sidebar_view', $data);
			$this->load->view('include/navbar_view', $data);
			$this->load->view('menu/submenu_view', $data);
			$this->load->view('include/footer_view', $data);
		}else{
			$data =[
				'title'=>$this->input->post('title'),
				'menu_id'=>$this->input->post('menu_id'),
				'url'=>$this->input->post('url'),
				'icon'=>$this->input->post('icon'),
				'is_active'=>$this->input->post('is_active')
			];
			$this->db->insert('user_sub_menu',$data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Menu Added</div>');
			redirect('addMenu/subMenu');	
		}
	}
//====================================================================================================================================
	public function editSubMenu(){
		$data['title'] = 'Manage Submenu';
		$data['user'] = $this->db->get_where('user',['email'=>$this->session->userdata('email')])->row_array();
		$data['menu'] = $this->db->get('user_menu')->result_array();
		$data['menu'] = $this->db->get('user_menu')->result_array();

		$this->load->model('manage_model','menu');
		$data['submenu'] = $this->menu->getSubmenu();

		$idsubmenu = $this->input->post('idsubmenu');
		//var_dump($idsubmenu);

		$this->form_validation->set_rules('edit_title','Edit Title','required');
		$this->form_validation->set_rules('edit_menu_id','Edit Menu','required');
		$this->form_validation->set_rules('edit_url','Edit URL','required');
		$this->form_validation->set_rules('edit_icon','Edit Icon','required');

		if($this->form_validation->run()==false){
			$this->load->view('include/header_view', $data);
			$this->load->view('include/sidebar_view', $data);
			$this->load->view('include/navbar_view', $data);
			$this->load->view('menu/submenu_view', $data);
			$this->load->view('include/footer_view', $data);
		}else{
			$new_title = $this->input->post('edit_title');
			$new_menu_id = $this->input->post('edit_menu_id');
			$new_url = $this->input->post('edit_url');
			$new_icon = $this->input->post('edit_icon');
			$new_is_active = $this->input->post('edit_is_active');

			$this->db->set('title',$new_title);
			$this->db->set('menu_id',$new_menu_id);
			$this->db->set('url',$new_url);
			$this->db->set('icon',$new_icon);
			$this->db->set('is_active',$new_is_active);
			$this->db->where('id',$idsubmenu);
			$this->db->update('user_sub_menu');
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Menu Edited!</div>');
			redirect('addMenu/editSubMenu');	
		}
	}
//====================================================================================================================================
	public function getDataEdit(){
		$this->load->model('user_model');
		echo json_encode($this->user_model->getDataSubMenu($_POST['id']));
	}
//====================================================================================================================================
	public function deleteMenu($id){
		$this->load->model('user_model');
		$this->user_model->deleteDataMenu($id);
		redirect('addMenu');
	}
//====================================================================================================================================
	public function deleteSubMenu($id){
		$this->load->model('user_model');
		$this->user_model->deleteDataSubMenu($id);
		redirect('addMenu/subMenu');
	}
//====================================================================================================================================
}