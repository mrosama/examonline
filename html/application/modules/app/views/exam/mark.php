<?php
@session_start();


if($this->session->userdata('CA_login')==false){
$this->load->helper('url');
redirect('app/', 'refresh');
} 
?>

<noscript>
<meta http-equiv="refresh" content="0;url=<?php echo base_url("app/");?>">
</noscript>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />




<script language=JavaScript>
<!--

//Disable right mouse click Script
//By Maximus (maximus@nsimail.com) w/ mods by DynamicDrive
//For full source code, visit http://www.dynamicdrive.com






var message="Function Disabled!";

///////////////////////////////////
function clickIE4(){
if (event.button==2){
//alert(message);
return false;
}
}

function clickNS4(e){
if (document.layers||document.getElementById&&!document.all){
if (e.which==2||e.which==3){
//alert(message);
return false;
}
}
}

if (document.layers){
document.captureEvents(Event.MOUSEDOWN);
document.onmousedown=clickNS4;
}
else if (document.all&&!document.getElementById){
document.onmousedown=clickIE4;
}

document.oncontextmenu=new Function(";return false")

//**************


function disableKey(event) {
  if (!event) event = window.event;
  if (!event) return;

  var keyCode = event.keyCode ? event.keyCode : event.charCode;

  if (keyCode == 116) {
   window.status = "F5 key detected! Attempting to disabling default response.";
   window.setTimeout("window.status='';", 2000);

   // Standard DOM (Mozilla):
   if (event.preventDefault) event.preventDefault();

   //IE (exclude Opera with !event.preventDefault):
   if (document.all && window.event && !event.preventDefault) {
     event.cancelBubble = true;
     event.returnValue = false;
     event.keyCode = 0;
   }

   return false;
  }
}

function setEventListener(eventListener) {
  if (document.addEventListener) document.addEventListener('keypress', eventListener, true);
  else if (document.attachEvent) document.attachEvent('onkeydown', eventListener);
  else document.onkeydown = eventListener;
}

function unsetEventListener(eventListener) {
  if (document.removeEventListener) document.removeEventListener('keypress', eventListener, true);
  else if (document.detachEvent) document.detachEvent('onkeydown', eventListener);
  else document.onkeydown = null;
}

setEventListener(disableKey)
//unsetEventListener(disableKey)



function sendform1(myform){
document.form_exam.viewmark.value="yes";
document.form_exam.submit();


 


}
 


window.defaultStatus="Powered By :Osama Salama";

// --> 
</script>

 
</head>
<body>
<?php
$this->load->helper('url');
$this->load->library("Configer");
$this->load->model('app_model');
$Setting=$this->configer->getConfiger();
$base= base_url("html/application/modules/app/views/layouts/default/");

if(@$_REQUEST['endtime']=="yes"){
$this->app_model->save();
redirect("app/exam/result",'refresh');
}


///////////////////////
if(@$_REQUEST['viewmark']=="yes"){
$this->app_model->save();
redirect("app/exam",'refresh');
}







@$e_exam=$_SESSION["e_exam"];




@$exam_duration=$_SESSION['exam_duration'];

 
 
 

 
 if(@$_POST["t_rem_duration"]==""){
 $_SESSION["exam_rem_duration"]=@$_SESSION["exam_rem_duration"] ;
 }
 else {
$_SESSION["exam_rem_duration"]=intval($_POST["t_rem_duration"]);  
 }
 
 


$exam_question=$_SESSION["e_mark"];
$current=current($_SESSION["e_mark"]);
$key=key($_SESSION["e_mark"]);
$end=end($_SESSION["e_mark"]);
$total=count($_SESSION["e_mark"]);

$firstKey =0;
$lastKey = end(array_keys($exam_question));

//***************************




if(@$_REQUEST['IsPost']=="Send"){
//$this->app_model->save();
}




if(@$_REQUEST['next']!=""){

$this->app_model->save();
//////////////
$NextKey=$this->input->post('NextKey');
$key=$NextKey;
 
$id_question=$exam_question[$key];

}
else {
$id_question=$current;
}
//**************************

 

if(@$_REQUEST['prev']!=""){

$this->app_model->save();
///////////////

$PrevKey=$this->input->post('PrevKey');
 
$key=$PrevKey;
 
$id_question=$exam_question[$key];
 

}

//**************************
//mark


////////////////////////////////////


$query=$this->db->query("select * from `cm_question` where `ID`='$id_question' ");
$row = $query->row_array();
$anse=$this->db->query("select * from `cm_answer` where `question`='$id_question' and `answer`!='' order by ID ");
$rs= $anse->result_array();
?>
<?php
//**************************
//mark
 $e_mark=@$_SESSION["e_mark"];
if($e_mark==""){
 $e_mark=array();
}

?>
<script type="text/javascript">
var sec=0;
var t;
	function get_cookie(Name) 
		{
			var search = Name + "="
			var returnvalue = "";
			if (document.cookie.length > 0) {
				offset = document.cookie.indexOf(search)
				// if cookie exists
				if (offset != -1) { 
					offset += search.length
					// set index of beginning of value
					end = document.cookie.indexOf(";", offset);
					// set index of end of cookie value
					if (end == -1) end = document.cookie.length;
						returnvalue=unescape(document.cookie.substring(offset, end))
				}
			}
			return returnvalue;
		}
		







	function startIt(){
/*if(get_cookie('timeLeft')!=""){
	var val=get_cookie('timeLeft')
	}
	else {
	val=document.form_exam.t_rem_duration.value
	}
*/
 val=document.form_exam.t_rem_duration.value
	
		//val=document.form_exam.t_rem_duration.value
			duration=parseInt(val);
			//alert("start="+duration);
			hours=Math.floor(duration/3600);
			minutes=Math.floor((duration-(hours*3600))/60);
			seconds=duration-((minutes*60)+(hours*3600));
			st=new Date();
			st.setSeconds(seconds);
			st.setMinutes(minutes);
			st.setHours(hours);
			s=st.getSeconds();
			m=st.getMinutes();
			h=st.getHours();
			s=(s<10)?"0"+s:s;
			m=(m<10)?"0"+m:m;
			h=(h<10)?"0"+h:h;
			document.form_exam.timer.value=h+":"+m+":"+s;
			setTimeout("controlTime()",1000);
		}

	function controlTime(){
			sec++;
			st.setTime(st.getTime()-1000);
			s=st.getSeconds();
			m=st.getMinutes();
			h=st.getHours();
			if(parseInt(h)<=0 && parseInt(m)<=0 && parseInt(s)<=0){
				stopIt();
			}
			s=(s<10)?"0"+s:s;
			m=(m<10)?"0"+m:m;
			h=(h<10)?"0"+h:h;
			document.form_exam.timer.value=h+":"+m+":"+s;
			//alert("rem_sec="+document.tform.t_rem_duration.value+"\ndiff="+(duration-sec))
			document.form_exam.t_rem_duration.value=duration-sec;
			document.cookie = "timeLeft="+document.form_exam.t_rem_duration.value;
			//alert(get_cookie('timeLeft'))
			
			t=setTimeout("controlTime()",1000);
		}

	function stopIt(){
			if(window.t)
				clearTimeout(t);
		 document.form_exam.endtime.value='yes';
			document.form_exam.submit();
		}
		window.onload=startIt;


</script>



<table align="center" width="99%" height="100%" style="border:1px #CCCCCC thin" cellpadding="0">
<form method="post" name="form_exam">

<tr><td align="left" valign="top" height="5%">
<span style="float:left">
 <table >
 <tr><td><input type="text" class="inputtime" size="15" name="timer" value="" readonly></td>
 <td class="dor">الوقت المتبقي</td>
  <td align="center"><img src="<?php echo $base;?>/img/clock.png"   /></td>
 </tr>
</table>
</span>

<span style="float:right; width:60%">
 <table   width="80%" align="right">
 <tr>
 <td   align="left" class="dor"><?php
 if($key==$total){
 echo "<script>document.form_exam.submit();</script>";
 echo $key;
 }else {
  echo $key+1;
 }
 
 ?> -<?php echo $total;?>   </td>
<td align="left" class="dor"> عدد العلامات</td>
 <td class="dor" align="right" width="30%"><?php echo $this->session->userdata('CA_name');?></td>
 <td class="dor" align="right" width="10%" ><font color="#FF0000"> / مرحبا </font>&nbsp;</td>
 <td align="center" width="1%"><img src="<?php echo $base;?>/img/user_green.png"   /></td>
 </tr>
</table>
</span>

</td></tr>
<tr><td height="1px" bgcolor="#CCCCCC"></td></tr>

<tr><td align="right" valign="top" height="80%">
<span style="float:right; width:100%">
 <table align="center" width="100%"  cellpadding="0" cellspacing="4" >
 
<tr>
<td align="left" width="2%"><input type="checkbox"  <?php if(in_array($row['ID'],@$e_mark)){ echo "checked";  }?> name="mark" value="<?php echo $row['ID'];?>"></td> 
<td align="left" width="2%" class="dor">علامة</td> 
<td align="left" width="2%"  ><img src="<?php echo $base;?>/img/flag_red.png"   /></td> 
<td align="right" width="95%" class="question_red" >

<?php echo nl2br($row['question']);?>

</td>
<td width="1%" ><img src="<?php echo $base;?>/img/002_17.png"   /></td>
</tr>

<tr>
<td colspan="5" valign="top" align="right">

 <table   width="70%" cellpadding="0" cellspacing="4" align="right">
 <tr><td  height="1px" bgcolor="#CCCCCC"></td></tr>
 </table>
 
</td>
</tr>


<!--//////////////////////////////////////////////////////////////////////////////-->



<tr><td  align="right" valign="top" colspan="5">
<?php
$cs=array();
$j=count(@$e_exam);
for($i=0;$i<$j;$i++){
$cs[]=explode(",",$e_exam[$i]["answer"]);
}
 
 //
 if(count($cs)!=0){
 
 while(list($k,)=each($cs)){
 for($i=0;$i<count($cs[$k]);$i++){
$arrcheck[]=$cs[$k][$i];
 
 }
 
 
 }
 } 
 
 ?>




<!--bei-->
<table align="right" width="100%" cellpadding="3" cellspacing="5">

<?php
if(is_array($rs)){
foreach($rs as $as){

?>


<tr>
<td width="99%" align="right" class="dor"><?php echo $as['answer'];?></td>   <td width="1%" align="right">
<?php
if($as['ktype']=="MULTI"){
if(@in_array($as['ID'],@$arrcheck)){
echo "<input type=\"checkbox\" checked name=\"c[]\" value='$as[ID]' />";
}
else {
echo "<input type=\"checkbox\" name=\"c[]\" value='$as[ID]' />";
}


} 
else {
if(@in_array($as['ID'],@$arrcheck)){
echo "<input type=\"radio\" checked name=\"r1\" value='$as[ID]' />";
} 
else {
echo "<input type=\"radio\" name=\"r1\" value='$as[ID]' />";
}

 
}
?>
 

</td></tr>



<?php

}


}


?>


 
 
 

</table>
<!--bei-->




</td></tr>




 </table>
</span>



</td></tr>




<?php
//preprenext

$nx=$key+1; 
if($lastKey==$key){
$disable="disabled";
}
if($lastKey==$nx or $nx=="" or $nx >= $lastKey){
$nx=$lastKey;
} else {
$nx=$key+1; 
}
?>






<?php
//prepreprev /******/
if($key==0){
$disable2="disabled";
}
$pr=$key-1; 
if($pr <= 0){
$pr=0;
} else {
$pr=$pr;
}

if($firstKey==$pr or $pr==""){
$pr=$firstKey;
} 
else {
$pr=$key-1; 
}
/******/
?>

<tr><td height="1px" bgcolor="#CCCCCC"></td></tr>

<tfoot>
<tr><td align="center" valign="top">
<table align="center" width="100%" cellpadding="0" cellspacing="3">
<tr>
<td align="center" class="dor" valign="middle">
<a href="#" onClick="sendform1();"><img src="<?php echo "$base/img/screen.png"?>" border="0" /><br/>&nbsp;&nbsp; عودة إلي الاختبار</a>
</td>

<td align="center"><input type="button" value="إنهاء   ألاختبار" class="buttonend" onClick="stopIt();"></td>
<td align="center">
<?php
if(@$disable2==""){
?>
 
<input type="submit"  value="السابق" class="buttonnext" name="prev" <?php echo @$disable2;?>>
<?php
}
?>
</td>
<td align="center">
<?php
if(@$disable==""){
?>
<input  type="submit" value="التالي" class="buttonnext" name="next" <?php echo @$disable;?>>
<?php
}
?>
</td>

<td></td>
<td></td>
</tr>
</table>

</td></tr>

</tfoot>



<input type="hidden" value="<?php echo $nx;?>"   name="NextKey">  
<input type="hidden" value="<?php echo $pr;?>" name="PrevKey">
<input type="hidden" value="<?php echo $id_question;?>" name="examid">

<INPUT type="hidden" name="t_duration" value="<?php echo(intval($_SESSION["exam_duration"]));?>">

	<INPUT type="hidden" name="t_rem_duration" value="<?php echo(intval($_SESSION["exam_rem_duration"]));?>">
<input type="hidden" value="Send" name="IsPost">
<input type="hidden" value="0" name="viewmark">
<input type="hidden" value="" name="endtime">
</form>
</table>

</body></html>
