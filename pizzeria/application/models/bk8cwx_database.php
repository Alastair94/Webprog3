<?php

Class Bk8cwx_Database extends CI_Model{
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

?>