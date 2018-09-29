<?php
$this->load->model('admin_model');
$this->admin_model->CheckPremision();
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
 $this->load->library('Msg');
?>


   <table align="center" width="100%">
 <tr><td align="right"valign="top">
 <?php
  echo $this->msg->SendMsg(' قاعدة البيانات ','     تم إستعادة قاعدة البيانات ',1);
?>
 </td></tr>
 <tr><td colspan="2" align="center"><input type="button" class="button" onclick="history.back()" value="عودة"></td></tr>
 </table>
 

