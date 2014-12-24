<?php

class Demo extends CI_Controller{
  public function __construct() {
    parent::__construct();
  }
  
  public function index(){
    $this->load->view('layout', array('content' => 'demo/test_alertify'));
  }
}