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
  load_assets([
    'css' => [
      'bootstrap.min',
      'bootstrap-theme.min',
      'icons'
    ],
    'less' => [
      'my_ci'
    ],
    'js' => [
      'default/jquery.min',
      'default/bootstrap.min',
      'default/jquery-ui.min',
      'default/less.min',
      'default/my_ci'
    ]
  ]);

  $this->load->view('templates/_assets');
  ?>
</head>