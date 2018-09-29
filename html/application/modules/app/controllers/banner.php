<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Banner extends MX_Controller {

	 
  public function __construct()
       {
            parent::__construct();
		
$this->load->library("Configer");
$Setting=$this->configer->getConfiger();
 if($Setting['cache']=='YES'){
 $this->output->cache($Setting['cache_time']);
 }
}   
	 
	 
	 
	 

public function index($param=0){

$this->load->model('Banner_model');

 
 echo $this->Banner_model->Banner($param);
 
 

 

 


//$this->load->view("app/banner/index");

}














}

?>