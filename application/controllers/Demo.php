<?php
/*
 * Este demo sera movido a una carpeta y restructurado.
 */
/**
 * Este controlador es el encargado de hacer funcionar los demos de manera correcta, este controlador sera removido
 * automaticamente con al ejecutar el archivo 'remove_demo.exe', asi como todas las vistas y scrips ligados netamente a
 * los demos, sin quitar las funcionalidades de los mismos.
 * 
 * @author Jose Wilson Capera Castaño <josewilsoncc@hotmail.com>
 * @date 2014/12/01
 * 
 */
class Demo extends CI_Controller {

  public function __construct() {
    parent::__construct();
  }

  public function index() {
    $this->load->view('layout', array('content' => 'demo/index'));
  }

  /**
   * Este metodo es usado para cargar los demos que no optienen parametros a través de su URI, que basicamente cargan
   * una vista o fueron concebidos de manera simple.
   */
  public function simple_demo($demo) {
    switch ($demo) {
      case 'alertify':
        $this->load->view('layout', array('content' => 'demo/alertify'));
        break;
      case 'show_message':
        $this->load->view('layout', array(
          'content' => 'demo/show_message',
          'mensaje' => 'Bienvenido al aplicativo, este mensaje debe desaparecer en 3 segundos',
          'mensaje_correcto' => 'Ejemplo de un mensaje correcto',
          'mensaje_informativo' => 'Ejemplo de un mensaje informativo',
          'mensaje_advertencia' => 'Ejemplo de un mensaje de advertencia',
          'mensaje_error' => 'Ejemplo de un mensaje de error'
        ));
        break;
      case 'carousel_hiden_images':
        $this->load->view('layout', array('content' => 'demo/carousel_hiden_images'));
        break;
      case 'carousel':
        $this->load->view('layout', array('content' => 'demo/carousel'));
        break;
      case 'carousel_basic':
        $this->load->view('layout', array('content' => 'demo/carousel_basic'));
        break;
      case 'toastr':
        $this->load->view('layout', array('content' => 'demo/toastr'));
        break;
      case 'coverflow':
        $this->load->view('layout', array('content' => 'demo/coverflow'));
        break;
    }
  }

  /**
   * Demo de Limit y paginación, A través del basic model se realiza una consulta que simula la paginación.
   * La paginacion es creada en la vista cargada (demo/limit)
   * 
   * @author Jose Wilson Capera Castaño <josewilsoncc@hotmail.com>
   * @author Estefania Alzate Daza <teflon28799@gmail.com>
   * @date 2014/12/28
   */
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
