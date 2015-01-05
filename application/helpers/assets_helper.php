<?php

/*
 * Este Helper es el encargado de todo lo referente a assets en el proyecto.
 * 
 * @author Jose Wilson Capera Castaño, josewilsoncc@hotmail.com
 * @date 2014/12/19
 */

if (!function_exists('asset_tag')) {

  /**
   * Incluye un archivo asset especificado.
   * 
   * @param string $route Es la ruta del archivo javascript sin extensión partiendo de la base URL y si no se presentan
   * varianciones por defecto buscara en los directorios:
   * assets/js/
   * assets/css/
   * assets/less/
   * Por ejemplo, para incluir el archivo
   * assets/js/mi_javascript.js se hace de esta manera: asset_tag('mi_javascript', array('type_tag'=>'js')); sin
   * importar desde que archivo o ruta se llame.
   * 
   * @param array $params Son los parametros opcionales como:
   * 
   * boolean <b>$url_variant</b> debe ponerse en true si la url varia del directorio assets/js
   * 
   * string/boolean <b>$only_return</b> funciona de la siguiente manera:
   * <br><br>+Si es TRUE el resultado sera retornado.
   * <br><br>+Si es FALSE el resultado sera impreso con un echo de manera automatica. (predeterminada)
   * <br><br>+si es MCI_R solamente retornara la ruta de la tag.
   * <br><br>+si es MCI_RF solamente imprimira la ruta de la tag con un echo de manera automatica.
   * <br><br>+si es MCI_RWBU retornará la ruta de la tag sin la url base.
   * <br><br>+si es MCI_RWBU_F solamente imprimira la ruta de la tag sin la url base con un echo de manera automatica.
   * <br><br>Es FALSE por defecto.
   * 
   * string <b>$type_tag</b> indica de que tipo es el asset con los valores 'css', 'js' y 'less'.
   * 
   * @return string/html código html para cumplir la funcion.
   * 
   * @autor Jose Wilson Capera Castaño, josewilsoncc@hotmail.com
   * @date 2014/12/19
   * @update 2015/01/02
   */
  function asset_tag($route, $params = '') {
    $url_variant = isset($params['url_variant']) ? $params['url_variant'] : false;
    $only_return = isset($params['only_return']) ? $params['only_return'] : false;
    $type_tag = isset($params['type_tag']) ? $params['type_tag'] : 'js';

    $partial_route = 'assets/' . $type_tag . '/' . $route . '.' . $type_tag;

    if ($url_variant)
      $full_route = base_url() . $route;
    else
      $full_route = base_url() . $partial_route;

    switch ($type_tag) {
      case 'css':
        $html = link_tag($full_route);
        break;
      case 'less':
        $html = link_tag($full_route, 'stylesheet', 'text/less');
        break;
      case 'js':
        $html = '<script type="text/javascript" src="' . $full_route . '"></script>';
        break;
    }
    
    //echo 'HTML generate: '.$html;

    switch ($only_return) {
      case MCI_RWBU:
        return $partial_route;
      case MCI_RWBU_F:
        echo $partial_route;
        break;
      case MCI_R:
        return $full_route;
      case MCI_RF:
        echo $full_route;
        break;
      case TRUE:
        return $html;
      default:
        echo $html;
        break;
    }
  }

}

if (!function_exists('load_assets')) {

  /**
   * Incluye todos los assets (css, less, js) indicados en un arreglo.
   * 
   * @param $assets Es el arreglo de los assets a incluir con el siguiente
   * formato:
   * 
   * load_assets(array(<br>
   *  'css' => array(<br>
   *    'algun_css',<br>
   *    'otro',<br>
   *    'etc'<br>
   *  ),<br>
   *    'less' => array(<br>
   *    'algun_less',<br>
   *    '<i>etc...</i>'<br>
   *  ),<br>
   *  'js' => array(<br>
   *    'algun_js',<br>
   *    '<i>etc...</i>'<br>
   *  )<br>
   * ));
   * 
   * @autor Jose Wilson Capera Castaño, josewilsoncc@hotmail.com
   * @date 19/12/2014
   */
  function load_assets($assets) {
    if (isset($assets['css']))
      foreach (string_pattern($assets['css']) as $value)
        asset_tag($value, array('type_tag'=>'css'));
    if (isset($assets['less']))
      foreach (string_pattern($assets['less']) as $value)
        asset_tag($value, array('type_tag'=>'less'));
    if (isset($assets['js']))
      foreach (string_pattern($assets['js']) as $value)
        asset_tag($value, array('type_tag'=>'js'));
  }

}

if (!function_exists('assets_controller')) {

  /**
   * Incluye un archivo javascritp, css o less de un controlador, debe llamarse asi: asset_controller("mi_controlador");
   * 
   * @param string $controller Es el controlador del que se requiere el JavaScript, CSS o Less.
   * 
   * @param array $params Son los parametros opcionales como:
   * 
   * string <b>$file</b> Es el nombre del archivo JavaScript, CSS o Less sin la extensión del controlador que se
   * incluira, general (general.js) por defecto.
   * 
   * string <b>$and_method</b> Indica si debe incluir el JavaScript, CSS o Less estandar para la vista. Por ejemplo si
   * la URI es <i>my_ci/home/help</i> los archivos a incluir de manera automatica son:
   * <i>my_ci/assets/js/home/help.js</i>
   * <i>my_ci/assets/css/home/help.css</i>
   * <i>my_ci/assets/less/home/help.less</i>
   * 
   * boolean <b>$only_return</b> si es true el resultado será retornado en lugar de ser impreso con un echo de manera
   * automatica.
   * 
   * @return string/html código html para cumplir la funcion.
   * 
   * @autor Jose Wilson Capera Castaño, josewilsoncc@hotmail.com
   * @date 16/11/2014
   * @update 02/01/2015
   */
  function assets_controller($controller, $params = '') {
    $file = isset($params['file']) ? $params['file'] : 'general';
    $only_return = isset($params['only_return']) ? $params['only_return'] : false;
    $and_method = isset($params['and_method']) ? $params['and_method'] : false;
    $uri_segment = explode('/', $controller);
    $html = '';

    if (count($uri_segment) >= 1) {
      if (file_exists(asset_tag($uri_segment[0] . '/' . $file, array('only_return' => MCI_RWBU, 'type_tag'=>'js'))))
        $html .= asset_tag($uri_segment[0] . '/' . $file, array('type_tag'=>'js'));
      if (file_exists(asset_tag($uri_segment[0] . '/' . $file, array('only_return' => MCI_RWBU, 'type_tag'=>'css'))))
        $html .= asset_tag($uri_segment[0] . '/' . $file, array('type_tag'=>'css'));
      if (file_exists(asset_tag($uri_segment[0] . '/' . $file, array('only_return' => MCI_RWBU, 'type_tag'=>'less'))))
        $html .= asset_tag($uri_segment[0] . '/' . $file, array('type_tag'=>'less'));
    }

    if (count($uri_segment) >= 2) {
      if (file_exists(asset_tag($uri_segment[0] . '/' . $uri_segment[1], array('only_return' => MCI_RWBU, 'type_tag'=>'js'))))
        $html .= asset_tag($uri_segment[0] . '/' . $uri_segment[1], array('type_tag'=>'js'));
      if (file_exists(asset_tag($uri_segment[0] . '/' . $uri_segment[1], array('only_return' => MCI_RWBU, 'type_tag'=>'css'))))
        $html .= asset_tag($uri_segment[0] . '/' . $uri_segment[1], array('type_tag'=>'css'));
      if (file_exists(asset_tag($uri_segment[0] . '/' . $uri_segment[1], array('only_return' => MCI_RWBU, 'type_tag'=>'less'))))
        $html .= asset_tag($uri_segment[0] . '/' . $uri_segment[1], array('type_tag'=>'less'));
    }
    if ($only_return)
      return $html;
    else
      echo $html;
  }

}

if (!function_exists('string_pattern')) {

  /**
   * Genera de manera simple un arreglo que cumple un patron en sus rutas.
   * 
   * @autor Jose Wilson Capera Castaño, josewilsoncc@hotmail.com
   * @date 29/12/2014
   */
  function string_pattern($elements, $route = '', $separator = '/', $start = true) {
    $return_routes = array();
    foreach ($elements as $pattern => $routes) {
      if (isset($routes)) {
        if (gettype($routes) == "string")
          if (gettype($pattern) == "string")
            $return_routes[] = $start ? $route . $pattern . $separator . $routes : $route . $separator . $pattern . $separator . $routes;
          else
            $return_routes[] = $start ? $route . $routes : $route . $separator . $routes;
        if (gettype($routes) == "array") {
          $temp_route = $start ? $route . $pattern : $route . $separator . $pattern;
          $temp = string_pattern($routes, $temp_route, $separator, FALSE);
          foreach ($temp as $value)
            $return_routes[] = $value;
        }
      } else
        $return_routes[] = $start ? $route . $pattern : $route . $separator . $pattern;
    }
    return $return_routes;
  }

}