<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {

  public function __construct() {
    parent::__construct();
  }

  /*
   * [view]
   * Produce la vista principal, donde se muestran los menus correspondientes
   * al usuario (los que el usuario tiene permiso), si el usuario no esta logeado
   * muestra la pantalla de inicio de sesión.
   */

  public function index() {
    if (!$this->session->userdata('is_logued_in'))
      $this->load->view('layout', array('content' => 'session_system/form_login'));
    else
      $this->load->view('layout', array(
        'content' => 'menu/index',
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
    $this->load->view('layout', array('content' => 'public/help'));
  }

  /*
   * [method]
   * Debe llamarse en controladores donde solo un usuario admin tenga acceso,
   * evita que usuarios sin permiso accedan, redireccionandolos al inicio.
   */

  private function solo_admin() {
    if (!$this->session->userdata('admin')) {
      redirect(base_url() . 'menu', 'location');
      return;
    }
  }

}
