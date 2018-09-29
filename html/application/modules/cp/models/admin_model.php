<?php
class Admin_model extends CI_Model {

 

   public function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    
	
	
public function backup($type='txt'){

$dbname=$this->db->database;  
 
$file_name= 'backup';
$date= date('-Y.m.d-H.ia');
$name= $file_name.$date;
// Load the DB utility class
$this->load->dbutil();

switch($type){
case "gz";
$format="gzip";
$exe="gz";
break;
case "txt";
$format="sql";
$exe="sql";
break;
}
// Backup your entire database and assign it to a variable
$backup =& $this->dbutil->backup(array('filename' => "$name.$exe", 'format'=>$format,'newline'=> "\n")); 

// Load the file helper and write the file to your server
$this->load->helper('file');
write_file("bin/tmp/$name.$exe", $backup); 
// Load the download helper and send the file to your desktop
$this->load->helper('download');
//force_download("$name.$exe", $backup);
return true;
 
///end func
}	
	
	
	//****************************
	
	
	


public function restoreDb($param){

 

$filename ="bin/tmp/".$param;
$exe=end(explode(".",$filename));
@set_time_limit(900);
$w = 1;

$cur_sql = '';

 
switch($exe){
case "sql":
$open = fopen($filename,'r');
$fdata = fread($open,filesize($filename));
$sql_file = explode("\n",$fdata);
break;

case "gz":
$open = gzopen($filename,'r');
$fdata = gzread($open,filesize($filename));
$sql_file = explode("\n",$fdata);
break;
}




foreach($sql_file as $v) {

$sql = trim($v);

if(@$sql[0] == '#' or @$sql[0]=='--') {
continue;
}

if(!$sql) {
continue;
}

$cur_sql .= $sql . ' ';
if(substr($sql, -1, 1) == ';') {
$sql_statements[] = substr(trim($cur_sql), 0, -1);
$cur_sql = '';
}
}



foreach($sql_statements as $k=>$v) {
 
 $this->db->query($v);
 }

 
}

	
	
	
	
	
	
	



public function sendMail(){

 $this->load->library('WebMail');
 $this->load->library('Configer');
 $conf=$this->configer->getConfiger();
 
 //upload file
$config['upload_path'] = './Media';
$config['allowed_types'] = '*';
$this->load->library('upload', $config);

 if(!$this->upload->do_upload('file1')){
  $errors= $this->upload->display_errors();
 //  echo   $errors;
  $attach=false;
 } else {
 $file = $this->upload->data();
$attach='./Media/'.$file['file_name'];
 }

 //send
 //  $attach=false;
 
 $to=$this->input->post('to');
 $subject=$this->input->post('subject');
 $msg=$this->input->post('input');
  

 $result=$this->webmail->__Sendmail($to,$subject,$msg,$attach,false,false,$conf);
@unlink($attach);
return $result;





}	
	
	
	
	
public function uploadMedia($path){
	
//upload file
$config['upload_path'] = $path;
$config['allowed_types'] = '*';
$this->load->library('upload', $config);

if(!$this->upload->do_upload('file1')){
$result= $this->upload->display_errors();
return 'error';

} else {


$file = $this->upload->data();
$filepath=$path.'/'.$file['file_name'];
}	

$result=array('filename'=>$file['file_name'],'filepath'=>$filepath);

return $result;

}


	
	
	
	
public function uploadMediaFly($path){
	
//upload file
$config['upload_path'] = $path;
$config['allowed_types'] = '*';
$config['file_name']=md5(uniqid(mt_rand()));
$this->load->library('upload', $config);


//$filename = md5(uniqid(mt_rand()))

if(!$this->upload->do_upload('file1')){
$result= $this->upload->display_errors();
return 'error';

} else {


$file = $this->upload->data();
$filepath=$path.'/'.$file['file_name'];
}	

$result=array('filename'=>$file['file_name'],'filepath'=>$filepath);

return $result;

}

	
	
	
	
public function CheckPremision(){

if($this->session->userdata('CP_role')==2){
$this->load->helper('url');
redirect('cp/login/auth', 'refresh');
} 
}	
	
	
	
	/////////////////
	
	
	
public function MainCatSelect($type,$catselect=0){

$html="";

$rows=$this->db->query("select * from `cm_cat` where `cat`='0' and `com_type`='$type'");


$html="<select   class=\"newinput\" style=\"width:30%\"    name=\"cat\" >

<option value='0' >Main Section</option>";

foreach($rows->result_array() as $row){
  
 $lens=$this->db->query("select * from `cm_cat` where `cat`='$row[ID]' and `com_type` ='$type'");
 
if($lens->num_rows!=0){
$html.="<optgroup title=\"You cant use this Section\" label=\"$row[name]\" class=\"blocks_red\"></optgroup>";
} 
else {
if($row["ID"]==$catselect){
$html.="<option class='option' selected='selected' value=\"$row[ID]\">$row[name]</option>";
} else {
$html.="<option class='option' value=\"$row[ID]\">$row[name]</option>";
}
}
  $html.=$this->SubCatSelect($type,$row['ID'],$catselect);
}

$html.="</select>";
return $html;
}
//***********************************
public function SubCatSelect($type,$ID,$catselect){
 
$html="";
 
$rows2=$this->db->query("select * from `cm_cat` where `cat`='$ID' and `com_type`='$type'");

foreach($rows2->result_array() as $row2){
  $lens=$this->db->query("select * from `cm_cat` where `cat`='$row2[ID]' and `com_type` ='$type'");

 

 if($lens->num_rows()!=0){
for($i=0;$i < $row2['level'];$i++){
$bar.="--- &nbsp;";
}
$html.="<optgroup title='You cant use this Section' label='$row2[name] $bar' class='blocks_red' ></optgroup>";
} 
else {
if($row2["ID"]==$catselect){
$html.="<option class='option' selected='selected'  value='$row2[ID]' dir='rtl'>";
} else {
$html.="<option class='option' value='$row2[ID]' dir='rtl'>";
}


for($i=0;$i < $row2['level'];$i++){
$html.="--- &nbsp;";
}
$html.="$row2[name]</option>";
}
$html.=$this->SubCatSelect($type,$row2['ID'],$catselect);

}

return $html;
}

	
	
	
	
	
	
	
	
	
	public function MainCatSelect2($type,$catselect=0){

$html="";

$rows=$this->db->query("select * from `cm_cat` where `cat`='0' and `com_type`='$type'");


$html="<select   class=\"newinput\" style=\"width:30%\"    name=\"cat\" >

<option value='0' >Main Section</option>";

foreach($rows->result_array() as $row){
  
 if($row["ID"]==$catselect){
$html.="<option class='option' selected='selected' value=\"$row[ID]\">$row[name]</option>";
} else {
$html.="<option class='option' value=\"$row[ID]\">$row[name]</option>";
}
 
 
  $html.=$this->SubCatSelect2($type,$row['ID'],$catselect);
}

$html.="</select>";
return $html;
}
//***********************************
public function SubCatSelect2($type,$ID,$catselect){
 
$html="";
 
$rows2=$this->db->query("select * from `cm_cat` where `cat`='$ID' and `com_type`='$type'");

foreach($rows2->result_array() as $row2){
  $lens=$this->db->query("select * from `cm_cat` where `cat`='$row2[ID]' and `com_type` ='$type'");

 

 if($row2["ID"]==$catselect){
$html.="<option class='option' selected='selected'  value='$row2[ID]' dir='rtl'>";
} else {
$html.="<option class='option' value='$row2[ID]' dir='rtl'>";
}

for($i=0;$i < $row2['level'];$i++){
$html.="--- &nbsp;";
}
$html.="$row2[name]</option>";


$html.=$this->SubCatSelect2($type,$row2['ID'],$catselect);

}

return $html;
}

	
	
	
	
	
	
	

function subtree($id,$com_type){
 $this->load->helper('url');
$base= base_url("html/application/modules/cp/views/layouts/");

$rows2=$this->db->query("select * from `cm_cat` where `cat`='$id' ");
$html="";
if($rows2->num_rows()!=0){
foreach($rows2->result_array() as $row2){
$bar="";
$html.="<tr height=\"30px\">
<td align=\"center\"><input type=\"checkbox\" name=\"del[]\" value=\"$row2[ID]\" /></td>
<td align=\"center\">";

$html.=anchor("cp/categories/index/section/$com_type/edit/$row2[ID]",img("$base/img/file_edit.gif"));
$html.="</td><td align=\"center\">";

 
if($row2['img']!=""){
$html.="<img src='Jimage($row2[img]);' class=\"smart_frames\" border=\"0\" />";
}
 
for($i=0;$i<$row2['level'];$i++){
@$bar.=" --- &nbsp;|";
}

$html.="</td>
<td align=\"right\">$row2[name]<font color=\"#FF0000\">$bar";


 
 $html.="</font></td>
<td align=\"center\"></td>
</tr>";
$html.=$this->subtree($row2['ID'],$com_type);

}
}

return $html;
}



///////////////////////////



public function numVistor($dat){
$query=$this->db->query("select * from `cm_vistors` where `dat`='$dat' ");
//echo "select * from `cm_vistors` where `dat`='$dat' ";
$len=$query->num_rows(); 
return $len;
}


////////////////////

public function getAdminTotal(){
$query=$this->db->query("select * from `cm_admin`  ");
$len=$query->num_rows(); 
return $len;
}
	
	
public function getmailTotal(){
$query=$this->db->query("select * from `cm_inbox` where `read`='NO'  ");
$len=$query->num_rows(); 
return $len;
}
		
	
public function getorderTotal(){
$query=$this->db->query("select * from `cm_orders`");
$len=$query->num_rows(); 
return $len;
}	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	}
    
    ?>