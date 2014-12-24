<?php
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