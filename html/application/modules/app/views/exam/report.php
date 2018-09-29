<?php
@session_start();

$this->load->helper('url');

$this->load->library("Configer");
$this->load->model('app_model');
$Setting=$this->configer->getConfiger();
$base= base_url("html/application/modules/app/views/layouts/default/");
$option=$this->app_model->getOption();

if($option['allow_report']!="YES"){
redirect("app/",'refresh');
} 

if(empty($_SESSION['exam_profile'])){
redirect("app/",'refresh');
} 



$exam_question=$_SESSION['exam_question'];
$e_exam=@$_SESSION["e_exam"];
$User=$_SESSION['exam_profile'];

$rightquestion=$_SESSION['rightquestion']
?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


<script>

 
 
  function viewone(div){
 
 var divc="#mydiv"+div;
 
var x=jQuery(divc).css("display");
 if(x=='none'){
 jQuery(divc).show("normal");
 }
 else {
 
 jQuery(divc).hide("slow");
 
 } 
 
}
 
 
 </script>



<fieldset dir="rtl">
<legend class="dor" dir="ltr">عرض تقرير بالاجابات الغير صحيحة &nbsp;   <img src="<?php echo $base;?>/img/flag_red.png"></legend>
<table align="center" width="99%" dir="ltr" cellpadding="0" cellspacing="2" style="border:1px #CCCCCC dotted">


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
 
 







///////////////////////////////////////////


if(is_array($exam_question)){
$len=count($exam_question);
foreach($exam_question as $key=>$value){
$myQuestion=$this->db->query("select * from `cm_question` where `ID`='$value' ");
$myQuestion=$myQuestion->row_array();
/////////////////////////////////////////////////////


$anse=$this->db->query("select * from `cm_answer` where `question`='$myQuestion[ID]' and `answer`!='' order by ID ");
$rs= $anse->result_array();
?>

<tr><td align="right" width="93%" class="dor"><a href="javascript:viewone('<?php echo $value;?>')"><?php echo $myQuestion['question'];?></a></td>
<td width="7%">
<?php
if(in_array($myQuestion['ID'],@$rightquestion)){
?>
<img src="<?php echo $base;?>/img/accept_green.png">
<?php
} else {
?>
<img src="<?php echo $base;?>/img/cancel_round.png">
<?php
}
?>
 </td>
</tr>
<tr>
<td colspan="2" align="right" class="dor">

<span id="mydiv<?php echo $value;?>" style="display:none; width:50%; padding:30px">
<table align="center" width="50%"   class="dor">
<?php
$mtrue="";
if(is_array($rs)){
foreach($rs as $as){

if($as['kanswer']=="YES"){

$img="<img src='$base/img/ok3.gif'>";
$mtrue="checked='checked'";
}
else {
$img="<img src='$base/img/error.gif'>";
//$mtrue="checked";
}
?>


<tr>
<td align="right"><?php echo $as['answer'];?></td>

<td width="3%">
<?php
if($as['ktype']=="MULTI"){
if(@in_array($as['ID'],@$arrcheck)){
echo "<input type=\"checkbox\"     checked name=\"c[]\" value='$as[ID]' readonly=\"readonly\" />";
}
else {
echo "<input type=\"checkbox\"    name=\"c[]\" value='$as[ID]' readonly=\"readonly\" />";
}


} 
else {
if(@in_array($as['ID'],@$arrcheck)){
echo "<input type=\"radio\"     checked  name=\"r_$as[ID]\" value='$as[ID]' readonly=\"readonly\" />";
} 
else {
echo "<input type=\"radio\"    name=\"r_$as[ID]\" value='$as[ID]'  readonly=\"readonly\" />";
}

 
}
?>
 
 
</td>

<td width="1%"><?php echo $img;?></td>

</tr>



<?php
}
}
?></table>
</span>

</td>
</tr>

<tr>
<td colspan="2" bgcolor="#CCCCCC" height="1px"></td>
</tr>
 
 
 
 <?php
 
 }
 }
 
 ?>
 
 
 


</table>

</fieldset>


<?php
unset($_SESSION['exam_profile']);
unset($_SESSION["e_exam"]);
unset($_SESSION['exam_duration']);
unset($_SESSION["exam_rem_duration"]);
unset($_SESSION['exam_question']);
unset($_SESSION["e_mark"]);
unset($_SESSION['exam_profile']);
unset($_SESSION['exam_cat']);
?>

