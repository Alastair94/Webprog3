<?php

class Order_Ctrl extends CI_Controller{
    public function __construct() {
        parent::__construct();
//        $this->load->helper('form');
//        $this->load->library('form_validation');
        $this->load->model('order_mdl');
    }
    
    public function index(){
        $records = $this->order_mdl->get_pizza_list();
        $data = array(
            'v' => 'order',
            'title' => 'Order',
            'pizzas' => $records
        );
        $this->load->view('init', $data);
    }    
}