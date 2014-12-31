<?php
$query = $this->basic_model->limit('usuarios', $start, $end, 'cedula', array(
  'select' => 'cencos, fc_desc_sucursal(cencos) descencos, cedula, pro_personal_nombre(cedula) nombre, codusu',
  'where' => array('estado' => 'A')
    ));
show_message("Prueba cambiando la URI por localhost/my_ci/demo/limit/12/21 en tu navegador", array('type'=>'info'));
?>
<center>
  <ul class="list-group">
    <?php foreach ($query as $row) {?>
    <li class="list-group-item">
      <span class="badge"><?php echo $row->index; ?></span>
      <?php echo $row->cedula; ?>
    </li>
    <?php } ?>
  </ul>
</center>
<center>
  <nav>
    <ul class="pagination">
      <?php paginator('demo/limit/', 120, 5); ?>
    </ul>
  </nav>
</center>
<?php footer('<b>Realizado por:</b><br>Jose Wilson Capera Castaño - josewilsoncc@hotmail.com<br>Estefania Alzate Daza - teflon28799@gmail.com'); ?>