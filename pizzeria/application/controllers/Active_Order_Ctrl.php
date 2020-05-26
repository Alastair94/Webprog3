<?php

class Active_Order_Ctrl extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->model('order_mdl');
        $this->load->dbutil();
        $this->load->helper('file');
    }
    
    public function index(){
        $orders = $this->order_mdl->get_order_list();
        $data = array(
            'v' => 'active_order',
            'title' => 'Active Orders',
            'orders' => $orders
        );
        
        $this->load->view('init', $data);
    }
    
    public function get_order_helper($order_id){
        $result = $this->order_mdl->get_order_helper_list($order_id);

        $data = array(
            'v' => 'order_helper',
            'helper' => $result
        );
        $this->load->view('init',$data);
    }
    
    public function asd(){
        $orders = $this->db->query("SELECT * FROM active_orders");
        
        $result = $this->dbutil->csv_from_result($orders);
        
        if(!write_file('./CSV/Orders/orders.csv', $result)){
            echo "Unable to write file!";
        }
        else{
            redirect('Active_Order_Ctrl');
        }
    }
}