<?php
show_message($mensaje, array('auto_hide'=>true));

show_message($mensaje_correcto);
show_message($mensaje_informativo, array('type'=>'info'));
show_message($mensaje_advertencia, array('type'=>'warning'));
show_message($mensaje_error, array('type'=>'danger'));