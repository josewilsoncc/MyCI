<!doctype html>
<html>
  <?php $this->load->view('templates/head'); ?>
  <body class='bs-docs-home'>
    <?php
    $this->load->view('templates/header');
    $this->load->view($content);
    $this->load->view('templates/footer');
    js_controller($content, array('and_method'=>true));
    css_controller($content, array('and_method'=>true));
    less_controller($content, array('and_method'=>true));
    ?>
  </body>
</html>