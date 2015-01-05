<!doctype html>
<html>
  <?php $this->load->view('templates/head'); ?>
  <body>
    <?php
    $this->load->view('templates/header');
    $this->load->view($content);
    $this->load->view('templates/footer');
    assets_controller($content, array('and_method'=>true));
    ?>
  </body>
</html>