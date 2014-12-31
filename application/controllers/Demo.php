<?php

class Demo extends CI_Controller{
  public function __construct() {
    parent::__construct();
  }
  
  public function index(){
    $this->load->view('layout', array('content' => 'demo/index'));
  }
  
  public function alertify(){
    $this->load->view('layout', array('content' => 'demo/alertify'));
  }
  
  public function show_message() {
    $this->load->view('layout', array(
        'content' => 'demo/show_message',
        'mensaje' => 'Bienvenido al aplicativo, este mensaje debe desaparecer en 3 segundos',
        'mensaje_correcto' => 'Ejemplo de un mensaje correcto',
        'mensaje_informativo' => 'Ejemplo de un mensaje informativo',
        'mensaje_advertencia' => 'Ejemplo de un mensaje de advertencia',
        'mensaje_error' => 'Ejemplo de un mensaje de error'
      ));
  }
  
  public function carousel_hiden_images(){
    $this->load->view('layout', array('content' => 'demo/carousel_hiden_images'));
  }
  
  public function carousel(){
    $this->load->view('layout', array('content' => 'demo/carousel'));
  }
  
  public function carousel_basic(){
    $this->load->view('layout', array('content' => 'demo/carousel_basic'));
  }
  
  public function toastr() {
    $this->load->view('layout', array('content' => 'demo/toastr'));
  }
  
  public function coverflow() {
    $this->load->view('layout', array('content' => 'demo/coverflow'));
  }
  
  public function limit($start=0, $end=5){
    $end = $end<=$start?($start + $end):$end;
    $this->load->model('basic_model');
    
    $config['base_url'] = base_url().'demo/limit/';
    $config['total_rows'] = 120;
    $config['per_page'] = 5;
    
    $config['last_tag_open'] = '<li>';
    $config['last_tag_close'] = '</li>';
    $config['first_tag_open'] = '<li>';
    $config['first_tag_close'] = '</li>';
    $config['next_tag_open'] = '<li>';
    $config['next_tag_close'] = '</li>';
    $config['prev_tag_open'] = '<li>';
    $config['prev_tag_close'] = '</li>';
    $config['cur_tag_open'] = '<li class="active"><a href="#">';
    $config['cur_tag_close'] = '</a></li>';
    $config['num_tag_open'] = '<li>';
    $config['num_tag_close'] = '</li>';

    $this->load->library('pagination');
    
    $this->pagination->initialize($config);
    
    $data['start']=$start;
    $data['end']=$end;
    $data['content'] = 'demo/limit';
    $data['pagination_links'] = $this->pagination->create_links();
    
    $this->load->view('layout', $data);
  }
}