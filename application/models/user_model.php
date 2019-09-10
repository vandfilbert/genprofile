<?php

class User_Model extends CI_Model{
//===================================================================================================================================
    public function get($user_id=null){
        if($user_id===null){
            $query = $this->db->get('user');
        }elseif(is_array($user_id)){
            $query = $this->db->get_where('user',$user_id);
        }
        else{
            $query = $this->db->get_where('user',['user_id'=> $user_id]);
        }
        return $query->result_array();
    }
//===================================================================================================================================
    public function getDataRole($id){
        $query = "SELECT * FROM `user_role` WHERE `id`= $id";
        return $this->db->query($query)->result_array();
    }
//===================================================================================================================================
    public function deleteDataRole($id){
        $this->db->where('id',$id);
        $this->db->delete('user_role');
    }
//===================================================================================================================================
    public function deleteDataFungsio($id){
        $this->db->where('id_fungsio',$id);
        $this->db->delete('fungsionaris');
    }
//===================================================================================================================================
    public function deleteDataMenu($id){
        $this->db->where('id',$id);
        $this->db->delete('user_menu');
    }
//===================================================================================================================================
    public function deleteDataSubMenu($id){
        $this->db->where('id',$id);
        $this->db->delete('user_sub_menu');
    }
//===================================================================================================================================
    public function getDataSubMenu($id){
        $query = "SELECT * FROM `user_sub_menu` WHERE `id`= $id";
        return $this->db->query($query)->result_array();
    }
//===================================================================================================================================
    public function getDataMenuAdmin($id){
        $query = "SELECT * FROM `user_menu` WHERE `id`= $id";
        return $this->db->query($query)->result_array();
    }
//===================================================================================================================================
}