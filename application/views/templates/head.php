<head>
  <title>
    <?php
    if (isset($title))
      echo $title;
    else
      echo PROJECT_TITLE;
    ?>
  </title>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, user-scalable=no,initial-scale=1,maximum-scale=1,minimum-scale=1"/>
  <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>assets/icons/logotipo.ico"/>
  <!--[if lt IE 9]>
    <script src='//html5shiv.googlecode.com/svn/trunk/html5.js'></script>
  <!--[endif]-->

  <?php
  
  base_url_js();

  /*
   * Cargar assets del proyecto
   */
  load_assets(array(
    'css' => array(
      'default/bootstrap/bootstrap.min',
      'default/bootstrap/bootstrap-theme.min',
      'default/icons',
      'default/alertify/alertify.core',
      'default/alertify/alertify.bootstrap'
    ),
    'less' => array(
      'default/basic',
    ),
    'js' => array(
      'default/jquery/jquery.min',
      'default/jquery/jquery-ui.min',
      'default/bootstrap.min',
      'default/less.min',
      'default/alertify.min',
      'default/my_ci'
    )
  ));

  $this->load->view('templates/_assets');
  ?>
</head>