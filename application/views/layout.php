<!doctype html>
<html>
  <?php $this->load->view('templates/head'); ?>
  <body>
    <?php
    show_message($this->session->flashdata('console'), array(MCP_TYPE=>'info'));
    $this->load->view('templates/header');
    $this->load->view($content);
    $this->load->view('templates/footer');
    assets_controller($content, array('and_method'=>true));
    ?>
  </body>
</html>