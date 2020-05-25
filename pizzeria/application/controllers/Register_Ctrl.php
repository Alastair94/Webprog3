<?php

class Register_Ctrl extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('register_mdl');
    }


    public function index(){      
        $d['v'] = 'registration_form';
        $d['title'] = "Registration";
        $this->load->view('init', $d);
    }
    
    public function new_user_registration(){
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('email_value', 'Email', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
    
        if($this->form_validation->run() == FALSE){
            $data['v'] = 'registration_form';
            $this->load->view('init', $data);
        }
        else{
            $data = array(
                'user_name' => $this->input->post("username"),
                'user_email' => $this->input->post("email_value"),
                'user_password' => md5($this->input->post("password")),
                'user_role' => 'USER'
            );
            $result = $this->register_mdl->registration_insert($data);
            if($result == TRUE){
                $this->update_user_data();
                echo '<script>alert("You have successfully registered! Please login!");</script>';
                $data['v'] = 'login_form';
                $this->load->view('init', $data);
            }
            else{
                $data['message_display'] = 'Username already exists!';
                $data['v'] = 'registration_form';
                $this->load->view('init', $data);
            }
        }
    }
    
    public function update_user_data(){
        //TODOOOOOOOOO
            $data = array(
            'FirstName' => '',
            'LastName' => '',
            'Address' => '',
            'Phone' => '',
            'Username' => $this->input->post("username")
            );
            $this->register_mdl->insert_user_data($data);
    }            
}
?>