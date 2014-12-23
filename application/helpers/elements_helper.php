<?php
if (!function_exists('js_tag')) {

  /**
   * Incluye un archivo javascritp especificado.
   * 
   * @param string $route Es la ruta del archivo javascript sin
   * extensión partiendo de la base URL y si no se presentan
   * varianciones por defecto buscara en el directorio assets/js/.
   * Por ejemplo, para incluir el archivo assets/js/mi_javascript.js
   * se hace de esta manera: js_tag('mi_javascript');
   * sin importar desde que archivo o ruta se llame.
   * 
   * @param array $params Son los parametros opcionales como:
   * 
   * boolean <b>$url_variant</b> debe ponerse en true si la url
   * varia del directorio assets/js
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
  function js_tag($route, $params = '') {
    $url_variant = isset($params['url_variant']) ? $params['url_variant'] : false;
    $only_return = isset($params['only_return']) ? $params['only_return'] : false;

    $html = '<script type="text/javascript" src="';
    if ($url_variant)
      $html .= base_url() . $route;
    else
      $html .= base_url() . 'assets/js/' . $route . '.js';
    $html .= '"></script>';

    if ($only_return)
      return $html;
    else
      echo $html;
  }

}

if (!function_exists('js_controller')) {

  /**
   * Incluye un archivo javascritp de un controlador, debe
   * llamarse asi: js_controller("mi_controlador");
   * 
   * @param string $controller Es el controlador del que se requiere
   * el JavaScript.
   * 
   * @param array $params Son los parametros opcionales como:
   * 
   * string <b>$file</b> Es el nombre del archivo JavaScript sin la
   * extensión del controlador que se incluira, general (general.js)
   * por defecto.
   * 
   * string <b>$and_method</b> Indica si debe incluir el JavaScript
   * estandar para la vista. Por ejemplo si la URI es <i>my_ci/home/help</i>
   * el archivo a incluir de manera automatica es:
   * <i>my_ci/assets/js/home/help.js</i>
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
  function js_controller($controller, $params = '') {
    $file = isset($params['file']) ? $params['file'] : 'general';
    $only_return = isset($params['only_return']) ? $params['only_return'] : false;
    $and_method = isset($params['and_method']) ? $params['and_method'] : false;
    $uri_segment = explode('/', $controller);
    $uri_controller = 'assets/js/' . $uri_segment[0] . '/' . $file . '.js';
    $html = file_exists($uri_controller) ? '<script type="text/javascript" src="' . base_url() . $uri_controller . '"></script>' : '';
    if ($and_method) {
      $uri_method = 'assets/js/' . $uri_segment[0] . '/' . $uri_segment[1] . '.js';
      $html .= file_exists($uri_method) ? '<script type="text/javascript" src="' . base_url() . $uri_method . '"></script>' : '';
    }
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
    $uri_controller = 'assets/css/' . $uri_segment[0] . '/' . $file . '.css';
    $html = file_exists($uri_controller) ? '<link href="' . base_url() . $uri_controller . '" rel="stylesheet" type="text/css">' : '';
    if ($and_method) {
      $uri_method = 'assets/css/' . $uri_segment[0] . '/' . $uri_segment[1] . '.css';
      $html .= file_exists($uri_method) ? '<link href="' . base_url() . $uri_method . '" rel="stylesheet" type="text/css">' : '';
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
    foreach ($assets['css'] as $value)
      css_tag($value);
    foreach ($assets['less'] as $value)
      less_tag($value);
    foreach ($assets['js'] as $value)
      js_tag($value);
  }

}

if (!function_exists('reload_page')) {

  /**
   * produce una etiqueta javascript en cuya logíca, se recarga la pagína
   * 
   * @return string/html código html para cumplir la funcion.
   * 
   * @autor Jose Wilson Capera Castaño, josewilsoncc@hotmail.com
   * @date 12/12/2014
   */
  function reload_page() {
    echo '<script type="text/javascript">location.reload(true);</script>';
  }

}

if (!function_exists('show_message')) {

  /**
   * Genera un div con un mensaje si el mensaje no esta vacio
   * @param string $message Es el mensaje a mostrar
   * @param array $params Son los parametros opcionales como:
   * 
   * string <b>$type</b> Es el tipo de mensaje, define color estandar
   * y si no se especifica define el icono. Los posibles tipos
   * son:
   * 
   * <i>danger</i>: Mensaje de error importante.<br>
   * <i>warning</i>: Mensaje de alerta importante.<br>
   * <i>info</i>: Mensaje que informativo aunque no es tan importante.<br>
   * <i>success</i> :Mensaje de accion importante ejecutada correctamente.
   * 
   * string <b>$icon</b> Es el id de iconmoon del icono a usar, el
   * cual reemplaza el icono por defecto.
   * 
   * @autor Jose Wilson Capera Castaño, josewilsoncc@hotmail.com
   * @date 12/12/2014
   */
  function show_message($message, $params = '') {
    if ($message) {
      $type = isset($params['type']) ? $params['type'] : 'success';
      switch ($type) {
        case 'success':$icon = 'checkmark';
          break;
        case 'info':$icon = 'info2';
          break;
        case 'warning':$icon = 'warning';
          break;
        case 'danger':$icon = 'spam';
          break;
      }
      $icon = isset($params['icon']) ? $params['icon'] : $icon;
      $id = isset($params['id']) ? $params['id'] : 'show_message';
      $class = isset($params['class']) ? $params['class'] : '';
      $auto_hide = isset($params['auto_hide']) && $params['auto_hide'] == true ? 'auto_hide' : '';
      ?>
      <div id="<?php echo $id; ?>" class="show_message alert alert-<?php echo $type . ' ' . $class . ' ' . $auto_hide; ?>" role="alert">
        <center>
          <table>
            <tr>
              <td><span class="icon icon-<?php echo $icon; ?> text_200" aria-hidden="true"></span></td>
              <td><?php echo $message ?></td>
            </tr>
          </table>
        </center>
      </div>
      <?php
    }
  }

}

if (!function_exists('create_select')) {

  /**
   * Genera el codigo html de un select con las opciones dadas
   * 
   * @param string $name Es el name e id del select
   * @param array $options Son las opciones del select
   * @param array $params Son los parametros opcionales como:
   * 
   * string <b>$selected</b> Es el indice de la opcion seleccionada
   * por defecto
   * 
   * string <b>$html</b> Es codigo html (parametros) extra para la etiqueta select.
   * 
   * string <b>$ucfirst</b> Pone la primer letra cada option en mayuscula
   * y las demas en minuscula
   * 
   * @autor Jose Wilson Capera Castaño, josewilsoncc@hotmail.com
   * @date 20/11/2014
   */
  function create_select($name, $options, $params = '') {
    $selected = isset($params['selected']) ? $params['selected'] : 0;
    $html = isset($params['html']) ? $params['html'] : '';
    $ucfirst = isset($params['ucfirst']) ? $params['ucfirst'] : false;
    $class = isset($params['class']) ? 'class="' . $params['class'] . '"' : '';
    $onchange = isset($params['onchange']) ? 'onchange="' . $params['onchange'] . '"' : '';
    echo "<select name='$name' id='$name' $html $class $onchange>";
    $i = 0;
    foreach ($options as $key => $value) {
      $option = '<option value="' . trim($key) . '"' . set_select($name, $key, ($i == $selected)) . '>';
      $option.=$ucfirst ? ucfirst(strtolower($value)) : $value;
      $option.='</option>';
      echo $option;
      $i++;
    }
    echo "</select>";
  }

}

if (!function_exists('caruosel')) {

  /**
   * Genera el codigo html de un carrusel en bootstrap
   * 
   * @param array $elements Es un arreglo con los elementos a mostrar
   * en el carrusel, su formato depende del tipo del carrusel a crear,
   * los formatos segun el tipo son:
   * 
   * <b>para <i>'images'</i> e <i>'hiden_images'</i></b>:<br>
   * array(<br>
   *   'carpeta_o_ruta/nombre_imagen.extensión',<br>
   *   'carpeta_o_ruta/nombre_imagen.extensión',<br>
   *   <i>... Asi N veces ...</i><br>
   * );
   * 
   * <b>para <i>'basic'</i></b>:<br>
   * array(<br>
   *   'Titulo a mostrar' => array(<br>
   *     '<b>label</b>' => 'Sub titulo a mostrar',<br>
   *     '<b>text</b>' => 'Texto a mostrar'<br>
   *   ),<br>
   *   'Titulo a mostrar' => array(<br>
   *     '<b>label</b>' => 'Sub titulo a mostrar',<br>
   *     '<b>text</b>' => 'Texto a mostrar'<br>
   *   )<br>
   *   <i>... Asi N veces ...</i><br>
   * );
   * 
   * @param array $params Son los parametros opcionales como:
   * 
   * string <b>$type</b> Define el tipo de carrusel, los tipos existentes
   * son: 'images', 'hiden_images', 'basic'.<br>
   * 
   * string <b>$selected</b> Es el indice incial del carrusel.<br>
   * 
   * string <b>$id</b> Es el id del div del carrusel al cual los botones
   * de navegación hacen referencia.<br>
   * 
   * string <b>$interval</b> Es el intervalo del tiempo en que el carrusel
   * cambiara de diapositiva si no tiene el cursor encima.<br>
   * 
   * string <b>$class_slide</b> Son las clases aplicadas a cada dispositiva
   * separadas por espacio, tambien sera aplicada al div 'show_images' en
   * el caso del carrusel tipo 'hiden_images'.<br>
   * 
   * string <b>$class_basic_title</b> Son las clases aplicadas a el titulo
   * de un carrusel de tipo 'basic' separadas por espacio.<br>
   * 
   * string <b>$class_images</b> Son las clases aplicadas a las imagenes
   * de un carrusel de tipo 'images' o 'hiden_images' separadas por espacio.<br>
   * 
   * string <b>$class_div</b> Son las clases aplicadas a las imagenes
   * de un carrusel de tipo 'images' o 'hiden_images' separadas por espacio.<br>
   * 
   * string <b>$hidden_images_title</b> Es el título mostrado en un carrusel
   * de tipo 'hiden_images'.<br>
   * 
   * @autor Jose Wilson Capera Castaño, josewilsoncc@hotmail.com
   * @date 18/12/2014
   */
  function caruosel($elements, $params = '') {
    $type = isset($params['type']) ? $params['type'] : 'images';
    $selected = isset($params['selected']) ? $params['selected'] : 0;
    $id = isset($params['id']) ? $params['id'] : 'my_caruosel';
    $interval = isset($params['interval']) ? $params['interval'] : 3000;
    $class_slide = isset($params['class_slide']) ? $params['class_slide'] : '';
    $class_basic_title = isset($params['class_basic_title']) ? $params['class_basic_title'] : '';
    $class_images = isset($params['class_images']) ? $params['class_images'] : '';
    $class_div = isset($params['class_div']) ? $params['class_div'] : $type == 'hiden_images' ? 'div_carusel_hiden' : 'div_carusel';
    $hidden_images_title = isset($params['hidden_images_title']) ? $params['hidden_images_title'] : 'Pasa el puntero para ver y ocultar el contenido...';
    ?>
    <?php if ($type == 'hiden_images') { ?>
      <script>
        $(function () {
          $('.<?php echo $class_div; ?>').hide();
          $('.show_images').css('cursor', 'pointer');
          $('.show_images').mouseenter(function () {
            $('.<?php echo $class_div; ?>:hidden').fadeIn();
          });
          $('.show_images').click(function () {
            $('.<?php echo $class_div; ?>').fadeToggle();
          });
          $('.div_carusel_hiden').mouseleave(function () {
            $('.<?php echo $class_div; ?>').fadeOut();
          });
        });
      </script>
      <div class="show_images <?php echo $class_slide; ?>"><br><center><span class="icon icon-info"></span><?php echo $hidden_images_title; ?></center><br></div>
    <?php } ?>
    <div class="<?php echo $class_div; ?>">
      <div id="<?php echo $id; ?>" class="carousel slide" data-interval="<?php echo $interval; ?>" data-ride="carousel">
        <!-- Carousel indicators -->
        <ol class="carousel-indicators alpha_hover_10">
          <?php
          for ($i = 0; $i < count($elements); $i++) {
            ?>
            <li data-target="#<?php echo $id; ?>" data-slide-to="<?php echo $i; ?>" class="<?php echo $selected == $i ? 'active' : ''; ?>"></li>
            <?php
          }
          ?>
        </ol>  
        <!-- Carousel items -->
        <div class="carousel-inner">
          <?php
          $i = 0;
          switch ($type) {
            case 'images':
            case 'hiden_images':
              foreach ($elements as $key => $value) {
                ?>
                <div class="<?php
          echo $class_slide . ' ';
          echo $i == $selected ? 'active' : '';
                ?> item">
                  <center><img  class="img-rounded <?php echo $class_images; ?>" src="<?php echo base_url(); ?>assets/images/<?php echo $value; ?>"></center>
                </div>
                <?php
                $i++;
              }
              break;
            case 'basic':
              foreach ($elements as $key => $value) {
                ?>
                <div class="<?php
          echo $class_slide . ' ';
          echo $i == $selected ? 'active' : '';
                ?> item">
                  <h2 class="<?php echo $class_basic_title; ?>"><?php echo $key; ?></h2>
                  <div class="carousel-caption">
                    <h3><?php echo $value['label']; ?></h3>
                    <p><?php echo $value['text']; ?></p>
                  </div>
                </div>
                <?php
                $i++;
              }
              break;
          }
          ?>
          <!-- Carousel nav -->
          <a class="carousel-control left" href="#<?php echo $id; ?>" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
          </a>
          <a class="carousel-control right" href="#<?php echo $id; ?>" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
          </a>
        </div>
      </div>
    </div>
    <?php
  }

}