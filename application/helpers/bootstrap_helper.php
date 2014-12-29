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

//Carga de Helpers del framework
$ci->load->helper(array(
  'assets',
  'essential',
  'elements'
));