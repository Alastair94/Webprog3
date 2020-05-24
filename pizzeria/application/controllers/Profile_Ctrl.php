<?php

class Profile_Ctrl extends CI_Controller{
    public function index(){
        $d['v'] = 'profile';
        $d['title'] = "Profile";
        $this->load->view('init', $d);
    }
}