 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript">

function validates(myform){
 var pattern1=new RegExp("^([-a-z0-9_]+(\.[_a-z0-9-]+)*@([a-z0-9-]+(\.[a-z0-9-]+)+))$","i");
if(myform.email.value==""){
alert('البريد مفقود');
return false;
} else {

return true;
}



}

</script>

 <table cellpadding='0' cellspacing='0' width='100%' dir="rtl">
<tr>
<td class='scapmain-left'></td>
<td class='scapmain'>إستعادة كلمة المرور</td>
<td class='scapmain-right'></td>
</tr>
</table>
<table cellpadding='0' cellspacing='0' width='100%' class='spacer' dir="rtl">
<tr>
<td class='side-body' dir="ltr" align="center">

<?php
$this->load->library('Msg');
switch(@$rs_restore){

 

case "ERROR_FOUND":
 echo $this->msg->SendMsg(' العضوية ',"البريد غير مسجل",2);
break;


case "SEND":
 echo $this->msg->SendMsg(' العضوية ',"تم إرسال الحساب الجديد إلي صندوق بريديك",1);
break;


case "ERRORMAIL":
 echo $this->msg->SendMsg(' العضوية ',"فشل في إرسال البريد من فضلك حاول الارسال في وقت لاحق..",3);
break;


}

?>






<table align="center" width="100%" class="myselect2" dir="ltr">
<form method="post" name="form_restore">
 

<tr><td align="right"><input type="text" name="email" class="text_field"   size="50" /></td><td class="blocks">البريد الالكتروني</td></tr>
<tr><td colspan="2" align="center">
<input type="submit" class="button" value="إرسال بيانات الحساب"  onclick="return validates(this.form);" />
<input type="hidden" value="restore" name="IsPost">
</td></tr>
</form>
</table>











</td></tr></table>