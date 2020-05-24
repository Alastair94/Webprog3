<?php

class Admin_Reg_Ctrl extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('register_mdl');
    }


    public function index(){      
        $d['v'] = 'admin_reg_form';
        $d['title'] = "Admin Registration";
        $this->load->view('init', $d);
    }
    
    public function new_user_registration(){
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('email_value', 'Email', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
    
        if($this->form_validation->run() == FALSE){
            $data['v'] = 'admin_reg_form';
            $this->load->view('init', $data);
        }
        else{
            $data = array(
                'user_name' => $this->input->post("username"),
                'user_email' => $this->input->post("email_value"),
                'user_password' => $this->input->post("password"),
                'user_role' => 'ADMIN'
            );
            $result = $this->register_mdl->registration_insert($data);
            if($result == TRUE){
                echo '<script>alert("You Have Successfully created another Admin user!");</script>';
                $data['v'] = 'profile';
                $this->load->view('init', $data);
            }
            else{
                $data['message_display'] = 'Username already exists!';
                $data['v'] = 'admin_reg_form';
                $this->load->view('init', $data);
            }
        }
    }
}
?>