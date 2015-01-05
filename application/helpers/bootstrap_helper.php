<?php

/*
 * Este Helper es el encargado de ejecutar las acciones necesarias al inicio
 * de la ejecución de la aplicación como lo son la carda de Helpers, Libraries
 * y demas.
 * 
 * @author Jose Wilson Capera Castaño, josewilsoncc@hotmail.com
 * @date 2014/12/29
 */

//Instancia de CodeIgniter (this)
$ci = & get_instance();

//Carga de Helpers de CI
$ci->load->helper(array(
  'form',
  'html',
  'url'
));

//Carga de libraries de CI
$ci->load->library(array(
  'form_validation'
));

//Carga de drivers de CI
$ci->load->driver(array(
  'session'
));

//Carga de Helpers de My CI
$ci->load->helper(array(
  'assets',
  'essential',
  'elements'
));

//Carga de Models de My CI
$ci->load->model(array(
  'basic_model'
));

/**
 * Numero maximo de filas:
 * En consultas de relevancia (con carga cosiderable a el sistema), su proposito es evitar que el sistema tarde mucho en
 * retornar un conjunto de tuplas, se usa para validar.
 * @const Maximun Number Of Rows
 */
define('MC_MNOR', 5000);

/**
 * Ruta:
 * Usada en metodos como js_controller para indicar se desea la ruta a través del only return.
 * @const Route
 */
define('MCI_R', 'route');

/**
 * Falso: Ruta:
 * Usada en metodos como js_controller para indicar se desea la ruta a través del only return sin retornar.
 * @const Route False
 */
define('MCI_RF', 'route_false');

/**
 * Ruta sin Base Url:
 * Usada en metodos como js_controller para indicar que una ruta no requiere la url base.
 * @const Route Without Base Url
 */
define('MCI_RWBU', 'route_without_base_url');

/**
 * Falso: Ruta sin Base Url:
 * Usada en metodos como js_controller para indicar que una ruta no requiere la url base. Indicando un valor adicional
 * de falso, por ejemplo este valor se utiliza en el parametro only_return para indicar que no sera solo retornada sino
 * que sera impresa automaticamente con un echo.
 * @const Route Without Base Url _ False
 */
define('MCI_RWBU_F', 'false:route_without_base_url');