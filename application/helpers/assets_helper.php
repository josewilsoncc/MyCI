<?php

/*
 * Este Helper es el encargado de todo lo referente a assets en el proyecto.
 * 
 * @author Jose Wilson Capera Castaño, josewilsoncc@hotmail.com
 * @date 2014/12/29
 */

if (!function_exists('js_tag')) {

  /**
   * Incluye un archivo javascritp especificado.
   * 
   * @param string $route Es la ruta del archivo javascript sin extensión partiendo de la base URL y si no se presentan
   * varianciones por defecto buscara en el directorio assets/js/. Por ejemplo, para incluir el archivo
   * assets/js/mi_javascript.js se hace de esta manera: js_tag('mi_javascript'); sin importar desde que archivo o ruta
   * se llame.
   * 
   * @param array $params Son los parametros opcionales como:
   * 
   * boolean <b>$url_variant</b> debe ponerse en true si la url varia del directorio assets/js
   * 
   * string/boolean <b>$only_return</b> funciona de la siguiente manera:
   * <br><br>+Si es TRUE el resultado sera retornado.
   * <br><br>+Si es FALSE el resultado sera impreso con un echo de manera automatica. (predeterminada)
   * <br><br>+si es 'route' solamente retornara la ruta de la tag.
   * <br><br>+si es 'false_route' solamente imprimira la ruta de la tag con un echo de manera automatica.
   * <br><br>Es FALSE por defecto.
   * 
   * @return string/html código html para cumplir la funcion.
   * 
   * @autor Jose Wilson Capera Castaño, josewilsoncc@hotmail.com
   * @date 16/11/2014
   * @update 02/01/2015
   */
  function js_tag($route, $params = '') {
    $url_variant = isset($params['url_variant']) ? $params['url_variant'] : false;
    $only_return = isset($params['only_return']) ? $params['only_return'] : false;

    if ($url_variant)
      $full_route = base_url() . $route;
    else
      $full_route = base_url() . 'assets/js/' . $route . '.js';

    $html = '<script type="text/javascript" src="' . $full_route . '"></script>';

    switch ($only_return) {
      case MCI_RWBU:
        return 'assets/js/' . $route . '.js';
      case MCI_RWBU_F:
        echo 'assets/js/' . $route . '.js';
        break;
      case MCI_R:
        return $full_route;
      case 'route_false':
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

if (!function_exists('css_tag')) {

  /**
   * Incluye un archivo CSS especificado, debe llamarse con un
   * echo asi: echo js_tag("mi_css");
   * 
   * @param string $route Es la ruta del archivo css sin extensión
   * partiendo de la base URL.
   * 
   * @param array $params Son los parametros opcionales como:
   * 
   * boolean <b>$url_variant</b> debe ponerse en true si la url
   * varia del directorio assets/css
   * 
   * boolean <b>$only_return</b> si es true el resultado sera
   * retornado en lugar de ser impreso con un echo de manera
   * automatica.
   * 
   * @return string/html código html para cumplir la función.
   * 
   * @autor Jose Wilson Capera Castaño, josewilsoncc@hotmail.com
   * @date 16/11/2014
   * @update 19/12/1014
   */
  function css_tag($route, $params = '') {
    $url_variant = isset($params['url_variant']) ? $params['url_variant'] : false;
    $only_return = isset($params['only_return']) ? $params['only_return'] : false;

    $html = '<link href="';
    if ($url_variant)
      $html .= base_url() . $route . '.css';
    else
      $html .= base_url() . 'assets/css/' . $route . '.css';
    $html .= '" rel="stylesheet" type="text/css">';

    if ($only_return)
      return $html;
    else
      echo $html;
  }

}

if (!function_exists('less_tag')) {

  /**
   * Incluye un archivo LESS especificado, debe llamarse con un
   * echo asi: echo less_tag("mi_less");
   * 
   * @param string $route Es la ruta del archivo less sin extensión
   * partiendo de la base URL.
   * 
   * @param array $params Son los parametros opcionales como:
   * 
   * boolean <b>$url_variant</b> debe ponerse en true si la url
   * varia del directorio assets/less
   * 
   * boolean <b>$only_return</b> si es true el resultado sera
   * retornado en lugar de ser impreso con un echo de manera
   * automatica.
   * 
   * @return string/html código html para cumplir la función.
   * 
   * @autor Jose Wilson Capera Castaño, josewilsoncc@hotmail.com
   * @date 16/11/2014
   * @update 19/12/1014
   */
  function less_tag($route, $params = '') {
    $url_variant = isset($params['url_variant']) ? $params['url_variant'] : false;
    $only_return = isset($params['only_return']) ? $params['only_return'] : false;

    $html = '<link href="';
    if ($url_variant)
      $html .= base_url() . $route . '.less';
    else
      $html .= base_url() . 'assets/less/' . $route . '.less';
    $html .= '" rel="stylesheet" type="text/less">';

    if ($only_return)
      return $html;
    else
      echo $html;
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
        css_tag($value);
    if (isset($assets['less']))
      foreach (string_pattern($assets['less']) as $value)
        less_tag($value);
    if (isset($assets['js']))
      foreach (string_pattern($assets['js']) as $value)
        js_tag($value);
  }

}

if (!function_exists('js_controller')) {

  /**
   * Incluye un archivo javascritp de un controlador, debe llamarse asi: js_controller("mi_controlador");
   * 
   * @param string $controller Es el controlador del que se requiere el JavaScript.
   * 
   * @param array $params Son los parametros opcionales como:
   * 
   * string <b>$file</b> Es el nombre del archivo JavaScript sin la extensión del controlador que se incluira, general
   * (general.js) por defecto.
   * 
   * string <b>$and_method</b> Indica si debe incluir el JavaScript estandar para la vista. Por ejemplo si la URI es
   * <i>my_ci/home/help</i> el archivo a incluir de manera automatica es:
   * <i>my_ci/assets/js/home/help.js</i>
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
  function js_controller($controller, $params = '') {
    $file = isset($params['file']) ? $params['file'] : 'general';
    $only_return = isset($params['only_return']) ? $params['only_return'] : false;
    $and_method = isset($params['and_method']) ? $params['and_method'] : false;
    $uri_segment = explode('/', $controller);
    $html='';
    if (count($uri_segment) >= 1 && file_exists(js_tag($uri_segment[0] . '/' . $file, array('only_return'=>MCI_RWBU))))
      $html = js_tag($uri_segment[0] . '/' . $file);
    if ($and_method && count($uri_segment) >= 2 && file_exists(js_tag($uri_segment[0] . '/' . $uri_segment[1], array('only_return'=>MCI_RWBU))))
      $html .=js_tag($uri_segment[0] . '/' . $uri_segment[1]);
    if ($only_return)
      return $html;
    else
      echo $html;
  }

}

if (!function_exists('css_controller')) {

  /**
   * Incluye un archivo javascritp de un controlador, debe
   * llamarse asi: css_controller("mi_controlador");
   * 
   * @param string $controller Es el controlador del que se requiere
   * el CSS.
   * 
   * @param array $params Son los parametros opcionales como:
   * 
   * string <b>$file</b> Es el nombre del archivo CSS sin la
   * extensión del controlador que se incluira, general (general.css)
   * por defecto.
   * 
   * string <b>$and_method</b> Indica si debe incluir el CSS
   * estandar para la vista. Por ejemplo si la URI es <i>my_ci/home/help</i>
   * el archivo a incluir de manera automatica es:
   * <i>my_ci/assets/css/home/help.js</i>
   * 
   * boolean <b>$only_return</b> si es true el resultado sera
   * retornado en lugar de ser impreso con un echo de manera
   * automatica.
   * 
   * @return string/html código html para cumplir la funcion.
   * 
   * @autor Jose Wilson Capera Castaño, josewilsoncc@hotmail.com
   * @date 16/11/2014
   * @update 19/12/1014
   */
  function css_controller($controller, $params = '') {
    $file = isset($params['file']) ? $params['file'] : 'general';
    $only_return = isset($params['only_return']) ? $params['only_return'] : false;
    $and_method = isset($params['and_method']) ? $params['and_method'] : false;
    $uri_segment = explode('/', $controller);
    if (count($uri_segment) >= 1)
      $uri_controller = 'assets/css/' . $uri_segment[0] . '/' . $file . '.css';
    $html = file_exists($uri_controller) ? '<link href="' . base_url() . $uri_controller . '" rel="stylesheet" type="text/css">' : '';
    if ($and_method && count($uri_segment) >= 2) {
      $uri_method = 'assets/css/' . $uri_segment[0] . '/' . $uri_segment[1] . '.css';
      $html .= file_exists($uri_method) ? '<link href="' . base_url() . $uri_method . '" rel="stylesheet" type="text/css">' : '';
    }
    if ($only_return)
      return $html;
    else
      echo $html;
  }

}

if (!function_exists('less_controller')) {

  /**
   * Incluye un archivo less de un controlador, debe
   * llamarse asi: less_controller("mi_controlador");
   * 
   * @param string $controller Es el controlador del que se requiere
   * el LESS.
   * 
   * @param array $params Son los parametros opcionales como:
   * 
   * string <b>$file</b> Es el nombre del archivo LESS (sin la
   * extensión) del controlador que se incluira, general (general.less)
   * por defecto.
   * 
   * string <b>$and_method</b> Indica si debe incluir el LESS
   * estandar para la vista. Por ejemplo si la URI es <i>my_ci/home/help</i>
   * el archivo a incluir de manera automatica es:
   * <i>my_ci/assets/less/home/help.less</i>
   * 
   * boolean <b>$only_return</b> si es true el resultado sera
   * retornado en lugar de ser impreso con un echo de manera
   * automatica.
   * 
   * @return string/html código html para cumplir la funcion.
   * 
   * @autor Jose Wilson Capera Castaño, josewilsoncc@hotmail.com
   * @date 2014/12/23
   */
  function less_controller($controller, $params = '') {
    $file = isset($params['file']) ? $params['file'] : 'general';
    $only_return = isset($params['only_return']) ? $params['only_return'] : false;
    $and_method = isset($params['and_method']) ? $params['and_method'] : false;
    $uri_segment = explode('/', $controller);
    if (count($uri_segment) >= 1)
      $uri_controller = 'assets/less/' . $uri_segment[0] . '/' . $file . '.less';
    $html = file_exists($uri_controller) ? '<link href="' . base_url() . $uri_controller . '" rel="stylesheet" type="text/less">' : '';
    if ($and_method && count($uri_segment) >= 2) {
      $uri_method = 'assets/less/' . $uri_segment[0] . '/' . $uri_segment[1] . '.less';
      $html .= file_exists($uri_method) ? '<link href="' . base_url() . $uri_method . '" rel="stylesheet" type="text/less">' : '';
    }
    if ($only_return)
      return $html;
    else
      echo $html;
  }

}

if (!function_exists('base_url_js')) {

  /**
   * Incluye la funcion 'base_url()' en javascript, debe llamarse asi:
   * base_url_js();
   * 
   * @param boolean $incluirIndex Indica si se incluye o no el index.php
   * en la URL base.
   * @return string/html código html para cumplir la funcion.
   * 
   * @autor Jose Wilson Capera Castaño, josewilsoncc@hotmail.com
   * @date 18/11/2014
   * @update 19/12/1014
   */
  function base_url_js($incluirIndex = true) {
    echo $incluirIndex ? "<script type='text/javascript'>function base_url(){return '" . base_url() . "index.php/';}</script>" : "<script>function base_url(){return '" . base_url() . "';}</script>";
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