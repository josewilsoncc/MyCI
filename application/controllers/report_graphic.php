<?php

/*
 * Este Clase se encarga de crear reportes graficos personalizados utilizando la libreria amcharts de javascript
 * 
 * @author Alvar Javier Vanegas Ochoa, alvarovanegas18@gmail.com
 * @date 2015/01/05
 */

class Report_graphic extends CI_Controller {

  public function __construct() {
    parent::__construct();
  }

  public function index() {
    echo "el index";
  }

  public function bar3d() {
    $jsondata = array(array('nombre_eje_y' => '2010', 'valor' => 50), array('nombre_eje_y' => 2011, 'valor' => 100), array('nombre_eje_y' => 2013, 'valor' => 150), array('nombre_eje_y' => 2014, 'valor' => 10), array('nombre_eje_y' => 2015, 'valor' => 80));
    echo json_encode($jsondata);
  }

  public function barClustered() {
    $jsondata = array(array('nombre_eje_y' => '2012', 'valor_1' => 50, 'valor_2' => 10), array('nombre_eje_y' => 2013, 'valor_1' => 100, 'valor_2' => 200), array('nombre_eje_y' => 2014, 'valor_1' => 150, 'valor_2' => 60), array('nombre_eje_y' => 2015, 'valor_1' => 40, 'valor_2' => 80));
    echo json_encode($jsondata);
  }

  public function columns3d() {
    $jsondata = array(array('nombre_eje_x' => 'Armenia', 'valor' => 50, 'color' => '#FF0F00'), array('nombre_eje_x' => 'Cali', 'valor' => 100, 'color' => '#FF6600'), array('nombre_eje_x' => 'Medellin', 'valor' => 20, 'color' => '#FF9E01'), array('nombre_eje_x' => 'Bogota', 'valor' => 150, 'color' => '#FCD202'),
     array('nombre_eje_x' => 'Yopal', 'valor' => 200, 'color' => '#CD0D74'), array('nombre_eje_x' => 'Manizales', 'valor' => 90, 'color' => '#DDDDDD'), array('sucursal' => 'Yopal', 'valor' => 180, 'color' => '#333333'));
    echo json_encode($jsondata);
  }

  public function columnAndLineMix() {
    $jsondata = array(array('nombre_eje_x' => 'Armenia', 'valor_1' => 50, 'valor_2' => 30), array('nombre_eje_x' => 'Bogota', 'valor_1' => 10, 'valor_2' => 5), array('nombre_eje_x' => 'Medellin', 'valor_1' => 50, 'valor_2' => 40), array('nombre_eje_x' => 'sucursal objetivo', 'valor_1' => 70, 'valor_2' => 50, 'dashLengthColumn' => 5, 'alpha' => 0.2, 'additional' => "(projeccion de IBG)"));
    echo json_encode($jsondata);
  }

  public function columnCylinders() {
     $jsondata = array(array('nombre_eje_x' => 'Armenia', 'valor' => 50, 'color' => '#FF0F00'), array('nombre_eje_x' => 'Cali', 'valor' => 100, 'color' => '#FF6600'), array('nombre_eje_x' => 'Medellin', 'valor' => 20, 'color' => '#FF9E01'), array('nombre_eje_x' => 'Bogota', 'valor' => 150, 'color' => '#FCD202'),
     array('nombre_eje_x' => 'Yopal', 'valor' => 200, 'color' => '#CD0D74'), array('nombre_eje_x' => 'Manizales', 'valor' => 90, 'color' => '#DDDDDD'), array('sucursal' => 'Yopal', 'valor' => 180, 'color' => '#333333'));
    echo json_encode($jsondata);
  }
  
  public function columnSimple() {
     $jsondata = array(array('nombre_eje_x' => 'Armenia', 'valor' => 50), array('nombre_eje_x' => 'Cali', 'valor' => 100), array('nombre_eje_x' => 'Medellin', 'valor' => 20), array('nombre_eje_x' => 'Bogota', 'valor' => 150),
     array('nombre_eje_x' => 'Yopal', 'valor' => 200), array('nombre_eje_x' => 'Manizales', 'valor' => 90), array('sucursal' => 'Yopal', 'valor' => 180));
     echo json_encode($jsondata);
  }

}
