<?php
//comentario prueba
class Demo extends CI_Controller {

  public function __construct() {
    parent::__construct();
  }

  public function index() {
    $this->load->view('layout', array('content' => 'demo/index'));
  }

  public function alertify() {
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

  public function carousel_hiden_images() {
    $this->load->view('layout', array('content' => 'demo/carousel_hiden_images'));
  }

  public function carousel() {
    $this->load->view('layout', array('content' => 'demo/carousel'));
  }

  public function carousel_basic() {
    $this->load->view('layout', array('content' => 'demo/carousel_basic'));
  }

  public function toastr() {
    $this->load->view('layout', array('content' => 'demo/toastr'));
  }

  public function coverflow() {
    $this->load->view('layout', array('content' => 'demo/coverflow'));
  }

  public function limit($start = 0, $end = 5) {
    $query = $this->basic_model->limit('usuarios', $start, $end, 'cedula', array(
      'select' => 'cencos, fc_desc_sucursal(cencos) descencos, cedula, pro_personal_nombre(cedula) nombre, codusu',
      'where' => array('estado' => 'A')
    ));

    $this->load->view('layout', array(
      'content' => 'demo/limit',
      'query' => $query
    ));
  }

}
