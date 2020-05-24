<?php

class Login_Mdl extends CI_Model{
    
    public function login($data){
        $condition = "user_name = " . "'" . $data['username'] . "' AND " . "user_password = " . "'" . $data['password'] . "'";
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