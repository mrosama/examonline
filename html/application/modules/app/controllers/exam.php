<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Exam extends MX_Controller {

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








$data['conten_page']="app/exam/index";
//$this->load->view('ap/ap/index',$data); module/controller/page
$layout=$this->styles->getStyle();
$this->load->view("layouts/$layout/layout",$data);
}


	
	
	
	
	
	
public function mark()
{
@session_start();








$data['conten_page']="app/exam/mark";
//$this->load->view('ap/ap/index',$data); module/controller/page
$layout=$this->styles->getStyle();
$this->load->view("layouts/$layout/layout",$data);
}
	
	
	
	/////////////////////////////////
	
	
	
	
	
	
public function result()
{
@session_start();








$data['conten_page']="app/exam/result";
//$this->load->view('ap/ap/index',$data); module/controller/page
$layout=$this->styles->getStyle();
$this->load->view("layouts/$layout/layout",$data);
}
		
	
	
	
public function report(){
@session_start();








$data['conten_page']="app/exam/report";
//$this->load->view('ap/ap/index',$data); module/controller/page
$layout=$this->styles->getStyle();
$this->load->view("layouts/$layout/layout",$data);

}


	
	
	
	
	
	
	
	
	
	
	
	
	
	
	

	
	
	

	
}


?>