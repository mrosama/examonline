
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <table cellpadding='0' cellspacing='0' width='100%' dir="rtl">
<tr>
<td class='scapmain-left'></td>
<td class='scapmain'>إستعادة كلمة المرور</td>
<td class='scapmain-right'></td>
</tr>
</table>
<table cellpadding='0' cellspacing='0' width='100%' class='spacer' dir="rtl">
<tr>
<td class='side-body'  >
<?php
 $this->load->library('Msg');

switch(@$MailListResult){
case "CODE":
echo $this->msg->SendMsg(' العضوية ',"رابط تفعيل إستعادة الحساب غير صحيح",3);
break;


case "NOTFOUND":
echo $this->msg->SendMsg(' العضوية ', "بيانات العضوية غير صحيحة",2);
break;


case "change":
echo $this->msg->SendMsg(' العضوية ',"تم تفعيل تغير كلمة المرور بنجاح...شكرا لك علي أستخدامك موقعنا",1);
break;


case "URL":
echo $this->msg->SendMsg(' العضوية',"  رابط تفعيل إستعادة الحساب غير صحيح",3);
break;


 




}



?>
</td></tr></table>