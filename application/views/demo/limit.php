<?php
$query = $this->basic_model->limit('usuarios', $start, $end, 'cedula', array(
  'select' => 'cencos, fc_desc_sucursal(cencos) descencos, cedula, pro_personal_nombre(cedula) nombre, codusu',
  'where' => array('estado' => 'A')
    ));
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
      <?php echo $pagination_links; ?>
    </ul>
  </nav>
</center>