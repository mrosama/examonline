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
 <option class="myoption"     value="<?php echo base_url("cp/admin/listemail");?>">البريد الوارد</option>
<option   class="myoption"  selected="selected" 
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
 function validate1(myform){
 var pattern1=new RegExp("^([-a-z0-9_]+(\.[_a-z0-9-]+)*@([a-z0-9-]+(\.[a-z0-9-]+)+))$","i");
 if(myform.subject.value==""){
 alert("أدخل عنوان الرسالة");
 return false;
 }
 
 else if(pattern1.test(myform.to.value)==false){
 alert("أدخل بريد صحيح للمرسل إلية");
  return false;
 }
 
 
 
  else {
 return true;
 }
 
 }
 </script>
 

 <?php
 $this->load->library('Msg');
 if(@$result=='send'){
 echo $this->msg->SendMsg(' البريد ','   تم إرسال الرسالة  ',1);
 } 
 
  if(@$result=='error'){
 echo $this->msg->SendMsg(' البريد ','   فشل في إرسال البريد  ',3);
 } 
 ?>
 


<table align="center" width="90%" cellpadding="0" cellspacing="0"  class="menu_m6" dir="ltr">
 <tr  ><td align="right" class="blocks"></td>
 <td width="5%"></td></tr>
 <tr><td colspan="2" align="right">
 <form method="post" name="form_2" enctype="multipart/form-data">
 <table width="100%" border="1"    cellpadding="0" cellspacing="3" >
 
 <tr><td width="86%" align="right"  >
 <input type="text" size="60" name="subject" class="newinput" style="width:70%" dir="rtl"   ></td>
 <td width="14%" class="myselect">   عنوان الرسالة</td>
 </tr>
  <tr><td   height='1' bgcolor='#CCCCCC' colspan="2"></td></tr>

  <tr><td align="right"  >
 <input type="text" size="60" name="to" class="newinput"   dir="rtl"></td>
 <td class="myselect">   مرسلة إلي</td></tr>
  <tr><td   height='1' bgcolor='#CCCCCC' colspan="2"></td></tr>
  
  <tr><td align="right"  >
 <input type="file"   name="file1"   dir="rtl" style="width:60%; border:1px #999999 solid"></td>
 <td class="myselect">   مرفقات</td></tr>
  <tr><td   height='1' bgcolor='#CCCCCC' colspan="2"></td></tr>
 

 <tr><td  align="right" colspan="2" >
 <?php
 $this->load->library('Configer');
 $conf=$this->configer->getConfiger();
 $this->load->helper('texteditor');
 Textedtior($conf['editor']);
 
 ?>
 
 <textarea cols="100"   rows="9" name="input" id="input" class="newinput" style="width:70%"></textarea></td> </tr>
 <tr><td   height='1' bgcolor='#CCCCCC' colspan="2"></td></tr>
<input type="hidden" value="Send" name="IsPost">
<tr><td  align="center" colspan="2" >
<input type="submit" value="إرسال " class="button" onclick="return validate1(this.form);"></td></tr>
 </table>
   </form>
</td></tr></table>


 
