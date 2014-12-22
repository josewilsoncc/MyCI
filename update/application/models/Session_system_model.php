<?php

/**
 * Controlador de inicio de sesión en el sistema.
 * 
 * @autor Jose Wilson Capera Castaño, josewilsoncc@hotmail.com
 * @date 12/12/2014
 */
class Session_system_model extends CI_Model {

  public function __construct() {
    parent::__construct();
    $this->load->database('default');
  }

  /**
   * Esta funcion sirve para iniciar sesión en el sistema, verficicando
   * a traves de la base de datos si el usuario existe
   * 
   * @param $username Es el usuario con el que se inicia sesión
   * @param $password Es el password del usuario con el que se
   * inicia sesión
   * 
   * @autor Jose Wilson Capera Castaño, josewilsoncc@hotmail.com
   * @date 12/12/2014
   * @note Esta funcion debe de adaptarse al sistema, por ejemplo en la
   * fabrica el password no esta almacenado en la base de datos de la
   * manera estandar.
   */
  public function log_in($username, $password) {
    $this->db->select('cencos, fc_desc_sucursal(cencos) descencos, cedula, pro_personal_nombre(cedula) nombre, codusu');
    $this->db->from('usuarios');
    $this->db->where('estado', 'A');
    $this->db->where('codusu', $username);
    $query = $this->db->get();
    if ($query->num_rows() == 1)
      return $query->row();
    else
      return FALSE;
  }

}
