<?php

class Order_Mdl extends CI_Model{
    public function __construct(){
        parent::__construct();

    }
    public function get_pizza_list(){
        $this->db->select('*');
        $this->db->from('pizzas');
        $this->db->order_by('pizza_type');
        $this->db->order_by('pizza_size');
        
        $query = $this->db->get();
        $result = $query->result();
        
        return $result;
    }
    
    public function insert_pizza($data){
        $condition = "pizza_type = " . "'".$data['pizza_type']."' AND pizza_size = "."'".$data['pizza_size']."'"; ;
        $this->db->select('*');
        $this->db->from('pizzas');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();
        if($query->num_rows() == 0){
            $this->db->insert('pizzas', $data);
            if($this->db->affected_rows() > 0){
                    return TRUE;
            }
            else{
                return FALSE;
            }
        }
        else{
            return FALSE;
        }
    }
    
    public function select_by_id($id){
        $this->db->select("*");
        $this->db->from('pizzas');
        $this->db->where('id', $id);
        
        return $this->db->get()
                        ->row();
    }
    
    public function delete_pizza($id){
        $this->db->where('id', $id);
        return $this->db->delete('pizzas');
    }
    
    public function get_incart_all($user_id){
        $this->db->select('*');
        $this->db->from('incart');
        $this->db->where('user_id', $user_id);
        $this->db->order_by('pizza_type');
        
        $query = $this->db->get();
        $result = $query->result();
        
        return $result;
    }
    
    public function add_to_cart($data){
        $this->db->insert('incart', $data);
        if($this->db->affected_rows() > 0){
            return TRUE;
        }
        else{
            return FALSE;
        }
    }
    
    public function delete_from_incart($id){
        $this->db->where('incart_id', $id);
        return $this->db->delete('incart');
    }
    
    public function create_order($data){
        $this->db->insert('active_orders', $data);
        $insert_id = $this->db->insert_id();
        
        return $insert_id;
    }
    
    public function create_order_helper($data){
        $this->db->insert('order_helper', $data);
        if($this->db->affected_rows() > 0){
            return TRUE;
        }
        else{
            return FALSE;
        }
    }
    
    public function delete_incart($user_id){
        $this->db->where('user_id', $user_id);
        return $this->db->delete('incart');
    }
    
    public function get_order_list(){
        $this->db->select('*');
        $this->db->from('active_orders');
        $this->db->order_by('order_id');
        
        $query = $this->db->get();
        $result = $query->result();
        
        return $result;
    }
    
    public function get_order_helper_list($order_id){
        $this->db->select('*');
        $this->db->from('order_helper');
        $this->db->where('order_id',$order_id);
        
        $query = $this->db->get();
        $result = $query->result();
        
        return $result;
    }
}