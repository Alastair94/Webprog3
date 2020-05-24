<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order_Ctrl extends CI_Controller{
    public function index(){
        $d['v'] = 'order';
        $d['title'] = "Order";
        $this->load->view('init', $d);
    }
}