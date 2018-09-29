<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php
 
$this->load->helper('url');
$base= base_url("html/application/modules/app/views/layouts/default/");
 


if($this->session->userdata('CA_login')==false){

 

?>
 <table align="center" cellpadding="0" cellspacing="2">
<form method="post" name="form_login">

<tr><td class="" align="center">أسم المستخدم</td></tr>
<tr><td align="center"><input type="text" name="username" size="16" class="user_name"  dir="rtl" autocomplete=off></td></tr>
<tr><td class=" " align="center">كلمة المرور</td></tr>
<tr><td align="center"><input type="password" size="16" name="password" class="user_pass" dir="rtl" autocomplete=off></td></tr>

<tr>
 <td  align="center"  >
 <input type="submit" value="دخول  "   class="button"></td></tr>
<tr><td  align="center" >
<a href="" class=" "></a>

<?php
echo anchor("app/member/restoremail","إستعادة كلمة المرور");
?>
</td></tr>
<tr><td  align="center" >
 

<?php
echo anchor("app/member/reg","مستخدم جديد");
?>
</td></tr>
 
 <input type="hidden" value="Auth" name="IsPost">
</form>
<tr><td   dir="ltr">
<?php
if(@$Auth_result=="Error"){
echo "<font color='red'>خطأ في تسجيل الدخول</font>";
}

?>

 
</td></tr>
</table>

<?php
} else {
?>




 <table align="center" width="100%" dir="ltr">
<tr><td align="right"  width="60%"><?php  echo $this->session->userdata('CA_name');?></td>
<td   align="right">/ مرحبا </td><td width="3%">
<img src="<?php echo $base;?>/img/PostAuthorIcon.png"></td></tr>

<tr><td align="right"   colspan="2">
 
<?php
echo anchor("app/member/editprofile","الملف الشخصي");
?>

</td> <td width="3%"><img src="<?php   echo $base;?>/img/page_skin.png"></td></tr>

<tr><td align="right"   colspan="2">


<?php
echo anchor("app/greeting/add","أضف إهداء");
?>

</td> <td width="3%"><img src="<?php  echo $base;?>/img/wink.gif"></td></tr>


<tr><td align="right"   colspan="2">
 
<?php
echo anchor("app/member/logout","تسجيل خروج","onClick='return log_out();'");
?>

</td> <td width="3%"><img src="<?php echo $base;?>/img/logout.gif"></td></tr>
</table>














<?php
}
?>