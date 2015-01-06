<?php
load_assets(array(
 'js' => array(
  'demo/amcharts' => array(
   'amcharts',
   'funnel',
   'gauge',
   'pie',
   'radar',
   'serial',
   'xy',
   'themes' => array(
    'black',
    'chalk',
    'dark',
    'light',
    'patterns'
   )
  )
 )
));
?>

<div class = "container">
  <div class = "row">
    <div class = "col-lg-12">
      <div class='btn-group well' >
        <a href="#" id="btn_bar3D"><buton type="button" class="btn btn-primary"> <span class="glyphicon glyphicon-stats"> bar3D</span> </buton></a>
        <a href="#" id="btn_barClustered"><buton type="button" class="btn btn-primary"> <span class="glyphicon glyphicon-stats"> barClustered</span> </buton></a>
        
      </div>
    </div>

    <br>
    <br>

    <div id="mi_capa" class="col-lg-12 graficos">
    </div>

  </div>
</div>