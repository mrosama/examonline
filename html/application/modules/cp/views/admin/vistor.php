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
 <option class="myoption"     value="<?php echo base_url("cp/admin/counters");?>">إعداد عداد الزوار</option>
<option   class="myoption"  selected="selected" 
value="<?php echo base_url("cp/admin/vistor");?>" >زوار الموقع</option>
  </select> </TD>
      <TD width="60%" class="myselect" align="right" valign="middle">زوار الموقع</TD>
        <TD width=10 valign="middle">
<CENTER><IMG src="<?php echo base_url("html/application/modules/cp/views/layouts/img/");?>/icon_user2.gif"  /></CENTER></TD>
    <TD width=10></TD></TR></TBODY></TABLE>
    </div>  </td></tr>
 </table>
 
 
 
 <!--*****************************************-->
 
 
 
  <table width="99%" border="1"    cellpadding="0" cellspacing="3" class="border_table1" >
 <tr><td>
 <form method="post" name="form_3">
<table class="widefat fixed" cellspacing="0" border="0" width="100%" dir="ltr">
    <thead>
      <tr>
 
<th  id="rating" align="center">تاريخ الزيارة</th>
<th id="rating" align="center">نوع المتصفح</th>
<th id="rating" align="center">نظام التشغيل</th>
<th id="rating" align="center">IP</th>
<th id="rating" align="center"></th>
</tr>
    </thead>
 
<tbody>


<?php

if($counrow!=0){
foreach($vistorrows->result_array() as $row){
?>
      <tr>
 
<td  id="rating" align="center"><?php echo $row['dat'];?></td>
<td id="rating" align="center"><?php echo $row['browser'];?></td>
<td id="rating" align="center"><?php echo $row['os'];?></td>
<td id="rating" align="center"><?php echo $row['ip'];?></td>
<td id="rating" align="center"><IMG src="<?php echo base_url("html/application/modules/cp/views/layouts/img/");?>/icon_user.gif"  /></td>
</tr>

<?php
}}  else {
?>
<tr><td colspan="5" align="center">  لا توجد سجلات مسجلة</td></tr>
<?php
}
?>


</tbody>



<tfoot>

<tr><th colspan="5"><?php echo @$pagination;?></th>


</tfoot>



</table></form>


</td></tr></table>
 
 
 
 
 