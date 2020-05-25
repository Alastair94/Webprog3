<?php

class Register_Mdl extends CI_Model{
    
    public function registration_insert($data){
        $condition = "user_name = " . "'" . $data['user_name'] . "'";
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();
        if($query->num_rows() == 0){
            $this->db->insert('users', $data);
            if($this->db->affected_rows() > 0){
                return true;
            }
        }
        else{
            return FALSE;
        }
    }
    
    public function insert_user_data($data){
        $condition = "Username = " . "'" . $data['Username'] . "'";
        $this->db->select('*');
        $this->db->from('user_data');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();
        if($query->num_rows() == 0){
            $this->db->insert('user_data', $data);
            if($this->db->affected_rows() > 0){
                return true;
            }
        }
        else{
            return FALSE;
        }
    }
}