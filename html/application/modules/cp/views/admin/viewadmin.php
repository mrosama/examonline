<?php
$this->load->model('admin_model');
$this->admin_model->CheckPremision();
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


 <table width="90%" align="center" dir="ltr">
<tr> <td> <div     id="info_1" class="roundedCorner" >
<TABLE cellSpacing=0   cellPadding=0  border="1" width="100%">
  <TBODY>
  <TR vAlign=top>
      <TD width='10px' >
      
 </TD>
    <TD width='20%'  height="20px">   
    
    <select name="action" class="newinput" style="width:180px" onchange="location.href=this.value ">
 <option class="myoption"   selected="selected"   value="<?php echo base_url("cp/admin/viewadmin");?>">عرض المشرفين</option>
<option   class="myoption"  
value="<?php echo base_url("cp/admin/addadmin");?>" >مشرف جديد</option>
  </select> </TD>
      <TD width="60%" class="myselect" align="right" valign="middle">مشرف جديد</TD>
        <TD width=10 valign="middle">
<CENTER><IMG src="<?php echo base_url("html/application/modules/cp/views/layouts/img/");?>/page_skin.png"  /></CENTER></TD>
    <TD width=10></TD></TR></TBODY></TABLE>
    </div>  </td></tr>
 </table>
 
 
 
 
 <!--***************************************-->
 
 
 
 
 
 
 
  <table width="99%" border="1"    cellpadding="0" cellspacing="3" class="border_table1" >
 <tr><td>
 <form method="post" name="form_3">
<table class="widefat fixed" cellspacing="0" border="0" width="100%" dir="ltr">
    <thead>
      <tr>
 <th  id="rating" align="center">حذف</th>
 <th  id="rating" align="center">تعديل</th>
 <th  id="rating" align="center">حالة الاتصال</th>
<th  id="rating" align="center">المجموعة</th>
<th id="rating" align="center">اسم المستخدم</th>
<th id="rating" align="center">البريد الالكتروني </th>
<th id="rating" align="center">اسم المشرف</th>
<th id="rating" align="center"></th>
</tr>
    </thead>
 
<tbody>


<?php
 
$this->load->helper('html');
 $this->load->helper('url');
$base= base_url("html/application/modules/cp/views/layouts/");
 
if($num_rows!=0){
foreach($admindata->result_array() as $row){
?>
      <tr>
 
 <td  id="rating" align="center"><input type="checkbox" name="del[]" value="<?php echo $row['ID'];?>" class="newinput"> </td>
 <td  id="rating" align="center">

 <?php
 echo anchor("cp/admin/editadmin/id/$row[ID]",img("$base/img/file_edit.gif"),''); 
  ?>
 </td>
  <td  id="rating" align="center">
  <?php
if($row['online']=='YES'){
?>
<IMG src="<?php echo $base;?>/img/online.gif"  alt="online"  />
<?php
} else {
?>
<IMG src="<?php echo $base;?>/img/offline.gif"  alt="offline" />
<?php
}
?>
   </td>
<td  id="rating" align="center"><?php  
echo ($row['role']==6)?"مدير عام":"مشرف";

?></td>
<td id="rating" align="center"><?php echo $row['username'];?></td>
<td id="rating" align="center"><?php echo $row['email'];?></td>
<td id="rating" align="center"><?php echo $row['adminname'];?></td>
<td id="rating" align="center"><IMG src="<?php echo base_url("html/application/modules/cp/views/layouts/img/");?>/icon_user.gif"  /></td>
</tr>

<?php
}}  else {
?>
<tr><td colspan="8" align="center">  لا توجد سجلات مسجلة</td></tr>
<?php
}
?>


</tbody>



<tfoot>

<tr><th colspan="8" align="left"> 
<input type="hidden" value="delete" name="IsPost">
<input type="submit" value="حذف" class="button">
</th>


</tfoot>



</table></form>


</td></tr></table>
 