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
    
    <select name="action" class="newinput" style="width:180px" onChange="location.href=this.value ">
 <option class="myoption"  selected="selected"   value="<?php echo base_url("cp/admin/listemail");?>">البريد الوارد</option>
<option   class="myoption"  
value="<?php echo base_url("cp/admin/email");?>" >إرسال بريد</option>
  </select> </TD>
      <TD width="60%" class="myselect" align="right" valign="middle">عرض الرسالة</TD>
        <TD width=10 valign="middle">
<CENTER><IMG src="<?php echo base_url("html/application/modules/cp/views/layouts/img/");?>/icl2e.gif"  /></CENTER></TD>
    <TD width=10></TD></TR></TBODY></TABLE>
    </div>  </td></tr>
 </table>
 
 <!--*****************************************-->
 
 
 <table align="center" width="90%" cellpadding="0" cellspacing="0"  class="menu_m6" dir="ltr">
 
 <tr><td colspan="2" align="right">
 
<table class="widefat fixed" cellspacing="0" border="0" width="100%" dir="ltr">

 <tr><td align="right"><?php echo @$inbox['subject'];?></td><th width="30%">عنوان الرسالة</th></tr>
 <tr><td align="right"><?php echo @$inbox['email'];?></td><th width="30%">البريد الالكتروني</th></tr>
  <tr><td align="right"><?php echo @$inbox['dat'];?></td><th width="30%">تاريخ الارسال</th></tr>
  
    <tr>
      <td align="right"><?php echo @$inbox['message'];?>
      </td><th width="30%" valign="middle">محتوي الرسالة</th></tr>
  
  <tr><td   align="center" colspan="2" >


  <table align="center" width="100%">
  <tr>
  <td align="center">
  <input type="button" value="حذف الرسالة" 
  onClick="location.href=('<?php echo base_url("cp/admin/delemail/id/$inbox[ID]");?>')" class="button" /></td>
    <td align="center"><input type="button" value="   عودة  " onClick="history.back();" class="button" /></td>
      <td align="center"><input type="button" value="رد علي الرسالة" onClick="location.href=('<?php echo base_url("cp/admin/replayemail/id/$inbox[ID]");?>')" class="button" /></td>
  </tr>
  </table>


   </td></tr>
  
  
 
 </table></td></tr></table>
 
 
 
 
 