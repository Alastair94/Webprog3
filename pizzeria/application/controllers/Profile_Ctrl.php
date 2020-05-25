<?php

class Profile_Ctrl extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('profile_mdl');
    }
    
    public function index(){
        $this->get_user_data();
    }
    
    public function get_user_data(){
        $temp['username'] = $this->session->userdata['logged_in']['username'];
        $result = $this->profile_mdl->get_user_data($temp);
        if($result != FALSE){
            $session_data = array(
                'first_name' => $result[0]->FirstName,
                'last_name' => $result[0]->LastName,
                'address' => $result[0]->Address,
                'username' => $result[0]->Username,
                'phone' => $result[0]->Phone
            );
            $this->session->set_userdata('profile',$session_data);
            //$_SESSION['profile'] = $session_data;
            $data['v'] = 'profile';
            $data['title'] = "Profile";
            $this->load->view('init',$data);
        }
        else{
            // TODOOOOOOOOOOOOOOOOOOOOOOOOOOOOO
            echo "Valami" ;
        }
    }
    
    public function update_user_data(){
        $this->form_validation->set_rules('first_name', 'FirstName', 'trim|required');
        $this->form_validation->set_rules('last_name', 'LastName', 'trim|required');
        $this->form_validation->set_rules('address', 'Address', 'trim|required');
        $this->form_validation->set_rules('phone', 'Phone', 'trim|required');
        
        if($this->form_validation->run() == FALSE){
            $data['v'] = 'profile';
            $this->load->view('init', $data);
        }
        
        $data = array(
        'FirstName' => $this->input->post("first_name"),
        'LastName' => $this->input->post("last_name"),
        'Address' => $this->input->post("address"),
        'Phone' => $this->input->post("phone"),
        'Username' => $this->session->userdata['profile']['username']
        );
        $result = $this->profile_mdl->update_user_data($data);

        if($result == TRUE){
            echo '<script>alert("You have successfully modified details of your profile!!");</script>';
            redirect('Profile_Ctrl');
        }
    }
    
    public function show_profile_update(){
        $d['v'] = 'profile_update';
        $this->load->view('init',$d);
    }
}