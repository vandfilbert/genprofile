<?php

defined('BASEPATH') OR exit('No direct script access allowed');
//===========================================================================================================================

class Manage_Model extends CI_Model{
//===========================================================================================================================
	public function getSubmenu(){
		$query="SELECT `user_sub_menu`.*, `user_menu`.`menu`
				  FROM `user_sub_menu` JOIN `user_menu`
			        ON `user_sub_menu`.`menu_id` = `user_menu`.`id`";
		return $this->db->query($query)->result_array();
	}
//===========================================================================================================================
	public function getFungsio(){
		$queryFungsio = "SELECT *
						   FROM `fungsionaris` JOIN `department` 
						     ON `fungsionaris`.`id_department` = `department`.`id` 
						   JOIN `jabatan_fungsio` 
						     ON `fungsionaris`.`id_position` = `jabatan_fungsio`.`id`";
		return $this->db->query($queryFungsio)->result_array();
	}
//===========================================================================================================================
	public function getFungsiobyid($id){
		$queryFungsio = "SELECT *
						   FROM `fungsionaris` JOIN `department` 
						     ON `fungsionaris`.`id_department` = `department`.`id` 
						   JOIN `jabatan_fungsio` 
						     ON `fungsionaris`.`id_position` = `jabatan_fungsio`.`id`
						  WHERE `fungsionaris`.`id_fungsio` = $id";
		return $this->db->query($queryFungsio)->result_array();
	}
//===========================================================================================================================
}