<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php
$this->load->library('Msg');

$msg="<ul>
<li>غير مسموح بعرض محتويات الصفحة</li>
<li>يجب عليك ترقية حسابك إلي مدير عام لمشاهدة الصفحة</li>
</ul>";
echo $this->msg->SendMsg("تنبية",$msg,3);

?>