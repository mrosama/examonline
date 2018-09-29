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
 <option class="myoption"   selected="selected"    value="<?php echo base_url("cp/admin/listemail");?>">البريد الوارد</option>
<option   class="myoption" 
value="<?php echo base_url("cp/admin/email");?>" >إرسال بريد</option>
  </select> </TD>
      <TD width="60%" class="myselect" align="right" valign="middle">إرسال بريد</TD>
        <TD width=10 valign="middle">
<CENTER><IMG src="<?php echo base_url("html/application/modules/cp/views/layouts/img/");?>/icl2e.gif"  /></CENTER></TD>
    <TD width=10></TD></TR></TBODY></TABLE>
    </div>  </td></tr>
 </table>
 
 <!--*****************************************-->
 
 <script type="text/javascript">
 
 function checkall(myform){
 
 if(myform.ck.checked){
 
 for(var i=0;i<30;i++){
 
myform.elements['del_'+i].checked=true;
 //document.getElementById("del_"+i).checked=true;
 }
 
 
 }
 else {
  for(var i=0;i<30;i++){
 
 myform.elements['del_'+i].checked=false;
// document.getElementById("del_"+i).checked=true;
 }
 }
 
 
 }
 
 </script>
 
 
 
 
 
  <table width="99%" border="1"    cellpadding="0" cellspacing="3" class="border_table1" >
 <tr><td>
 <form method="post" name="form_3">
<table class="widefat fixed" cellspacing="0" border="0" width="100%" dir="ltr">
    <thead>
      <tr>
 
<th  id="rating" align="center">
<input type="checkbox" name="ck" onclick="checkall(this.form);" class="newinput"/></th>
<th id="rating" align="center">تاريخ الارسال</th>
<th id="rating" align="center">البريد</th>
<th id="rating" align="right">عنوان الرسالة</th>
<th id="rating" align="center"></th>
</tr>
    </thead>
 
<tbody>


<?php

if($counrow!=0){
$i=0;
foreach($inboxrows->result_array() as $row){
?>
      <tr   >
 
<td align="center"><input class="newinput" type="checkbox" id="del_<?php echo $i;?>" name="del[]" value="<?php echo $row['ID'];?>"/></td>
<td  align="center"><IMG src="<?php echo base_url("html/application/modules/cp/views/layouts/img/");?>/i_today.gif" title="<?php echo $row['dat'];?>" alt="<?php echo $row['dat'];?>"  />
</td>
<td align="center"><?php echo $row['email'];?></td>
<td  align="right"><?php  
$subject=($row['subject']!="")?$row['subject']:"لا يوجد عنوان";
echo anchor("cp/admin/viewemail/id/$row[ID]",$subject,''); 
?>
</td>
<td   align="center" valign="middle">

<?php
if($row['read']=='YES'){
?>

<IMG src="<?php echo base_url("html/application/modules/cp/views/layouts/img/");?>/bareed.gif"  />
<?php
} else {
?>
<IMG src="<?php echo base_url("html/application/modules/cp/views/layouts/img/");?>/icl2e.gif"  />

<?php
}
?>
</td>
</tr>

<?php
$i++;
}}  else {
?>
<tr><td colspan="5" align="center">  لا توجد رسائل واردة</td></tr>
<?php
}
?>


</tbody>



<tfoot>

<tr><th colspan="5"><p align="left"><input type="submit" value="  حذف  "  class="button"></p><?php echo @$pagination;?></th>


</tfoot>



</table>
<input type="hidden" name="IsPost" value="Send">

</form>


</td></tr></table>
 
 