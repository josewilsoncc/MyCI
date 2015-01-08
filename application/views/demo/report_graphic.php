<?php
load_assets(array(
 'js' => array(
  'default/amcharts' => array(
   'amcharts',
   'funnel',
   'gauge',
   'pie',
   'radar',
   'serial',
   'xy'
  )
 )
));

script_onready("selector_metodo('$tipo_grafico')");
asset_tag(MC_JS, 'demo/report_graphic');
?>
<div class = "container">
  <div class = "row">
    <div id="mi_capa" class="col-lg-12">
    </div>
  </div>
</div>
<?php footer('Alvaro Javier Vanegas Ochoa --- alvarovanegas18@gmail.com'); ?>