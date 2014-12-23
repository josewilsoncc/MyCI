<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

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
    if (!is_login())
      $this->load->view('layout', array('content' => 'auth/form_login'));
    else
      redirect('home/index', 'refresh');
  }

  /*
   * [method]
   * Realiza un logeo y redirecciona a la vista pertinente de ser
   * exitoso o fallido.
   */
  public function log_in() {
    $this->load->model('auth_model');

    //[cambiar]Reglas de validacion de datos
    $this->form_validation->set_rules('username', 'Usuario', 'required|alpha_numeric|min_length[2]|max_length[150]|xss_clean');
    $this->form_validation->set_rules('password', 'Contraseña', 'required|alpha_numeric_spaces|min_length[5]|max_length[20]|xss_clean');

    //Verificando si las reglas no se cumplen
    if (!$this->form_validation->run()) {
      $this->session->set_flashdata('error', validation_errors());
      redirect('auth/index', 'refresh');
    } else {
      $username = $this->input->post('username');
      $password = $this->input->post('password');

      $check_user = $this->auth_model->attempt('usuarios', array(
        'select'=>'cencos, fc_desc_sucursal(cencos) descencos, cedula, pro_personal_nombre(cedula) nombre, codusu',
        'where'=> array(
          'estado'=>'A',
          'codusu'=>$username
        )
      ));

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
      if ($check_user && $this->ftp_attempt(IP_DATABASE_FABRICA, $username, $password)) {
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
        redirect('home/index', 'refresh');
      } else {
        $this->session->set_flashdata('error', 'Error en los datos ingresados');
        redirect('auth/index', 'refresh');
      }
    }
  }
  
  private function ftp_attempt($ip, $username, $password){
      return @ftp_login(@ftp_connect($ip), $username, $password);
  }

  /*
   * [method]
   * Cierra la sesión y redirecciona al index
   */
  public function close_session() {
    $this->session->sess_destroy();
    redirect('home/index', 'refresh');
  }

}
