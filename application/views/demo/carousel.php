<style type="text/css">
  h2{   
    color: #666;
  }
</style>

<?php

$elements_images = array(
  'slider/5.jpg',
  'slider/6.jpg',
  'slider/8.jpg',
  'slider/haceb.jpg'
);
caruosel($elements_images, array('id'=>'a', 'class_images'=>'width_100 max_width_600_px', 'class_slide'=>'bg_dark_gray text_white'));
?>