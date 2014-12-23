<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

  public function __construct() {
    parent::__construct();
  }

  /*
   * [view]
   * Muestra la vista inicial
   */

  public function index() {
    if (!is_login())
      $this->load->view('layout', array(
        'content' => 'home/welcome'
      ));
    else
      $this->load->view('layout', array(
        'content' => 'home/index',
        'mensaje' => 'Bienvenido al aplicativo, este mensaje debe desaparecer en 3 segundos',
        'mensaje_correcto' => 'Ejemplo de un mensaje correcto',
        'mensaje_informativo' => 'Ejemplo de un mensaje informativo',
        'mensaje_advertencia' => 'Ejemplo de un mensaje de advertencia',
        'mensaje_error' => 'Ejemplo de un mensaje de error'
      ));
  }

  /*
   * [view]
   * Muestra la vista de ayuda
   */

  public function help() {
    $this->load->view('layout', array('content' => 'home/help'));
  }

}
