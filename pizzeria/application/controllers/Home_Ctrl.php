<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_Ctrl extends CI_Controller{
    public function index(){
        $this->load->helper('url');
        $d['v'] = 'home';
        $this->load->view('init', $d);
    }
}