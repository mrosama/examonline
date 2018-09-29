<?php
 $this->load->helper('url');
$base= base_url("html/application/modules/cp/views/layouts/");
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

 
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
 
 

 <table width="90%" align="center" dir="ltr">
<tr> <td> <div     id="info_1" class="roundedCorner" >
<TABLE cellSpacing=0   cellPadding=0  border="1" width="100%">
  <TBODY>
  <TR vAlign=top>
      <TD width='10px' >
      
 </TD>
    <TD width='20%'  height="20px">   
    
    <select name="action" class="newinput" style="width:180px" onchange="location.href=this.value ">
    
  



<option   class="myoption"  
value="<?php echo base_url("cp/exam/index");?>" >إضافة الاسئلة</option>

<option   class="myoption"   
value="<?php echo base_url("cp/exam/listquestion");?>" >أرشيف ألاسئلة</option>


   <option class="myoption"  selected="selected"    value="<?php echo base_url("cp/exam/result");?>"> النتائج</option>

 <option class="myoption"     value="<?php echo base_url("cp/exam/option");?>"> إعدادات</option>
 


  </select> </TD>
      <TD width="60%" class="myselect" align="right" valign="middle">النتائج</TD>
        <TD width=10 valign="middle">
<CENTER><IMG src="<?php echo base_url("html/application/modules/cp/views/layouts/img/");?>/icon14.gif"  /></CENTER></TD>
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
 
<th  id="rating" align="center"><input type="checkbox" name="ck" onclick="checkall(this.form);" class="newinput"/></th>


<th id="rating" align="center">النسبة</th>


<th id="rating" align="center">النتيجة</th>

<th id="rating" align="center">تاريخ الاختبار</th>

<th id="rating" align="center">الاختبار</th>
<th id="rating" align="center">البريد</th>
<th id="rating" align="center">ألاسم</th>
<th id="rating" align="center"></th>
</tr>
    </thead>
 
<tbody>


<?php

if($counrow!=0){
$i=0;
foreach($pages->result_array() as $row){
?>
      <tr>
 
<td  id="rating" align="center"><input class="newinput" type="checkbox" id="del_<?php echo $i;?>" name="del[]" value="<?php echo $row['ID'];?>"/></td>


<td id="rating" align="center">
 <?php

$per=@ceil((@$row['num_true']/@$row['num_question'])*100);
echo $per."%";
  ?>
</td>

<td id="rating" align="center">
<?php
if($row['result']=="PASS"){
echo "<font color='green'>ناجح</font>";
} else {
echo "<font color='red'>راسب</font>";
}

?>


</td>



<td id="rating" align="center"><?php echo $row['dat'];?></td>



<td id="rating" align="center"> 
<?php
$query=$this->db->query("select * from `cm_cat`  where `ID`='$row[exam]'  ");
$query=$query->row_array();
echo @$query['name'];
?>

</td>

<td id="rating" align="center"><?php echo $row['email'];?></td>

<td id="rating" align="center">

<?php
$query=$this->db->query("select * from `cm_member`  where `ID`='$row[userID]'  ");
$query=$query->row_array();
echo @$query['name'];
?>


</td>



<td id="rating" align="center"><IMG src="<?php echo base_url("html/application/modules/cp/views/layouts/img/");?>/left-li-bac-even.jpg"  /></td>
</tr>

<?php
$i++;
}}  else {
?>
<tr><td colspan="8" align="center">  لا توجد نتائج مسجلة</td></tr>
<?php
}
?>


</tbody>



<tfoot>

<tr><th colspan="8">
<input type="hidden" value="delete" name="IsPost">
<p align="left"><input type="submit" value="  حذف "   class="button" /></p><?php echo @$pagination;?></th>


</tfoot>



</table></form>


</td></tr></table>
 