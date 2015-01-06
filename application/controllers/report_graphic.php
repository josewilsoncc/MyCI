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
    $jsondata = array(array('year' => 2010, 'income' => 50), array('year' => 2011, 'income' => 100), array('year' => 2013, 'income' => 150), array('year' => 2014, 'income' => 10));
    echo json_encode($jsondata);
  }

  public function barClustered() {
    $jsondata = array(array('year' => 2010, 'income' => 50, 'expenses' => 10), array('year' => 2011, 'income' => 100, 'expenses' => 10), array('year' => 2013, 'income' => 150, 'expenses' => 60), array('year' => 2014, 'income' => 10, 'expenses' => 10));
    echo json_encode($jsondata);
  }

  public function prueba() {
     $jsondata = array(array('year' => 2010, 'income' => 50, 'expenses' => 10), array('year' => 2011, 'income' => 100, 'expenses' => 10), array('year' => 2013, 'income' => 150, 'expenses' => 60), array('year' => 2014, 'income' => 10, 'expenses' => 10));
   //echo json_encode($jsondata);
     echo "desde php";
  }

}
