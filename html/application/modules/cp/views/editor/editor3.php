   <?php
   
   $base=base_url("bin/Editor/elrte/");
   ?> 

	<!-- jQuery and jQuery UI -->
 
<script src="<?php echo $base;?>/js/jquery-ui-1.8.5.custom.min.js" type="text/javascript" charset="utf-8"></script>
<script src="<?php echo $base;?>/js/elrte.min.js" type="text/javascript" charset="utf-8"></script>
<script src="<?php echo $base;?>/js/i18n/elrte.ar.js" type="text/javascript" charset="utf-8"></script>
<link rel="stylesheet" href="<?php echo $base;?>/js/ui-themes/smoothness/jquery-ui-1.8.5.custom.css" type="text/css" media="screen" charset="utf-8">
<link rel="stylesheet" href="<?php echo $base;?>/css/elrte.full.css" type="text/css" media="screen" charset="utf-8">
<script type="text/javascript" charset="utf-8">
		jQuery(document).ready(function() {
			var opts = {
				cssClass : 'el-rte',
				 lang     : 'ar',

				height   : 250,
				toolbar  : 'maxi',
				cssfiles : ['css/elrte-inner.css']
			}
		   jQuery('#input').elrte(opts);
       })
</script>