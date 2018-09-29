<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class App extends MX_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	 
	 
  public function __construct()
       {

            parent::__construct();
		
$this->load->library("Configer");
$Setting=$this->configer->getConfiger();
 if($Setting['cache']=='YES'){
 $this->output->cache($Setting['cache_time']);
 }
}   
	 
	 
	 
	 
/*
public function language(){

if($this->input->post('ar')!=""){
$z = array(
'lang'  => 'ar',
'logged_in' => TRUE
);
$this->session->set_userdata($z);
}
if($this->input->post('en')!=""){
$newdata = array(
'lang'  => 'en',
'logged_in' => TRUE
);
$this->session->set_userdata($newdata);
}
$this->load->view('app/app/language','',false);

}
	*/ 
	 
	 
	 
	 
	 
	 
public function index()
{
@session_start();


$this->load->model('App_model');
$this->load->model('member_model');

$this->load->helper('url');
//////////////////////login
if($this->input->post('IsPost')=="Auth"){
 
$this->load->library("Xcleans");
$email=$this->xcleans->process($this->input->post('email'));
$pass=$this->xcleans->process($this->input->post('password'));
$cat=$this->xcleans->process($this->input->post('cat'));
//echo $email . "=================".$this->input->post('email');
$option=$this->App_model->getOption();
$profile=$this->App_model->getProfileByEmail($email,$cat);

if($option['allow_email']=='YES'){
//noraml
$re=$this->member_model->login();
if($re=='Login'){
 
$this->App_model->saveprofile();
//prepare exam
/**/
$catrow=$this->App_model->getSelectedCat($cat);
$numquestion=$catrow['numquestion'];
$duration=$catrow['duration'];
 
$this->App_model->PreparExam($catrow['ID'],$numquestion,$duration);
/**/
 
redirect("app/exam",'refresh');
} else {
 
$data['logins']='error';
}



}
else {
//check for email and cat
if($profile==0){
 $re=$this->member_model->login();
if($re=='Login'){
/**/
$catrow=$this->App_model->getSelectedCat($cat);
$numquestion=$catrow['numquestion'];
$duration=$catrow['duration'];
$this->App_model->PreparExam($catrow['ID'],$numquestion,$duration);
/**/
 
redirect("app/exam",'refresh');
/**/
redirect("app/exam");
} else {
$data['logins']='error';
}



}
else {
$data['logins']='foundbefore';
}
}

}





$data['cat']=$this->App_model->getCat();










 







///////////////////////////////////////////////
$data['conten_page']="app/app/index";
//$this->load->view('ap/ap/index',$data); module/controller/page
$layout=$this->styles->getStyle();
$this->load->view("layouts/$layout/layout",$data);
}


	
	
	
	
	
	
		 
	public function news()
	{
 $data['conten_page']="app/app/news";

 	//$this->load->view('ap/ap/index',$data); module/controller/page
 
//$layout=$this->styles->getStyle();
  
	//$this->load->view("layouts/$layout/layout",$data);
$this->load->view("app/app/news");
	}
	

	
	
	

	
	
public function hitcounter(){
@session_start();

 




$this->load->model('App_model');
$HitCounter=$this->App_model->HitCounter();

 $this->App_model->VistorCounter();
//CheckOnline;
 $this->App_model->CheckOnline();

$data['hitcounter']=$HitCounter;




$this->load->view('app/app/hitcounter',$data);

}	
	
	
	
	
	
public function logout(){

$this->load->model('member_model');
$this->member_model->logout();

}
	
	
	
	public function viewer(){
	
	
	
	$this->load->view('app/app/viewer');
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
 
	
	
	
	
	
}






?>