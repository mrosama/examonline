<?php
class Member_model extends CI_Model {

 

   public function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
	
	
	
	
public function login(){

$this->load->library("Xcleans");
$this->load->helper('url');



$email=$this->xcleans->process($this->input->post('email'));
$password=md5($this->xcleans->process($this->input->post('password')));

$query = $this->db->query("SELECT * FROM `cm_member` where `email`='$email' and `password`='$password' ");
if ($query->num_rows() > 0){

$row=$query->row_array();
////

@$CAUser = array(
'CA_ID'  => $row['ID'],
'CA_name'  => $row['name'],
'CA_email'     => $row['email'],
'CA_login' => true
);

$this->session->set_userdata($CAUser);
//*update status
$t=time();
$this->db->query("update `cm_member` set `online`='YES',`timeviste`='$t' where `ID`='$row[ID]' ");
$data='Login';
}
else {

$data= 'Error';
}
return $data;
///////////////
}
	
	
	
public function logout(){
	
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
	
redirect('app/', 'refresh');
	
	
	
	
	
	
	
	}



public function getCountry(){

$query=$this->db->query("select * from `countries` ");
$data=$query->result_array(); 
return $data;
}




public function newUser(){
@session_start();
$this->load->library('Xcleans');
$this->load->library('form_validation');

if($_SESSION['random_number']==$this->input->post('captchacode')){
$email=$this->xcleans->process($this->input->post('email'));
$name=$this->xcleans->process($this->input->post('name'));
$password=md5($this->xcleans->process($this->input->post('password')));
$country=$this->xcleans->process($this->input->post('country'));
$gender=$this->xcleans->process($this->input->post('gender'));
///////////////////////
$this->form_validation->set_rules('name', 'الاسم مفقود',"required");
$this->form_validation->set_rules('email', 'البريد غير صحيح','valid_email|required');
$this->form_validation->set_rules('password', 'كلمة المرور مفقودة',"required");

if ($this->form_validation->run() == FALSE){
return 'ERROR_VALIDATE';
} 
else {

$query = $this->db->query("SELECT * FROM `cm_member` where  `email`='$email' ");

if ($query->num_rows() > 0){

return 'ERROR_FOUND';
}
else {

$data = array(
'name' =>$name ,
'dat' => date('Y-m-d h:m:s'),
'email' =>$email,
'password' =>$password,
'country' =>$country,
'gender' =>$gender,
'active' => 'YES'
);

$this->db->insert('cm_member', $data); 
 return 'ERROR_NOERROR';

}


///
}



} 

else {
return 'ERROR_CODE';
}










//
}





public function restorepassword(){
$this->load->helper('url');
$this->load->library('form_validation');
$this->load->library('Xcleans');
$this->load->library('Encryptions');

$this->load->library('WebMail');
$this->load->library('Configer');
$conf=$this->configer->getConfiger();
$email=$this->xcleans->process($this->input->post('email'));

$q=$this->db->query("select * from `cm_member` where `email`='$email' "); 
 if($q->num_rows()==0){
 return 'ERROR_FOUND';
 
 }
else {
$rows = $q->row_array();
$newpass=$this->encryptions->makePassword();
$newpass2=md5($newpass);

$this->db->query("update   `cm_member` set `newpass`='$newpass2' where `ID`='$rows[ID]' "); 
///
 $subject="إستعادة كلمة المرور";
 
 $salt="_j%";
$IDs=md5($rows['ID'].$salt);
$now=date("d-m-Y");
$link=base_url("app/member/account/j/$now/$rows[ID]/$IDs");
$links="<a href=$link>$link</a>";
 
 
 $msg="
أسم المستخدم: $rows[username]
<br/>
كلمة المرور: $newpass
من فضلك أضغط علي الرابط لتفعيل تغير كلمة المرور
<br/>
$links
<br/>
شكرا لك علي إستخدامك موقعنا
<br/>
$_SERVER[HTTP_HOST]
";
 
 $check=$this->webmail->__Sendmail($rows['email'],$subject,$msg,false,$conf['sitemail'],false,$conf);



///
if( $check==true){
 return 'SEND';
 }else {
 return 'ERRORMAIL';
 }
 
 
}






/////
}





public function Profile(){
$q=$this->db->query("select * from `cm_member` where `ID`='".$this->session->userdata('CA_ID')."' "); 
$rows = $q->row_array();
return $rows;
}




public function editprofile(){
@session_start();
$this->load->library('Xcleans');
$this->load->library('form_validation');
if($_SESSION['random_number']==$this->input->post('captchacode')){


$name=$this->xcleans->process($this->input->post('name'));
$email=$this->xcleans->process($this->input->post('email'));
$password=md5($this->xcleans->process($this->input->post('password')));
$country=$this->xcleans->process($this->input->post('country'));
$gender=$this->xcleans->process($this->input->post('gender'));
$id=$this->xcleans->process($this->input->post('id'));
///////////////////////
$this->form_validation->set_rules('name', 'الاسم مفقود',"required");
$this->form_validation->set_rules('email', 'البريد غير صحيح','valid_email|required');

 
///


if ($this->form_validation->run() == FALSE){
return 'ERROR_VALIDATE';
}  
else {
 
$query = $this->db->query("SELECT * FROM `cm_member` where `email`='$email' and `ID`!='$id' ");

if ($query->num_rows() > 0){

return 'ERROR_FOUND';
}
else {

///////////////
$arr = array(
'name' =>$name ,
'email' =>$email,
'country' =>$country,
'gender' =>$gender
);

if($this->input->post('password')!=''){
$arr=array_merge($arr,array('password'=>$password));
}


$this->db->where('id', $id);
$this->db->update('cm_member', $arr); 
return 'ERROR_NOERROR';


///////////////////////

}


///

}











}
else {
return 'ERROR_CODE';
}




//
}

















	
	
	
	
	}?>