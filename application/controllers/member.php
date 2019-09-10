<?php

class Member extends CI_Controller{

	public function __construct(){
		parent::__construct();
		checksignin();
	}
//===========================================================================================================================
	public function index(){
		$data['title'] = 'Profile';
		$data['user'] = $this->db->get_where('user',['email'=>$this->session->userdata('email')])->row_array();
		//echo "Percobaan".$data['user']['name'];
		$this->load->view('include/header_view', $data);
		$this->load->view('include/sidebar_view', $data);
		$this->load->view('include/navbar_view', $data);
		$this->load->view('member/member_view', $data);
		$this->load->view('include/footer_view', $data);   	
	}
//===========================================================================================================================
	public function editProfile(){
		$data['title'] = 'Edit Profile';
		$data['user'] = $this->db->get_where('user',['email'=>$this->session->userdata('email')])->row_array();

		$this->form_validation->set_rules('name', 'Full Name', 'required|trim');

		if($this->form_validation->run()==false){
			$this->load->view('include/header_view', $data);
			$this->load->view('include/sidebar_view', $data);
			$this->load->view('include/navbar_view', $data);
			$this->load->view('member/edit_view', $data);
			$this->load->view('include/footer_view', $data); 	
		}else{
			$name = $this->input->post('name');
			$email = $this->input->post('email');

			$upload_image=$_FILES['image']['name'];

			if($upload_image){
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$config['max_size']     = '3072';
				$config['upload_path'] = './public/img/images/';
				
				$this->load->library('upload', $config);

				if ($this->upload->do_upload('image')){

					$old_image = $data['user']['image'];
					if($old_image!='bongoCat.png'){
						unlink('FCPATH','public/img/images/'. $old_image);
					}	

					$new_image=$this->upload->data('file_name');
					$this->db->set('picture',$new_image);
				}else{
					echo $this->upload->display_errors();
				}
			}
			
			$this->db->set('name',$name);
			$this->db->where('email',$email);
			$this->db->update('user');

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Profile Updated</div>');
			redirect('member');
		}
	}
//===========================================================================================================================
	public function changePassword(){
		$data['title'] = 'Change Password';
		$data['user'] = $this->db->get_where('user',['email'=>$this->session->userdata('email')])->row_array();
		
		$this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
		$this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[6]|matches[new_password2]');
		$this->form_validation->set_rules('new_password2', 'Confirm Password', 'required|trim|min_length[6]|matches[new_password1]');

		if($this->form_validation->run()==false){
			$this->load->view('include/header_view', $data);
			$this->load->view('include/sidebar_view', $data);
			$this->load->view('include/navbar_view', $data);
			$this->load->view('member/change_view', $data);
			$this->load->view('include/footer_view', $data); 	
		}else{
			$current_password = $this->input->post('current_password');
			$new_password = $this->input->post('new_password1');
			if(!password_verify($current_password,$data['user']['password'])){
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong Password!</div>');
				redirect('member/changePassword');	
			}else{
				if($current_password==$new_password){
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Please Input Another Password!</div>');
					redirect('member/changePassword');		
				}else{
					$encryptPass = password_hash($new_password, PASSWORD_DEFAULT);
					$this->db->set('password',$encryptPass);
					$this->db->where('email',$this->session->userdata('email'));
					$this->db->update('user');

					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password Change!</div>');
					redirect('member/changePassword');
				}
			}			
		}	
	}
//===========================================================================================================================
	public function fungsio(){
		$data['title'] = 'GENTA Data';
		$data['user'] = $this->db->get_where('user',['email'=>$this->session->userdata('email')])->row_array();
		$data['fungsio'] = $this->db->get('fungsionaris')->result_array();
		$this->load->model('manage_model','fungsio');
		$data['fungsiogen'] = $this->fungsio->getFungsio();
		$data['department'] = $this->db->get('department')->result_array();
		$data['position'] = $this->db->get('jabatan_fungsio')->result_array();

		$this->form_validation->set_rules('fungsio_name', 'Fungsio Name', 'required|trim');
		$this->form_validation->set_rules('fungsio_nrp', 'Fungsio NRP', 'required|trim');
		$this->form_validation->set_rules('fungsio_gender', 'Fungsio Gender', 'required|trim');
		$this->form_validation->set_rules('fungsio_address', 'Fungsio Address', 'required|trim');
		$this->form_validation->set_rules('fungsio_birthplace', 'Fungsio Birthplace', 'required|trim');
		$this->form_validation->set_rules('fungsio_birthdate', 'Fungsio Birthdate', 'required|trim');
		$this->form_validation->set_rules('fungsio_periodjoin', 'Fungsio Period Join', 'required|trim');
		$this->form_validation->set_rules('department_id', 'Department ID', 'required|trim');
		$this->form_validation->set_rules('position_id', 'Position ID', 'required|trim');

		if($this->form_validation->run()==false){
			$this->load->view('include/header_view', $data);
			$this->load->view('include/sidebar_view', $data);
			$this->load->view('include/navbar_view', $data);
			$this->load->view('member/fungsio_view', $data);
			$this->load->view('include/footer_view', $data);
		}else{
			$this->load->helper('date');
			$fungsio_date = $this->input->post('fungsio_birthdate');
			$birth_date = nice_date($fungsio_date, 'd F Y');	
			$upload_image_fungsio=$_FILES['fungsio_image']['name'];

			if($upload_image_fungsio!=null){
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$config['max_size']     = '3072';
				$config['upload_path'] = './public/img/gentafungsio';

				$this->load->library('upload', $config);

				if ($this->upload->do_upload('fungsio_image')){	
					$new_image=$this->upload->data('file_name');
				}else{
					echo $this->upload->display_errors();
				}
			}else{
				$new_image='bongoCat.png';
			}

			$data=[
				'name'=>$this->input->post('fungsio_name'),
				'nrp'=>$this->input->post('fungsio_nrp'),
				'gender'=>$this->input->post('fungsio_gender'),
				'address'=>$this->input->post('fungsio_address'),
				'birthplace'=>$this->input->post('fungsio_birthplace'),
				'date_of_birth'=>$birth_date,
				'fungsio_picture'=>$new_image,
				'period_join'=>$this->input->post('fungsio_periodjoin'),
				'id_position'=>$this->input->post('position_id'),
				'id_department'=>$this->input->post('department_id')
			];

			$this->db->insert('fungsionaris',$data);
			if($new_image=='bongoCat.png'){
				$this->session->set_flashdata('message1', '<div class="alert alert-warning" role="alert">Your Fungsionaris Picture is a BongoCat!</div>');
			}
			$this->session->set_flashdata('message2', '<div class="alert alert-success" role="alert">Fungsionaris Added!</div>');
			redirect('member/fungsio');	
		} 	
	}
//===========================================================================================================================
	public function editFungsioView(){
		$id=$this->uri->segment(3);
		$data['title'] = 'Edit GENTA Data';
		$data['user'] = $this->db->get_where('user',['email'=>$this->session->userdata('email')])->row_array();
		$data['fungsiodept'] = $this->db->get('fungsionaris')->result_array();
		$this->load->model('manage_model','fungsiodept');
		$data['fungsiogen'] = $this->fungsiodept->getFungsiobyid($id);
		$data['department'] = $this->db->get('department')->result_array();
		$data['position'] = $this->db->get('jabatan_fungsio')->result_array();

		$this->load->view('include/header_view', $data);
		$this->load->view('include/sidebar_view', $data);
		$this->load->view('include/navbar_view', $data);
		$this->load->view('member/editfungsio_view', $data);
		$this->load->view('include/footer_view', $data);
	}
//===========================================================================================================================
	public function editFungsio(){
		$data['user'] = $this->db->get_where('user',['email'=>$this->session->userdata('email')])->row_array();
		$data['fungsiodept'] = $this->db->get('fungsionaris')->result_array();

		$this->load->helper('date');
		$fungsio_date = $this->input->post('fungsio_birthdate_edit');
		if($fungsio_date!=null){
			$birth_date = nice_date($fungsio_date, 'd F Y');
		}else{
			$fungsio_date = $this->input->post('birthdate_edit');
			$birth_date = nice_date($fungsio_date, 'd F Y');
		}

		$id=$this->input->post('fungsio_id_edit');
		$name=$this->input->post('fungsio_name_edit');
		$nrp=$this->input->post('fungsio_nrp_edit');
		$gender=$this->input->post('fungsio_gender_edit');
		$address=$this->input->post('fungsio_address_edit');
		$birthplace=$this->input->post('fungsio_birthplace_edit');
		$date_of_birth=$birth_date;
		$period_join=$this->input->post('fungsio_periodjoin_edit');
		$id_position=$this->input->post('position_id_edit');
		$id_department=$this->input->post('department_id_edit');


		$upload_image=$_FILES['editimagefungsio2']['name'];

		if($upload_image){
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']     = '3072';
			$config['upload_path'] = './public/img/gentafungsio/';

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('editimagefungsio2')){
				$new_image=$this->upload->data('file_name');
				$this->db->set('fungsio_picture',$new_image);
			}else{
				echo $this->upload->display_errors();
			}
		}

		$this->db->set('name',$name);
		$this->db->set('date_of_birth',$date_of_birth);
		$this->db->set('nrp',$nrp);
		$this->db->set('gender',$gender);
		$this->db->set('id_position',$id_position);
		$this->db->set('id_department',$id_department);
		$this->db->set('birthplace',$birthplace);
		$this->db->set('period_join',$period_join);
		$this->db->set('address',$address);
		$this->db->where('id_fungsio',$id);
		$this->db->update('fungsionaris');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Fungsio Updated!</div>');
		redirect('member/fungsio');
		
	}
//===========================================================================================================================
	public function detail($id){
		$data['title'] = 'GENTA Data Detail';
		$data['user'] = $this->db->get_where('user',['email'=>$this->session->userdata('email')])->row_array();
		$data['fungsiodept'] = $this->db->get('fungsionaris')->result_array();
		$this->load->model('manage_model','fungsiodept');
		$data['fungsiogen'] = $this->fungsiodept->getFungsiobyid($id);

		$this->load->view('include/header_view', $data);
		$this->load->view('include/sidebar_view', $data);
		$this->load->view('include/navbar_view', $data);
		$this->load->view('member/detail_view', $data);
		$this->load->view('include/footer_view', $data); 	
	}
//===========================================================================================================================
	public function getDataFungsio(){
		$this->load->model('manage_model');
		echo json_encode($this->manage_model->getFungsiobyid($_POST['idfungsio']));
	}
//===========================================================================================================================
	public function deleteFungsio($id){
		$this->load->model('user_model');
		$this->user_model->deleteDataFungsio($id);
		redirect('member/fungsio');
	}
//====================================================================================================================================
}