<?php

class Home_Ctrl extends CI_Controller{
    public function index(){
        $d['title'] = "Home Page";
        $d['v'] = 'home';
        $this->load->view('init', $d);
    }
}