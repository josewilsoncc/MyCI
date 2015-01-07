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
   'xy',
   'report_graphic'
  )
 )
));
?>
<div class = "container">
  <div class = "row">
    <div class = "col-lg-12">
      <div class='btn-group well' >
        <a  id="btn_bar3D"><buton type="button" class="btn btn-primary"> <span class="glyphicon glyphicon-stats"> bar3D</span> </buton></a>
        <a  id="btn_barClustered"><buton type="button" class="btn btn-primary"> <span class="glyphicon glyphicon-stats"> barClustered</span> </buton></a>
        <a  id="btn_columns3d"><buton type="button" class="btn btn-primary"> <span class="glyphicon glyphicon-stats"> columns3d</span> </buton></a>
        <a  id="btn_columnAndLineMix"><buton type="button" class="btn btn-primary"> <span class="glyphicon glyphicon-stats"> columnAndLineMix</span> </buton></a>
        <a  id="btn_columnCylinders"><buton type="button" class="btn btn-primary"> <span class="glyphicon glyphicon-stats"> columnCylinders</span> </buton></a>
        <a  id="btn_columnSimple"><buton type="button" class="btn btn-primary"> <span class="glyphicon glyphicon-stats"> columnSimple</span> </buton></a>
        <a  id="btn_pie3D"><buton type="button" class="btn btn-primary"> <span class="glyphicon glyphicon-stats"> pie3D</span> </buton></a>
        <a  id="btn_pieDonut3D"><buton type="button" class="btn btn-primary"> <span class="glyphicon glyphicon-stats"> pieDonut3D</span> </buton></a>
        <a  id="btn_pyramidChart3D"><buton type="button" class="btn btn-primary"> <span class="glyphicon glyphicon-stats"> pyramidChart3D</span> </buton></a>
      </div>
    </div>
    <br>
    <br>
    <div id="mi_capa" class="col-lg-12">
    </div>
  </div>
</div>
<?php footer('Alvaro Javier Vanegas Ochoa --- alvarovanegas18@gmail.com'); ?>