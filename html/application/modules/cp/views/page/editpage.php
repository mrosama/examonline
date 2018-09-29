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
 <option class="myoption"     value="<?php echo base_url("cp/page/listpage");?>"> أرشيف الصفحات</option>
<option   class="myoption"  selected="selected" 
value="<?php echo base_url("cp/page/index");?>" >صفحة جديدة</option>
  </select> </TD>
      <TD width="60%" class="myselect" align="right" valign="middle">صفحة جديدة</TD>
        <TD width=10 valign="middle">
<CENTER><IMG src="<?php echo base_url("html/application/modules/cp/views/layouts/img/");?>/content.png"  /></CENTER></TD>
    <TD width=10></TD></TR></TBODY></TABLE>
    </div>  </td></tr>
 </table>
 
 <!--*****************************************-->
 
 <script type="text/javascript">
 
 function validate2(myform){
 
 if(myform.name.value==""){
 alert("أسم الصفحة مفقود");
 return false;
 }
 
 else if(myform.title.value==""){
  alert("عنوان الصفحة مفقود");
 return false;
 }
 
 else if(myform.cat.value=="0"){
  alert("من فضلك أختار قسم");
 return false;
 }
 
 
 else {
 return true;
 }
 
 
 }
 
 </script>
 
 
  <?php
 $this->load->library('Msg');
 if(@$addpage=='ok'){
 echo $this->msg->SendMsg(' الصفحات ','    تم تعديل الصفحة',1);
 } 
 
 
 ?>
 
<table align="center" width="90%" cellpadding="0" cellspacing="0"  class="menu_m6" dir="rtl ">
 <tr ><td align="right" class="blocks"></td>
 <td width="5%"></td></tr>
 <tr><td colspan="2" align="right">
 
 <form method="post" name="form_2" enctype="multipart/form-data">
 <table width="100%" border="1"    cellpadding="0" cellspacing="3" >
 
  
  
  <tr><td  align="right" ><input type="text" size="30" name="name" class="newinput" value="<?php echo $page['name'];?>"></td><td class="myselect">أسم الصفحة</td></tr>
 <tr><td   height='1' bgcolor='#CCCCCC' colspan="2"></td></tr> 
 
 <tr><td  align="right" ><input type="text" size="40" name="title" class="newinput" value="<?php echo $page['title'];?>"></td><td class="myselect">عنوان الصفحة</td></tr>
 <tr><td   height='1' bgcolor='#CCCCCC' colspan="2"></td></tr>
 
 <tr><td align="right" ><?php  echo @$cat;?></td><td class="blocks">القسم</td></tr>

 

 

 <tr><td   height='1' bgcolor='#CCCCCC' colspan="2"></td></tr>
 <tr><td  align="right"  colspan="2" class="blocks" >خيارات الصفحة</td></tr>
  <tr><td   height='1' bgcolor='#CCCCCC' colspan="2"></td></tr>
 <tr><td colspan="2" align="right">
<table align="center" width="60%">
<tr>
<td align="right" class="myselect">Pdf</td>
<td><IMG src="<?php echo $base;?>/img/pdf_button.png"><input type="checkbox" class="newinput" name="allow_pdf" value="YES"  <?php if($page['allow_pdf']=='YES'){ echo "checked";}?> ></td>
 <td align="right" class="myselect">أضف للمفضلة</td>
 <td> <IMG src="<?php echo $base;?>/img/14.png"><input type="checkbox" class="newinput" name="allow_fav" value="YES" <?php if($page['allow_fav']=='YES'){ echo "checked";}?> ></td>
 <td align="right" class="myselect">إرسال لصديق</td>
 <td><IMG src="<?php echo $base;?>/img/icon_envelope.gif"><input type="checkbox" class="newinput" name="allow_send" value="YES" <?php if($page['allow_send']=='YES'){ echo "checked";}?> ></td>
 <td align="right" class="myselect">طباعة</td>
 <td><IMG src="<?php echo $base;?>/img/print.gif"><input type="checkbox" class="newinput" name="allow_print" value="YES" <?php if($page['allow_print']=='YES'){ echo "checked";}?> ></td>
 </tr>
 </table>
 </td></tr>
 
  <tr><td   height='1' bgcolor='#CCCCCC' colspan="2"></td></tr>


 

 <tr><td  align="right"  colspan="2" class="blocks" > محتوي الصفحة</td></tr>
 
<tr><td  align="right"   colspan="2">
 <?php
 $this->load->library('Configer');
 $conf=$this->configer->getConfiger();
 $this->load->helper('texteditor');
 Textedtior($conf['editor']);
 
 ?>
<textarea cols="100" rows="20" class="newinput" dir="rtl" name="input" id="input" style="width:80%">
<?php echo $page['content'];?>
</textarea></td></tr>
 
 
 
 
   <tr><td   height='1' bgcolor='#CCCCCC' colspan="2"></td></tr>
 
 
  <tr><td  align="right" >
  <table align="right" width="40%">
<tr><td align="right"><input type="radio" value="YES" checked="checked"  name="active" class="newinput" <?php if($page['active']=='YES'){ echo "checked";}?>></td><td class="blocks">نعم</td>
<td align="right"><input type="radio" value="NO"   name="active"  class="newinput" <?php if($page['active']=='NO'){ echo "checked";}?>></td><td class="blocks">لا</td></tr>
</table>
  </td><td class="blocks">تفعيل الصفحة</td></tr>
   <tr><td   height='1' bgcolor='#CCCCCC' colspan="2"></td></tr>
    <input type="hidden" value="<?php echo $page['ID'];?>" name="id">
  <input type="hidden" value="update" name="IsPost">
  <tr><td  align="center" colspan="2" >
  
  <input type="button" value=" عودة " class="button" onClick="location.href='<?php echo base_url('cp/page/listpage');?>' " />
  
  &nbsp;  &nbsp;  &nbsp;
  <input type="submit" value="  حفظ " class="button" onClick="return validate2(this.form);"></td></tr>
 </table>
   </form>
 
 </td></tr></table> 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 