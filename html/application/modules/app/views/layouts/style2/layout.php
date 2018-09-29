<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Page-Enter"
content="progid:DXImageTransform.Microsoft.ZigZag(Motion='in', ZigZagStyle='circle')">
<meta name="description" content="{$CFG['description']}">
<meta name="keywords" content="{$CFG['keywords']}">
<meta name="Author" content="{$CFG['Author']}">


<?php
$this->load->helper('url');
$base= base_url("html/application/modules/app/views/layouts/style2/");
 ?>



<link href="<?php echo $base;?>/css/styles.css" rel="stylesheet" type="text/css" media="all" />



<title>{$CFG['sitename']}</title>
</head>



<body>


<table width="100%" border="0">
  <tr>
    <td colspan="3" valign="top"     >
    
    <table align="center" width="100%">
    <tr><td align="left"  > 
 
<?php
echo modules::run("app/app/language");
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
<li class='first-link white'> <span class='bullet'>&middot;</span> <a href='?action=home'><span> الرئيسية  </span></a></li>  &nbsp;
<li class='first-link white'> <span class='bullet'>&middot;</span> <a href='?action=Page&do=show&id=15'><span> من نحن  </span></a></li>&nbsp;
<li class='first-link white'> <span class='bullet'>&middot;</span> <a href='?action=sitemap'><span> خريطة الموقع </span></a></li>&nbsp;    
<li class='first-link white'> <span class='bullet'>&middot;</span> <a href="javascript:addBookmark('{$CFG['sitename']}','')"><span> اضف للمفضلة  </span></a></li>  &nbsp;
<li class='first-link white'> <span class='bullet'>&middot;</span> <a href="#" onClick="this.style.behavior='url(#default#homepage)'; this.setHomePage('http://www.google.com');"><span>أجعلنا الرئيسية </span></a></li> &nbsp; 
<li class='first-link white'> <span class='bullet'>&middot;</span> <a href='?action=contact'><span>أتصل بنا </span></a></li>
 
</ul></td>
 
<td class='sub-header-right'>
</td>
</tr>
<tr>
   
  <td class='side-body' colspan="3">
  <table align="center" width="100%" border="0" dir="ltr" cellpadding="0" cellspacing="0">
  <tr><td width="80%"><marquee id="newsbar" behavior= "scroll" align= "center" scrollamount= "2" scrolldelay= "70" onmouseover='this.stop()' onmouseout='this.start()' direction="right" >{$NewsBar}</marquee></td><td>
  <table>
  <tr>
  <td><img src="../img/iTickerPL.gif" onclick="move(3)"></td>
   <td><img src="view/application/style_def_ar/img/iTickerPS.gif" onclick="move(2)"></td>
    <td><img src="view/application/style_def_ar/img/iTickerPP.gif" onclick="move(4)"></td>
     <td><img src="view/application/style_def_ar/img/iTickerPR.gif" onclick="move(1)"></td>
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

تسجيل الدخول
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

إستبيان
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
الصفحات خارجية
</td></tr></table>




       
   <table cellpadding='0' cellspacing='0' width='100%' dir="rtl">
<tr>
<td class='scapmain-left'></td>
<td class='scapmain'>الصفحات خارجية</td>
<td class='scapmain-right'></td>
</tr>
</table>
<table cellpadding='0' cellspacing='0' width='100%' class='spacer' dir="rtl">
<tr>
<td class='side-body'>
الصفحات خارجية
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

{$counters}

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

{$counters}

</td></tr></table>   
    
    
 <p align="center">advert </p>
    
    
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

<ul class="mainlink">
<li><a href='?action=home'  >الرئيسية</a></li>
<li><a href='?action=articles' class='side'>مقالات</a></li>
<li> <a href='?action=media' class='side'>وسائط</a></li>
<li><a href='?action=alboum' class='side'>البوم الصور</a></li>
<li><a href='?action=dalel' class='side'>دليل المواقع</a></li>
<li> <a href='?action=guestbook' class='side'>سجل الزوار</a></li>
<li><a href='?action=book' class='side'>مكتبة الكتب</a></li>
<li><a href='?action=pro' class='side'>مكتبة البرامج</a></li>
<li><a href='?action=product' class='side'>المنتجات</a></li>
<li><a href='?action=trans' class='side'>قاموس الترجمة</a></li>
</ul>

 


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

{$counters}

</td></tr></table>   

    
    
      <!-- main1-->
    <table cellpadding='0' cellspacing='0' width='100%' dir="rtl">
<tr>
<td class='scapmain-left'></td>
<td class='scapmain'>الدعم الفني</td>
<td class='scapmain-right'></td>
</tr>
</table>
<table cellpadding='0' cellspacing='0' width='100%' class='spacer' dir="rtl">
<tr>
<td class='side-body' align="center">
{if $LiveX['view'] eq "YES"}
<a href="javascript:popupWindow('public/loader/front/ls_tpl.php','LiveSupport','700','500');">
<img src="view/application/style_def_ar/img/staffonline.gif" border="0">
<img src="view/application/style_def_ar/img/livehelp-chat-btn_20100713.gif" border="0">
</a>
{else}
<a href="javascript:popupWindow('public/loader/front/ls_tpl.php','LiveSupport','700','500');">
<img src="view/application/style_def_ar/img/staffoffline2.gif" border="0"></a>
{/if}
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

<marquee behavior="scroll" direction="up"  scrollamount= "1" scrolldelay= "70" onmouseover='this.stop()' onmouseout='this.start()' >
{$mygift}
</marquee>


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

{$counters}

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
{/if}