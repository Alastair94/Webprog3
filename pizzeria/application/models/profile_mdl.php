<?php

class Profile_Mdl extends CI_Model{
    
    public function get_user_data($data){
        $condition = "Username = " . "'" . $data['username'] . "'";
        $this->db->select('*');
        $this->db->from('user_data');
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
    
    public function update_user_data($data){
        $this->db->trans_start();
        $condition = "Username = " . "'" . $data['Username'] . "'";
        $this->db->where('Username',$data['Username']);
        $this->db->update('user_data', $data);
        $this->db->trans_complete();
        
        if ($this->db->affected_rows() == '1') {
            return TRUE;
}       else {
            if ($this->db->trans_status() === FALSE) {
                return false;
            }
            return true;
        }
    }
}