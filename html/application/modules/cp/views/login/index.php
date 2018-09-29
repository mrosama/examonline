<html>
<title>تسجيل الدخول</title>
 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Page-Enter"
content="progid:DXImageTransform.Microsoft.ZigZag(Motion='in', ZigZagStyle='circle')">


<?php
 $this->load->helper('url');
$Base= base_url("html/application/modules/cp/views/layouts/");


$this->load->library("Configer");
  $defaultSetting=$this->configer->getConfiger();
 ?>


  <link href="<?php echo $Base?>/css/<?php echo  $defaultSetting['admin_style'];?>" rel="stylesheet" type="text/css" media="all" />  
 


<SCRIPT type=text/javascript src="<?php echo $Base?>/js/rounded_corners_lite.inc.js"></SCRIPT>
  <style type="text/css">
<!--
#htmlElement {
	padding: 10px;
	background-color: #000;
}

body {
	background-color: #fcfbf5;
}
-->
</style> 
  
  
<table width="100%" border="1" dir="ltr">
  <tr>
    <td><table align="right" width="100%"  class="menu_m3" border="0"  >
  <tr>
    <td width="95%" align="right" class="blocks" >
 Admin (CPanel)

 </td>
    <td width="5%"><img src="<?php echo $Base?>/img/Arabian.gif" align="right"> </td>
  </tr>
</table></td>
  </tr>
  <tr>
    <td align="center">
    <!---->
     <table width="100%" align="center" >
<tr> <td align="center">
 <div style=" width:550px;" id=info_1 class=roundedCorner>
<TABLE cellSpacing=0   cellPadding=0  border="1" width="100%" align="center" dir="ltr">
  <TBODY>
  <TR  >
      <TD width='10px' >
 </TD>
    <TD width='90%'    align="center"   >
    <br/>
 <table align="center" width="100%">
 <form method="post" name="form_1">
          <tr>
            <td width="59%" align="right"><span id="main_user_name">
              <input type="text" name="username" class="text" value="osama_eg@outlook.com" id="user_field" dir="ltr" Autocomplete='off'  />
              </span></td>
            <td width="16%" class="blocks" align="right">أسم المستخدم</td>
            <td width="25%" rowspan="2" align="right"  valign="bottom" >
            <img src="<?php echo $Base?>/img/5380[1].png"  class="imgborder" border="1" vspace="5" align="bottom"></td>
          </tr>
          <tr>
            <td align="right"><span id="main_user_pass">
              <input type="password" name="password" class="text" value="000"  id="pass_field" dir="ltr" Autocomplete='off' />
              </span></td>
            <td class="blocks" align="right" >كلمة المرور</td>
          </tr>
          <tr>
            <td colspan="3" align="center">
          
            <input type="submit" value="  دخول  " class="button" 
              >
            </td>
          </tr>
 
          <input type="hidden" value="login" name="IsPost" >
        </form>
 <tr><td colspan="3"  >
 <td></tr>
        
 </table>
 

  <br/><br/><br/> 
     </TD>
      <TD  class="blocks" align="right"></TD>
        <TD width=30>
     </TD>
    <TD width=10></TD></TR></TBODY></TABLE>
    </div>
    
    <?php
	
	if($error==true){
$this->load->library('Msg');

echo $this->msg->SendMsg("تسجيل الدخول","!!... خطأ في تسجيل الدخول",3);
}
	
	

	
	?>
    
 

    
    
    </td>
  </tr>
  
  
  <tr>
  
    <td width="100%" align="center" id="footers3" dir="ltr">
  
 
    <table  width="100%" border="0"  dir="rtl">
  <tr>
    <td  align="center"><img src="<?php echo $Base?>/img/php_power.png"  align="right"> &nbsp;<span class="myselect4" >Copyright © <?php echo date('Y')?> cpanel. All Rights Reserved.</span></td>
  </tr>
</table>
 
</td>
  </tr>
</table>
 

 
<SCRIPT type=text/javascript>
 // Curvy corner stuff
 settings = {tl: { radius: 6 },tr: { radius: 6 },bl: { radius: 6 },br: { radius: 6 },antiAlias: true,autoPad: true,validTags: ["div"]}
 var myBoxObject = new curvyCorners(settings, "roundedCorner");
 myBoxObject.applyCornersToAll();
 </SCRIPT>
 
 	
 
