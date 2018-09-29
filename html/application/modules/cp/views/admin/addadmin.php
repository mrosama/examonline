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
 <option class="myoption"     value="<?php echo base_url("cp/admin/viewadmin");?>">عرض المشرفين</option>
<option   class="myoption"  selected="selected" 
value="<?php echo base_url("cp/admin/addadmin");?>" >مشرف جديد</option>
  </select> </TD>
      <TD width="60%" class="myselect" align="right" valign="middle">مشرف جديد</TD>
        <TD width=10 valign="middle">
<CENTER><IMG src="<?php echo base_url("html/application/modules/cp/views/layouts/img/");?>/page_skin.png"  /></CENTER></TD>
    <TD width=10></TD></TR></TBODY></TABLE>
    </div>  </td></tr>
 </table>
 
 
 
 <!--*****************************************-->
 <script type="text/javascript" src="<?php echo base_url('bin/password-strength/');?>/password-strength-meter.js"></script>
 <style>
#pass-strength-result {
margin: 12px 1px 5px 5px;
}

#pass-strength-result {
	border-style: solid;
	border-width: 1px;
	
	 
	 
	margin: 12px 5px 5px 1px;
	padding: 3px 5px;
	text-align: center;
	width: 200px;
}
#pass-strength-result.strong{background-color:#c3ff88;border-color:#8dff1c!important;}
/* password strength meter */
#pass-strength-result {
	background-color: #eee;
	border-color: #ddd !important;
}

#pass-strength-result.bad {
	background-color: #ffb78c;
	border-color: #ff853c !important;
}

#pass-strength-result.good {
	background-color: #ffec8b;
	border-color: #fc0 !important;
}

#pass-strength-result.short {
	background-color: #ffa0a0;
	border-color: #f04040 !important;
}

#pass-strength-result.strong {
	background-color: #c3ff88;
	border-color: #8dff1c !important;
}



.table_sub TD {
	BORDER-RIGHT: #f0f0f0 1px solid; BORDER-TOP: #f0f0f0 1px solid; VERTICAL-ALIGN: top; BORDER-LEFT: #f0f0f0 1px solid; BORDER-BOTTOM: #f0f0f0 1px solid
}
.odd {
	BACKGROUND-COLOR: #fafafa
}
.table_sub TH {
	BORDER-BOTTOM: #e0e0e0 1px solid
}

</style>
 
 
<script type="text/javascript">
jQuery(document).ready( function() {

var pwsL10n=new Array();
pwsL10n['bad']='bad Password';
pwsL10n['good']='good password';
pwsL10n['strong']='strong Password';
pwsL10n['short']='short password';
 function check_pass_strength() {
		var pass = $('#pass1').val(), user = $('#username').val(), strength;

		jQuery('#pass-strength-result').removeClass('short bad good strong');
		if ( ! pass ) {
			jQuery('#pass-strength-result').html( pwsL10n.empty );
			return;
		}

		strength = passwordStrength(pass, user);

		switch ( strength ) {
			case 2:
				jQuery('#pass-strength-result').addClass('bad').html( pwsL10n['bad'] );
				break;
			case 3:
				jQuery('#pass-strength-result').addClass('good').html(pwsL10n['good'] );
				break;
			case 4:
				jQuery('#pass-strength-result').addClass('strong').html( pwsL10n['strong'] );
				break;
			default:
				jQuery('#pass-strength-result').addClass('short').html( pwsL10n['short'] );
		}
	}



jQuery('#pass1').val('').keyup( check_pass_strength );

});


//////////////////////////////

function validateadmin(myform){

if(myform.adminname.value==""){
alert("أسم المشرف مفقود");
return false;
}

else if(myform.email.value==""){
alert("البريد مفقود");
return false;
}

else if(myform.username.value==""){
alert("أسم المستخدم مفقود");
return false;
}

else if(myform.password.value==""){
alert("كلمة المرور مفقودة");
return false;
}

else if(myform.password.value!=myform.cpassword.value){
alert("كلمة المرور لا تساوي تأكيد كلمة المرور");
return false;
}



else {

return true;
}


}

</script>



   <table width="100%" border="1"    cellpadding="0" cellspacing="3" class="border_table1" >
 <tr><td>

  <?php
 $this->load->library('Msg');
 if($errorsadmin=='add'){
 echo $this->msg->SendMsg(' المشرفين ','  تم إضافة المشرف  ',1);
 }
  if($errorsadmin=='error'){
 echo $this->msg->SendMsg(' المشرفين ','  بيانات المشرف مسجلة من قبل  ',2);
 }
 
 ?>

 
  <form method="post" name="form_6">
 <table width="100%" border="1"    cellpadding="0" cellspacing="3" >
 <tr><td align="right"  >
 <input type="text" size="40" name="adminname" class="newinput" maxlength="50"   ></td>
 <td class="myselect">اسم المشرف</td></tr>
 <tr><td   height='1' bgcolor='#CCCCCC' colspan="2"></td></tr>
 <tr><td  align="right" ><input type="text" size="40" name="email" class="newinput"></td><td class="myselect">البريد الالكتروني</td></tr>
 <tr><td  align="right" ><input type="text" size="20" name="username" id="username" class="newinput" maxlength="25" style="width:40%" ></td><td class="myselect">اسم المستخدم</td></tr>
 
  <tr><td  align="right" >
  
 <IMG title="صلاحيات المدير العام إنشاء حسابات المشرفين والتحكم في إعدادات الموقع  " src="<?php echo base_url("html/application/modules/cp/views/layouts/img/");?>/icon14.gif"  />
  
  <select name="role" class="newinput" style="width:200px">
  <option value="6">مدير عام</option>
    <option value="2">مشرف</option>
  </select>
  </td><td class="myselect">المجموعة</td></tr>
 
 
  <tr><td  align="right" ><input type="password" size="15" name="password" id="pass1" class="newinput" autocomplete="off"  maxlength="15" style="width:20%"></td><td class="myselect">كلمة المرور</td></tr>
   <tr><td  align="right" ><input type="password" size="15" name="cpassword" class="newinput" autocomplete="off" maxlength="15" style="width:20%"></td><td class="myselect">تأكيد كلمة المرور</td></tr>
   
   <tr><td   class="myselect" align="right">
 <table align="right">
 <tr>
 <td>
   <div id="pass-strength-result">مؤشر قوة كلمة المرور</div> 
  <IMG title="تلميح: كلمة مرورك يجب أن تحتوى 7 حروف على الأقل. لجعلها أقوى، استخدم الحروف الكبيرة والصغيرة والأرقام والرموز مثل !؟$%^" src="<?php echo base_url("html/application/modules/cp/views/layouts/img/");?>/icon14.gif"  />
 </td></tr></table>
   </td>
 <td></td>
   </tr>
   
   
<tr><td   height='1' bgcolor='#CCCCCC' colspan="2"></td></tr>
 <input type="hidden" value="newAdmin" name="IsPost">
 <tr><td  align="center" colspan="2" >
 
  <input type="submit" value=" حفظ البيانات " class="button"  onClick="return validateadmin(this.form)" >
 
 
 </td></tr>
 </table>
   </form>
  
 </td></tr></table>
 