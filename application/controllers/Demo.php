<?php

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

  public function report_graphic($tipo_grafico = '') {
    $this->load->view('layout', array('content' => 'demo/report_graphic', 'tipo_grafico' => $tipo_grafico));
  }

  /*
   * Este Metodo se encarga de crear reportes graficos personalizados utilizando la libreria amcharts de javascript.
   * cada segmento del switch se encarga de crear un arreglo en formato JSON con su propia estructura la cual se debe respetar para su adecuado funcionamiento,
   * ya que la libreria amcharts funciona solo con arreglos en formato JSON y para su uso se implementa JQUERY y sus metodos de AJAX.
   * la documentacion de cada grafica se encuentra en el archivo javascript js/default/amcharts/report_graphics.js.
   * este metodo solo se encargara de detallar como se deben construir los arreglos en JSON de parte del servidor para posteriormente ser devueltos a las funciones encargadas de 
   * pintar el grafico
   * 
   * @author Alvar Javier Vanegas Ochoa, alvarovanegas18@gmail.com
   * @date 2015/01/05
   */

  public function pintar_grafica($tipo_grafico = '') {
    switch ($tipo_grafico) {
      case 'bar3d':
        /**
         * bar3d
         * @param string  nombre_eje_y  :es el nombre que llevaran los elementos pintados en el eje Y
         * @param int valor             :es el valor que posee el eje Y
         */
        $jsondata = array(array('nombre_eje_y' => '2010', 'valor' => 50), array('nombre_eje_y' => '2011', 'valor' => '100'), array('nombre_eje_y' => 2013, 'valor' => 150), array('nombre_eje_y' => 2014, 'valor' => 10), array('nombre_eje_y' => 2015, 'valor' => 80));
        echo json_encode($jsondata);
        break;

      case 'barClustered':
        /**
         * barClustered
         * @param string nombre_eje_y  :es el nombre que llevaran los elementos pintados en el eje Y
         * @param int valor_1          :es el primer valor que posee el eje Y en su grupo
         * @param int valor_2          :es el segundo valor que posee el eje Y en su grupo
         */
        $jsondata = array(array('nombre_eje_y' => '2012', 'valor_1' => '50', 'valor_2' => 10), array('nombre_eje_y' => 2013, 'valor_1' => 100, 'valor_2' => '200'), array('nombre_eje_y' => 2014, 'valor_1' => 150, 'valor_2' => 60), array('nombre_eje_y' => 2015, 'valor_1' => 40, 'valor_2' => 80));
        echo json_encode($jsondata);

        break;

      case 'columns3d':
        /**
         * columns3d
         * @param string nombre_eje_x  :es el nombre que llevaran los elementos pintados en el eje X
         * @param int  valor           :es el valor que posee el eje X
         * @param string color         :es un color que tendra la columna especificada
         */
        $jsondata = array(array('nombre_eje_x' => 'Armenia', 'valor' => 50, 'color' => '#FF0F00'), array('nombre_eje_x' => 'Cali', 'valor' => 100, 'color' => '#FF6600'), array('nombre_eje_x' => 'Medellin', 'valor' => 20, 'color' => '#FF9E01'), array('nombre_eje_x' => 'Bogota', 'valor' => 150, 'color' => '#FCD202'),
         array('nombre_eje_x' => 'Yopal', 'valor' => 200, 'color' => '#CD0D74'), array('nombre_eje_x' => 'Manizales', 'valor' => 90, 'color' => '#DDDDDD'), array('sucursal' => 'Yopal', 'valor' => 180, 'color' => '#333333'));
        echo json_encode($jsondata);

        break;

      case 'columnAndLineMix':
        /**
         * columnAndLineMix
         * @param string nombre_eje_x  :es el nombre que llevaran los elementos pintados en el eje X
         * @param int valor_1          :es el valor que posee el eje X en su barra
         * @param int valor_2          :es el valor que posee el eje X en su linea
         */
        $jsondata = array(array('nombre_eje_x' => 'Armenia', 'valor_1' => 50, 'valor_2' => 30), array('nombre_eje_x' => 'Bogota', 'valor_1' => 10, 'valor_2' => 5), array('nombre_eje_x' => 'Medellin', 'valor_1' => 50, 'valor_2' => 40), array('nombre_eje_x' => 'sucursal objetivo', 'valor_1' => 70, 'valor_2' => 50, 'dashLengthColumn' => 5, 'alpha' => 0.2, 'additional' => "(projeccion de IBG)"));
        echo json_encode($jsondata);
        break;
      case 'columnCylinders':
        /**
         * columnCylinders
         * @param string nombre_eje_x  :es el nombre que llevaran los elementos pintados en el eje X
         * @param int valor            :es el valor que posee el eje X en su columna cilindrica
         * @param string color         :es un color que tendra la columna cilindricaa especificada
         */
        $jsondata = array(array('nombre_eje_x' => 'Armenia', 'valor' => 50, 'color' => '#FF0F00'), array('nombre_eje_x' => 'Cali', 'valor' => 100, 'color' => '#FF6600'), array('nombre_eje_x' => 'Medellin', 'valor' => 20, 'color' => '#FF9E01'), array('nombre_eje_x' => 'Bogota', 'valor' => 150, 'color' => '#FCD202'),
         array('nombre_eje_x' => 'Yopal', 'valor' => 200, 'color' => '#CD0D74'), array('nombre_eje_x' => 'Manizales', 'valor' => 90, 'color' => '#DDDDDD'), array('sucursal' => 'Yopal', 'valor' => 180, 'color' => '#333333'));
        echo json_encode($jsondata);
        break;

      case 'columnSimple':
        /**
         * columnSimple
         * @param string nombre_eje_x  :es el nombre que llevaran los elementos pintados en el eje X
         * @param int valor            :es el valor que posee el eje X
         */
        $jsondata = array(array('nombre_eje_x' => 'Armenia', 'valor' => 50), array('nombre_eje_x' => 'Cali', 'valor' => 100), array('nombre_eje_x' => 'Medellin', 'valor' => 20), array('nombre_eje_x' => 'Bogota', 'valor' => 150),
         array('nombre_eje_x' => 'Yopal', 'valor' => 200), array('nombre_eje_x' => 'Manizales', 'valor' => 90), array('sucursal' => 'Yopal', 'valor' => 180));
        echo json_encode($jsondata);
        break;

      case 'pie3D':
        /**
         * pie3D
         * @param string nombre  :es el nombre de un grupo que se encontrara en la grafica de torta
         * @param int $valor     :es el valor que tendra el grupo especificado
         */
        $jsondata = array(array('nombre' => 'Armenia', 'valor' => 50), array('nombre' => 'Cali', 'valor' => 100), array('nombre' => 'Medellin', 'valor' => 20), array('nombre' => 'Bogota', 'valor' => 150),
         array('nombre' => 'Yopal', 'valor' => 200), array('nombre' => 'Manizales', 'valor' => 90), array('nombre' => 'Yopal', 'valor' => 180));
        echo json_encode($jsondata);
        break;

      case 'pieDonut3D':
        /**
         * pie3D
         * @param string nombre  :es el nombre de un grupo que se encontrara en la grafica de torta en 3D
         * @param int $valor     :es el valor que tendra el grupo especificado
         */
        $jsondata = array(array('nombre' => 'Armenia', 'valor' => 50), array('nombre' => 'Cali', 'valor' => 100), array('nombre' => 'Medellin', 'valor' => 20), array('nombre' => 'Bogota', 'valor' => 150),
         array('nombre' => 'Yopal', 'valor' => 200), array('nombre' => 'Manizales', 'valor' => 90), array('nombre' => 'Yopal', 'valor' => 180));
        echo json_encode($jsondata);
        break;

      case 'pyramidChart3D':
        /**
         * pyramidChart3D
         * @param string titulo  :es el titulo de un grupo que se encontrara en la grafica de piramide
         * @param int valor      :es el valor que tendra el grupo especificado
         */
        $jsondata = array(array('titulo' => 'vendedores', 'valor' => 10), array('titulo' => 'auxiliares', 'valor' => 8), array('titulo' => 'asistentes de area', 'valor' => 6), array('titulo' => 'director de area', 'valor' => 4),
         array('titulo' => 'gerente sucursal', 'valor' => 1));
        echo json_encode($jsondata);
        break;
    }
  }

  public function table($tipo_tabla) {
    $this->load->helper('table');
    $this->load->database('conexion_alvaro');

    switch ($tipo_tabla) {
      case 'generate_simple_table':
        $this->db->select('first 10 codigo, nombre, direccion, telefonos,feccrea, horacre, usrmodi, tipo_nomina');
        $this->db->from('sucursales');
        $query = $this->db->get();

        //$parametros['class_table'] = '';
        $parametros['caption'] = 'tabla simple con arreglos';
        $titulos_columnas = array('Codigo', 'Nombre', 'Direccion', 'Telefono', 'Fecha creacion', 'Hora creacion', 'Usuario Edicion', 'Tipo de Nomina');
        $tabla = generate_simple_table($query->result(), $titulos_columnas, $parametros);
        break;

      case 'generate_simple_table_puntero':
        $this->db->select('first 10 codigo, nombre, direccion, telefonos,feccrea, horacre, usrmodi, tipo_nomina');
        $this->db->from('sucursales');
        $query = $this->db->get();

        $puntero = (object) array();
        foreach ($query->result() as $datos) {
          $key = 'key_' . $datos->codigo;
          //$puntero->$key = array($datos->codigo, $datos->nombre, $datos->direccion, $datos->telefonos, $datos->feccrea, $datos->horacre, $datos->usrmodi, $datos->tipo_nomina);
        $puntero->$key = array($datos->codigo, $datos->nombre, $datos->direccion, $datos->telefonos, $datos->feccrea, $datos->horacre, $datos->usrmodi, $datos->tipo_nomina);
        
        }
        $puntero->titulos = array('Codigo', 'Nombre', 'Direccion', 'Telefono', 'Fecha creacion', 'Hora creacion', 'Usuario Edicion', 'Tipo de Nomina');

        //$parametros['class_table'] = '';
        $parametros['caption'] = 'tabla simple con puntero';
        $tabla = generate_simple_table($puntero, '', $parametros, true);
        break;
    }
    $this->load->view('layout', array('content' => 'demo/table', 'tabla' => $tabla));
  }

}
