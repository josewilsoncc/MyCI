<?php

/**
 * Esta clase se encarga de crear reportes graficos personalizados utilizando la libreria amcharts de javascript.
 * cada metodo se encarga de crear un arreglo en formato JSON con su propia estructura la cual se debe respetar para su adecuado funcionamiento,
 * ya que la libreria amcharts funciona solo con arreglos en formato JSON y para su uso se implementa JQUERY y sus metodos de AJAX.
 * los archivos javascript de estos metodos se encuentran en js/default/amcharts/report_graphics.js.
 * esta clase solo se encargara de detallar como se deben construir los arreglos en JSON de parte del servidor para posteriormente ser devueltos a las funciones encargadas de 
 * pintar el grafico
 * 
 * @author Alvaro Javier Vanegas Ochoa <alvarovanegas18@gmail.com>
 * @date 2015/01/05
 */
class Report extends CI_Controller {

  public function __construct() {
    parent::__construct();
  }

  public function index($tipo_grafico = '') {
    $this->load->view('layout', array('content' => 'demo/report/report_graphic', 'tipo_grafico' => $tipo_grafico));
  }

  /**
   * [Ajax]
   * Genera una grafica de barras en 3D de forma horizontal, con el eje Y de 'concepto' y eje X de 'valor'
   * 
   * @param string  nombre_eje_y  :es el nombre que llevaran los elementos pintados en el eje Y
   * @param int valor             :es el valor que posee el eje Y
   * @param string titulo         :el titulo que se encuentra en el eje X
   */
  public function bar_3d() {
    $datos = array(
     array('nombre_eje_y' => '2010', 'valor' => 50),
     array('nombre_eje_y' => '2011', 'valor' => '100'),
     array('nombre_eje_y' => 2013, 'valor' => 150),
     array('nombre_eje_y' => 2014, 'valor' => 10),
     array('nombre_eje_y' => 2015, 'valor' => 80)
    );
    $parametros = array('titulo' => 'grafica 2015');
    $jsondata = array($datos, $parametros);
    echo json_encode($jsondata);
  }

  /**
   * [Ajax]
   * Genera una grafica de barras en 3D de forma horizontal, comparando valor x y valor y entre un grupo de 2 columnas
   * 
   * @param string nombre_eje_y  :es el nombre que llevaran los elementos pintados en el eje Y
   * @param int valor_1          :es el primer valor que posee el eje Y en su grupo
   * @param int valor_2          :es el segundo valor que posee el eje Y en su grupo
   * @param string titulo_columna_1  =  el titulo de la primera barra estadistica del grupo
   * @param stringtitulo_columna_2  =  el titulo de la segunda barra estadistica del grupo
   */
  public function bar_clustered() {
    $datos = array(
     array('nombre_eje_y' => '2012', 'valor_1' => '50', 'valor_2' => 10),
     array('nombre_eje_y' => 2013, 'valor_1' => 100, 'valor_2' => '200'),
     array('nombre_eje_y' => 2014, 'valor_1' => 150, 'valor_2' => 60),
     array('nombre_eje_y' => 2015, 'valor_1' => 40, 'valor_2' => 80)
    );

    $parametros = array('titulo_columna_1' => 'ingresos', 'titulo_columna_2' => 'gastos');
    $jsondata = array($datos, $parametros);
    echo json_encode($jsondata);
  }

  /**
   * [Ajax]
   * Genera una grafica de barras en forma vertical con una linea comparativa, comparando valor x y valor y
   * 
   * @param string nombre_eje_x  :es el nombre que llevaran los elementos pintados en el eje X
   * @param int  valor           :es el valor que posee el eje X
   * @param string color         :es un color que tendra la columna especificada
   * @param['titulo_eje_y'] =  el titulo del eje Y
   */
  public function columns_3d() {
    $datos = array(
     array('nombre_eje_x' => 'Armenia', 'valor' => 50, 'color' => '#FF0F00'),
     array('nombre_eje_x' => 'Cali', 'valor' => 100, 'color' => '#FF6600'),
     array('nombre_eje_x' => 'Medellin', 'valor' => 20, 'color' => '#FF9E01'),
     array('nombre_eje_x' => 'Bogota', 'valor' => 150, 'color' => '#FCD202'),
     array('nombre_eje_x' => 'Yopal', 'valor' => 200, 'color' => '#CD0D74'),
     array('nombre_eje_x' => 'Manizales', 'valor' => 90, 'color' => '#DDDDDD'),
     array('sucursal' => 'Yopal', 'valor' => 180, 'color' => '#333333')
    );
    $parametros = array('titulo_eje_y' => 'incidencias 2015');
    $jsondata = array($datos, $parametros);
    echo json_encode($jsondata);
  }

  /**
   * [Ajax]
   * Genera una grafica de barras en forma vertical con una linea comparativa, comparando valor x y valor y 
   * 
   * @param string nombre_eje_x  :es el nombre que llevaran los elementos pintados en el eje X
   * @param int valor_1          :es el valor que posee el eje X en su barra
   * @param int valor_2          :es el valor que posee el eje X en su linea
   */
  public function column_and_line_Mix() {
    $datos = array(
     array('nombre_eje_x' => 'Armenia', 'valor_1' => 50, 'valor_2' => 30),
     array('nombre_eje_x' => 'Bogota', 'valor_1' => 10, 'valor_2' => 5),
     array('nombre_eje_x' => 'Medellin', 'valor_1' => 50, 'valor_2' => 40),
     array('nombre_eje_x' => 'sucursal objetivo', 'valor_1' => 70, 'valor_2' => 50, 'dashLengthColumn' => 5, 'alpha' => 0.2, 'additional' => "(projeccion de IBG)")
    );

    $parametros = array('titulo_valor_1' => 'titulo_valor_2', '' => 'Gastos');
    $jsondata = array($datos, $parametros);
    echo json_encode($jsondata);
  }

  /**
   * [Ajax]
   * Genera una grafica de barras ne forma cilindrica , comparando valor x y valor y 
   * @param string nombre_eje_x  :es el nombre que llevaran los elementos pintados en el eje X
   * @param int valor            :es el valor que posee el eje X en su columna cilindrica
   * @param string color         :es un color que tendra la columna cilindricaa especificada
   */
  public function column_cylinders() {
    $datos = array(
     array('nombre_eje_x' => 'Armenia', 'valor' => 50, 'color' => '#FF0F00'),
     array('nombre_eje_x' => 'Cali', 'valor' => 100, 'color' => '#FF6600'),
     array('nombre_eje_x' => 'Medellin', 'valor' => 20, 'color' => '#FF9E01'),
     array('nombre_eje_x' => 'Bogota', 'valor' => 150, 'color' => '#FCD202'),
     array('nombre_eje_x' => 'Yopal', 'valor' => 200, 'color' => '#CD0D74'),
     array('nombre_eje_x' => 'Manizales', 'valor' => 90, 'color' => '#DDDDDD'),
     array('sucursal' => 'Yopal', 'valor' => 180, 'color' => '#333333')
    );

    $parametros = array();
    $jsondata = array($datos, $parametros);
    echo json_encode($jsondata);
  }

  /**
   * [Ajax]
   * Genera una grafica de barras simple , comparando valor X y valor Y
   * 
   * @param string nombre_eje_x  :es el nombre que llevaran los elementos pintados en el eje X
   * @param int valor            :es el valor que posee el eje X
   */
  public function column_simple() {
    $datos = array(
     array('nombre_eje_x' => 'Armenia', 'valor' => 50),
     array('nombre_eje_x' => 'Cali', 'valor' => 100),
     array('nombre_eje_x' => 'Medellin', 'valor' => 20),
     array('nombre_eje_x' => 'Bogota', 'valor' => 150),
     array('nombre_eje_x' => 'Yopal', 'valor' => 200),
     array('nombre_eje_x' => 'Manizales', 'valor' => 90),
     array('sucursal' => 'Yopal', 'valor' => 180)
    );

    $parametros = array();
    $jsondata = array($datos, $parametros);
    echo json_encode($jsondata);
  }

  /**
   * [Ajax]
   * Genera una grafica de pastel en 3D
   * 
   * @param string nombre  :es el nombre de un grupo que se encontrara en la grafica de torta
   * @param int $valor     :es el valor que tendra el grupo especificado
   */
  public function pie_3D() {
    $datos = array(
     array('nombre' => 'Armenia', 'valor' => 50),
     array('nombre' => 'Cali', 'valor' => 100),
     array('nombre' => 'Medellin', 'valor' => 20),
     array('nombre' => 'Bogota', 'valor' => 150),
     array('nombre' => 'Yopal', 'valor' => 200),
     array('nombre' => 'Manizales', 'valor' => 90),
     array('nombre' => 'Yopal', 'valor' => 180)
    );
    $parametros = array();
    $jsondata = array($datos, $parametros);
    echo json_encode($jsondata);
  }

  /**
   * [Ajax]
   * Genera una grafica de pastel tipo dona
   * 
   * @param string nombre  :es el nombre de un grupo que se encontrara en la grafica de torta en 3D
   * @param int $valor     :es el valor que tendra el grupo especificado
   */
  public function pie_donut_3D() {
    $datos = array(
     array('nombre' => 'Armenia', 'valor' => 50),
     array('nombre' => 'Cali', 'valor' => 100),
     array('nombre' => 'Medellin', 'valor' => 20),
     array('nombre' => 'Bogota', 'valor' => 150),
     array('nombre' => 'Yopal', 'valor' => 200),
     array('nombre' => 'Manizales', 'valor' => 90),
     array('nombre' => 'Yopal', 'valor' => 180)
    );
    $parametros = array('titulo' => 'problemas en las sucursales', 'tamano_titulo' => 20);
    $jsondata = array($datos, $parametros);
    echo json_encode($jsondata);
  }

  /**
   * [Ajax]
   * Genera una grafica de piramide en 3D
   * 
   * @param string titulo  :es el titulo de un grupo que se encontrara en la grafica de piramide
   * @param int valor      :es el valor que tendra el grupo especificado
   */
  public function pyramid_chart_3D() {
    $datos = array(
     array('titulo' => 'vendedores', 'valor' => 10),
     array('titulo' => 'auxiliares', 'valor' => 8),
     array('titulo' => 'asistentes de area', 'valor' => 6),
     array('titulo' => 'director de area', 'valor' => 4),
     array('titulo' => 'gerente sucursal', 'valor' => 1)
    );

    $parametros = array('titulo' => 'problemas en las sucursales', 'tamano_titulo' => 20);
    $jsondata = array($datos, $parametros);
    echo json_encode($jsondata);
  }

  public function table($tipo_tabla) {
    $this->load->helper('default/table');
    /*
     * Para consultas en la base de datos se puede usar este arreglo que se debe mandar al metodo generate_simple_table.
     * 
     * $this->load->database('mi_conexion');
     * $this->db->select('first 10 codigo, nombre, direccion, telefonos,feccrea, horacre, usrmodi, tipo_nomina');
     * $this->db->from('sucursales');
     * $query = $this->db->get();
     * $arreglo_datos = $query->result();
     */

    $celda_amarilla = array('class' => 'warning', 'title' => 'celda roja');
    $celda_verde = array('class' => 'success', 'title' => 'celda verde');
    $celda_roja = array('class' => 'danger', 'title' => 'celda roja');

    switch ($tipo_tabla) {
      case 'generate_simple_table':
        //inicio datos simulados
        $arreglo_datos = array(
         array(celda_personalizada('50', $celda_roja), 'La dorada', 'CRA 4A #12-50', celda_personalizada('968573604', $celda_verde), '2003-09-01', '11:50:20', celda_personalizada('yidarraga', $celda_amarilla), 'D'),
         array(celda_personalizada(12, $celda_roja), 'Cali 3', 'CRA 10A #56-50', celda_personalizada('7478956', $celda_verde), '2003-10-10', '12:50:21', celda_personalizada('yidarraga', $celda_amarilla), 'D'),
         array(celda_personalizada(34, $celda_roja), 'Palmira', 'CALL 29 # 26-36', celda_personalizada('78945-87865', $celda_verde), '2009-01-01', '11:50:22', celda_personalizada('hfg', $celda_amarilla), 'N'),
         array(celda_personalizada(13, $celda_roja), 'Tulua', 'CRA 27 #01-50', celda_personalizada('3128214578', $celda_verde), '2003-10-21', '07:10:58', celda_personalizada('ncruz', $celda_amarilla), 'D')
        );
        //fin datos simulados
        
        //$parametros['class_table'] = '';
        $parametros['caption'] = 'tabla simple con arreglos';
        $titulos_columnas = array(celda_personalizada('Codigo', $celda_roja), celda_personalizada('Nombre', $celda_verde), celda_personalizada('Direccion', $celda_amarilla),
         celda_personalizada('Telefono', $celda_verde), celda_personalizada('Fecha Creacion', $celda_roja), celda_personalizada('Hora creacion', $celda_verde),
         celda_personalizada('Usuario Edicion', $celda_amarilla), celda_personalizada('Tipo de Nomina', $celda_roja)); // la celda personalizada es opcional

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
          $puntero->$key = array(celda_personalizada($datos->codigo, $celda_roja), celda_personalizada('Nombre', $celda_verde), $datos->direccion, celda_personalizada($datos->telefonos, $celda_amarilla),
           celda_personalizada($datos->feccrea, $celda_roja), celda_personalizada($datos->horacre, $celda_verde), $datos->usrmodi, celda_personalizada($datos->tipo_nomina, $celda_amarilla));
        }
        $puntero->titulos = array('Codigo', 'Nombre', 'Direccion', 'Telefono', 'Fecha creacion', 'Hora creacion', 'Usuario Edicion', 'Tipo de Nomina');
        $parametros['caption'] = 'tabla simple con puntero';
        $parametros['is_puntero'] = true;
        $tabla = generate_simple_table($puntero, '', $parametros);
        break;
    }
    $this->load->view('layout', array('content' => 'demo/report/table', 'tabla' => $tabla));
  }

}
