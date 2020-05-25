<?php

class Order_Ctrl extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->model('order_mdl');
        $this->load->helper('form');
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
        
        redirect('Order_Ctrl');
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
        $total_price = 0;
        $incart = $this->order_mdl->get_incart_all($user_id);
        foreach ($incart as $i){
            $total_price = $total_price + $i->total_price;
        }
        $data = array(
            'user_id' => $user_id,
            'address' => $this->session->userdata['profile']['address'],
            'phone' => $this->session->userdata['profile']['phone'],
            'message' => $this->input->post('message'),
            'total_price' => $total_price
        );
        $result = $this->order_mdl->create_order($data);
        
        redirect('Order_Ctrl');
    }
}