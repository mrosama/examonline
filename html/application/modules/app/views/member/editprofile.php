<?php
@session_start();
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


<?php
 
$this->load->helper('url');
$base= base_url("html/application/modules/app/views/layouts/default/");
 


if($this->session->userdata('CA_login')==false){
//redirect('app/', 'refresh');
show_404();
 }

?>


 



<script type="text/javascript" src="<?php echo base_url('bin/reCaptcha/');?>/jquery-1.2.6.min.js"></script>
<link href="<?php echo base_url('bin/reCaptcha/');?>/style.css" rel="stylesheet" type="text/css">

<script>
$(document).ready(function() { 

 // refresh captcha
 $('img#captcha-refresh').click(function() {  
		
		change_captcha();
 });
 
 function change_captcha()
 {
	document.getElementById('captcha').src="<?php echo base_url('bin/reCaptcha/');?>/get_captcha.php?rnd=" + Math.random();
 }
 
});
 	
</script>

 <script type="text/javascript" src="<?php echo base_url('bin/password-strength/');?>/password-strength-meter.js"></script>

<style>
#pass-strength-result {
margin: 12px 1px 5px 5px;
}

#pass-strength-result {
	border-style: solid;
	border-width: 1px;
	color:#000033;
	
	 
	 
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



 
</style>

<script> 
 


$(document).ready( function() {

var pwsL10n=new Array();
pwsL10n['bad']='bad Password';
pwsL10n['good']='good password';
pwsL10n['strong']='strong Password';
pwsL10n['short']='short password';
 function check_pass_strength() {
		var pass = $('#pass1').val(), user = $('#username').val(), strength;

		$('#pass-strength-result').removeClass('short bad good strong');
		if ( ! pass ) {
			$('#pass-strength-result').html( pwsL10n.empty );
			return;
		}

		strength = passwordStrength(pass, user);

		switch ( strength ) {
			case 2:
				$('#pass-strength-result').addClass('bad').html( pwsL10n['bad'] );
				break;
			case 3:
				$('#pass-strength-result').addClass('good').html(pwsL10n['good'] );
				break;
			case 4:
				$('#pass-strength-result').addClass('strong').html( pwsL10n['strong'] );
				break;
			default:
				$('#pass-strength-result').addClass('short').html( pwsL10n['short'] );
		}
	}



$('#pass1').val('').keyup( check_pass_strength );

});

////////////////////////////////////////////////////////////////////



 


function validate5(myform){
var emailfilter=/^\w+[\+\.\w-]*@([\w-]+\.)*\w+[\w-]*\.([a-z]{2,4}|\d+)$/i
 var pattern1=new RegExp("^([-a-z0-9_]+(\.[_a-z0-9-]+)*@([a-z0-9-]+(\.[a-z0-9-]+)+))$","i");

if(myform.name.value==""){
alert("ألاسم مفقود");
return false;
}

else if(myform.username.value==""){
alert("أسم المستخدم مفقود");
return false;
}

else if(emailfilter.test(myform.email.value)==false){
alert("البريد مفقود او غير صحيح");
return false;
}


else if(myform.password.value!=""){

 if(myform.password.value!=myform.cpass.value){
alert("كلمة المرور لا تساوي تأكيد كلمة المرور");
return false;
}else{
return true;
}


}


else if(myform.captchacode.value==""){
alert("كود التحقق مفقود");
return false;
}

else {

return true;
}




}


 

</script>
 

<table cellpadding='0' cellspacing='0' width='100%' dir="rtl">
<tr>
<td class='scapmain-left'></td>
<td class='scapmain'>تعديل البيانات</td>
<td class='scapmain-right'></td>
</tr>
</table>
<table cellpadding='0' cellspacing='0' width='100%' class='spacer' dir="rtl">
<tr>
<td class='side-body' dir="ltr" align="center">
<?php
$this->load->library('Msg');
switch(@$resultmember){

case "ERROR_VALIDATE":
  echo $this->msg->SendMsg(' العضوية ',validation_errors(),3);
break;


case "ERROR_FOUND":
 echo $this->msg->SendMsg(' العضوية ',"اسم المستخدم والبريد مسجل من قبل",2);
break;


case "ERROR_NOERROR":
 echo $this->msg->SendMsg(' العضوية ',"تم تسجيل العضوية بنجاح",1);
break;


case "ERROR_CODE":
 echo $this->msg->SendMsg(' العضوية ',"كود التحقق غير صحيح",3);
break;


}

?>



<table align="center" width="100%"    cellpadding="0" cellspacing="3">

<form name="form_reg" method="post"  >
<tr><td width="32%"></td>
<td width="39%" align="right"><input type="text" size="35" class="text_field" name="name" autocomplete=off  value="<?php echo $profile['name'];?>"/></td><td align="right" class="" width="29%">ألاسم</td>
</tr>
<tr><td colspan="3" bgcolor="#CCCCCC" height="1"></td></tr>
<tr><td align="right"><span id="check1"></span></td>
<td align="right"><input type="text" size="35" class="text_field" id="email" name="email" maxlength="100" autocomplete=off   value="<?php echo $profile['email'];?>"/></td>
<td class="" align="right">البريد الالكتروني</td></tr>
<tr><td colspan="3" bgcolor="#CCCCCC" height="1"></td></tr>

<tr><td align="right"><span id="check2"></span></td>
<td align="right"><input type="text" size="20" class="text_field" disabled="disabled"  id="username" name="username" maxlength="20" autocomplete=off  value="<?php echo $profile['username'];?>"/></td>
<td class="" align="right">أسم المستخدم</td>
</tr>
<tr><td colspan="3" bgcolor="#CCCCCC" height="1"></td></tr>
 
<tr><td align="right"></td>
<td align="right"> <select name="country" class="text_field" style="width:250px">
 <?php
 if(is_array($country)){
 foreach($country as $city){
 
   $ne=iconv("UTF-8","ISO-8859-1",$city['country']);
$country= iconv("windows-1256","UTF-8",$ne);
 
 ?>
 <option  value="<?php echo $city['code'];?>" <?php if($profile['country']==$city['code']){ echo "selected='selected'";}?>><?php echo $country;?></option>
 <?php
 }
 }
 
 ?>
 </select></td>
<td class="" align="right">الدولة</td></tr>
<tr><td colspan="3" bgcolor="#CCCCCC" height="1"></td></tr>


<tr><td align="right"></td>
<td align="right"> <select name="gender" class="text_field" style="width:200px">
 
 <option value="M" <?php if($profile['gender']=='M'){ echo "selected='selected'";}?>>ذكر</option>
  <option value="F" <?php if($profile['gender']=='F'){ echo "selected='selected'";}?>>أنثي </option>
 </select></td>
<td class="" align="right">الجنس</td></tr>
<tr><td colspan="3" bgcolor="#CCCCCC" height="1"></td></tr>


 
<tr>

<td align="left">
 
<div id="pass-strength-result" >&nbsp;</div> 

 

</td>
<td align="right"> <input  type="password" size="15" name="password" id="pass1"  class="text_field"   maxlength="20" autocomplete=off /></td>
<td class="" align="right">كلمة المرور</td></tr>
<tr><td colspan="3" bgcolor="#CCCCCC" height="1"></td></tr>
<tr>
<td></td>
<td align="right"><input type="password"  name="cpass" size="15" class="text_field" maxlength="20" autocomplete=off /></td>
<td class="" align="right">تأكيد كلمة المرور</td></tr>
<tr><td colspan="3" bgcolor="#CCCCCC" height="1"></td></tr>

 <tr><td colspan="3">
 <tr><td colspan="2" align="center" >

	<div id="captcha-wrap" >
		<div class="captcha-box">
			<img src="<?php echo base_url('bin/reCaptcha/');?>/get_captcha.php" alt="" id="captcha" />
		</div>
		<div class="text-box">
			<label>Type the two words:</label>
			<input name="captchacode" type="text" id="captchacode">
		</div>
		<div class="captcha-action">
			<img src="<?php echo base_url('bin/reCaptcha/');?>/refresh.jpg"  alt="" id="captcha-refresh" />
		</div>
	</div>
	

</td></tr>
 
 
 
 
 
 
 
 
 




<tr><td colspan="3" align="center">

<input type="submit" value="تعديل البيانات"  class="button" onclick="return validate5(this.form);"   name="b1" id="b1">
</td></tr>



<input type="hidden" value="editUser" name="IsPost">
<input type="hidden" value="<?php echo $profile['ID'];?>" name="id">
</form>
</table>


 </td></tr></table>
