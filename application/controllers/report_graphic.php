<?php
/*
 * Esta Clase se encarga de crear reportes graficos personalizados utilizando la libreria amcharts de javascript.
 * cada metodo establecido en esta clase se encarga de crear un arreglo en formato JSON con su propia estructura la cual se debe respetar para su adecuado funcionamiento,
 * ya que la libreria amcharts funciona solo con arreglos en formato JSON y para su uso se implementa JQUERY y sus metodos de AJAX.
 * la documentacion de cada metodo se encuentra en el archivo javascript js/default/amcharts/report_graphics.js.
 * esta clase solo se encargara de detallar como se deben construir los arreglos en JSON de parte del servidor para posteriormente ser devueltos a las funciones encargadas de 
 * pintar el grafico
 * 
 * @author Alvar Javier Vanegas Ochoa, alvarovanegas18@gmail.com
 * @date 2015/01/05
 */

class Report_graphic extends CI_Controller {

  public function __construct() {
    parent::__construct();
  }

  public function index() {
    $this->load->view('layout', array('content' => 'demo/report_graphic'));
  }

  /**
   * bar3d
   * @param string  nombre_eje_y  :es el nombre que llevaran los elementos pintados en el eje Y
   * @param int valor             :es el valor que posee el eje Y
   */
  public function bar3d() {
    $jsondata = array(array('nombre_eje_y' => '2010', 'valor' => 50), array('nombre_eje_y' => '2011', 'valor' => '100'), array('nombre_eje_y' => 2013, 'valor' => 150), array('nombre_eje_y' => 2014, 'valor' => 10), array('nombre_eje_y' => 2015, 'valor' => 80));
    echo json_encode($jsondata);
  }

  /**
   * barClustered
   * @param string nombre_eje_y  :es el nombre que llevaran los elementos pintados en el eje Y
   * @param int valor_1          :es el primer valor que posee el eje Y en su grupo
   * @param int valor_2          :es el segundo valor que posee el eje Y en su grupo
   */
  public function barClustered() {
    $jsondata = array(array('nombre_eje_y' => '2012', 'valor_1' => '50', 'valor_2' => 10), array('nombre_eje_y' => 2013, 'valor_1' => 100, 'valor_2' => '200'), array('nombre_eje_y' => 2014, 'valor_1' => 150, 'valor_2' => 60), array('nombre_eje_y' => 2015, 'valor_1' => 40, 'valor_2' => 80));
    echo json_encode($jsondata);
  }

  /**
   * columns3d
   * @param string nombre_eje_x  :es el nombre que llevaran los elementos pintados en el eje X
   * @param int  valor           :es el valor que posee el eje X
   * @param string color         :es un color que tendra la columna especificada
   */
  public function columns3d() {
    $jsondata = array(array('nombre_eje_x' => 'Armenia', 'valor' => 50, 'color' => '#FF0F00'), array('nombre_eje_x' => 'Cali', 'valor' => 100, 'color' => '#FF6600'), array('nombre_eje_x' => 'Medellin', 'valor' => 20, 'color' => '#FF9E01'), array('nombre_eje_x' => 'Bogota', 'valor' => 150, 'color' => '#FCD202'),
     array('nombre_eje_x' => 'Yopal', 'valor' => 200, 'color' => '#CD0D74'), array('nombre_eje_x' => 'Manizales', 'valor' => 90, 'color' => '#DDDDDD'), array('sucursal' => 'Yopal', 'valor' => 180, 'color' => '#333333'));
    echo json_encode($jsondata);
  }

  /**
   * columnAndLineMix
   * @param string nombre_eje_x  :es el nombre que llevaran los elementos pintados en el eje X
   * @param int valor_1          :es el valor que posee el eje X en su barra
   * @param int valor_2          :es el valor que posee el eje X en su linea
   */
  public function columnAndLineMix() {
    $jsondata = array(array('nombre_eje_x' => 'Armenia', 'valor_1' => 50, 'valor_2' => 30), array('nombre_eje_x' => 'Bogota', 'valor_1' => 10, 'valor_2' => 5), array('nombre_eje_x' => 'Medellin', 'valor_1' => 50, 'valor_2' => 40), array('nombre_eje_x' => 'sucursal objetivo', 'valor_1' => 70, 'valor_2' => 50, 'dashLengthColumn' => 5, 'alpha' => 0.2, 'additional' => "(projeccion de IBG)"));
    echo json_encode($jsondata);
  }

  /**
   * columnCylinders
   * @param string nombre_eje_x  :es el nombre que llevaran los elementos pintados en el eje X
   * @param int valor            :es el valor que posee el eje X en su columna cilindrica
   * @param string color         :es un color que tendra la columna cilindricaa especificada
   */
  public function columnCylinders() {
    $jsondata = array(array('nombre_eje_x' => 'Armenia', 'valor' => 50, 'color' => '#FF0F00'), array('nombre_eje_x' => 'Cali', 'valor' => 100, 'color' => '#FF6600'), array('nombre_eje_x' => 'Medellin', 'valor' => 20, 'color' => '#FF9E01'), array('nombre_eje_x' => 'Bogota', 'valor' => 150, 'color' => '#FCD202'),
     array('nombre_eje_x' => 'Yopal', 'valor' => 200, 'color' => '#CD0D74'), array('nombre_eje_x' => 'Manizales', 'valor' => 90, 'color' => '#DDDDDD'), array('sucursal' => 'Yopal', 'valor' => 180, 'color' => '#333333'));
    echo json_encode($jsondata);
  }

  /**
   * columnSimple
   * @param string nombre_eje_x  :es el nombre que llevaran los elementos pintados en el eje X
   * @param int valor            :es el valor que posee el eje X
   */
  public function columnSimple() {
    $jsondata = array(array('nombre_eje_x' => 'Armenia', 'valor' => 50), array('nombre_eje_x' => 'Cali', 'valor' => 100), array('nombre_eje_x' => 'Medellin', 'valor' => 20), array('nombre_eje_x' => 'Bogota', 'valor' => 150),
     array('nombre_eje_x' => 'Yopal', 'valor' => 200), array('nombre_eje_x' => 'Manizales', 'valor' => 90), array('sucursal' => 'Yopal', 'valor' => 180));
    echo json_encode($jsondata);
  }

  /**
   * pie3D
   * @param string nombre  :es el nombre de un grupo que se encontrara en la grafica de torta
   * @param int $valor     :es el valor que tendra el grupo especificado
   */
  public function pie3D() {
    $jsondata = array(array('nombre' => 'Armenia', 'valor' => 50), array('nombre' => 'Cali', 'valor' => 100), array('nombre' => 'Medellin', 'valor' => 20), array('nombre' => 'Bogota', 'valor' => 150),
     array('nombre' => 'Yopal', 'valor' => 200), array('nombre' => 'Manizales', 'valor' => 90), array('nombre' => 'Yopal', 'valor' => 180));
    echo json_encode($jsondata);
  }

  /**
   * pie3D
   * @param string nombre  :es el nombre de un grupo que se encontrara en la grafica de torta en 3D
   * @param int $valor     :es el valor que tendra el grupo especificado
   */
  public function pieDonut3D() {
    $jsondata = array(array('nombre' => 'Armenia', 'valor' => 50), array('nombre' => 'Cali', 'valor' => 100), array('nombre' => 'Medellin', 'valor' => 20), array('nombre' => 'Bogota', 'valor' => 150),
     array('nombre' => 'Yopal', 'valor' => 200), array('nombre' => 'Manizales', 'valor' => 90), array('nombre' => 'Yopal', 'valor' => 180));
    echo json_encode($jsondata);
  }

  /**
   * pyramidChart3D
   * @param string titulo  :es el titulo de un grupo que se encontrara en la grafica de piramide
   * @param int valor      :es el valor que tendra el grupo especificado
   */
  public function pyramidChart3D() {
    $jsondata = array(array('titulo' => 'vendedores', 'valor' => 10), array('titulo' => 'auxiliares', 'valor' => 8), array('titulo' => 'asistentes de area', 'valor' => 6), array('titulo' => 'director de area', 'valor' => 4),
     array('titulo' => 'gerente sucursal', 'valor' => 1));
    echo json_encode($jsondata);
  }
}
