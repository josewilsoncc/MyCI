<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>jQuery.Coverflow</title>

    <?php
    load_assets(array(
      'js' => array(
        'default/jquery/jquery.coverflow',
        'default/jquery/jquery.interpolate',
        'default/jquery/jquery.mousewheel.min',
        'default/jquery/jquery.touchSwipe.min',
        'default/jquery/reflection'
      )
    ));
    ?>
  </head>
  <body>

    <div id="menu"></div>

    <div id="preview">
      <div id="preview-coverflow">
        <img class="cover" src="<?php echo base_url(); ?>assets/images/demo/coverflow/attic.jpg"/>
        <img class="cover" src="<?php echo base_url(); ?>assets/images/demo/coverflow/aurora.jpg"/>
        <img class="cover" src="<?php echo base_url(); ?>assets/images/demo/coverflow/barbecue.jpg"/>
        <img class="cover" src="<?php echo base_url(); ?>assets/images/demo/coverflow/blackswan.jpg"/>
        <img class="cover" src="<?php echo base_url(); ?>assets/images/demo/coverflow/chess.jpg"/>
        <img class="cover" src="<?php echo base_url(); ?>assets/images/demo/coverflow/fire.jpg"/>
        <img class="cover" src="<?php echo base_url(); ?>assets/images/demo/coverflow/keyboard.jpg"/>
        <img class="cover" src="<?php echo base_url(); ?>assets/images/demo/coverflow/locomotive.jpg"/>
        <img class="cover" src="<?php echo base_url(); ?>assets/images/demo/coverflow/diveevo.jpg"/>
        <img class="cover" src="<?php echo base_url(); ?>assets/images/demo/coverflow/person.jpg"/>
        <img class="cover" src="<?php echo base_url(); ?>assets/images/demo/coverflow/rose.jpg"/>
        <img class="cover" src="<?php echo base_url(); ?>assets/images/demo/coverflow/seagull.jpg"/>
        <img class="cover" src="<?php echo base_url(); ?>assets/images/demo/coverflow/solarpower.jpg"/>
      </div>
      <style>
        #preview {
          padding-bottom: 100px;
        }
        #preview-coverflow .cover {
          cursor:		pointer;
          width:		320px;
          height:		240px;
          box-shadow:	0 0 4em 1em white;
        }
      </style>
      <script>
        $(function () {
          if ($.fn.reflect) {
            $('#preview-coverflow .cover').reflect();	// only possible in very specific situations
          }

          $('#preview-coverflow').coverflow({
            index: 6,
            density: 2,
            innerOffset: 50,
            innerScale: .7,
            animateStep: function (event, cover, offset, isVisible, isMiddle, sin, cos) {
              if (isVisible) {
                if (isMiddle) {
                  $(cover).css({
                    'filter': 'none',
                    '-webkit-filter': 'none'
                  });
                } else {
                  var brightness = 1 + Math.abs(sin),
                          contrast = 1 - Math.abs(sin),
                          filter = 'contrast(' + contrast + ') brightness(' + brightness + ')';
                  $(cover).css({
                    'filter': filter,
                    '-webkit-filter': filter
                  });
                }
              }
            }
          });
        });
      </script>
    </div>
  </body>
</html>
