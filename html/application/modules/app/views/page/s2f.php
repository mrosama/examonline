<?php
@session_start();
$this->load->helper('url');
$base= base_url("html/application/modules/app/views/layouts/default/");

 
$this->load->helper('url');
$this->load->helper('html');
$base= base_url("html/application/modules/app/views/layouts/default/");
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="<?php echo  $base;?>/js/rounded_corners_lite.inc.js"></script>
<link href="<?php echo $base;?>/css/themes.css" rel="stylesheet" type="text/css" media="all" />

<script type="text/javascript">
function validate(myform){
var pattern1=new RegExp("^([-a-z0-9_]+(\.[_a-z0-9-]+)*@([a-z0-9-]+(\.[a-z0-9-]+)+))$","i");
if(myform.title.value==""){
alert("ألاسم مفقود");
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

else if(myform.code.value==""){
alert("كود التحقق مفقود");
return false;
}

else {
return true;
}


}
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
      <TD width="60%" class="myselect" align="right" valign="middle">إرسال لصديق</TD>
        <TD width=10 valign="middle">
<CENTER><IMG src="<?php echo $base;?>/img/Sites.png"  /></CENTER></TD>
    <TD width=10></TD></TR></TBODY></TABLE>
    </div>  </td></tr>
 </table>
 
 <!--*****************************************-->      
        
        
        

<?php
 $this->load->library('Msg');
 if(@$result=="error"){
  echo $this->msg->SendMsg(' إرسال لصديق ',validation_errors(),3);

 }
 ?>
 
 
 <?php
if(@$result=="errorcode"){
 echo $this->msg->SendMsg(' إرسال لصديق ','   كود التحقق غير صحيح ',3);
}


if(@$result=="ok"){
 echo $this->msg->SendMsg(' إرسال لصديق ','   تم ألارسال ',1);
}
?>






<table align="center" width="100%" cellpadding="0" cellspacing="5">
<form method="post" name="form1">

<tr><td  align="right"><input type="text" name="title" size="35" class="text_field" /></td><td  class="dor">ألاسم</td></tr>
<tr><td colspan="2" height="1px" bgcolor="#CCCCCC"></td></tr>
<tr><td align="right"><input type="text" name="email" size="35" class="text_field" /></td><td  class="dor">البريد الالكتروني لصديقك</td></tr>
<tr><td colspan="2" height="1px" bgcolor="#CCCCCC"></td></tr>
<tr><td align="right"><textarea cols="50" rows="5" class="text_field" name="msg" ></textarea></td><td  class="dor">الرسالة</td></tr>

<tr><td colspan="2" height="1px" bgcolor="#CCCCCC"></td></tr>
<tr><td align="right">
<img src="<?php echo  base_url('bin/reCaptcha/verfiy.php');?>">

<input type="text" name="code" size="10" class="text_field" /></td><td  class="dor">كود التحقق</td></tr>

<tr><td colspan="2" height="1px" bgcolor="#CCCCCC"></td></tr>
<tr><td colspan="2" align="center">
<input type="submit" value=" إرسال " onclick="return validate(this.form);" class="button"  />
</td></tr>
<input type="hidden" value="sendmail" name="do">
<input type="hidden" value="0" name="linkvisti">

</form></table>

<script language="javascript">
var links=parent.document.location;
document.forms["form1"].linkvisti.value=links;

</script>





<script type="text/javascript">
settings = {tl: { radius: 6 },tr: { radius: 6 },bl: { radius: 6 },br: { radius: 6 },antiAlias: true,autoPad: true,validTags: ["div"]}
 var myBoxObject = new curvyCorners(settings, "roundedCorner");
 myBoxObject.applyCornersToAll();
</script>






