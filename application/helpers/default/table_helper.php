<?php
/*
 * Este Helper es el encargado de crear tablas html de forma dinamica con ayuda de la libreria table de CI.
 * 
 * @author Alvaro Javier Vanegas Ochoaa <alvarovanegas18@gmail.com>
 * @date 2015/01/08
 */

if (!function_exists('generate_simple_table')) {

  /**
   * Genera una tabla simple la cual solo lista de una forma sencilla los datos en una tabla <table>
   * @param [array] $array_result: un arreglo el cual puede ser de dos tipos
   * 
   * array() : un arreglo normal
   * $puntero->? : un puntero pero solo tiene la capacidad de recibir un elemento ejemplo
   * $puntero->datos = 'correcto';
   * $puntero->datos->otro_puntero = 'incorrecto';
   *  
   * @param [array] $titles : especifica los titulos o el header que tendra la tabla al momento de generarla, se ingresa vacio cuando se usa el puntero
   * @param [array] $params : un arreglo de parametros opcionales, sus incides son:
   * 
   * $params['class_table'] : recibe un string indicando clases css para el tag <table> 
   * $params['caption']     : un subtitulo al comienzo de la tabla
   * $params['is_puntero']  : determina si el parametro $array_result es un arreglo o un puntero, por defecto es un arreglo 'false'
   * 
   * @return string         : devuelve el html resultante de una tabla
   */
  function generate_simple_table($array_result, $titles = '', $params = '') {
    $ci = & get_instance();
    $ci->load->library('table');

    $params['class_table'] = isset($params['class_table']) ? $params['class_table'] : 'table-striped table-bordered table-hover';
    $params['caption'] = isset($params['caption']) ? $params['caption'] : '';
    $params['is_puntero'] = isset($params['is_puntero']) ? $params['is_puntero'] : false;

    $ci->table->set_caption($params['caption']);

    //cuando recibe un arreglo
    if (!$params['is_puntero']) {
      $ci->table->set_heading($titles);
      $tamano = count($titles);
    } else {
      //cuando recibe un puntero
      $array_result = (array) $array_result;
      $ci->table->set_heading($array_result['titulos']);
      $tamano = count($array_result['titulos']);
      unset($array_result['titulos']);
    }

    foreach ($array_result as $datos) {
      reset($datos);
      $temporal = array();
      for ($i = 0; $i < $tamano; $i++) {
        $elemento = current($datos);
        $temporal[$i] = $elemento;
        next($datos);
      }
      $ci->table->add_row($temporal);
    }
    //plantilla por defecto
    $plantilla = array(
     'table_open' => '<table class= "table table-responsive ' . $params['class_table'] . '">'
    );
    $ci->table->set_template($plantilla);
    $tabla_generada = $ci->table->generate();
    return $tabla_generada;
  }

}

if (!function_exists('celda_personalizada')) {
  /**
   * Metodo que agrega un elemento en un arreglo de atributos los cuales son tag o atributos html.
   * el indice agregado es 'data' el cual es el que toma CI para darle valor a la celda.
   * @param type $value : el elemento que se agregara al arreglo de atributos html
   * @param array $parametros : un arreglo de atributos html
   * @return type array : devuelve un arreglo con el nuevo elemento agregado.
   */
  function celda_personalizada($value, $parametros) {
    $parametros['data'] = $value;
    return $parametros;
  }

}