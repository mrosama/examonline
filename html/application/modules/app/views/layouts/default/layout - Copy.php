<?php
$this->load->library("Configer");
$Setting=$this->configer->getConfiger();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Page-Enter"
content="progid:DXImageTransform.Microsoft.ZigZag(Motion='in', ZigZagStyle='circle')">
<meta name="description" content="<?php echo $Setting['description'];?>">
<meta name="keywords" content="<?php echo $Setting['keywords'];?>">
<meta name="Author" content="<?php echo $Setting['Author'];?>">





<?php
$this->load->helper('url');
$base= base_url("html/application/modules/app/views/layouts/default/");
 ?>

<!---->
<script type="text/javascript" src="<?php echo  base_url('bin/fancybox/')?>/jquery-1.4.3.min.js"></script>
<script type="text/javascript" src="<?php echo  base_url('bin/fancybox/')?>/jquery.mousewheel-3.0.4.pack.js"></script>
<script type="text/javascript" src="<?php echo  base_url('bin/fancybox/')?>/jquery.fancybox-1.3.4.pack.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('bin/fancybox/')?>/jquery.fancybox-1.3.4.css" media="screen" />
<!---->

<link href="<?php echo $base;?>/css/styles.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="<?php  echo $base;?>/js/js.js" type="text/javascript"></script> 

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

 
</head>



<body>
 
<table width="100%" border="0" >
  <tr>
    <td colspan="3" valign="top">
    
    <table align="center" width="100%">
    <tr><td align="left"   valign="top"> 
 
<?php
//echo modules::run("app/app/language");
?> 
 
    </td><td  align="right" width="10%">  </td></tr>
    </table>
    
    </td>
  </tr>
  <tr>
    <td colspan="3" valign="top"   >
    
    <table cellpadding='0' cellspacing='0' width='100%' dir="rtl">
<tr>
<td class='sub-header-left'  >
  
</td>
<td class='sub-header'><ul>
<li class='first-link white'> <span class='bullet'>&middot;</span>
<?php echo anchor("app/index","الرئيسية");?>
</li>  &nbsp;

<li class='first-link white'> <span class='bullet'>&middot;</span>
 
 <?php echo anchor("app/page/index/page_no/19","من نحن");?>

 </li>&nbsp;
<li class='first-link white'> <span class='bullet'>&middot;</span> <a href='?action=sitemap'><span> خريطة الموقع </span></a></li>&nbsp;    
<li class='first-link white'> <span class='bullet'>&middot;</span> <a href="javascript:addBookmark('localhost','')"><span> اضف للمفضلة  </span></a></li>  &nbsp;
<li class='first-link white'> <span class='bullet'>&middot;</span> <a href="#" onClick="setHomepage();"><span>أجعلنا الرئيسية </span></a></li> &nbsp; 
<li class='first-link white'> <span class='bullet'>&middot;</span> 

<?php echo anchor("app/contact","أتصل بنا");?>
 </li>
 
</ul></td>
 
<td class='sub-header-right'>
</td>
</tr>
<tr>
   
  <td class='side-body' colspan="3">
  <table align="center" width="100%" border="0" dir="ltr" cellpadding="0" cellspacing="0">
  <tr><td width="80%"> 
  
   <?php
// modules::exists()
echo modules::run("app/news"); 
 ?>
 
  
  </td><td>
  <table>
  <tr>
  <td><img src="<?php echo $base;?>/img/btn_img_01.gif" onclick="move(3)"></td>
   <td><img src="<?php echo $base;?>/img/btn_img_03.gif" onclick="move(2)"></td>
     
     <td><img src="<?php echo $base;?>/img/btn_img_05.gif" onclick="move(1)"></td>
  </tr>
  </table>
  </td><td>&nbsp;شريط الاخبار</td></tr>
  </table>
  
  </td>
 
</tr>
</table>
    
    </td>
  </tr>
  <tr>
    <td width="20%" valign="top">
        
   <table cellpadding='0' cellspacing='0' width='100%' dir="rtl">
<tr>
<td class='scapmain-left'></td>
<td class='scapmain'>تسجيل الدخول</td>
<td class='scapmain-right'></td>
</tr>
</table>
<table cellpadding='0' cellspacing='0' width='100%' class='spacer' dir="rtl">
<tr>
<td class='side-body'>

<?php
// modules::exists()
echo modules::run("app/member/index"); 
 ?>
</td></tr></table>



   <table cellpadding='0' cellspacing='0' width='100%' dir="rtl">
<tr>
<td class='scapmain-left'></td>
<td class='scapmain'>إستبيان</td>
<td class='scapmain-right'></td>
</tr>
</table>
<table cellpadding='0' cellspacing='0' width='100%' class='spacer' dir="rtl">
<tr>
<td class='side-body'>

<?php
echo modules::run('app/poll/index');

?>

</td></tr></table>


    
    
 
   

<!-- main1-->
       
   <table cellpadding='0' cellspacing='0' width='100%' dir="rtl">
<tr>
<td class='scapmain-left'></td>
<td class='scapmain'>القائمة البريدية</td>
<td class='scapmain-right'></td>
</tr>
</table>
<table cellpadding='0' cellspacing='0' width='100%' class='spacer' dir="rtl">
<tr>
<td class='side-body'>
<?php
// modules::exists()
echo modules::run("app/maillist/index"); 
 ?>
</td></tr></table>




       
   <table cellpadding='0' cellspacing='0' width='100%' dir="rtl">
<tr>
<td class='scapmain-left'></td>
<td class='scapmain'>الصفحات </td>
<td class='scapmain-right'></td>
</tr>
</table>
<table cellpadding='0' cellspacing='0' width='100%' class='spacer' dir="rtl">
<tr>
<td class='side-body'>

 

<?php
echo modules::run('app/page/lastpage');

?>


</td></tr></table>

    
    
   <!-- main1-->
    <table cellpadding='0' cellspacing='0' width='100%' dir="rtl">
<tr>
<td class='scapmain-left'></td>
<td class='scapmain'>عدد الزوار</td>
<td class='scapmain-right'></td>
</tr>
</table>
<table cellpadding='0' cellspacing='0' width='100%' class='spacer' dir="rtl">
<tr>
<td class='side-body' dir="ltr" align="center">

<?php
echo modules::run('app/hitcounter');
?>

</td></tr></table>
    <!-- main1-->      
    
   
<table cellpadding='0' cellspacing='0' width='100%' dir="rtl">
<tr>
<td class='scapmain-left'></td>
<td class='scapmain'>المتواجدون في الموقع</td>
<td class='scapmain-right'></td>
</tr>
</table>
<table cellpadding='0' cellspacing='0' width='100%' class='spacer' dir="rtl">
<tr>
<td class='side-body' dir="ltr" align="center">
 <?php
echo modules::run("app/vistors/index"); 
 ?>
</td></tr></table>   
    
    
 <p align="center">
 <?php
// modules::exists()
echo modules::run("app/banner/index",2); 

 ?>
 
  </p>
    
     <p align="center">
      <?php
echo modules::run("app/banner/index",3); 
 ?>
     
     </p>
     
       <p align="center">
      <?php
echo modules::run("app/banner/index",4); 
 ?>
     
     </p>   
       </td>
    <td valign="top">
    
    <table align="center" width="100%">
    <tr><td align="center" valign="top"  >
             <?php
$this->load->view($conten_page);
?>
    
    </td></tr>
    
    </table>
    
   
    
    </td>
    
    <td width="20%" valign="top">
    
<!-- main1-->
    
    <table cellpadding='0' cellspacing='0' width='100%' dir="rtl">
<tr>
<td class='scapmain-left'></td>
<td class='scapmain'>الرئيسية</td>
<td class='scapmain-right'></td>
</tr>
</table>
<table cellpadding='0' cellspacing='0' width='100%' class='spacer' dir="rtl">
<tr>
<td class='side-body' align="right">


<table align="center" width="100%" cellpadding="0" cellspacing="3" dir="ltr">
<tr><td align="right"><?php echo anchor("app/index","الرئيسية");?></td><td width="1%" ><?php echo img("$base/img/ZA010077668.gif");?></td></tr>
<tr><td colspan="2" height="1px" bgcolor="#CCCCCC"></td></tr>

<tr><td align="right"><?php echo anchor("app/articles/cat","مقالات");?></td><td width="1%"><?php echo img("$base/img/ZA010077668.gif");?></td></tr>
<tr><td colspan="2" height="1px" bgcolor="#CCCCCC"></td></tr>

<tr><td align="right"><?php echo anchor("app/multimedia/cat","وسائط");?></td><td width="1%"><?php echo img("$base/img/ZA010077668.gif");?></td></tr>
<tr><td colspan="2" height="1px" bgcolor="#CCCCCC"></td></tr>


<tr><td align="right"><?php echo anchor("app/album/cat","البوم الصور");?></td><td width="1%"><?php echo img("$base/img/ZA010077668.gif");?></td></tr>
<tr><td colspan="2" height="1px" bgcolor="#CCCCCC"></td></tr>

<tr><td align="right"><?php echo anchor("app/dalel/cat","دليل المواقع");?></td><td width="1%"><?php echo img("$base/img/ZA010077668.gif");?></td></tr>
<tr><td colspan="2" height="1px" bgcolor="#CCCCCC"></td></tr>

<tr><td align="right"><?php echo anchor("app/book/cat","مكتبة الكتب");?></td><td width="1%"><?php echo img("$base/img/ZA010077668.gif");?></td></tr>
<tr><td colspan="2" height="1px" bgcolor="#CCCCCC"></td></tr>

<tr><td align="right"><?php echo anchor("app/program/cat","مكتبة البرامج");?></td><td width="1%"><?php echo img("$base/img/ZA010077668.gif");?></td></tr>
<tr><td colspan="2" height="1px" bgcolor="#CCCCCC"></td></tr>

<tr><td align="right"><?php echo anchor("app/product/cat","المنتجات");?></td><td width="1%"><?php echo img("$base/img/ZA010077668.gif");?></td></tr>
<tr><td colspan="2" height="1px" bgcolor="#CCCCCC"></td></tr>

<tr><td align="right"><?php echo anchor("app/trans","قاموس الترجمة");?></td><td width="1%"><?php echo img("$base/img/ZA010077668.gif");?></td></tr>
<tr><td colspan="2" height="1px" bgcolor="#CCCCCC"></td></tr>

<tr><td align="right"><?php echo anchor("app/guestbook/index","سجل الزوار");?></td><td width="1%"><?php echo img("$base/img/ZA010077668.gif");?></td></tr>
<tr><td colspan="2" height="1px" bgcolor="#CCCCCC"></td></tr>

<tr><td align="right"><?php echo anchor("app/page/cat","الصفحات");?></td><td width="1%"><?php echo img("$base/img/ZA010077668.gif");?></td></tr>
<tr><td colspan="2" height="1px" bgcolor="#CCCCCC"></td></tr>


</table>
 
 
 

</td>
</tr>
</table>

<!-- end main1-->

<table cellpadding='0' cellspacing='0' width='100%' dir="rtl">
<tr>
<td class='scapmain-left'></td>
<td class='scapmain'>سلة التسوق</td>
<td class='scapmain-right'></td>
</tr>
</table>
<table cellpadding='0' cellspacing='0' width='100%' class='spacer' dir="rtl">
<tr>
<td class='side-body' dir="ltr" align="center">

 <?php
echo modules::run('app/product/cart');

?>

</td></tr></table>   

    
    
      <!-- main1-->
    <table cellpadding='0' cellspacing='0' width='100%' dir="rtl">
<tr>
<td class='scapmain-left'></td>
<td class='scapmain'>ألبوم الصور</td>
<td class='scapmain-right'></td>
</tr>
</table>
<table cellpadding='0' cellspacing='0' width='100%' class='spacer' dir="rtl">
<tr>
<td class='side-body' align="center">
 
 <?php
echo modules::run('app/album/lastpage');

?>
 
 
 
 
 </td></tr></table>
    <!-- main1-->    
    
    
    
         <!-- main1-->
    <table cellpadding='0' cellspacing='0' width='100%' dir="rtl">
<tr>
<td class='scapmain-left'></td>
<td class='scapmain'>الاهداءات</td>
<td class='scapmain-right'></td>
</tr>
</table>
<table cellpadding='0' cellspacing='0' width='100%' class='spacer' dir="rtl">
<tr>
<td class='side-body'>
 <?php
echo modules::run("app/greeting/index"); 
 ?>
</td></tr></table>
    <!-- main1-->   
    

<table cellpadding='0' cellspacing='0' width='100%' dir="rtl">
<tr>
<td class='scapmain-left'></td>
<td class='scapmain'>منتجات مختارة</td>
<td class='scapmain-right'></td>
</tr>
</table>
<table cellpadding='0' cellspacing='0' width='100%' class='spacer' dir="rtl">
<tr>
<td class='side-body' dir="ltr" align="center">

 <?php
echo modules::run("app/product/lastpage"); 
 ?>

</td></tr></table>   



<table cellpadding='0' cellspacing='0' width='100%' dir="rtl">
<tr>
<td class='scapmain-left'></td>
<td class='scapmain'>دليل المواقع</td>
<td class='scapmain-right'></td>
</tr>
</table>
<table cellpadding='0' cellspacing='0' width='100%' class='spacer' dir="rtl">
<tr>
<td class='side-body' dir="ltr" align="center">

 <?php
echo modules::run("app/dalel/lastpage"); 
 ?>

</td></tr></table>   



    
    
    
     </td>
  </tr>
  <tr>
    <td colspan="3" valign="bottom"  >
    <span id="dd" class="main_footers" >
 <table cellpadding='0' cellspacing='0' width='100%' bgcolor="#606060"  class="side-body" >
<tr>
<td align='center' ><center>&copy; Controller <?php echo date('Y');?>/<?php echo date('Y')+1;?></center><br /><br />
<span style='font-size:10px' dir='ltr'> Powered by <a href='mailto:osama_eg@live.com'>osama_eg@live.com</a> copyright &copy; 2010 - 2011  </span><br />
 </td>
</tr>
</table>
</span>
</td>
  </tr>
</table>

 
</body>
</html>
<?php
/*
///////*end cache
@$obj->end();
///////*end cache
}
*/
?>
