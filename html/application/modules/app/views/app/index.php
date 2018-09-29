<?php
@session_start();
$_SESSION = array();
session_unset();
session_destroy();

/*
$_SESSION["e_exam"]="";
$_SESSION['exam_duration']="";
$_SESSION["exam_rem_duration"]="";
$_SESSION['exam_question']="";
$_SESSION["e_mark"]="";
$_SESSION['exam_profile']="";
$_SESSION['exam_cat']="";
*/
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
$this->load->helper("html");
$this->load->helper('url');
$this->load->library("Configer");
$Setting=$this->configer->getConfiger();
$base= base_url("html/application/modules/app/views/layouts/default/");
?>

<noscript>
<meta http-equiv="refresh" content="0;url=<?php echo base_url("app/");?>">
</noscript>


<script type="text/javascript">



function validate1(myform){
if(myform.email.value==""){
alert("من فضلك أدخل البريد الالكتروني");
return false;
} 
else if(myform.password.value==""){
alert("من فضلك أدخل كلمة المرور");
return false;
}

else if(myform.cat.value==0){
alert("من فضلك أختار الاختبار من القائمة");
return false;
}


else {


return true;
}

}



 jQuery(document).ready(function() {
		
		
		jQuery("#reg").fancybox({
				'width'				: '89%',
				'height'			: '89%',
				'autoScale'			: true,
				'transitionIn'		: 'fade',
				'transitionOut'		: 'none',
				'type'				: 'iframe'
			});
	
	
			})
    </script>

 <table align="center" width="100%" cellpadding="0" cellspacing="3">
 <tr><td align="right" height="30%" class="dor">
 <?php
if($Setting['welcome']=='YES'){
 echo $Setting['welcome_msg'];
 }
 ?>
 </td></tr>
 <tr><td height="1px"  bgcolor="#CCCCCC"></td></tr>
 
  <tr><td align="center"  height="70%">
  <br/>
<fieldset style="width:60%">
 
 <table width="60%" border="0">
 <form method="post" name="form_1" enctype="multipart/form-data">
  <tr>
    <td align="right"><input type="text" size="15" name="email" class="inputs" /></td>
    <td  class="dor" align="center">البريد الالكتروني</td>
    <td rowspan="2"><img src="<?php echo $base;?>/img/Friends.png" style="border:1px #FFCC00 solid"></td>
  </tr>
  <tr>
    <td align="right"><input type="password" size="15" name="password" class="inputs"  /></td>
    <td class="dor" align="center">كلمة المرور</td>
  </tr>
  <tr>
    <td align="right">
    <select name="cat" class="selects" style="width:150px">
    <option value="0">-- -- --</option>
    <?php
    if(is_array(@$cat)){
	foreach(@$cat as $row){
	?>
 <option value="<?php echo $row['ID'];?>"><?php echo $row['name'];?></option>

	<?php
	}
	
	}
	?>
    </select>    </td>
    <td class="dor" align="center">ألاختبار</td>
    <td>&nbsp;</td>
  </tr>
    <tr>
    <td  class="dor" align="center" colspan="3">
    <input type="submit" value=" دخول " name="enter" class="buttonnext"  onclick="return validate1(this.form)"> </td>
    </tr>
  <tr>
    <td  class="dor" align="right" valign="middle">
    
    <?php echo anchor("app/member/reg","مستخدم جديد","id='reg'");?>    </td>
    <td colspan="2"  valign="middle"><img src="<?php echo $base;?>/img/icon_user2.gif"></td>
    </tr>
  <tr>
    <td colspan="3" align="center" class="dor">
    <?php
    switch(@$logins){
	
	case "error":
	echo "<font color='red'>!!.. خطأ في تسجيل الدخول </font>";
	break;
	case "foundbefore":
		echo "<font color='red'>البريد الالكتروني مسجل من قبل لهذا الاختبار</font>";
	break;
	
	}
	?>
    
        </td>
    </tr>
    <input type="hidden" value="Auth" name="IsPost">
  </form>
</table>
 
 
 
 
</fieldset>
  
  <br/>
  
  </td></tr>
 
 
  <tr><td height="1px"  bgcolor="#CCCCCC"></td></tr>
 
 </table>
 
 <br/>
 
 