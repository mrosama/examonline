<?php
if($this->session->userdata('CP_login')==false){
$this->load->helper('url');
redirect('cp/login', 'refresh');
} 

  $emailUnread=modules::run('cp/login/checklogin');
  
  //////////////
  
  $this->load->library("Configer");
  $defaultSetting=$this->configer->getConfiger();
 
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!--<meta http-equiv="Page-Enter"
content="progid:DXImageTransform.Microsoft.ZigZag(Motion='in', ZigZagStyle='circle')">
-->
<meta http-equiv="Page-Enter"
content="progid:DXImageTransform.Microsoft.Iris(Motion='in', IrisStyle='Wipe up
')">
<!--<meta http-equiv="Page-Enter"
content="progid:DXImageTransform.Microsoft.Iris(Motion='in', IrisStyle='Box in
')">-->
<title>لوحة التحكم</title>
<?php
$this->load->helper('html');
 $this->load->helper('url');
$base= base_url("html/application/modules/cp/views/layouts/");
 ?>
 
<link rel="shortcut icon" href="<?php echo $base?>/img/favicon.ico" type="image/x-icon">
<link rel="icon" href="<?php echo $base?>/img/favicon.ico" type="image/x-icon">

<SCRIPT type=text/javascript src="<?php echo $base;?>/js/js.js"></SCRIPT>
<SCRIPT type=text/javascript src="<?php echo $base;?>/js/rounded_corners_lite.inc.js"></SCRIPT>
<SCRIPT type=text/javascript src="<?php echo $base;?>/js/init.js"></SCRIPT>

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



<link href="<?php echo $base; ?>/css/<?php echo $defaultSetting['admin_style']?>" rel="stylesheet" type="text/css" media="all" />


<style>
.color-palette td {
	border-width: 1px 1px 1px;
	border-style:  solid solid solid;
	border-color:#777;
	height: 20px;
	line-height: 20px;
	width: 30px;
}

.myselectmodul {
width: 100%;
padding: 5px;
-webkit-border-radius: 5px;
-moz-border-radius: 5px;
border-radius: 5px;
border: 1px solid #cccccc;
font-size: 100%;
font-family:Tahoma;
text-shadow:#CC6600;
font-weight:bold;
}

</style>
</head>


<body   onerror="return false"    bgcolor="#FFFFFF" bottommargin="0"  topmargin="0"  marginheight="0" marginwidth="0"  >
<table width="100%" vspace="0"  cellpadding="0" cellspacing="0" align="center"   dir="ltr" height="100%" >
  <tr>
    <td valign="top" align="center"  ><!-- header -->
      <table align="right" width="100%" class="menu_m3"   dir="ltr" >
        <tr>
          <td width="120" align="left" dir="ltr" >
        
          
          <?php 
		   
	 
		  echo anchor('cp/login/logout',img("$base/img/Shutdown.png"),'onclick="return log_out()" title="تسجيل الخروج" '); 
		  
		  echo anchor('/',img("$base/img/myhome.png"),'target="_Blank" title="عرض الموقع الرئيسي" '); 
		  
		  ?>
		  	<script type="text/javascript" src="<?php echo  base_url('bin/fancybox/')?>/jquery-1.4.3.min.js"></script>
       	<script type="text/javascript" src="<?php echo  base_url('bin/fancybox/')?>/jquery.mousewheel-3.0.4.pack.js"></script>
	<script type="text/javascript" src="<?php echo  base_url('bin/fancybox/')?>/jquery.fancybox-1.3.4.pack.js"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('bin/fancybox/')?>/jquery.fancybox-1.3.4.css" media="screen" />
 	 	<script type="text/javascript">
		//var j = jQuery.noConflict();

		jQuery(document).ready(function() {
		
		jQuery("#myhelp").fancybox({
				'width'				: '75%',
				'height'			: '75%',
				'autoScale'			: false,
				'transitionIn'		: 'none',
				'transitionOut'		: 'none',
				'type'				: 'iframe'
			});
		
		})
		
		
		
		///////////////////////////////

function viewone(div){
 //alert
 
 var divc="#"+div;
var x=jQuery(divc).css("display");
 if(x=='none'){
 jQuery(divc).show("slow");
 }
 else {
 
 jQuery(divc).hide("slow");
 
 }
 
}
    </script>
       
       
       
       <!--tooltips-->
       <link href="<?php echo base_url('bin/tooltips/');?>/style-my-tooltips.css" rel="stylesheet" type="text/css" />
 
<script type="text/javascript" src="<?php echo base_url('bin/tooltips/');?>/jquery.style-my-tooltips.js"></script>
            <!--tooltips-->
<script type="text/javascript">  
jQuery(document).ready(function() {  
//applies to all elements with title attribute. Change to ".class[title]" to select only elements with specific .class and title
jQuery("[title]").style_my_tooltips({ 
tip_follows_cursor: "on", //on/off
tip_delay_time: 1000 //milliseconds
});  
}); 
</script>  
           
           
           
           

             
            <?php  echo anchor('cp/admin/help',img("$base/img/Help-copy.png"),'id="myhelp" title="عرض المساعدة" '); ?>
            </td>
          <td width="0"    align="left"  ></td>
          <td width="174"><table width="80%">
              <tr>
                <td  align="left" ><SPAN class=styling id=digitalclock1 dir="ltr" ></SPAN><SPAN class=styling id=digitalclock></SPAN>
   </td>
                <td>
                
            <!--    <img src="<?php echo $base;?>/img/help_f2.png" title="help" alt="" width="30" />-->
                
                 </td>
              </tr>
            </table></td>
          <td width="148" align="right" valign="middle" class="myselect4">
          
          <?php if(@$emailUnread >0){?>
          <img src="<?php echo $base;?>/img/Unread-Mail2.png" title="لديك رسالة بريدية جديدة" alt="" align="top"> 
          <?php }?>
          </td>
          <td width="10" align="right" class="myselect4" dir="ltr" >
           <?php 
		   if(@$emailUnread >0){
		   echo @$emailUnread;
		   }
		   ?> </td>
          <td width="30" align="right">&nbsp;&nbsp;</td>
          <td width="30" align="right">&nbsp;&nbsp;</td>
          <td width="0" align="right"  class="myselect4" dir="ltr" ></td>
          <td width="252" align="right">
          <span class="myselect4"><?php echo $this->session->userdata('CP_adminname')?></span> </td>
          <td width="92" align="center" class="myselect4"> /   مرحبا   </td>
          <td width="8" align="right"><!--<img src="img/user_55322.png">-->
            <span id="imgadmin" style="width:32px;height:32px"></span></td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td valign="top" align="center"><!--content-->
      <table width="100%">
        <tr>
          <td valign="top" align="center" class="menu_mcon"   ><!--//////////////// -->
            <!-- ///////////// -->
            <?php
$this->load->view($conten_page);
?>
            <!--content-->
            <div style="height:60%"></div></td>
          <td valign="top" width="20%" align="right" class="menu_m"  ><!--menu-->
            <table align="center" width="100%" cellpadding="0" cellspacing="6"  id="menu_cycle">
              <tr>
                <td align="right" class="myselect" width="90%" ><?php echo anchor("cp/admin/index","الرئيسية");?></td>
                <td align="right"   ><img src="<?php echo $base;?>/img/house.png"></td>
              </tr>
              <tr>
                <td colspan='2' height='1' bgcolor='#CCCCCC' ></td>
              </tr>
              <tr>
                <td align="right" class="myselect">
                <?php echo anchor("cp/admin/setting","إعدادات");?>
                </td>
                <td align="right"><img src="<?php echo $base;?>/img/page_advanced.png"></td>
              </tr>
              <tr>
                <td colspan='2' height='1' bgcolor='#CCCCCC'></td>
              </tr>
              <tr>
                <td align="right" class="myselect"><a href="" class="myselect"  >  </a>
                 <?php echo anchor("cp/admin/addadmin","المشرفين");?>
                </td>
                <td align="right"><img src="<?php echo $base;?>/img/page_skin.png"></td>
              </tr>
              <tr>
                <td colspan='2' height='1' bgcolor='#CCCCCC'></td>
              </tr>
              <tr>
                <td align="right" class="myselect"> 
                <?php echo anchor("cp/admin/vistor","الزوار");?>
                </td>
                <td align="right"><img src="<?php echo $base;?>/img/icon_user2.gif"></td>
              </tr>
              <tr>
                <td colspan='2' height='1' bgcolor='#CCCCCC'></td>
              </tr>
              <tr>
                <td align="right" class="myselect"> 
                <?php echo anchor("cp/admin/email","البريد");?>
                </td>
                <td align="right"><img src="<?php echo $base;?>/img/icl2e.gif"></td>
              </tr>
              <tr>
                <td colspan='2' height='1' bgcolor='#CCCCCC'></td>
              </tr>
          
             
              <tr>
                <td align="right" class="myselect"><a href="" class="myselect"  >
                 <?php echo anchor("cp/admin/backup","النسخ الاحتياطي");?>
                </td>
                <td align="right"><img src="<?php echo $base;?>/img/server.png"></td>
              </tr>
              <tr>
                <td colspan='2' height='1' bgcolor='#CCCCCC'></td>
              </tr>
              <tr>
                <td align="right" class="myselect">
                      <?php echo anchor("cp/media/index","إدارة الوسائط");?>
            </td>
                <td align="right"><img src="<?php echo $base;?>/img/mico_download.gif"></td>
              </tr>
              
              
              
              <tr>
                <td colspan='2' height='1' bgcolor='#CCCCCC'></td>
              </tr>
              
              
                        <tr>
                <td align="right" class="myselect">
                    
                      <a href="#" onclick="viewone('cat')">إدارة ألاقسام</a>
            </td>
                <td align="right"><img src="<?php echo $base;?>/img/icon-categories.gif"></td>
              </tr>
              
                 <tr>
                <td colspan='2'   >
                <div id="cat" style="display:none">
 
                
           <table width="100%">
           
                      <tr><td align="right"><?php  echo anchor('cp/categories/index/section/com_page',"أقسام الصفحات","class='myselect'"); ?>&nbsp;</td><td><img src="<?php echo $base;?>/img/key.png"></td></tr>
                      

                  <tr><td align="right"><?php  echo anchor('cp/categories/index/section/com_exam',"أقسام ألاختبارات","class='myselect'"); ?>&nbsp;</td><td><img src="<?php echo $base;?>/img/key.png"></td></tr>        

           </table> 
               
                     </div>
                
                
                
                </td>
              </tr>
              
              
              
              
                 <tr>
                <td colspan='2' height='1' bgcolor='#CCCCCC'></td>
              </tr>
              
              <tr>
                <td align="right" class="blocks">
                
                
<select name="nav"  class="myselectmodul"    onchange="location.href=this.value "  >
<option  value="<?php echo base_url("cp/index");?>"  selected="selected" class="option">-- -- -- -- -- --</option>

<option value="<?php echo base_url("cp/page/index");?>" class="option">صفحات</option>
<!--<option value="<?php echo base_url("cp/banner/index");?>" class="option">الاعلانات والبنارات</option>-->

 <option value="<?php echo base_url("cp/member/index");?>" class="option">الاعضاء</option>
  <option value="<?php echo base_url("cp/exam/index");?>" class="option">ألاختبارات</option>
                
   
                
</select>
                </td>
                <td align="right"><img src="<?php echo $base;?>/img/icon_edit.gif" alt="modual"></td>
              </tr>
              <tr>
                <td colspan='2' height='1' bgcolor='#CCCCCC'></td>
              </tr>
              <tr>
                <td colspan="2" align="center"><img src="<?php echo $base;?>/img/ti_02.png" width="75"><br/>
                  &nbsp; </td>
              </tr>
            </table></td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td valign="top" align="center"  class="menu_m3"><!--footer-->
     
        <table  width="100%" border="0"   >
          <tr>
            <td colspan="2"  align="center"   class="myselect4" ><img src="<?php echo $base;?>/img/php_power.png"  align="left" >&nbsp;Copyright © <?php echo date('Y');?> Admin  Panel. All Rights Reserved.</td>
          </tr>
        </table>
       </td>
  </tr>
</table>
<script type="text/javascript">
settings = {tl: { radius: 6 },tr: { radius: 6 },bl: { radius: 6 },br: { radius: 6 },antiAlias: true,autoPad: true,validTags: ["div"]}
 var myBoxObject = new curvyCorners(settings, "roundedCorner");
 myBoxObject.applyCornersToAll();
</script>
<script language="javascript">
function adminicon(){
var arr=new Array("user_32.png","user_32_.png");
var div=document.getElementById("imgadmin");
var num=Math.round(Math.random()*1);

div.innerHTML="<img src=<?php echo $base;?>/img/"+arr[num]+">";
 
setTimeout("adminicon()",1000);
	}
adminicon();

</script>
</body>
</html>
