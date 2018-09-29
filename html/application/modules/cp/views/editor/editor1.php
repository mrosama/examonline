   <?php
   
   $base=base_url("bin/Editor/CLEditor/");
   ?> 
    
    
    <link rel="stylesheet" type="text/css" href="<?php echo $base;?>/jquery.cleditor.css" />
    
    <script type="text/javascript" src="<?php echo $base;?>/js/jquery.cleditor.min.js"></script>
    <script type="text/javascript" src="<?php echo $base;?>/js/jquery.cleditor.advancedtable.min.js"></script>
    <script type="text/javascript" src="<?php echo $base;?>/js/jquery.cleditor.icon.min.js"></script>

    <script type="text/javascript">
	//var j = jQuery.noConflict();
      jQuery(document).ready(function() {
        jQuery("#input").cleditor()[0].focus();
      });
    </script>