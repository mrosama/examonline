<?php
$this->load->helper('html');
 $this->load->helper('url');
$base= base_url("html/application/modules/cp/views/layouts/");

$this->load->library("Configer");
  $defaultSetting=$this->configer->getConfiger();
 ?>
 <SCRIPT type=text/javascript src="<?php echo $base;?>/js/rounded_corners_lite.inc.js"></SCRIPT>
 
 <link href="<?php echo $base; ?>/css/<?php echo  $defaultSetting['admin_style'];?>" rel="stylesheet" type="text/css" media="all" />
 
 
 
  <table width="99%" align="center" dir="ltr">
<tr> <td> <div     id="info_1" class="roundedCorner" >
<TABLE cellSpacing=0   cellPadding=0  border="1" width="100%">
  <TBODY>
  <TR vAlign=top>
      <TD width='10px' >
 </TD>
    <TD width='20%'  height="20px"><br/> </TD>
      <TD width="60%" class="myselect" align="right" valign="middle">بيانات الاعضاء</TD>
        <TD width=10>
<CENTER><IMG src="<?php echo base_url("html/application/modules/cp/views/layouts/img/");?>/user_green.png"  /></CENTER></TD>
    <TD width=10></TD></TR></TBODY></TABLE>
    </div>  </td></tr>
 </table>
 
 <!--*****************************************-->
 
 <table width="99%" border="1"  align="right"     cellpadding="0" cellspacing="9" class="border_table1" >
 <tr><td class="myselect" align="right"><?php echo $rs['name'];?></td><td align="right" class="myselect">ألاسم</td></tr>
 <tr><td colspan="2" height="1px" bgcolor="#E8E8E8"></td></tr>
 
  <tr><td class="myselect" align="right"><?php echo $rs['username'];?></td><td align="right" class="myselect">اسم المستخدم</td></tr>
 <tr><td colspan="2" height="1px" bgcolor="#E8E8E8"></td></tr>
 
 
  <tr><td class="myselect" align="right"><?php echo $rs['email'];?></td><td align="right" class="myselect">البريد الالكتروني</td></tr>
 <tr><td colspan="2" height="1px" bgcolor="#E8E8E8"></td></tr>
 
  <tr><td class="myselect" align="right"><?php 
  if($rs['gender']=="M")
{
echo "ذكر";
}else {
echo "أنثي";
}  
  
  ?></td><td align="right" class="myselect">الجنس</td></tr>
 <tr><td colspan="2" height="1px" bgcolor="#E8E8E8"></td></tr>
 
 
  <tr><td class="myselect" align="right"><?php 
  $ne=iconv("UTF-8","ISO-8859-1",$rs['country']);
$country= iconv("windows-1256","UTF-8",$ne);
  echo $country;
  echo "&nbsp;".img(base_url("bin/flags/$rs[code].jpg"));
 ?></td><td align="right" class="myselect">الدولة</td></tr>
 <tr><td colspan="2" height="1px" bgcolor="#E8E8E8"></td></tr> 
 
   <tr><td class="myselect" align="right"><?php 
   
if($rs['active']=="YES"){

echo img(array('src'=>"$base/img/yes.gif",'border'=>0,'title'=>'مفعل') );
}
else {
echo img(array('src'=>"$base/img/no1.gif",'border'=>0,'title'=>'غير مفعل') );
}
?>

   
   
   </td><td align="right" class="myselect">حالة الحساب</td></tr>
 <tr><td colspan="2" height="1px" bgcolor="#E8E8E8"></td></tr> 
 
 
 </table>
 
 
 
 
 
 
 
 
  
 <script type="text/javascript">
settings = {tl: { radius: 6 },tr: { radius: 6 },bl: { radius: 6 },br: { radius: 6 },antiAlias: true,autoPad: true,validTags: ["div"]}
 var myBoxObject = new curvyCorners(settings, "roundedCorner");
 myBoxObject.applyCornersToAll();
</script>
 
 
 