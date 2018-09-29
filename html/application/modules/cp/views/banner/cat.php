<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <?php
$this->load->helper('html');
$this->load->helper('url');
$base= base_url("html/application/modules/cp/views/layouts/");
$this->load->model('admin_model');
 ?>
 
 <table width="90%" align="center" dir="ltr">
<tr> <td> <div     id="info_1" class="roundedCorner" >
<TABLE cellSpacing=0   cellPadding=0  border="1" width="100%">
  <TBODY>
  <TR vAlign=top>
      <TD width='10px' >
      
 </TD>
    <TD width='20%'  height="20px">   
    
    <select name="action" class="newinput" style="width:180px" onchange="location.href=this.value ">
     <option class="myoption"     value="<?php echo base_url("cp/banner/listbanner");?>"> أرشيف ألاعلانات</option>
 <option class="myoption"     value="<?php echo base_url("cp/banner/newbanner");?>"> إعلان جديد</option>
<option   class="myoption"  selected="selected" 
value="<?php echo base_url("cp/banner/index");?>" >أقسام الاعلانات</option>
  </select> </TD>
      <TD width="60%" class="myselect" align="right" valign="middle">أقسام الاعلانات</TD>
        <TD width=10 valign="middle">
<CENTER><IMG src="<?php echo base_url("html/application/modules/cp/views/layouts/img/");?>/ico_tv.png"  /></CENTER></TD>
    <TD width=10></TD></TR></TBODY></TABLE>
    </div>  </td></tr>
 </table>
 
 
 <script type="text/javascript">
 
 function validate1(myform){
 var pattern=new RegExp("^(.+)\\.(PNG|GIF|JPEG|JPG)$","i");
 
 if(myform.name.value==""){
 alert("من فضلك أدخل القسم");
 return false;
 }
 
 else if(myform.width.value==""){
 alert("عرض القسم مفقود");
 return false
 }
 
  else if(myform.height.value==""){
 alert("أرتفاع القسم مفقود");
 return false
 }
 
 
 
else {
return true;
}
 
 
 
 }
 
 </script>
 
 <style>
 .smart_frames {
	BORDER-RIGHT: #999 3px double; BORDER-TOP: #999 3px double; DISPLAY: block; OVERFLOW: hidden; BORDER-LEFT: #999 3px double; WIDTH: 30px; BORDER-BOTTOM: #999 3px double; HEIGHT: 30px; BACKGROUND-COLOR: white
}
 </style>
 
 
  <?php
 if ($this->uri->segment(4)=="edit"){
 ?>
 <?php
 
  $this->load->library('Msg');
 if(@$catResult=='update'){
 echo $this->msg->SendMsg(' ألاقسام ','   تم تعديل القسم  ',1);
 }
 
  if(@$catResult=='found'){
 echo $this->msg->SendMsg(' ألاقسام ','   أسم القسم مسجل من قبل  ',2);
 }
 ?>
 
 
<table align="center" width="90%" cellpadding="0" cellspacing="0"  class="menu_m6" dir="ltr">
 <tr  ><td align="right" class="blocks"></td>
 <td width="5%"></td></tr>
 <tr><td colspan="2" align="right">
 <form method="post" name="form_2" enctype="multipart/form-data">
 <table width="100%" border="1"    cellpadding="0" cellspacing="3" >
 
 <tr><td width="86%" align="right"  >
 <input type="text" size="60" name="name" class="newinput" style="width:70%" dir="rtl" value="<?php echo $rowss['name'];?>"   ></td>
 <td width="14%" class="myselect">   أسم القسم</td>
 </tr>
 
  <tr><td   height='1' bgcolor='#CCCCCC' colspan="2"></td></tr>
 <tr><td width="86%" align="right"  >
 <input type="text" size="60" name="height" class="newinput" style="width:10%" dir="rtl" value="<?php echo $rowss['height'];?>" /></td>
 <td width="14%" class="myselect">   أرتفاع القسم</td>
 <tr><td   height='1' bgcolor='#CCCCCC' colspan="2"></td></tr>
 

 <tr><td width="86%" align="right"  >
 <input type="text" size="60" name="width" class="newinput" style="width:10%" dir="rtl" value="<?php echo $rowss['width'];?>"   ></td>
 <td width="14%" class="myselect">   عرض القسم</td>
 <tr><td   height='1' bgcolor='#CCCCCC' colspan="2"></td></tr>
 

 
<tr><td  align="center" colspan="2" >
<input type="button" value="عودة " class="button" 
onclick="location.href='<?php echo base_url("cp/banner/index/");?>';">

<input type="submit" value="تعديل " class="button" onclick="return validate1(this.form);">

</td></tr>
 </table>
 <input type="hidden" value="<?php echo $com_type;?>" name="com_type">
 <input type="hidden" value="Update" name="IsPost">
 <input type="hidden" value="<?php echo $rowss['ID'];?>" name="id">
   </form>
</td></tr></table>


<hr/>
<?php
}
?>

 
 
 
 
 <!--//////////////////////////////-->
 <?php
 if ($this->uri->segment(4)!="edit"){
 ?>
 <?php
 
  $this->load->library('Msg');
 if(@$catResult=='add'){
 echo $this->msg->SendMsg(' ألاقسام ','   تم إضافة القسم  ',1);
 }
 
  if(@$catResult=='found'){
 echo $this->msg->SendMsg(' ألاقسام ','   أسم القسم مسجل من قبل  ',2);
 }
 ?>
 
 
<table align="center" width="90%" cellpadding="0" cellspacing="0"  class="menu_m6" dir="ltr">
 <tr  ><td align="right" class="blocks"></td>
 <td width="5%"></td></tr>
 <tr><td colspan="2" align="right">
 <form method="post" name="form_2" enctype="multipart/form-data">
 <table width="100%" border="1"    cellpadding="0" cellspacing="3" >
 
 <tr><td width="86%" align="right"  >
 <input type="text" size="60" name="name" class="newinput" style="width:70%" dir="rtl"   ></td>
 <td width="14%" class="myselect">   أسم القسم</td>
 </tr>
  <tr><td   height='1' bgcolor='#CCCCCC' colspan="2"></td></tr>

 <tr><td width="86%" align="right"  >
 <input type="text" size="60" name="height" class="newinput" style="width:10%" dir="rtl"   ></td>
 <td width="14%" class="myselect">   أرتفاع القسم</td>
 <tr><td   height='1' bgcolor='#CCCCCC' colspan="2"></td></tr>
 

 <tr><td width="86%" align="right"  >
 <input type="text" size="60" name="width" class="newinput" style="width:10%" dir="rtl"   ></td>
 <td width="14%" class="myselect">   عرض القسم</td>
 <tr><td   height='1' bgcolor='#CCCCCC' colspan="2"></td></tr>
 
 
<input type="hidden" value="Send" name="IsPost">
<tr><td  align="center" colspan="2" >
<input type="submit" value="إرسال " class="button" onclick="return validate1(this.form);"></td></tr>
 </table>
 <input type="hidden" value="<?php echo $com_type;?>" name="com_type">
 <input type="hidden" value="Send" name="IsPost">
   </form>
</td></tr></table>


<hr/>
<?php
}
?>


  <table width="99%" border="1"    cellpadding="0" cellspacing="3" class="border_table1" >
 <tr><td>
 <form method="post" name="form_3">
<table class="widefat fixed" cellspacing="0" border="0" width="100%" dir="ltr">
    <thead>
      <tr>
 
<th  id="rating" align="center">
حذف</th>
<th id="rating" align="center">تعديل</th>
<th id="rating" align="right">أسم القسم</th>
<th id="rating" align="center"></th>
</tr>
    </thead>
 
<tbody>

<?php

$this->load->helper('Jimage');
$html="";
if($rows->num_rows()!=0){
foreach($rows->result_array() as $row){




?>
<tr height="30px">
<td align="center"><input type="checkbox" name="del[]" value="<?php echo $row['ID'];?>" /></td>
<td align="center">

<?php

echo anchor("cp/banner/index/edit/$row[ID]",img("$base/img/file_edit.gif"));
 ?>

</td>

<td align="right"><?php echo $row['name'];?></td>
<td align="center"></td>
</tr>


<?php
}

}
?>



</tbody>
<tfoot>
<tr><th colspan="5" align="left">
<input type="hidden" name="IsPost" value="delete">
<input type="submit" value=" حذف  " class="button" />
</th></tr>

</tfoot>

</table></form></td></tr></table>


 