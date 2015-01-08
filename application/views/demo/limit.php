<?php
show_message("Prueba cambiando la URI por localhost/my_ci/demo/limit/12/21 en tu navegador", array('type' => 'info'));
?>
<center>
  <ul class="list-group">
    <?php foreach ($query as $row) { ?>
      <li class="list-group-item">
        <span class="badge"><?php echo $row->index; ?></span>
        <?php echo $row->cedula; ?>
      </li>
    <?php } ?>
  </ul>
</center>
<?php paginator('demo/main/limit/', 120, 5); ?>
<?php footer('<b>Realizado por:</b><br>Jose Wilson Capera Castaño - josewilsoncc@hotmail.com<br>Estefania Alzate Daza - teflon28799@gmail.com'); ?>