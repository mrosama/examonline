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
function validates_1(myform){

if(myform.cat.value==0){
alert("القسم مفقود");
return false;
}

else if(myform.question.value==""){
alert("السؤال مفقود");
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
    
  



<option   class="myoption"  selected="selected" 
value="<?php echo base_url("cp/exam/index");?>" >إضافة الاسئلة</option>

<option   class="myoption"   
value="<?php echo base_url("cp/exam/listquestion");?>" >أرشيف ألاسئلة</option>


   <option class="myoption"     value="<?php echo base_url("cp/exam/result");?>"> النتائج</option>

 <option class="myoption"     value="<?php echo base_url("cp/exam/option");?>"> إعدادات</option>
 


  </select> </TD>
      <TD width="60%" class="myselect" align="right" valign="middle">إضافة الاسئلة</TD>
        <TD width=10 valign="middle">
<CENTER><IMG src="<?php echo base_url("html/application/modules/cp/views/layouts/img/");?>/icon14.gif"  /></CENTER></TD>
    <TD width=10></TD></TR></TBODY></TABLE>
    </div>  </td></tr>
 </table>
 
 <!--*****************************************-->
 
 
   <?php
 $this->load->library('Msg');
 if(@$results=='OK'){
 echo $this->msg->SendMsg(' ألاختبارات ','   تم تعديل السؤال ',1);
 } 
 
 
 
 
 ?>
 
 
 <table align="center" width="90%" cellpadding="0" cellspacing="0"  class="menu_m6" dir="rtl ">
 <tr ><td align="right" class="blocks">
 
 
 <form method="post" name="form_2" enctype="multipart/form-data">
 <table width="100%" border="1"    cellpadding="0" cellspacing="3" >
 
  <tr><td  align="right" >
  
 <?php
echo  @$cat;
 ?>
  </td><td width="20%" class="myselect" align="center">أختار  قسم الاختبار</td></tr>
  
 <tr><td   height='1' bgcolor='#CCCCCC' colspan="2"></td></tr> 
 
 
   <tr><td  align="right" >
 
  <textarea cols="50" rows="3" name="question"  class="newinput"  style="width:100%" dir="rtl"><?php echo $page['question']?></textarea>
  </td><td width="20%" class="myselect" align="center">السؤال</td></tr>
  
  
  
  
 <tr><td   height='1' bgcolor='#CCCCCC' colspan="2"></td></tr> 
 
 
 
 
 
 <tr><td colspan="2" align="right">
 
 <table width="100%" cellpadding="0" cellspacing="4">
 <tr height="30px"><td width="17%" align="center" bgcolor="#F0F0F0" class="dor" style="border:1px #CCCCCC solid">الاختيار الصحيح</td>
 <td width="23%" align="center" bgcolor="#F0F0F0" class="dor" style="border:1px #CCCCCC solid">نوع الاجابة</td>
 <td width="57%" align="center" bgcolor="#F0F0F0" class="dor" style="border:1px #CCCCCC solid">ألاجابة</td>
 <td width="2%" align="right"  ><IMG src="<?php echo base_url("html/application/modules/cp/views/layouts/img/");?>/icon_online.gif"  /></td>
 </tr>
  <tr><td   height='1' bgcolor='#CCCCCC' colspan="4" align="right"></td></tr> 
 
 <?php
 if(is_array(@$ans)){
 foreach(@$ans as $row){
 ?>
 
 <tr>
 <td align="center">
  <select class="newinput" name="kanswer[]" style="width:100%">

  <option value="NO" <?php if($row['kanswer']=="NO") {echo "selected='selected'"; }?>>False</option>
    <option value="YES" <?php if($row['kanswer']=="YES") {echo "selected='selected'"; }?>>True</option>
  </select>
 </td>
  <td align="center">
  <select class="newinput" name="ktype[]" style="width:100%">
  <option value="SINGLE" <?php if($row['ktype']=="SINGLE") {echo "selected='selected'"; }?> >Single Choice</option>
  <option value="MULTI" <?php if($row['ktype']=="MULTI") {echo "selected='selected'"; }?>>Multi Choice</option>
  </select>
  </td>
   <td align="center"><input type="text" name="answer[]" class="newinput" style="width:97%" dir="rtl" value="<?php echo $row['answer'];?>"></td>
    <td align="right" class="dor"><IMG src="<?php echo base_url("html/application/modules/cp/views/layouts/img/");?>/icon_online.gif"  /></td>
 
 </tr>
 
 
 <tr><td   height='1' bgcolor='#CCCCCC' colspan="4" align="right"></td></tr> 
 <input type="hidden" value="<?php echo $row['ID'];?>" name="EA[]">
<?php
}
}
?>
 
 
 
 
 
 
 
 
 </table>
 
 </td></tr>
 
 
 <tr><td colspan="2" align="center" >
 <input type="button" value=" عودة" class="button" onclick="location.href='<?php echo base_url('cp/exam/listquestion');?>' ">
 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
 <input type="submit" value="  تعديل " class="button" onClick="return validates_1(this.form);" />
 </td></tr>
 
 
  <input type="hidden" value="<?php echo $page['ID']?>" name="id">
 <input type="hidden" value="Update" name="IsPost">
 
 </table>
 </form>
 
 </td></tr></table>
 