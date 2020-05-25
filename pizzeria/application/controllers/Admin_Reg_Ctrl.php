<?php

class Admin_Reg_Ctrl extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('register_mdl');
    }


    public function index(){      
        $records = $this->register_mdl->get_user_list();
        $data['v'] = 'admin_reg_form';
        $data['title'] = "Admin Registration";
        $data['users'] = $records;
        $this->load->view('init', $data);
    }
    
    public function new_user_registration(){
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('email_value', 'Email', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
    
        if($this->form_validation->run() == FALSE){
            redirect('Admin_Reg_Ctrl');
        }
        else{
            $data = array(
                'user_name' => $this->input->post("username"),
                'user_email' => $this->input->post("email_value"),
                'user_password' => md5($this->input->post("password")),
                'user_role' => 'ADMIN'
            );
            $result = $this->register_mdl->registration_insert($data);
            if($result == TRUE){
                $this->create_user_data($data['user_name']);
                redirect('Admin_Reg_Ctrl');
            }
            else{
                $data['message_display'] = 'Username already exists!';
                $data['v'] = 'admin_reg_form';
                $this->load->view('init', $data);
            }
        }
    }
    
    public function delete_user($id = NULL){
        if($id == NULL){
            show_error("Missing id!");
        }
        $record = $this->register_mdl->select_by_id($id);
        if($record == NULL){
            show_error("There is no user with this id!");
        }      
        
        $this->register_mdl->delete_user_data($record->user_name);
        $this->register_mdl->delete_user($id);

        redirect('Admin_Reg_Ctrl');    
    }
    
    public function create_user_data($user_name){
            $data = array(
            'FirstName' => '',
            'LastName' => '',
            'Address' => '',
            'Phone' => '',
            'Username' => $user_name
            );
            $this->register_mdl->insert_user_data($data);
    }   
}
?>