<?php

//===============custom function helper===============
function checkSignin(){
	$_this=get_instance();
	$user_mail=$_this->session->userdata('email');
	//$role_id=$_this->session->userdata('role_id');

	if(!$user_mail){
		redirect('home');	
	}else{
		$role_id=$_this->session->userdata('role_id');
		//var_dump($role_id);
		$menu=$_this->uri->segment(1);
		//var_dump($menu);
		//if($menu == "admin"){
			//$menu="Super Admin";
		//}elseif ($menu == "member") {
			//$menu="Interface User";
		//}elseif ($menu=="addMenu") {
			//$menu="Menu Managament";
		//}
		//var_dump($menu);
		$queryMenu = $_this->db->get_where('user_menu',['menu'=>$menu])->row_array();
		//var_dump($queryMenu);
		$menu_id=$queryMenu['id'];
		//var_dump($menu_id);
		$userAccess=$_this->db->get_where('access_menu',['role_id'=>$role_id,
													     'menu_id'=>$menu_id]);
		//var_dump($userAccess->num_rows());
		if($userAccess->num_rows()<1) {
			redirect('home/blocked');
		}
	}
}

function checkAccess($role_id, $menu_id){
	$_this=get_instance();

	$_this->db->where('role_id', $role_id);
	$_this->db->where('menu_id', $menu_id);
	$result = $_this->db->get('access_menu');

	if($result->num_rows()>0){
		return "checked='checked'";
	}
}