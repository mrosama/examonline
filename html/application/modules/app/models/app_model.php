<?php
class App_model extends CI_Model {

 

   public function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    
	
	
	
	
	public function HitCounter(){
	
$array1=array(0,1,2,3,4,5,6,7,8,9);
$html="";

$query = $this->db->query("select * from `cm_counters` limit 1");
$row =$query->row_array();
$total=$row['counter'];

switch($row['type_counter']){
case "normal":
$html=$total;
break;

case "style1":
$len=strlen($total);
for($i=0;$i<$len;$i++){
if(in_array($total[$i],$array1)){
$html.="<img src='{BaseCounter}/style1/$total[$i].gif' />";
 }}
break;

case "style2":
$len=strlen($total);
for($i=0;$i<$len;$i++){
if(in_array($total[$i],$array1)){
$html.="<img src='{BaseCounter}/style2/$total[$i].png' />";
 }}
break;
case "style3":
$len=strlen($total);
for($i=0;$i<$len;$i++){
if(in_array($total[$i],$array1)){
$html.="<img src='{BaseCounter}/style3/$total[$i].gif' />";
 }}
break;
case "style4":
$len=strlen($total);
for($i=0;$i<$len;$i++){
if(in_array($total[$i],$array1)){
$html.="<img src='{BaseCounter}/style4/$total[$i].png' />";
 }}
break;
case "custome":
$html.=eval($row['code']);
break;
}


 
return $html;



	
	///
	}
	
	
	
 public function Db_Expr($expression){
 
 return (string) $expression;
 
 }
		
	

public function VistorCounter(){
@session_start();

@$VistorSession=$_SESSION['VistorSession'];

$times=time()-3600;
$this->db->query("update `cm_vistors` set `online`='offline' where `timev` < $times  ");
$this->db->query("update `cm_vistors` set `online`='offline' where `timev` is NULL  ");
//////////////
$times2=time()-604800;
$this->db->query("delete from `cm_vistors` where `timev` < $times2  ");
////////////////////

if(isset($VistorSession)){

$query = $this->db->query("select * from `cm_vistors` where `session_id`='".$VistorSession."' LIMIT 1");
$len=$query->num_rows();

if($len!=0){
$this->db->query("update `cm_vistors` set `timev`='".time()."',`online`='online' where  `session_id`='".$VistorSession."'  ");


}

else {

 
 
 
$_SESSION['VistorSession']=session_id();
$this->load->library('user_agent');
$time=time();
$data=array(
"ip"=>$this->input->ip_address(),
"os"=>$this->agent->platform(),
"browser"=>$this->agent->browser(),
"dat"=>date('Y-m-d h:m:s'),
"timev"=>"$time",
"session_id"=>$_SESSION['VistorSession']
);

  $this->db->insert('cm_vistors', $data);
}
}
//***

if(!isset($VistorSession)){
 
 
 $this->db->query("update `cm_counters` set `counter`=(counter)+1 ");
 $_SESSION['VistorSession']=session_id();
 $VistorSession=$_SESSION['VistorSession'];
$this->load->library('user_agent');
$time=time();
$data=array(
"ip"=>$this->input->ip_address(),
"os"=>$this->agent->platform(),
"browser"=>$this->agent->browser(),
"dat"=>date('Y-m-d h:m:s'),
"timev"=>"$time",
"session_id"=>$_SESSION['VistorSession']
);

$this->db->insert("cm_vistors",$data);



////end 1
}

}


/////////////////////////////////////////////



public function CheckOnline(){
 

$time=time()-3600;
$arr=array("online"=>"NO");
$this->db->query("update `cm_member` set `online`='NO' where `timeviste`<'$time' ");
$this->db->query("update `cm_member` set `online`='NO' where `timeviste` is NULL  ");
if($this->session->userdata('CA_login')==true){
$this->db->query("update `cm_member` set `online`='YES',`timeviste`='".time()."' where `ID`='".$this->session->userdata('CA_ID')."' ");
}


}



////



public function front_GetUser(){
$x=$this->db->query("select * from `cm_member`  where `online`='YES' ");
$online=$x->num_rows();
return (int)$online;
}

//////////////////////


public function front_GetVistor(){

$x=$this->db->query("select * from `cm_member`  where `online`='YES' ");
$online=$x->num_rows();
//
$xv=$this->db->query("select * from `cm_vistors`  where `online`='online' ");
$onlinev=$xv->num_rows();
$l=@$onlinev-$online;
return $l; 

}




public function front_GetTotal(){

$x=$this->db->query("select * from `cm_member`  where `online`='YES' ");
$online=$x->num_rows();
if($online=="0"){
$u=0;
}
else {
$u=$online;
}
//
$xv=$this->db->query("select * from `cm_vistors`  where `online`='online' ");
$onlinev=@$xv->num_rows();
$l=@$onlinev-$u;
$total=@$u+$l;
return $total;
}
 














//////////////////////////////////////////




public function front_useFrom($title,$path,$id){

$this->load->helper('url');
$this->load->helper('html');
$this->load->library("Xcleans");

$base=base_url('html/application/modules/app/views/layouts/default/');
$imgs=img(array('src'=>"$base/img/navigate_left2.png",'border'=>0));
$html="";
$id=$this->xcleans->process($id);
if($id!=""){

$cats=@$this->front_from_cat($id);
 



$html.=anchor($path,$title,"class='links'");
for ($i=count($cats) ; 0 <= $i; --$i ){
//for($i=count($cats);$i>=0;$i--){
$cat=@explode("-",$cats[$i]);
//$html.="<a href='?action=articles&do=cat&id=$cat[1]' class='links'>$cat[0] </a>";
$html.=@anchor("$path/id/$cat[1]",$cat[0]."&nbsp; $imgs  &nbsp;","class='links'");
 

}
return $html;
}

}






public function front_from_cat($IDS){
$c=0;

for ($i=0;$i<=6;$i++){
if($c==0){
 
$query=$this->db->query("select * from `cm_cat` where (`ID`='$IDS')");
$r=$query->row_array();
$name[]=$r['name']."-".$r['ID'];
 
$id=$r['cat'];
$c++;
}else{
if($id!=0){

$query=$this->db->query("select * from `cm_cat` where (`ID`='$id')");
$r=$query->row_array();

$name[]=$r['name']."-".$r['ID'];
$id=$r['cat'];
}else{
break;
}
}
}
return $name;
}




///////////////




public function save(){
@session_start();

 $found="";

$array=array();
$examid=$this->input->post('examid');

//story in session
@$e_exam=$_SESSION["e_exam"];

@$e_mark=$_SESSION["e_mark"];

/*
 $vb=@array_search($examid,$e_mark);
 
if($vb!=false){
//echo "delete";
@array_splice($e_mark,$vb,1);
echo $vb."***********";
}
*/

 if(empty($_REQUEST['mark'])){
 
$JK=count($e_mark);
for($j=0;$j<$JK;$j++){
if(@$e_mark[$j]==$examid){

@array_splice($e_mark,$j,1);
break;
}
}
}
 






if(@$_REQUEST['mark']!=""){
$markFound="";
$JK=count($e_mark);
for($j=0;$j<$JK;$j++){
if(@$e_mark[$j]==$examid){
$markFound="1";
@$mykey=$j;
break;
}
}
 
//
if($markFound!="1"){
$e_mark[$JK]=$examid;
}


}

 
 
 

 
 





 
$_SESSION["e_mark"]=$e_mark;



 
if(@$_REQUEST["r1"]!=""){
$r1[]=@$_REQUEST["r1"];
}

$check=@$_REQUEST["c"];

$cout=count(@$check);
for($k=0;$k<$cout;$k++){
$sa[]=@$check[$k];
}

$s=@(array) $sa;
$sing=@(array) $r1;
$nm=@array_merge($array,$s,$sing);
$answer_select= implode(",",$nm);
//************************

///////////////////////story

$len=count($e_exam);
for($i=0;$i<$len;$i++){
if($e_exam[$i]["question"]==$examid){
$found="1";
$len2=$i;
break;
}
} // end for
if($found!="1"){
// add new
$e_exam[$len]["question"]=$examid;
$e_exam[$len]["answer"]=$answer_select;
$_SESSION["e_exam"]=$e_exam;
}
else {
$e_exam2[$len2]["question"]=$examid;
$e_exam2[$len2]["answer"]=$answer_select;
array_splice($e_exam,$len2,1,$e_exam2);
$_SESSION["e_exam"]=$e_exam;
}



//////////////////////


}






public function getCat(){

$query=$this->db->query("select * from `cm_cat` where `com_type`='com_exam' and `cat`=0 and `active`='YES' order by ID  ");
$row=$query->result_array();
return $row;

}	
	

public function getOption(){
$query=$this->db->query("select * from `cm_option`");
$row=$query->row_array();
return $row;
}


public function getProfileByEmail($email,$exam){

$query=$this->db->query("select * from `cm_profile` where `email`='$email' and `exam`='$exam'  ");
$row=$query->num_rows();
return $row;
}



public function saveprofile(){
$data = array(
'userID' => $this->session->userdata('CA_ID') ,
'dat' =>date('Y-m-d h:m:s'),
'email' =>$this->session->userdata('CA_email'),
'code' =>md5(uniqid(mt_rand())) ,
'exam' =>$this->input->post('cat'),
);
$this->db->insert('cm_profile', $data); 
///

$query=$this->db->query("select * from `cm_profile`  where `email`='".$this->session->userdata('CA_email')."' and `exam`='".$this->input->post('cat')."' order by ID desc limit 1 ");
$row=$query->row_array();
$_SESSION['exam_profile']=$row;

}


public function getSelectedCat($cat){

$query=$this->db->query("select * from `cm_cat` where `com_type`='com_exam' and `ID`='$cat' and `active`='YES'  ");
$row=$query->row_array();

$_SESSION['exam_cat']=$row;

return $row;

}	
	

public function PreparExam($cat,$limit,$duration){
$query=$this->db->query("select  DISTINCT (ID) from `cm_question` where `cat`='$cat' order by Rand() limit $limit ");
 $arr=array();
foreach ($query->result_array() as $row)
{
$arr[]+=$row['ID'];
}
shuffle($arr);
$_SESSION['exam_question']=$arr;
$_SESSION['exam_duration']=$duration;
}





public function getProfileByCode($code){

}





















}	
	
	?>