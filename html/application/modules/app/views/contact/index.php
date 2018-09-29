<?php
@session_start();
 
$this->load->helper('url');
$this->load->helper('html');
$base= base_url("html/application/modules/app/views/layouts/default/");
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script  type="text/javascript">
function validate_co(myform){
var pattern1=new RegExp("^([-a-z0-9_]+(\.[_a-z0-9-]+)*@([a-z0-9-]+(\.[a-z0-9-]+)+))$","i");
if(myform.title.value==""){
alert("عنوان الرسالة  مفقود");
return false;
} 

else if(pattern1.test(myform.email.value)==false){
alert("البريد غير صحيح");
return false;
} 

else if(myform.msg.value==""){
alert("محتوي الرسالة مفقود");
return false;
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

<script type="text/javascript" src="<?php echo base_url('bin/reCaptcha/');?>/jquery-1.2.6.min.js"></script>
<link href="<?php echo base_url('bin/reCaptcha/');?>/style.css" rel="stylesheet" type="text/css">

<script type="text/javascript" src="<?php echo  $base;?>/js/rounded_corners_lite.inc.js"></script>
<link href="<?php echo $base;?>/css/themes.css" rel="stylesheet" type="text/css" media="all" />



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

   <table width="90%" align="center" dir="ltr">
<tr> <td> <div     id="info_1" class="roundedCorner" >
<TABLE cellSpacing=0   cellPadding=0  border="0" width="100%">
  <TBODY>
  <TR vAlign=top>
      <TD width='10px' >
      
 </TD>
    <TD width='20%'  height="20px">   
    
 </TD>
      <TD width="60%" class="myselect" align="right" valign="middle">أتصل بنا</TD>
        <TD width=10 valign="middle">
<CENTER><IMG src="<?php echo $base;?>/img/Sites.png"  /></CENTER></TD>
    <TD width=10></TD></TR></TBODY></TABLE>
    </div>  </td></tr>
 </table>
 
 <!--*****************************************-->      




 

<?php //echo validation_errors(); ?>
<?php
 $this->load->library('Msg');
 if(@$validateerror=="error"){
  echo $this->msg->SendMsg(' أتصل بنا ',validation_errors(),3);

 }
 ?>
 
 
 <?php
if(@$errorcaptach=="error"){
 echo $this->msg->SendMsg(' أتصل بنا ','   كود التحقق غير صحيح ',3);
}


if(@$senddata=="ok"){
 echo $this->msg->SendMsg(' أتصل بنا ','   تم إرسال رسالتك إلي إدارة الموقع ',1);
}
?>


 
 
<table align="center" width="100%" cellpadding="0" cellspacing="5" style="border:1px #CCCCCC solid">
<form method="post" name="form1">

<tr><td  align="right"><input type="text" name="title" size="35" class="text_field" /></td><td  class="myselect">عنوان الرسالة</td></tr>

<tr><td colspan="2" height="1px" bgcolor="#CCCCCC"></td></tr>

<tr><td align="right"><input type="text" name="email" size="35" class="text_field" /></td><td  class="myselect">البريد الالكتروني</td></tr>
<tr><td colspan="2" height="1px" bgcolor="#CCCCCC"></td></tr>

<tr><td align="right"><textarea cols="50" rows="9" class="text_field" name="msg" ></textarea></td><td  class="myselect">الرسالة</td></tr>
 <tr><td colspan="2" height="1px" bgcolor="#CCCCCC"></td></tr>
<input type="hidden" value="sendmail" name="IsPost">

 
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
 
 


<tr><td align="center"><input type="reset" value="مسح  " class="button">&nbsp;&nbsp;&nbsp;&nbsp;
  <input type="submit" value="إرسال" class="button" onclick="return validate_co(this.form);" />
</td>
  <td align="left">&nbsp;
  
  <input type="hidden" value="Send" name="IsPost">
  
  
  </td>
</tr>
</form>
</table>





 


<script type="text/javascript">
settings = {tl: { radius: 6 },tr: { radius: 6 },bl: { radius: 6 },br: { radius: 6 },antiAlias: true,autoPad: true,validTags: ["div"]}
 var myBoxObject = new curvyCorners(settings, "roundedCorner");
 myBoxObject.applyCornersToAll();
</script>
