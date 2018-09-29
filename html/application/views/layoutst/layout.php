<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
-->
</style></head>

<body>
<table width="100%" border="1" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="3"><?php
     $this->load->view('layouts/header');
	?></td>
  </tr>
  <tr>
    <td width="20%" valign="top">
    
<?php
//APPPATH.'controllers/
  //  $this->load->view('login',@$data);
 // login::instance('login')->index();  
 /*
 $this->load->helper('action');
 action();
 */
 $this->load->helper('inc');
   inc();
 ?></td>
    
    
    
    <td width="61%">
    
<?php

 $this->load->view($conten_page);


?>
    
    
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p></td>
    <td width="19%" valign="top">//////</td>
  </tr>
  <tr>
    <td colspan="3">
	<?php
    $this->load->view('layouts/footer');
	?></td>
  </tr>
</table>
</body>
</html>
