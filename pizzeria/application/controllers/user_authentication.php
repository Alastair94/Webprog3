<?php

//session_start();

Class User_Authentication extends CI_Controller{
    public function __construct() {
        parent::__construct();
        
        $this->load->helper('form');
        
        $this->load->helper('url');
        
        $this->load->library('form_validation');
        
        $this->load->library('session');
        
        $this->load->model('bk8cwx_database');
    }
    
//    public function index(){
//        $this->load->view('login_form');
//    }
    
    public function user_registration_show(){
        $this->load->view('registration_form');
    }
    
    public function user_login_show(){
        $this->load->view('login_form');
    }


    public function new_user_registration(){
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('email_value', 'Email', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
    
        if($this->form_validation->run() == FALSE){
            $this->load->view('registration_form');
        }
        else{
            $data = array(
                'user_name' => $this->input->post("username"),
                'user_email' => $this->input->post("email_value"),
                'user_password' => $this->input->post("password")
            );
            $result = $this->bk8cwx_database->registration_insert($data);
            if($result == TRUE){
                $data['message_display'] = 'Registration Succesfully!';
                $this->load->view('login_form', $data);
            }
            else{
                $data['message_display'] = 'Username already exists!';
                $this->load->view('registration_form', $data);
            }
        }
    }
    
    public function user_login_process(){
        $this->form_validation->set_rules('username', 'username', 'trim|required');
        $this->form_validation->set_rules('password', 'password', 'trim|required');
       
        if($this->form_validation->run() == FALSE){
            if(isset($this->session->userdata['logged_in'])){
                $this->load->view('admin_page');
            }
            else{
                $this->load->view('login_form');
            }
        }
        else{
            $data = array(
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password')
            );
            $result = $this->bk8cwx_database->login($data);
            if($result == TRUE){
                $username = $this->input->post('username');
                $result = $this->bk8cwx_database->read_user_information($username);
                if($result != FALSE){
                    $session_data = array(
                        'username' => $result[0]->user_name,
                        'email' => $result[0]->user_email
                    );
                    
                    $this->session->set_userdata('logged_in', $session_data);
                    $this->load->view('admin_page');
                }
            }
            else{
                $data = array(
                    'error_message' => 'Invalid Username or Password'
                );
                $this->load->view('login_form', $data);
            }
        }
    }
    
    public function logout(){
        $sess_array = array(
            'username' => ''
        );
        $this->session->unset_userdata('logged_in', $sess_array);
        $data['message_display'] = 'Successfully Logout!';
        $this->load->view('login_form', $data);
    }
    
}   

?>