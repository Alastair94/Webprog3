<?php

class Order_Ctrl extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->model('order_mdl');
        $this->load->helper('form');
        $this->load->helper('date');
    }
    
    public function index(){
        $pizzas = $this->order_mdl->get_pizza_list();
        $incart = $this->order_mdl->get_incart_all($this->session->userdata['logged_in']['id']);
        $data = array(
            'v' => 'order',
            'title' => 'Order',
            'pizzas' => $pizzas,
            'items' => $incart
        );
        $this->load->view('init', $data);
    }
    
    public function add_to_cart($id){
        $result = $this->order_mdl->select_by_id($id);
        $data = array(
            'user_id' => $this->session->userdata['logged_in']['id'],
            'pizza_type' => $result->pizza_type,
            'pizza_size' => $result->pizza_size,
            'pizza_amount' => 1,
            'total_price' => $result->pizza_price
        );
        
        $result = $this->order_mdl->add_to_cart($data);
        
        redirect('Order_Ctrl','location');
    }
    
    public function delete_from_incart($id = NULL){
        if($id == NULL){
            show_error("Missing id!");
        }
        
        $this->order_mdl->delete_from_incart($id);
        
        redirect('Order_Ctrl'); 
    }
    
    public function order(){
        $user_id = $this->session->userdata['logged_in']['id'];
        $incart = $this->order_mdl->get_incart_all($user_id);
        
        $total_price = 0;
        foreach ($incart as $i){
            $total_price = $total_price + $i->total_price;
        }
        $data = array(
            'user_id' => $user_id,
            'address' => $this->session->userdata['profile']['address'],
            'first_name' => $this->session->userdata['profile']['first_name'],
            'last_name' => $this->session->userdata['profile']['last_name'],
            'phone' => $this->session->userdata['profile']['phone'],
            'message' => $this->input->post('message'),
            'total_price' => $total_price
        );
        $order_id = $this->order_mdl->create_order($data);
        
        foreach($incart as $i){
            $temp = array(
                'order_id' => $order_id,
                'pizza_type' => $i->pizza_type,
                'pizza_size' => $i->pizza_size,
                'pizza_amount' => $i->pizza_amount,
                'total_price' => $i->total_price
            );
            $this->order_mdl->create_order_helper($temp);
        }
        
        $this->order_mdl->delete_incart($user_id);
        
        redirect('Order_Ctrl');
    }
}