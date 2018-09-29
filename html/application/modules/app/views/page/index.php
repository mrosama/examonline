<?php
$this->load->helper('url');
$this->load->helper('html');
$base= base_url("html/application/modules/app/views/layouts/default/");
?>
<script type="text/javascript" src="<?php echo  $base;?>/js/rounded_corners_lite.inc.js"></script>
<link href="<?php echo $base;?>/css/themes.css" rel="stylesheet" type="text/css" media="all" />
<title><?php echo @$page['title'];?></title>
<script type="text/javascript">
		jQuery(document).ready(function() {
		
		jQuery("#s2f").fancybox({
				'width'				: '75%',
				'height'			: '75%',
				'autoScale'			: false,
				'transitionIn'		: 'none',
				'transitionOut'		: 'none',
				'type'				: 'iframe'
			});
		
		})
        </script>
        
   <table width="90%" align="center" dir="ltr">
<tr> <td> <div     id="info_1" class="roundedCorner" >
<TABLE cellSpacing=0   cellPadding=0  border="0" width="100%">
  <TBODY>
  <TR vAlign=top>
      <TD width='10px' >
      
 </TD>
    <TD width='20%'  height="20px">   
    
 </TD>
      <TD width="60%" class="myselect" align="right" valign="middle"><?php echo @$page['title'];?></TD>
        <TD width=10 valign="middle">
<CENTER><IMG src="<?php echo $base;?>/img/Sites.png"  /></CENTER></TD>
    <TD width=10></TD></TR></TBODY></TABLE>
    </div>  </td></tr>
 </table>
 
 <!--*****************************************-->      
        
        
        
 

<?php


 $this->load->library('Msg');
if(@$pageerror=='error'){
 echo $this->msg->SendMsg(' الصفحات ','    الصفحة غير متوفرة',3);

} else {
?>
<table align="center" width="100%">
<tr><td align="right">
 <span style="float:right">
 <br/>
<?php
echo nl2br($page['content']);
?></span>
<br/>
</td></tr></table>

 <fieldset >
<table align="left" width="15%">
<tr>
<td></td>
<td>
<?php
if($page['allow_fav']=="YES"){
?>
<a href="javascript:addBookmark('<?php echo @$page['title'];?>','')">
<img src="<?php echo $base;?>/img/14.png" width="16" border="0" alt="Favorite" title="Favorite" /></a>
<?php
}
?>
</td>


<td><?php

$atts3 = array(
              'width'      => '800',
              'height'     => '600',
              'scrollbars' => 'yes',
              'status'     => 'yes',
              'resizable'  => 'yes',
              'screenx'    => '0',
              'screeny'    => '0'
            );
if($page['allow_pdf']=="YES"){
echo anchor_popup("app/page/pdf/page_no/$page[ID]",img(array("src"=>"$base/img/pdf_button.png","border"=>0)), $atts3);
}
?></td>



<td><?php

$atts1 = array(
              'width'      => '800',
              'height'     => '600',
              'scrollbars' => 'yes',
              'status'     => 'yes',
              'resizable'  => 'yes',
              'screenx'    => '0',
              'screeny'    => '0'
            );
if($page['allow_print']=="YES"){
echo anchor_popup("app/page/prints/page_no/$page[ID]",img(array("src"=>"$base/img/print1.gif","border"=>0)), $atts1);
}
?></td>
<td>




<?php

if($page['allow_send']=="YES"){
echo anchor("app/page/s2f/page_no/$page[ID]",img(array("src"=>"$base/img/user.png","border"=>0)),"id='s2f'");
}
?></td>
</tr>
</table>

</fieldset>
 
 
 

<?php
}
?>
 


<script type="text/javascript">
settings = {tl: { radius: 6 },tr: { radius: 6 },bl: { radius: 6 },br: { radius: 6 },antiAlias: true,autoPad: true,validTags: ["div"]}
 var myBoxObject = new curvyCorners(settings, "roundedCorner");
 myBoxObject.applyCornersToAll();
</script>