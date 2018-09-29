<?php
@session_start();

$this->load->helper('url');
if(empty($_SESSION['exam_profile'])){
redirect("app/",'refresh');
} 


$this->load->library("Configer");
$this->load->model('app_model');
$Setting=$this->configer->getConfiger();
$base= base_url("html/application/modules/app/views/layouts/default/");
$option=$this->app_model->getOption();

///////////////////////////////////
$exam_question=$_SESSION['exam_question'];
$e_exam=@$_SESSION["e_exam"];
$User=$_SESSION['exam_profile'];
$Cat=$_SESSION['exam_cat'];




$query=$this->db->query("select * from `cm_member` where `ID`='$User[userID]' ");
$query=$query->row_array();
/*

if(is_array(@$e_exam)){
$len=count(@$e_exam);
for($i=0;$i<$len;$i++){
$ans=@explode(',',$e_exam[$i]['answer']);
$t=@implode(',',$ans);
$data = array(
'userid' => $User['userID'] ,
'code' => $User['code'] ,
'exam' => $Cat['name'],
'question' =>$e_exam[$i]['question'],
'answer' =>$t,
'dat' =>date('Y-m-d h:m:s')
);
$this->db->insert('cm_result', $data); 
}
} else {
$data = array(
'userid' => $User['userID'],
'code' => $User['code'],
'exam' => $Cat['name'],
'question' =>0,
'answer' =>0,
'dat' =>date('Y-m-d h:m:s')
);
$this->db->insert('cm_result', $data); 
}
*/


//**********************************

//correct the Result
$rightquestion=array();
$grade=0;
$counter=count($exam_question);

for($i=0;$i<$counter;$i++){
 
/////*------------------------------------------- Get Question
$myQuestion=$this->db->query("select * from `cm_question` where `ID`='$exam_question[$i]' ");
$myQuestion=$myQuestion->row_array();
 

/////*------------------------------------------- Get Anwser
$myAnswer=$this->db->query("select ID from `cm_answer` where `question`='$myQuestion[ID]'  and `kanswer`='YES' ");

$myAnswer=$myAnswer->result_array();
///////////////////////////
$mytrue=array();

$ans=@explode(',',$e_exam[$i]['answer']);


foreach($myAnswer as $row){

$mytrue[]=$row['ID'];


}

$r=array_diff($ans,$mytrue);
 
 if(count($r)==0){
 $rightquestion[]=$exam_question[$i];
$grade++;
 }
 


/// end for
}

 
$_SESSION['rightquestion']=$rightquestion;
//echo $grade;

$result=floor (($grade/$counter)*100);
//echo $result;
if($result <50){
$target='FAIL';
$taget_view='<font color="#CC3300">فشل في تجاوز الاختبار</font> ';
$color='#CC3300';
} else {
$target='PASS';
$color='#009900';
$taget_view='<font color="#009900"> تم إجتياز الاختبار بنجاح </font>';
}

$wronganswer=$counter-$grade;


$data = array(
'num_question' =>$counter,
'num_true' => $grade,
'result'=>$target
);
$this->db->where('code',$User['code']);
$this->db->update('cm_profile', $data); 





//end














?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

 

<table align="center" width="99%" cellpadding="0" cellspacing="9" style="border:1px #CCCCCC dotted">

<tr><td class="dor" align="right"><font color="#CC3300"><?php echo $query['name'];?></font></td><td width="20%" class="dor" align="center">  ألاســـــــــــم</td></tr>
<tr><td colspan="2" align="center" height="1px" bgcolor="#CCCCCC"></td></tr>

<tr><td class="dor" align="right"><font color="#CC3300"><?php echo $Cat['name'];?></font></td><td width="20%" class="dor" align="center">  أختبــــــــــــــــــــار</td></tr>
<tr><td colspan="2" align="center" height="1px" bgcolor="#CCCCCC"></td></tr>

<tr><td class="dor" align="right"><font color="#CC3300"><?php echo $counter;?></font></td><td width="20%" class="dor" align="center">  عدد ألاسئلة</td></tr>
<tr><td colspan="2" align="center" height="1px" bgcolor="#CCCCCC"></td></tr>

<tr><td class="dor" align="right"><font color="#CC3300"><?php echo $grade;?></font></td><td width="20%" class="dor" align="center">  عدد ألاجابات الصحيحة</td></tr>
<tr><td colspan="2" align="center" height="1px" bgcolor="#CCCCCC"></td></tr>

<tr><td class="dor" align="right"><font color="#CC3300"><?php echo $wronganswer;?></font></td><td width="20%" class="dor" align="center">  عدد ألاجابات الخطأ</td></tr>
<tr><td colspan="2" align="center" height="1px" bgcolor="#CCCCCC"></td></tr>


<tr><td class="dor" align="right">
<?php echo $taget_view ;?> 

</td><td width="20%" class="dor" align="center">  نتيجة الاختبار</td></tr>
<tr><td colspan="2" align="center" height="1px" bgcolor="#CCCCCC"></td></tr>


<tr><td class="dor" align="right">
 
<div style="width:50%;">
<div style="border:1px #777 solid; width:100%; height:25px; padding:3px; padding-bottom:1px;">
<div style="height:23px; background-color:<?php echo $color;?>;width:<?php echo $result;?>%; vertical-align:middle"></div>
</div>
</div>
<font color="#CC3300"><?php echo $result;?>%</font>

</td><td width="20%" class="dor" align="center">  النسبة</td></tr>
<tr><td colspan="2" align="center" height="1px" bgcolor="#CCCCCC"></td></tr>
</table>
<br/>

<div style="height:1px; min-height:1px;background-color:#CC3300; width:50%; float:right"></div>
<br/>
<table align="right" cellpadding="0" cellspacing="5">
<?php
if($option['allow_report']=="YES"){
?>
<tr><td class="dor" align="right">
<?php echo anchor("app/exam/report/".$User['code'],"عرض تقرير بالاجابات الغير صحيحة");?>
</td><td><img src="<?php echo $base;?>/img/flag_red.png"></td></tr>
<?php
}
?>
<tr><td class="dor" align="right">
<a href="javascript:window.print()">طباعة النتيجة</a>
</td ><td><img src="<?php echo $base;?>/img/Printer 2.png"></td></tr>
<tr><td class="dor" align="right"><?php echo anchor("app/logout/","خروج");?>    </td><td><img src="<?php echo $base;?>/img/control_power_blue.png"></td></tr>
</table>




<!--*****************************************************-->
<?php

$this->db->query("update `cm_member` set `online`='NO' where `ID`='".$this->session->userdata('CA_ID')."' ");

$this->load->helper('url');	
	///

@$CAUser = array(
'CA_ID'  =>'',
'CA_name'  => '',
'CA_username'     => '',
'CA_email'     =>'',
'CA_login' => false
);

$this->session->unset_userdata($CAUser);	

?>
