<style type="text/css">
  h2{   
    color: #666;
    //padding-top: 90px;
    //font-size: 52px;
    //font-family: "trebuchet ms", sans-serif;    
  }
</style>

<?php

/*
$elements_images = array(
  'slider/5.jpg',
  'slider/6.jpg',
  'slider/8.jpg',
  'slider/haceb.jpg'
);*/
//caruosel($elements_images, array('id'=>'a', 'type'=>'hiden_images', 'hidden_images_title'=>'¡Ver nuevas promociones!', 'class_images'=>'width_100 max_width_600_px', 'class_slide'=>'bg_dark_gray text_white'));


$elements = array(
  '<br>Presentación 1' => array(
    'label' => 'Este es el primer ejemplo',
    'text' => 'Aquí puede poner el texto que desee, a manera de parrrafo.'
  ),
  '<br>Presentación 2' => array(
    'label' => 'Este es el segundo ejemplo',
    'text' => 'Aquí puede poner el texto que desee, a manera de parrrafo.'
  ),
  '<br>Presentación 3' => array(
    'label' => 'Este es el tercer ejemplo',
    'text' => 'Aquí puede poner el texto que desee, a manera de parrrafo.'
  ),
  '<br>Presentación 4' => array(
    'label' => 'Este es el cuarto ejemplo',
    'text' => 'Aquí puede poner el texto que desee, a manera de parrrafo.'
  )
);
caruosel($elements, array('id'=>'a', 'type'=>'basic', 'class_slide'=>'height_300_px text_center bg_dark_gray text_white', 'class_basic_title'=>'margin_0'));