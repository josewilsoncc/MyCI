<!doctype html>
<html>
  <?php $this->load->view('templates/head'); ?>
  <body class='bs-docs-home'>
    <?php
    $this->load->view('templates/header');
    $this->load->view($content);
    $this->load->view('templates/footer');
    echo js_controller($content);
    ?>
  </body>
</html>