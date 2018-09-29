<?php
 $this->load->helper('url');
$base= base_url("html/application/modules/cp/views/layouts/");
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style>
.dor {
font-family : Tahoma, Arial, Helvetica, sans-serif;
font-size: 11px;
color: #000;
/*background: #fff;*/
margin: 0px;
text-shadow: 1px 1px 1px #e3e3e3;
font-weight: normal;

}
</style>

 

<script type="text/javascript">

function validates(myform){
var counter=myform.counter.value;
var check=0;
var duraction=0;
for(var i=0;i<counter;i++){
if(document.getElementById("numquestion_"+i).value > document.getElementById("valideQ_"+i).value){
check++;
//break;
}
}
//////////////////////////////////////////




for(var i=0;i<counter;i++){
if(document.getElementById("duraction_"+i).value!="" && isNaN(document.getElementById("duraction_"+i).value)){
duraction++;
//break;
}
}




 



///////////////////////////
if(check > 0){
alert("عدد الاسئلة المطروحة اكبر من عدد الاسئلة المتاحة");
return false;
}
 else if(duraction >0){
alert("من فضلك أدخل وقت رقمي بالدقائق صحيح");
return false;
} 
else {

return true;
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


   <option class="myoption"     value="<?php echo base_url("cp/exam/result");?>"> النتائج</option>

 <option class="myoption"  selected="selected"    value="<?php echo base_url("cp/exam/option");?>"> إعدادات</option>
 


  </select> </TD>
      <TD width="60%" class="myselect" align="right" valign="middle">إعدادات</TD>
        <TD width=10 valign="middle">
<CENTER><IMG src="<?php echo base_url("html/application/modules/cp/views/layouts/img/");?>/icon14.gif"  /></CENTER></TD>
    <TD width=10></TD></TR></TBODY></TABLE>
    </div>  </td></tr>
 </table>
 
 <!--*****************************************-->
 
    <?php
 $this->load->library('Msg');
 if(@$results=='OK'){
 echo $this->msg->SendMsg(' ألاختبارات ','   تم حفظ الاعدادات ',1);
 } 
 ?>
 
 
 
  <table align="center" width="90%" cellpadding="0" cellspacing="0"  class="menu_m6" dir="rtl ">
 <tr ><td align="right" class="blocks">
 
 
 <form method="post" name="form_2" enctype="multipart/form-data">
 <table width="100%" border="1"    cellpadding="0" cellspacing="3" >
 <tr><td align="right">

 <table align="center" width="100%" class="menu_m6"  cellpadding="0" cellspacing="4">
<tr height="30px">
<td align="center" bgcolor="#F0F0F0" class="dor" style="border:1px #CCCCCC solid">حالة العرض</td>
<td align="center" bgcolor="#F0F0F0" class="dor" style="border:1px #CCCCCC solid">الوقت المقدر</td>
<td align="center" bgcolor="#F0F0F0" class="dor" style="border:1px #CCCCCC solid">عدد أسئلة الاختبار</td>
<td align="center" bgcolor="#F0F0F0" class="dor" style="border:1px #CCCCCC solid">عدد الاسئلة </td>
<td align="center" bgcolor="#F0F0F0" class="dor" style="border:1px #CCCCCC solid" width="40%">ألاختبار</td>
 </tr>
 <?php
 if(is_array($cat)){
 $i=0;
 foreach($cat as $row){
 
 ?>
 
 <tr>
<td align="center" class="dor" >
<?php
if($row['active']=="YES"){

echo anchor("cp/exam/option/activeN/$row[ID]",img("$base/img/yes.gif"));
}
else {
echo anchor("cp/exam/option/activeY/$row[ID]",img("$base/img/no1.gif"));
}
?>
</td>
<td align="center" class="dor" >دقيقة<input type="text" size="10" name="duraction[]" value="<?php echo $row['duration'];?>" style="border:1px #999999 solid; background-color:#FFFF66; height:20px" id="duraction_<?php echo $i?>" /></td>
<td align="center"  class="dor"><input type="text" size="10" id="numquestion_<?php echo $i;?>" name="numquestion[]" value="<?php echo $row['numquestion'];?>" style="border:1px #999999 solid; background-color:#FFFF66; height:20px" /></td>
<td align="center"   class="dor">
<?php
$Q=$this->db->query("select * from `cm_question` where `cat`='$row[ID]' ");
echo $Q->num_rows();
?>
<input type="hidden" value="<?php echo $Q->num_rows();?>" name="valideQ[]" id="valideQ_<?php echo $i;?>">
</td>
<td align="center"  class="dor"  width="40%"><?php echo $row['name'];?></td>
 </tr>
  <tr><td colspan="5" align="center"  bgcolor="#CCCCCC" height="1px"></td></tr>
 <input type="hidden" value="<?php echo $row['ID'];?>" name="cat[]">
 <?php
 $i++;
 }
 
 
 
 
 
 }
 
 ?>
 <input type="hidden" value="<?php echo $i;?>" name="counter">
 
 
 </table>
 

 </td></tr>
 <tr><td colspan="2" align="center"  bgcolor="#CCCCCC" height="1px"></td></tr>
 
 <tr><td align="center">
 <br/><br/>
 <table align="center" width="100%" cellpadding="0" cellspacing="5" >
 <tr><td class="dor" align="right">عرض تقرير بالاجابات الغير صحيحة بعد إنتهاء الاختبار</td><td width="10%"><input type="checkbox" value="YES" name="allow_report" class="newinput" <?php if(@$option['allow_report']=='YES') { echo "checked='checked'";}?>></td></tr>
 <tr><td colspan="2" align="center"  bgcolor="#CCCCCC" height="1px"></td></tr>
  <tr><td class="dor" align="right">السماح بدخول الاختبارات اكثر من مرة بنفس البريد الالكتروني</td><td width="10%"><input type="checkbox" value="YES" name="allow_email" class="newinput" <?php if(@$option['allow_email']=='YES') { echo "checked='checked'";}?> ></td></tr>
 </table>
 
 
 </td></tr>
 <tr><td colspan="2" align="center">
 <input type="hidden" value="Send" name="IsPost">
 <input type="submit" value="  حفظ " name="submit" class="button" onclick="return validates(this.form)" />
 </td></tr>
 
 
 
 
 </table>
 </form>
 
 
 </td></tr></table>
 
 
 