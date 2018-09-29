<?php
 $this->load->helper('url');
$base= base_url("html/application/modules/cp/views/layouts/");
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
 <option class="myoption"  selected="selected"    value="<?php echo base_url("cp/page/listpage");?>"> أرشيف الصفحات</option>
<option   class="myoption"  
value="<?php echo base_url("cp/page/index");?>" >صفحة جديدة</option>
  </select> </TD>
      <TD width="60%" class="myselect" align="right" valign="middle"> أرشيف الصفحات</TD>
        <TD width=10 valign="middle">
<CENTER><IMG src="<?php echo base_url("html/application/modules/cp/views/layouts/img/");?>/content.png"  /></CENTER></TD>
    <TD width=10></TD></TR></TBODY></TABLE>
    </div>  </td></tr>
 </table>
 
 <!--*****************************************-->
 
 
 
 
 
 
 
 <!--*****************************************-->
 
 
 
  <table width="99%" border="1"    cellpadding="0" cellspacing="3" class="border_table1" >
 <tr><td>
 <form method="post" name="form_3">
<table class="widefat fixed" cellspacing="0" border="0" width="100%" dir="ltr">
    <thead>
      <tr>
 
<th  id="rating" align="center">حذف</th>
<th id="rating" align="center">تعديل</th>
<th id="rating" align="center">الحالة</th>
<th id="rating" align="center">اسم الصفحة</th>
<th id="rating" align="center"></th>
</tr>
    </thead>
 
<tbody>


<?php

if($counrow!=0){
foreach($pages->result_array() as $row){
?>
      <tr>
 
<td  id="rating" align="center"><input type="checkbox" value="<?php echo $row['ID'];?>" name="del[]" class="newinput"></td>
<td id="rating" align="center">
 <?php
  echo anchor("cp/page/editpage/id/$row[ID]",img("$base/img/file_edit.gif"),' title="تعديل" '); 
  ?>
</td>
<td id="rating" align="center"> 
<?php
if($row['active']=="YES"){
 
?>
<img src="<?php echo $base."/img/3.bmp"?>" alt="مفعل" title="مفعل"/>
<?php
} else {
?>
<img src="<?php echo $base."/img/9.bmp"?>" alt="غير مفعل" title="غير مفعل"/>
<?php
 
}
?>

</td>
<td id="rating" align="center"><?php echo $row['name'];?></td>
<td id="rating" align="center"><IMG src="<?php echo base_url("html/application/modules/cp/views/layouts/img/");?>/left-li-bac-even.jpg"  /></td>
</tr>

<?php
}}  else {
?>
<tr><td colspan="5" align="center">  لا توجد صفحات مسجلة</td></tr>
<?php
}
?>


</tbody>



<tfoot>

<tr><th colspan="5">
<input type="hidden" value="delete" name="IsPost">
<p align="left"><input type="submit" value="  حذف "   class="button" /></p><?php echo @$pagination;?></th>


</tfoot>



</table></form>


</td></tr></table>
 
 
 
 