<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register_Ctrl extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
        $this->load->helper('url'); 
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('register_mdl');
    }


    public function index(){      
        $d['v'] = 'registration_form';
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
                'user_password' => $this->input->post("password")
            );
            $result = $this->register_mdl->registration_insert($data);
            if($result == TRUE){
                $data['message_display'] = 'Registration Succesfully!';
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
}
?>