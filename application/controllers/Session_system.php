<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Session_system extends CI_Controller {

  public function __construct() {
    parent::__construct();
    //$this->load->library('encryption');
  }

  /*
   * [view]
   * Muestra la vista de inicio de sesión, si el usuario ya esta logeado
   * lo redirecciona al menú.
   */
  public function index() {
    if (!$this->session->userdata('is_logued_in'))
      $this->load->view('layout', array('content' => 'session_system/form_login'));
    else
      redirect('menu/index', 'refresh');
  }

  /*
   * [method]
   * Realiza un logeo y redirecciona a la vista pertinente de ser
   * exitoso o fallido.
   */
  public function log_in() {
    $this->load->model('session_system_model');

    //Reglas de validacion de datos
    $this->form_validation->set_rules('username', 'Usuario', 'required|alpha_numeric|min_length[2]|max_length[150]|xss_clean');
    $this->form_validation->set_rules('password', 'Contraseña', 'required|alpha_numeric_spaces|min_length[5]|max_length[20]|xss_clean');

    //Verificando se las reglas no se cumplen
    if (!$this->form_validation->run()) {
      $this->session->set_flashdata('error', validation_errors());
      redirect('session_system/index', 'refresh');
    } else {
      $username = $this->input->post('username');
      $password = $this->input->post('password');

      $check_user = $this->session_system_model->log_in($username, $password);

      //Logeo del sistema informix
      $id_con = @ftp_connect(IP_DATABASE_FABRICA);
      $resultado_login = @ftp_login($id_con, $username, $password);

      /*
       * [QUEMADO]
       * usuario admin ibg, esta quemado pues en el sistema actual
       * de base de datos informix, en ninguna parte se especifican
       * los usuarios admin.
       * 
       * quemado en la linea:
       * 'admin' => trim($check_user->codusu)==='ibg'
       */
      
      //Verificando logeo informix y existencia en la base de datos
      if ($check_user && $resultado_login) {
        $data = array(
          'is_logued_in' => TRUE,
          'cedula' => $check_user->cedula,
          'username' => $check_user->codusu,
          'nombre' => $check_user->nombre,
          'sucursal_id' => $check_user->cencos,
          'sucursal_nombre' => $check_user->descencos,
          'admin' => trim($check_user->codusu)==='ibg'
        );
        $this->session->set_userdata($data);
        redirect('menu/index', 'refresh');
      } else {
        $this->session->set_flashdata('error', 'Error en los datos ingresados');
        redirect('session_system/index', 'refresh');
      }
    }
  }

  /*
   * [method]
   * Cierra la sesión y redirecciona al index
   */
  public function close_session() {
    $this->session->sess_destroy();

    //Cierra sesion de los sistemas tradicionales
    session_name("aplicativos_fab");
    session_start();
    session_destroy();

    redirect('menu/index', 'refresh');
  }

}
