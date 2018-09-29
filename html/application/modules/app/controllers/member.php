<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Member extends MX_Controller {

  public function __construct()
       {
            parent::__construct();
		
$this->load->library("Configer");
$Setting=$this->configer->getConfiger();
 if($Setting['cache']=='YES'){
 $this->output->cache($Setting['cache_time']);
 }
}   
	 



public function index()
{
$data=array();

$this->load->model('member_model');
//////////////////////login
if($this->input->post('IsPost')=="Auth"){
$re=$this->member_model->login();
$data['Auth_result']=$re;
}

///////////////////////////


$this->load->view("app/member/index",$data);

}


public function reg()
{

$data=array();
$this->load->model('member_model');

if($this->input->post('IsPost')=="newUser"){
$data['resultmember']=$this->member_model->newUser();
}



$data['country']=$this->member_model->getCountry();










$data['conten_page']="app/member/reg";
/*$layout=$this->styles->getStyle();
$this->load->view("layouts/$layout/layout",$data);
*/
$this->load->view("app/member/reg",$data);
}



//////////////////////////////



public function restoremail()
{
$data=array();
$this->load->model('member_model');

if($this->input->post('IsPost')=="restore"){
$rs=$this->member_model->restorepassword();
$data['rs_restore']=$rs;
}

/////////////////////////////////////////
$data['conten_page']="app/member/restoremail";
$layout=$this->styles->getStyle();
$this->load->view("layouts/$layout/layout",$data);

}



public function editprofile()
{

$data=array();
$this->load->model('member_model');



if($this->input->post('IsPost')=='editUser'){

$data['resultmember']=$this->member_model->editprofile();

}




$data['country']=$this->member_model->getCountry();
$data['profile']=$this->member_model->Profile();





$data['conten_page']="app/member/editprofile";
$layout=$this->styles->getStyle();
$this->load->view("layouts/$layout/layout",$data);

}






public function account(){

/////////////

$this->load->library('Xcleans');
if($this->uri->total_segments()==7){
 
 $id=$this->xcleans->process($this->uri->segment('6'));
 $code=$this->xcleans->process($this->uri->segment('7'));
 $salt="_j%";
$idsalt=md5($id.$salt);
if($idsalt!=$code){
 $data['MailListResult']='CODE';
 
 }
 else {
 
//// //////////
 $q=$this->db->query("select * from `cm_member` where `ID`='$id' "); 
 if($q->num_rows()==0){
 $data['MailListResult']="NOTFOUND";
 }
 else {
 $ro=$q->row_array();
 @$this->db->query("update `cm_member` set `password`='$ro[newpass]'  where `ID`='$id'    ");
 
 
  $data['MailListResult']="change";
  
  
  
 }
 
 //////////
 
 }
 
 
 

}else {

$data['MailListResult']='URL';
}





/////////////

$data['conten_page']="app/member/account";
$layout=$this->styles->getStyle();
$this->load->view("layouts/$layout/layout",$data);

}

















public function logout(){

$this->load->model('member_model');
$this->member_model->logout();


}







}
?>
