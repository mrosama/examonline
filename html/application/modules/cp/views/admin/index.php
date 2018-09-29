<?php
error_reporting(5);
$this->load->model('admin_model');
$this->admin_model->CheckPremision();
$this->load->helper('html');
$this->load->helper('jimage');
 $this->load->helper('url');
  $this->load->library('FileSystems');
?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<script type="text/javascript" src="<?php echo base_url("html/application/modules/cp/views/admin/img/");?>/yetii.js"></script>
<style type="text/css">
html, body, h2, h3, ul, ol, li, pre, p {
	margin: 0;
	padding: 0;
	font-family: tahoma;
	font-size: 11px;
	direction: rtl;

}

html, body {
*height: 100%;
}

body {
/*background: #F5F5F5;*/
 background: #F5F5F5; 
font-family: Verdana, Arial, Helvetica, sans-serif;
font-size: small;
color: #333;
}

h2 {
	font-size: 16px;
	margin: 20px 0;
	color: #000;
	font-family: arial;
}

ul, ol {
margin: 0 0 20px 0;
}

ul {
list-style-type: square;
}

li {
margin-left: 40px;
line-height: 150%;
}

code {
font-size: 100%;
}

pre {
font-size: 100%;
border: 1px solid #ccc;
padding: 5px 10px;
color: #000;
margin: 0 0 20px 0;
color: #999;
}

small {
color: #aaa;
}

a {
text-decoration: none;
color: #000;
font-weight: bold;
}

#wrapper {
width: 100%;
margin: auto;
background: #fff;
height: 100%;
border-left: 25px solid #FAFAFA;
border-right: 25px solid #FAFAFA;
 
}

#wrapper-inner {
padding: 40px 20px 20px 20px;
}
#aldirazi {
	width: 100%;
	margin: 0 0 20px 0;
}

#aldirazi p {
margin: 0;
}

#aldirazi h3 {
margin: 0 0 8px 0;
padding: 0;
font-size: 100%;
}

ul#aldirazi-nav {
margin: 0;
padding: 0;
list-style-type: none;
width: 100%;
float: right;
background: url(<?php echo base_url("html/public/modules/cp/views/admin/img/");?>/pixel.gif) bottom left repeat-x;
}

ul#aldirazi-nav li {
	margin: 0 2px 0 0;
	padding: 0;
	float: right;
}
/*
ul#aldirazi-nav a {
	border-style: solid;
	border-width: 1px;
	border-color: #ccc;
	float: right;
	display: block;
	padding: 4px 8px;
	border-bottom: 0;
	color: #666;
	background: #fdfae7;
}
*/
ul#aldirazi-nav a:hover {
background: #fff;
}

ul#aldirazi-nav a.active {
background: #fff;
padding-bottom: 5px;
cursor: default;
}


#aldirazi-tabs {
	border-style: solid;
	border-width: 1px;
	border-color: #ccc;
	clear: left;
	border-top: 0;
	padding-top: 8px;
	background-color: #FFFFFF;
}
#aldirazi .tab {
	padding: 0 8px 8px 8px;
	background-color: #FFFFFF;
}
.Tabber {
	text-align: center;
	padding: 2px;
	margin: 2px;
}








 
table.adminlist tr:nth-child(even) { background: #f9f9f9}
table.adminlist tr:nth-child(odd) { background: #FFF}

table.adminlist{border:1px solid #c3c3c3;border-collapse:collapse}
table.adminlist th{background-color:#e5eecc;border:1px solid #c3c3c3;padding:3px}
table.adminlist td{
/*border:1px solid #c3c3c3;padding:3px;   old style*/
border:1px dotted #c3c3c3;padding:3px;
border-bottom: 1px  #555 dotted;padding:3px;
}




 
 
 

.scrollable2 {
	overflow: scroll; 
	overflow: -moz-scrollbars-vertical; 
	overflow-x: hidden; 
	overflow-y: scroll;
	height:600px;
	width:100%
}

 
 

</style>

<script type="text/javascript">
function validate_pop(myform){

if(myform.popup.value=="YES"){

if(myform.popup_h.value==""){
alert('أدخل العرض');
return false;
}

else if(myform.popup_w.value==""){
alert('أدخل الطول');
return false;
}

else if(myform.popup_content.value==""){
alert('أدخل محتوي الاعلان');
return false;
}

else {
return true;
}

}
else {

return true;
} 




}



/*-----------*/
function validate_bg(myform){
var pattern=new RegExp("^(.+)\\.(MID|AU|WAV)$","i");

if(myform.old_file.value=="" && pattern.test(myform.file1.value)==false){
alert("نوع الملف غير مسموح بة");
return false;
}
else {
return true;
}

}


</script>


</head>

<body>
 
<div class="Tabber">

<div id="aldirazi">

    <ul id="aldirazi-nav">
    <li><a href="#tab1">   إحصائيات</a></li>
    <li><a href="#tab2">  معلومات PHP</a></li>
    <li><a href="#tab3">نوافذ وخلفيات</a></li>
    <li><a href="#tab4">مشرفون متواجون الان</a></li>
    </ul>
    
    <div id="aldirazi-tabs">
    
        <div class="tab" id="tab1">
 <br/>
 
<table width="99%" border="1"      cellpadding="0" cellspacing="3" class="border_table1" >
 <tr><td >
 <table class="widefat fixed" cellspacing="0" border="0" width="90%" dir="ltr">
    <thead>
      <tr>
           <th width="38%" align="center"  id="rating"></th>
  <th width="11%" align="center"  id="rating"></th>
        <th width="8%" align="center"  id="rating"></th>
  <th width="21%" align="center"  id="rating"></th>
  <th width="7%" align="center"  id="rating"></th>
<th width="15%" align="right" id="rating">إحصائيات &nbsp;<img src="<?php echo base_url("html/application/modules/cp/views/layouts/img/hits.gif");?>" /></th>
</tr>
    </thead>
 
<tbody>
<tr>

<td class="column-rating" align="right">&nbsp;</td>
<td class="column-rating" align="left">&nbsp;</td>

<td class="column-rating" align="right">&nbsp;</td>
 
<td class="column-rating" align="right"><font color="#FF0000"><?php echo $this->admin_model->getAdminTotal();?></font></td>
<td class="column-rating"   align="left" colspan="2">المشرفين /المدراء</td>
</tr>
 
 <tr>

<td class="column-rating" align="right">&nbsp;</td>
 

<td class="column-rating" align="right">&nbsp;</td>
<td class="column-rating" align="left">&nbsp;</td>
<td class="column-rating" align="right"><font color="#FF0000"><?php echo $this->admin_model->getmailTotal();?></font></td>
<td class="column-rating"   align="left" colspan="2">رسائل جديدة</td>
</tr>
 
  <tr>

<td class="column-rating" align="right">&nbsp;</td>
 

<td class="column-rating" align="right">&nbsp;</td>
<td class="column-rating" align="left">&nbsp;</td>
<td class="column-rating" align="right"><?php

$size=$this->filesystems->directorySize("./Media/");
 
echo "<font color='red'>".$this->filesystems->__FormatSize($size).'</font>';
?>   </td>
<td class="column-rating"   align="left" colspan="2">حجم مجلد الوسائط</td>
</tr>


 <tr>

<td class="column-rating" align="right">&nbsp;</td>
 
<td class="column-rating" align="right">&nbsp;</td>
<td class="column-rating" align="left">&nbsp;</td>
<td class="column-rating" align="right">&nbsp;</td>
<td class="column-rating"   align="left" colspan="2">&nbsp;</td>
</tr>
<td class="column-rating" align="right" colspan="3">
<br/>
<?php
if(fsockopen("www.google.com", 80)){
if(function_exists('disk_free_space')){
$free = disk_free_space("/");
$total=disk_total_space("/");
$caps=$total-$free;
 
$s=($caps/$total)*100; 
 $c=($free/$total)*100; 
 } else {
 $s=60;
 $c=40;
 
 }
 
?>
<img src="http://chart.apis.google.com/chart?chs=300x150&cht=p3&chco=336699&chd=t:<?php  echo $s;?>,<?php  echo $c;?>
&chdl= المساحة+المستهلكة| المساحة+المتوفرة
&chtt=مساحة++القرص
&chts=FF0000,11.5"   />  
<?php
}else {

echo  img(base_url("bin/Chart/chart2.png"));

 }
?></td>

<td class="column-rating" align="right" colspan="3">
<br/>
<?php
if(fsockopen("www.google.com", 80)){

 for($i=0;$i<7;$i++){
 $timex[]= mktime(0, 0, 0, date("m"), date("d")-$i,  date("Y"));
 $d= mktime(0, 0, 0, date("m"), date("d")-$i,  date("Y"));
 $thedate=date('Y-m-d',$d);
  
 $days[]=date('D',$d);
$vRank[]=$this->admin_model->numVistor($thedate);
 } 
 
$dy=implode('|',$days);
$ts=implode(',',$vRank);

 ?>
<img src="http://chart.apis.google.com/chart?chxl=0:|0|<?php echo $dy;?>
&chxt=x,y&chs=400x150&cht=lc&chco=76A4FB&chd=t:10,30,50,90,60,80
&chg=16,16&chls=2&chma=40,20,20,30&chtt=نسبة+زوار+الموقع+&chts=FF0000,11.5"   />

 <?php
 }  else {
 
 echo  img(base_url("bin/Chart/chart1.png"));
 
 }
 ?></td>

 
</tr>



</tbody>

  <tfoot>
  



 <tr>
   <th id="rating2" align="center" colspan="6"></th>
 </tr>
</tfoot>
</table>
 
 
 
 
 
 
 </td></tr></table>








        </div>
        
        <div class="tab" id="tab2" >
 
 <br/>
 
<table width="100%" border="1"      cellpadding="0" cellspacing="3" class="border_table1" >
 <tr><td >
 <table class="widefat fixed" cellspacing="0" border="0"    dir="ltr">
    <thead>
      <tr>

<th   align="right" id="rating">معلومات PHP &nbsp;<img src="<?php echo base_url("html/application/modules/cp/views/layouts/img/php.png");?>" /></th>
</tr>


    </thead>
 
<tbody>

 


 <tr>
<td class="column-rating" align="right" width="100%">
<style>
.scrollable2 {
overflow: auto;
overflow-x:scroll;
overflow-y:scroll;
 
width:750px;
}
</style>
<div  class="scrollable2">
  <?php
			ob_start();
				phpinfo(INFO_GENERAL | INFO_CONFIGURATION | INFO_MODULES);
				$phpinfo = ob_get_contents();
				ob_end_clean();
				preg_match_all('#<body[^>]*>(.*)</body>#siU', $phpinfo, $output);
				$output = preg_replace('#<table#', '<table class="adminlist" align="right"', $output[1][0]);
				$output = preg_replace('#(\w),(\w)#', '\1, \2', $output);
				$output = preg_replace('#border="0" cellpadding="3" width="500"#', 'border="0" cellspacing="1" cellpadding="4" width="90%"', $output);
				$output = preg_replace('#<hr />#', '', $output);
				echo $output; 
				?>
				
                </div>


</td>
 
</tr>
 
</tbody>

  <tfoot>
 <tr>
<th id="rating" align="center" colspan="6"></th>

</tr>
</tfoot>
 </table>
 </td></tr></table>






        </div>
        
        
        
        
        <div class="tab" id="tab3">
 
 <br/>
 
  <table width="99%" border="1"      cellpadding="0" cellspacing="3" class="border_table1" >
 <tr><td  align="right">
 <fieldset   dir="rtl" >
 <legend><img src="<?php echo base_url("html/application/modules/cp/views/layouts/img/layout.png");?>" />&nbsp; نافذة إعلانية </legend>
<table cellpadding="2" cellspacing="3" width="100%" align="right"  dir="ltr"  >
<form   method="post" enctype="multipart/form-data">
<tr><td align="right">
<select class="newinput" name="popup"  >
<option value="NO"    class="option" <?php if( $adminsetting['popup']=="NO"){echo "selected='selected' ";}?>  >لا</option>
<option value="YES"   class="option" <?php if( $adminsetting['popup']=="YES"){echo "selected='selected' ";}?>>نعم</option>
</select>
 
</td><td width="30%" align="center" class="myselect">تفعيل النافذة</td></tr>

<tr><td colspan="2" bgcolor="#cccccc" height="1px"></td></tr>
<tr>
<td align="right">
<table>
<tr><td><input type="text" size="5" class="newinput" name="popup_h" value="<?php echo $adminsetting['popup_h'];?>"></td><td class="myselect" align="left">ألارتفاع</td><td><input type="text" size="5" class="newinput" name="popup_w" value="<?php echo $adminsetting['popup_w'];?>" /></td><td class="myselect">العرض</td></tr>
</table>
</td>
<td align="center" class="myselect"> مقاس ألاعلان</td></tr>
<tr><td colspan="2" bgcolor="#cccccc" height="1px"></td></tr>
<tr><td colspan="2" align="right" class="myselect">محتوي ألاعلان</td></tr>
<tr><td colspan="2" align="center" width="100%">
 
 <textarea cols="100" rows="5" name="popup_content" id="popup_content" class="newinput" ><?php echo $adminsetting['popup_content'];?></textarea></td></tr>
<tr><td colspan="2"  align="center" ><input type="submit" class="button" value=" موافق " onClick="return validate_pop(this.form)" /></td></tr>
<input type="hidden" name="IsPost" value="true">

</form></table>

</fieldset>







 

 

<hr>



 <fieldset dir="rtl" >
 <legend><img src="<?php echo base_url("html/application/modules/cp/views/layouts/img/i_icon_latest_reply.gif");?>" />&nbsp; خلفية صوتية </legend>
<table cellpadding="2" cellspacing="3" width="100%" align="right"  dir="ltr"  >
<form   method="post" enctype="multipart/form-data">
<tr><td align="right"><select name="bgsound" class="newinput">
<option value="NO" class="option"  <?php if( $adminsetting['bgsound']=="NO"){echo "selected='selected' ";}?> >لا</option>
<option value="YES" class="option"  <?php if( $adminsetting['bgsound']=="YES"){echo "selected='selected' ";}?>>نعم</option>
</select></td><td width="30%" align="center" class="myselect">تفعيل الصوت</td></tr>

<tr><td colspan="2" bgcolor="#cccccc" height="1px"></td></tr>
 
 <tr><td align="right"><select name="bgsound_loop" class="newinput">
<option value="1" class="option" <?php if( $adminsetting['bgsound_loop']=="1"){echo "selected='selected' ";}?> >1</option>
<option value="2" class="option" <?php if( $adminsetting['bgsound_loop']=="2"){echo "selected='selected' ";}?>>2</option>
<option value="3" class="option" <?php if( $adminsetting['bgsound_loop']=="3"){echo "selected='selected' ";}?>>3</option>
<option value="4" class="option" <?php if( $adminsetting['bgsound_loop']=="4"){echo "selected='selected' ";}?>>4</option>
<option value="5" class="option" <?php if( $adminsetting['bgsound_loop']=="5"){echo "selected='selected' ";}?>>5</option>
<option value="-1" class="option" <?php if( $adminsetting['bgsound_loop']=="-1"){echo "selected='selected' ";}?>>مستمر</option>
</select></td><td width="30%" align="center" class="myselect">عدد مرات تكرار الصوت</td></tr>
 
<tr><td colspan="2" bgcolor="#cccccc" height="1px"></td></tr>
<tr><td align="right" class="more"><font color="#FF3300" size="1">[MID-AU-WAV]الملفات المسموح بها </font><input type="file" name="file1" class="newinput" size="30"></td><td   align="center" class="myselect">ملف الصوت</td></tr>
 <tr><td colspan="2" bgcolor="#cccccc" height="1px"></td></tr>
  
  
  <?php
  
  if($adminsetting["bgsound_src"]!=""){
  
  
  ?>
  
 <tr><td align="right" class="more">
 

 <?php
  $this->load->helper('html');
 $this->load->helper('url');
$base= base_url("html/application/modules/cp/views/layouts/");
 $mediaLink=base_url("Media/");
 
   echo anchor("$mediaLink/".$adminsetting['bgsound_src'],img("$base/img/gss_sticky_panel_rc.png"),'target="_Blank"');
   
    ?>
 
 
 
 </td><td   align="center" class="myselect">أضغط هنا لاستماع &nbsp;<img src="<?php echo base_url("html/application/modules/cp/views/layouts/img/i_icon_latest_reply.gif");?>" /></td></tr>

<?php
}
?>



<tr><td colspan="2"  align="center" ><input type="submit" onClick="return  validate_bg(this.form)" class="button" value=" موافق " /></td></tr>
<input type="hidden" name="old_file" value="<?php echo $adminsetting['bgsound_src'];?>">
<input type="hidden" name="IsPost" value="Send">
</form></table>

</fieldset>




</td></tr></table>
 
 
 
 
 
        </div>
        
        
        
        
        
        
        
  <div class="tab" id="tab4">
 <!---->
 <br/>
 
 <table width="99%" border="1"      cellpadding="0" cellspacing="3" class="border_table1" >
 <tr><td >
 <table class="widefat fixed" cellspacing="0" border="0" width="90%" dir="ltr">
    <thead>
      <tr>
                <th  align="right"  id="rating">البريد الالكتروني</th>
        <th  align="right"  id="rating">الاسم</th>
  <th  align="center"  id="rating">وقت الاتصال</th>
  <th  width="3%" align="center"  id="rating"><img src="<?php echo base_url("html/application/modules/cp/views/layouts/img/user.png");?>" /></th>

</tr>


    </thead>
 
<tbody>
<?php
if(is_object($adminonine)){

foreach ($adminonine->result_array() as $rowsAdmin){
?>
<tr>
<td align="right" class="myselect"><font color="#FF3300"><?php echo  mailto($rowsAdmin['email'],$rowsAdmin['email']);?></font></td>
<td align="right"><?php echo  $rowsAdmin['adminname'];?></td>
<td><?php echo date('d-m-Y H:i:s',$rowsAdmin['timevisit']);?>&nbsp;<img src="<?php echo base_url("html/application/modules/cp/views/layouts/img/clock.png");?>" /></td>
<td><img src="<?php echo base_url("html/application/modules/cp/views/layouts/img/user1.png");?>" /></td>
 </tr>
<?php
}
}else {
?>
<tr><td colspan="4" align="center">!!.. لا توجد نتائج</td></tr>
<?php
}
?>


</tbody>


</table></td></tr></table>
 
 
 
 
 
 
 
 
 <!---->
        </div>
    
    </div>
    
</div>
</div>

<div style="width:99%; height:1px; background-color:#CCCCCC"></div>

 
 







<script type="text/javascript">
var tabber1 = new Yetii('aldirazi', 1);
tabber1.init(500);
</script>

 