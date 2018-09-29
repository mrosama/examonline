<?php
$this->load->library("Configer");
$Setting=$this->configer->getConfiger();
 $this->load->helper('html');
$this->load->helper('url');
$base= base_url("html/application/modules/app/views/layouts/default/");
 ?>

<html>
<head>

<script type="text/javascript">
	function log_out()
{

var msg="هل ترغب في تسجيل الخروج من لوحة التحكم";
	ht = document.getElementsByTagName("body");
	
	ht[0].style.filter = "progid:DXImageTransform.Microsoft.BasicImage(grayscale=1)";

var sheet = document.createElement('style')
sheet.innerHTML = "*{-moz-opacity: 0.5;filter:alpha(opacity=30);opacity:.30;background-color: #f9f9f9}";
document.body.appendChild(sheet);

	if (confirm(msg))
	{
		return true;
	}
	else
	{
		ht[0].style.filter = "";
		sheet.innerHTML = "";
		return false;
	}
}




</script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Page-Enter"
content="progid:DXImageTransform.Microsoft.ZigZag(Motion='in', ZigZagStyle='circle')">
<meta name="description" content="<?php echo $Setting['description'];?>">
<meta name="keywords" content="<?php echo $Setting['keywords'];?>">
<meta name="Author" content="<?php echo $Setting['Author'];?>">
<!---->
<script type="text/javascript" src="<?php echo  base_url('bin/fancybox/')?>/jquery-1.4.3.min.js"></script>
<script type="text/javascript" src="<?php echo  base_url('bin/fancybox/')?>/jquery.mousewheel-3.0.4.pack.js"></script>
<script type="text/javascript" src="<?php echo  base_url('bin/fancybox/')?>/jquery.fancybox-1.3.4.pack.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('bin/fancybox/')?>/jquery.fancybox-1.3.4.css" media="screen" />

<!---->
<link href="<?php echo $base;?>/css/themes.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="<?php echo $base;?>/js/js.js"></script>
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
-->
</style></head>
<?php
if($Setting["closesite"]=="YES"){
echo "<br/><br/><br/><table width='70%' align='center' style='border:1px #8FD8EF solid'><tr><td align='center'>$Setting[msg_close]</td></tr></table>";
exit();
}

?>


<?php
if($Setting["popup"]=="YES"){
?>
<script language="javascript">
popup('<?php echo  $Setting['popup_content'];?>','<?php echo  $Setting['popup_w'];?>','<?php echo  $Setting['popup_h'];?>');
</script>
<?php
}
?>

<?php
if($Setting["bgsound"]=="YES"){
?>
  <embed hidden=true  type="application/x-mplayer2" src="<?php echo base_url().'Media/'.$Setting['bgsound_src'];?>" height="0" width="0" autostart="true" loop="true">
<noembed><bgsound src="<?php echo base_url().'Media/'.$Setting['bgsound_src'];?>"  loop="<?php echo $Setting["bgsound_loop"]?>"></noembed>
<?php
}
?>

<!--////////////////////////////
-->

<script>
 jQuery(document).ready(function() {
		
		
		jQuery("#whoim").fancybox({
				'width'				: '89%',
				'height'			: '89%',
				'autoScale'			: true,
				'transitionIn'		: 'fade',
				'transitionOut'		: 'none',
				'type'				: 'iframe'
			});
		
		
		//////////
		
		
				jQuery("#contact").fancybox({
				'width'				: '89%',
				'height'			: '95%',
				'autoScale'			: true,
				'transitionIn'		: 'fade',
				'transitionOut'		: 'none',
				'type'				: 'iframe'
			});
		
		
					jQuery("#help").fancybox({
				'width'				: '89%',
				'height'			: '90%',
				'autoScale'			: true,
				'transitionIn'		: 'fade',
				'transitionOut'		: 'none',
				'type'				: 'iframe'
			});
		
		
		})
    </script>


<body>

<table align="center" width="100%" height="100%" border="0" cellpadding="1" cellspacing="2" style="border:1px #FFCC00 dotted">
<tr><td height="6%" class="menu">
<span style="float:left" class="dor">
<i>E-Exam For The development of E-learning Solutions</i>
</span>

<table   align="right" width="10%">
<tr>

<td>

<?php	  echo anchor('app/logout',img(array('src'=>"$base/img/control_power_blue.png",'border'=>0)),'onclick="return log_out()" title="تسجيل الخروج" '); 
?>
</td>
<td>
<?php echo anchor("app/page/index/page_no/1",img(array('src'=>"$base/img/question_blue.png",'border'=>0)),"id='help'");?>
</td>
<td>
<?php echo anchor("app/index",img(array('src'=>"$base/img/Home.png",'border'=>0)));?>
</td>

</tr>
</table>


</td><tr>

<tr><td height="87%"  valign="top"   style="border:1px #FBFAEC dotted">

<?php
$this->load->view($conten_page);
?>


</td></tr>





<tfoot>
<tr><td height="7%" class="menu">
<span style="float:left">
<table align="center"  >
<tr><td><img src="<?php echo $base;?>/img/linux[.png" width="24" ></td><td><img src="<?php echo $base;?>/img/microsoft.png" width="24" ></td>

<td class="dor">Powered By : Osama_eg@live.com</td>
<td>
<?php
echo modules::run('app/hitcounter');
?>
</td>

</tr>
</table>
</span>






<table   width="40%" align="right"   cellpadding="1" cellspacing="1">
<tr>
<td class="dor" align="right"><a href="javascript:addBookmark('Exam','')"><span> أضفنا للمفضلة   </span></a></td>
<td width="1%"><img src="<?php echo $base;?>/img/002_18.png" width="16" ></td>
<td class="dor" align="center">|</td>
<td class="dor" align="right"><?php echo anchor("app/contact","أتصل بنا","id='contact'");?></td>
<td width="1%"><img src="<?php echo $base;?>/img/002_18.png" width="16" ></td>
<td class="dor" align="center">|</td>
<td class="dor" align="right"> <?php echo anchor("app/page/index/page_no/2","من نحن","id='whoim'");?></td>
<td width="1%"><img src="<?php echo $base;?>/img/002_18.png" width="16" ></td>
<td class="dor" align="center">|</td>
<td  class="dor" align="right" ><?php echo anchor("app/index","الرئيسية");?></td>
<td width="1%"><img src="<?php echo $base;?>/img/002_18.png" width="16" ></td>
</tr>
</table>

</td></tr>
</tfoot>
</table>










</body>
</html>
