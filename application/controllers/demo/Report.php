<?php

/**
 * Esta clase se encarga de crear reportes graficos personalizados utilizando la libreria amcharts de javascript.
 * cada metodo se encarga de crear un arreglo en formato JSON con su propia estructura la cual se debe respetar para su adecuado funcionamiento,
 * ya que la libreria amcharts funciona solo con arreglos en formato JSON y para su uso se implementa JQUERY y sus metodos de AJAX.
 * la documentacion de cada grafica se encuentra en el archivo javascript js/default/amcharts/report_graphics.js.
 * esta clase solo se encargara de detallar como se deben construir los arreglos en JSON de parte del servidor para posteriormente ser devueltos a las funciones encargadas de 
 * pintar el grafico
 * 
 * @author Alvar Javier Vanegas Ochoa, alvarovanegas18@gmail.com
 * @date 2015/01/05
 */
class Report extends CI_Controller {

  public function __construct() {
    parent::__construct();
  }

  public function index($tipo_grafico = '') {
    $this->load->view('layout', array('content' => 'demo/report_graphic', 'tipo_grafico' => $tipo_grafico));
  }

  /**
   * bar3d
   * @param string  nombre_eje_y  :es el nombre que llevaran los elementos pintados en el eje Y
   * @param int valor             :es el valor que posee el eje Y
   */
  public function bar_3d() {
    $jsondata = array(
     array('nombre_eje_y' => '2010', 'valor' => 50),
     array('nombre_eje_y' => '2011', 'valor' => '100'),
     array('nombre_eje_y' => 2013, 'valor' => 150),
     array('nombre_eje_y' => 2014, 'valor' => 10),
     array('nombre_eje_y' => 2015, 'valor' => 80)
    );
    echo json_encode($jsondata);
  }

  /**
   * barClustered
   * @param string nombre_eje_y  :es el nombre que llevaran los elementos pintados en el eje Y
   * @param int valor_1          :es el primer valor que posee el eje Y en su grupo
   * @param int valor_2          :es el segundo valor que posee el eje Y en su grupo
   */
  public function bar_clustered() {
    $jsondata = array(
     array('nombre_eje_y' => '2012', 'valor_1' => '50', 'valor_2' => 10),
     array('nombre_eje_y' => 2013, 'valor_1' => 100, 'valor_2' => '200'),
     array('nombre_eje_y' => 2014, 'valor_1' => 150, 'valor_2' => 60),
     array('nombre_eje_y' => 2015, 'valor_1' => 40, 'valor_2' => 80)
    );
    echo json_encode($jsondata);
  }

  /**
   * columns3d
   * @param string nombre_eje_x  :es el nombre que llevaran los elementos pintados en el eje X
   * @param int  valor           :es el valor que posee el eje X
   * @param string color         :es un color que tendra la columna especificada
   */
  public function columns_3d() {
    $jsondata = array(
     array('nombre_eje_x' => 'Armenia', 'valor' => 50, 'color' => '#FF0F00'),
     array('nombre_eje_x' => 'Cali', 'valor' => 100, 'color' => '#FF6600'),
     array('nombre_eje_x' => 'Medellin', 'valor' => 20, 'color' => '#FF9E01'),
     array('nombre_eje_x' => 'Bogota', 'valor' => 150, 'color' => '#FCD202'),
     array('nombre_eje_x' => 'Yopal', 'valor' => 200, 'color' => '#CD0D74'),
     array('nombre_eje_x' => 'Manizales', 'valor' => 90, 'color' => '#DDDDDD'),
     array('sucursal' => 'Yopal', 'valor' => 180, 'color' => '#333333')
    );
    echo json_encode($jsondata);
  }

  /**
   * columnAndLineMix
   * @param string nombre_eje_x  :es el nombre que llevaran los elementos pintados en el eje X
   * @param int valor_1          :es el valor que posee el eje X en su barra
   * @param int valor_2          :es el valor que posee el eje X en su linea
   */
  public function column_and_line_Mix() {

    $jsondata = array(
     array('nombre_eje_x' => 'Armenia', 'valor_1' => 50, 'valor_2' => 30),
     array('nombre_eje_x' => 'Bogota', 'valor_1' => 10, 'valor_2' => 5),
     array('nombre_eje_x' => 'Medellin', 'valor_1' => 50, 'valor_2' => 40),
     array('nombre_eje_x' => 'sucursal objetivo', 'valor_1' => 70, 'valor_2' => 50, 'dashLengthColumn' => 5, 'alpha' => 0.2, 'additional' => "(projeccion de IBG)")
    );
    echo json_encode($jsondata);
  }

  /**
   * columnCylinders
   * @param string nombre_eje_x  :es el nombre que llevaran los elementos pintados en el eje X
   * @param int valor            :es el valor que posee el eje X en su columna cilindrica
   * @param string color         :es un color que tendra la columna cilindricaa especificada
   */
  public function column_cylinders() {
    $jsondata = array(
     array('nombre_eje_x' => 'Armenia', 'valor' => 50, 'color' => '#FF0F00'),
     array('nombre_eje_x' => 'Cali', 'valor' => 100, 'color' => '#FF6600'),
     array('nombre_eje_x' => 'Medellin', 'valor' => 20, 'color' => '#FF9E01'),
     array('nombre_eje_x' => 'Bogota', 'valor' => 150, 'color' => '#FCD202'),
     array('nombre_eje_x' => 'Yopal', 'valor' => 200, 'color' => '#CD0D74'),
     array('nombre_eje_x' => 'Manizales', 'valor' => 90, 'color' => '#DDDDDD'),
     array('sucursal' => 'Yopal', 'valor' => 180, 'color' => '#333333')
    );
    echo json_encode($jsondata);
  }

  /**
   * columnSimple
   * @param string nombre_eje_x  :es el nombre que llevaran los elementos pintados en el eje X
   * @param int valor            :es el valor que posee el eje X
   */
  public function column_simple() {
    $jsondata = array(
     array('nombre_eje_x' => 'Armenia', 'valor' => 50),
     array('nombre_eje_x' => 'Cali', 'valor' => 100),
     array('nombre_eje_x' => 'Medellin', 'valor' => 20),
     array('nombre_eje_x' => 'Bogota', 'valor' => 150),
     array('nombre_eje_x' => 'Yopal', 'valor' => 200),
     array('nombre_eje_x' => 'Manizales', 'valor' => 90),
     array('sucursal' => 'Yopal', 'valor' => 180)
    );
    echo json_encode($jsondata);
  }

  /**
   * pie3D
   * @param string nombre  :es el nombre de un grupo que se encontrara en la grafica de torta
   * @param int $valor     :es el valor que tendra el grupo especificado
   */
  public function pie_3D() {
    $jsondata = array(
     array('nombre' => 'Armenia', 'valor' => 50),
     array('nombre' => 'Cali', 'valor' => 100),
     array('nombre' => 'Medellin', 'valor' => 20),
     array('nombre' => 'Bogota', 'valor' => 150),
     array('nombre' => 'Yopal', 'valor' => 200),
     array('nombre' => 'Manizales', 'valor' => 90),
     array('nombre' => 'Yopal', 'valor' => 180)
    );
    echo json_encode($jsondata);
  }

  /**
   * pie3D
   * @param string nombre  :es el nombre de un grupo que se encontrara en la grafica de torta en 3D
   * @param int $valor     :es el valor que tendra el grupo especificado
   */
  public function pie_donut_3D() {
    $jsondata = array(
     array('nombre' => 'Armenia', 'valor' => 50),
     array('nombre' => 'Cali', 'valor' => 100),
     array('nombre' => 'Medellin', 'valor' => 20),
     array('nombre' => 'Bogota', 'valor' => 150),
     array('nombre' => 'Yopal', 'valor' => 200),
     array('nombre' => 'Manizales', 'valor' => 90),
     array('nombre' => 'Yopal', 'valor' => 180)
    );
    echo json_encode($jsondata);
  }

  /**
   * pyramidChart3D
   * @param string titulo  :es el titulo de un grupo que se encontrara en la grafica de piramide
   * @param int valor      :es el valor que tendra el grupo especificado
   */
  public function pyramid_chart_3D() {
    $jsondata = array(
     array('titulo' => 'vendedores', 'valor' => 10),
     array('titulo' => 'auxiliares', 'valor' => 8),
     array('titulo' => 'asistentes de area', 'valor' => 6),
     array('titulo' => 'director de area', 'valor' => 4),
     array('titulo' => 'gerente sucursal', 'valor' => 1)
    );
    echo json_encode($jsondata);
  }

  public function table($tipo_tabla) {
    $this->load->helper('table');

    /*//consulta en la base de datos, este es el arreglo que se debe mandar al metodo generate_simple_table.
      $this->load->database('mi_conexion');
      $this->db->select('first 10 codigo, nombre, direccion, telefonos,feccrea, horacre, usrmodi, tipo_nomina');
      $this->db->from('sucursales');
      $query = $this->db->get();
      $arreglo_datos = $query->result(); */

    switch ($tipo_tabla) {
      case 'generate_simple_table':
        //inicio datos simulados
        $arreglo_datos = array(
         array(28, 'La dorada', 'CRA 4A #12-50', '968573604', '2003-09-01', '11:50:20', 'yidarraga', 'D'),
         array(6, 'Cali 3', 'CRA 10A #56-50', '7478956', '2003-10-10', '12:50:21', 'yidarraga', 'D'),
         array(34, 'Palmira', 'CALL 29 # 26-36', '922726886-27266879', '2009-01-01', '11:50:22', 'hfg', 'N'),
         array(13, 'Tulua', 'CRA 27 #01-50', '3128214578', '2003-10-21', '07:10:58', 'ncruz', 'D'),
         array(14, 'Ibague', 'CALLE 15 # 3-62', '7474529', '2003-09-22', '13:45:32', 'Sistema', 'N')
        );
        //fin datos simulados
        
        //$parametros['class_table'] = '';
        $parametros['caption'] = 'tabla simple con arreglos';
        $titulos_columnas = array('Codigo', 'Nombre', 'Direccion', 'Telefono', 'Fecha creacion', 'Hora creacion', 'Usuario Edicion', 'Tipo de Nomina');
        $tabla = generate_simple_table($arreglo_datos, $titulos_columnas, $parametros);
        break;

      case 'generate_simple_table_puntero':
        //inicio datos simulados
        $arreglo_datos = (object) array();
        $arreglo_datos->resultado1 = (object) array('codigo' => 28, 'nombre' => 'La dorada', 'direccion' => 'CRA 4A #12-50', 'telefonos' => '7478956',
         'feccrea' => '2003-09-01', 'horacre' => '11:50:20', 'usrmodi' => 'yidarraga', 'tipo_nomina' => 'D');
        $arreglo_datos->resultado2 = (object) array('codigo' => 6, 'nombre' => 'Cali 3', 'direccion' => 'CRA 10A #56-50', 'telefonos' => '968573604',
         'feccrea' => '2003-09-01', 'horacre' => '11:50:21', 'usrmodi' => 'yidarraga', 'tipo_nomina' => 'D');
        $arreglo_datos->resultado3 = (object) array('codigo' => 34, 'nombre' => 'Palmira', 'direccion' => 'CALL 29 # 26-36', 'telefonos' => '922726886-27266879',
         'feccrea' => '2003-09-01', 'horacre' => '11:50:21', 'usrmodi' => 'hfg', 'tipo_nomina' => 'N');
        $arreglo_datos->resultado4 = (object) array('codigo' => 13, 'nombre' => 'Tulua', 'direccion' => 'CRA 27 #01-50', 'telefonos' => '7452159',
         'feccrea' => '2003-10-01', 'horacre' => '17:50:21', 'usrmodi' => 'Sistemas', 'tipo_nomina' => 'N');
        //fin datos simulados

        $puntero = (object) array();
        foreach ($arreglo_datos as $datos) {
          $key = 'key_' . $datos->codigo;
          $puntero->$key = array($datos->codigo, $datos->nombre, $datos->direccion, $datos->telefonos, $datos->feccrea, $datos->horacre, $datos->usrmodi, $datos->tipo_nomina);
        }
        $puntero->titulos = array('Codigo', 'Nombre', 'Direccion', 'Telefono', 'Fecha creacion', 'Hora creacion', 'Usuario Edicion', 'Tipo de Nomina');
        $parametros['caption'] = 'tabla simple con puntero';
        $parametros['is_puntero'] = true;
        $tabla = generate_simple_table($puntero, '', $parametros);
        break;
    }
    $this->load->view('layout', array('content' => 'demo/table', 'tabla' => $tabla));
  }

}
