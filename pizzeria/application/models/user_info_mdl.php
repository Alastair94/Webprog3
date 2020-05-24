<?php

class User_Info_Mdl extends CI_Model{
    
    public function read_user_information($username){
        $condition = "user_name = " . "'" . $username . "'";
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();
        
        if($query->num_rows() == 1){
            return $query->result();
        }
        else{
            return FALSE;
        }
    }
}