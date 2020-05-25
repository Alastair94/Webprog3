<?php

class Pizza_Ctrl extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('upload');
        $this->load->model('order_mdl');
    }
    
    public function index(){
        $data = array(
            'v' => 'add_pizza',
            'title' => 'Add new Pizza'
        );
        $this->load->view('init', $data);
    }
    
    public function insert_pizza(){
        if($this->input->post('submit')){
            $this->form_validation->set_rules('pizza_type', 'PizzaType', 'trim|required');
            $this->form_validation->set_rules('pizza_size', 'PizzaSize', 'trim|required');
            $this->form_validation->set_rules('pizza_price', 'PizzaPrice', 'trim|required');

            if($this->form_validation->run() == FALSE){
                redirect('Pizza_Ctrl');
            }
            else{
                $upload_config['allowed_types'] = 'jpg|jpeg|png';
                $upload_config['max_size'] = 5000;
                $upload_config['min_width'] = 250;
                $upload_config['min_height'] = 250;
                $upload_config['file_name'] =  $this->input->post('pizza_type').$this->input->post('pizza_size');
                $upload_config['upload_path'] = './Uploads/img/pizzas/';
                $upload_config['file_ext_tolower'] = TRUE;
                $upload_config['overwrite'] = FALSE;

                $this->upload->initialize($upload_config);

                if($this->upload->do_upload('file') == TRUE){
                    $photo_path = $upload_config['upload_path'].$upload_config['file_name'];
                    $view_params = [
                        'data' => $this->upload->data()
                    ];
                    $data = array(
                        'pizza_type' => $this->input->post("pizza_type"),
                        'pizza_size' => $this->input->post("pizza_size"),
                        'pizza_price' => $this->input->post("pizza_price"),
                        'photo_path' => $photo_path
                    );
                    $result = $this->order_mdl->insert_pizza($data);
                    if($result == TRUE){
                        redirect('Order_Ctrl');
                    }
                    else{
                        
                    }
                }
                else{
                    show_error("Couldn't upload the image!");
                }
            }
        }
        redirect('Pizza_Ctrl');
    }
    
    public function delete_pizza($id = NULL){
        if($id == NULL){
            show_error("Missing id!");
        }
        $record = $this->order_mdl->select_by_id($id);
        if($record == NULL){
            show_error("There is no user with this id!");
        }
        
        $this->order_mdl->delete_pizza($id);
        
        redirect('Order_Ctrl');        
    }
    
    
}