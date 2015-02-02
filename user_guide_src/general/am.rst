################
La convención AM
################

AM (Automatic Mode), es una convención creada por Jose Capera,
para facilitar el envío de información estructurada a través
de un arreglo, para ser usada recursivamente y con base en su
estructura producir un resultado deseado. Por ejemplo el método
**load_assets** del *Helper Assets* utiliza dicha convención,
veamos::

  load_assets(array(
    MC_CSS => array(
      'default' => array(
        'bootstrap' => array(
          'bootstrap.min',
          'bootstrap-theme.min'
        ),
        'icons',
        'alertify' => array(
          'alertify.min',
          'themes/default.min'
        ),
        'toastr.min'
      )
    ),
    MC_LESS => array(
      'default/basic'
    ),
    MC_JS => array(
      'default' => array(
        'jquery' => array(
          'jquery.min',
          'jquery-ui.min'
        ),
        'bootstrap.min',
        'less.min',
        'alertify.min',
        'toastr.min',
        'my_ci'
      )
    )
  ));

El cual produce genera el siguiente HTML::

  <link href="http://localhost/MyCI/assets/css/default/bootstrap/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="http://localhost/MyCI/assets/css/default/bootstrap/bootstrap-theme.min.css" rel="stylesheet" type="text/css">
  <link href="http://localhost/MyCI/assets/css/default/icons.css" rel="stylesheet" type="text/css">
  <link href="http://localhost/MyCI/assets/css/default/alertify/alertify.min.css" rel="stylesheet" type="text/css">
  <link href="http://localhost/MyCI/assets/css/default/alertify/themes/default.min.css" rel="stylesheet" type="text/css">
  <link href="http://localhost/MyCI/assets/css/default/toastr.min.css" rel="stylesheet" type="text/css">
  <link href="http://localhost/MyCI/assets/less/default/basic.less" rel="stylesheet" type="text/less">
  <script type="text/javascript" src="http://localhost/MyCI/assets/js/default/jquery/jquery.min.js"></script>
  <script type="text/javascript" src="http://localhost/MyCI/assets/js/default/jquery/jquery-ui.min.js"></script>
  <script type="text/javascript" src="http://localhost/MyCI/assets/js/default/bootstrap.min.js"></script>
  <script type="text/javascript" src="http://localhost/MyCI/assets/js/default/less.min.js"></script>
  <script type="text/javascript" src="http://localhost/MyCI/assets/js/default/alertify.min.js"></script>
  <script type="text/javascript" src="http://localhost/MyCI/assets/js/default/toastr.min.js"></script>
  <script type="text/javascript" src="http://localhost/MyCI/assets/js/default/my_ci.js"></script>

Como puede concluirse MyCI extrae las rutas de manera recuersiva
usando la convención AM.

Es de aclarar que la convención es flexible y permite
producir este HTML de diversas maneras, veamos otro
ejemplo::

  load_assets(array(
    MC_CSS => array(
      'default/bootstrap/bootstrap.min',
      'default/bootstrap/bootstrap-theme.min'
      'default/icons',
      'default/alertify/alertify.min',
      'default/alertify/themes/default.min'
      'default/toastr.min'
    ),
    MC_LESS => array(
      'default/basic'
    ),
    MC_JS => array(
      'default/'jquery/jquery.min',
      'default/'jquery/jquery-ui.min'
      'default/bootstrap.min',
      'default/less.min',
      'default/alertify.min',
      'default/toastr.min',
      'default/my_ci'
    )
  ));

La convención AM es muy flexible, puede usarse de diversas
formas segun se considere conveniente para cumplir un objetivo.