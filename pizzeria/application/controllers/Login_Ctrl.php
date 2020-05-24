<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_Ctrl extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
        $this->load->helper('url'); 
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('login_mdl');
        $this->load->model('user_info_mdl');
    }


    public function index(){
        $d['v'] = 'login_form';
        $this->load->view('init', $d);
    }
    
    public function user_login_process(){
        $this->form_validation->set_rules('username', 'username', 'trim|required');
        $this->form_validation->set_rules('password', 'password', 'trim|required');
       
        if($this->form_validation->run() == FALSE){
            if(isset($this->session->userdata['logged_in'])){
                $this->load->view('admin_page');
            }
            else{
                $data['v'] = 'login_form'; 
                $this->load->view('init',$data);
            }
        }
        else{
            $data = array(
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password')
            );
            $result = $this->login_mdl->login($data);
            if($result == TRUE){
                $username = $this->input->post('username');
                $result = $this->user_info_mdl->read_user_information($username);
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
                $data['v'] = 'login_form'; 
                $this->load->view('init', $data);
            }
        }
    }
    
    public function logout(){
        $sess_array = array(
            'username' => ''
        );
        $this->session->unset_userdata('logged_in', $sess_array);
        $data['message_display'] = 'Successfully Logout!';
        $data['v'] = 'login_form'; 
        $this->load->view('init',$data);
    }
}
?>